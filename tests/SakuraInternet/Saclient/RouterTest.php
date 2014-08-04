<?php

namespace SakuraInternet\Saclient\Tests;

require_once "Common.php";
use SakuraInternet\Saclient\Cloud\API;
use SakuraInternet\Saclient\Cloud\Enums\ERouterInstanceStatus;
use SakuraInternet\Saclient\Errors\HttpConflictException;
use SakuraInternet\Saclient\Cloud\Resource\Router;

class RouterTest extends \PHPUnit_Framework_TestCase
{
	use \SakuraInternet\Saclient\Tests\Common;
	
	const USE_STATIC_RESOURCE = false;
	
	public function testCrud()
	{
		$name = "!phpunit-" . date("Ymd_His") . "-" . uniqid();
		$description = "This instance was created by Saclient PHPUnit Test";
		$maskLen = 28;
		//
		$api = $this->authorize();
		//
		$swytch = null;
		if (!self::USE_STATIC_RESOURCE) {
			echo 'ルータ＋スイッチの帯域プランを検索しています...', "\n";
			$plans = $api->product->router->find();
			$minMbps = 0x7FFFFFFF;
			foreach ($plans as $plan) {
				$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Resource\\RouterPlan", $plan);
				$this->assertGreaterThan(0, $plan->bandWidthMbps);
				$minMbps = min($plan->bandWidthMbps, $minMbps);
			}
			
			echo 'ルータ＋スイッチを作成しています...', "\n";
			$router = $api->router->create();
			$router->name = $name;
			$router->description = $description;
			$router->bandWidthMbps = $minMbps;
			$router->networkMaskLen = $maskLen;
			$router->save();
			
			echo 'ルータ＋スイッチの作成完了を待機しています...', "\n";
			if (!$router->sleepWhileCreating()) $this->fail('ルータが正常に作成されません');
			$swytch = $router->getSwytch();
		}
		else {
			echo '既存のルータ＋スイッチを取得しています...', "\n";
			$swytches = $api->swytch->withNameLike('saclient-static-1')->limit(1)->find();
			$this->assertEquals(1, count($swytches));
			$swytch = $swytches[0];
		}
		$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Resource\\Swytch", $swytch);
		$this->assertGreaterThan(0, count($swytch->ipv4Nets));
		$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Resource\\Ipv4Net", $swytch->ipv4Nets[0]);
		
		//
		echo 'ルータ＋スイッチの帯域プランを変更しています...', "\n";
		$routerIdBefore = $swytch->router->id;
		$swytch->changePlan($swytch->router->bandWidthMbps==100 ? 500 : 100);
		$this->assertNotEquals($routerIdBefore, $swytch->router->id);
		
		//
		if (0 < count($swytch->ipv6Nets)) {
			echo 'ルータ＋スイッチからIPv6ネットワークの割当を解除しています...', "\n";
			$swytch->removeIpv6Net();
		}
		echo 'ルータ＋スイッチにIPv6ネットワークを割り当てています...', "\n";
		$v6net = $swytch->addIpv6Net();
		$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Resource\\Ipv6Net", $v6net);
		$this->assertEquals(1, count($swytch->ipv6Nets));
		
		//
		for ($i=count($swytch->ipv4Nets)-1; 1<=$i; $i--) {
			echo 'ルータ＋スイッチからスタティックルートの割当を解除しています...', "\n";
			$net = $swytch->ipv4Nets[$i];
			$swytch->removeStaticRoute($net);
		}
		
		echo 'ルータ＋スイッチにスタティックルートを割り当てています...', "\n";
		$net0 = $swytch->ipv4Nets[0];
		$nextHop = long2ip(ip2long($net0->address) + 4);
		$sroute = $swytch->addStaticRoute(28, $nextHop);
		$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Resource\\Ipv4Net", $sroute);
		$this->assertEquals(2, count($swytch->ipv4Nets));
		
	}
	
}
