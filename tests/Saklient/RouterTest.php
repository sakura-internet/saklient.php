<?php

namespace Saklient\Tests;

require_once "Common.php";
use Saklient\Cloud\API;
use Saklient\Cloud\Enums\ERouterInstanceStatus;
use Saklient\Errors\HttpConflictException;
use Saklient\Cloud\Resources\Router;

class RouterTest extends \PHPUnit_Framework_TestCase
{
	use \Saklient\Tests\Common;
	
	const USE_STATIC_RESOURCE = false;
	
	public function testCrud()
	{
		$name = "!phpunit-" . date("Ymd_His") . "-" . uniqid();
		$description = "This instance was created by Saklient PHPUnit Test";
		$tag = "saklient-test";
		$maskLen = 28;
		$maskLenCnt = 1<<32-$maskLen;
		//
		$api = $this->authorize();
		//
		$swytch = null;
		if (!self::USE_STATIC_RESOURCE) {
			fprintf(\STDERR, 'ルータ＋スイッチの帯域プランを検索しています...'."\n");
			$plans = $api->product->router->find();
			$minMbps = 0x7FFFFFFF;
			foreach ($plans as $plan) {
				$this->assertInstanceOf("Saklient\\Cloud\\Resources\\RouterPlan", $plan);
				$this->assertGreaterThan(0, $plan->bandWidthMbps);
				$minMbps = min($plan->bandWidthMbps, $minMbps);
			}
			
			fprintf(\STDERR, 'ルータ＋スイッチを作成しています...'."\n");
			$router = $api->router->create();
			$router->name = $name;
			$router->description = $description;
			$router->bandWidthMbps = $minMbps;
			$router->networkMaskLen = $maskLen;
			$router->save();
			
			fprintf(\STDERR, 'ルータ＋スイッチの作成完了を待機しています...'."\n");
			if (!$router->sleepWhileCreating()) $this->fail('ルータが正常に作成されません');
			$swytch = $router->getSwytch();
		}
		else {
			fprintf(\STDERR, '既存のルータ＋スイッチを取得しています...'."\n");
			$swytches = $api->swytch->withNameLike('saklient-static-1')->limit(1)->find();
			$this->assertEquals(1, count($swytches));
			$swytch = $swytches[0];
		}
		$this->assertInstanceOf("Saklient\\Cloud\\Resources\\Swytch", $swytch);
		$this->assertEquals(1, count($swytch->ipv4Nets));
		$this->assertInstanceOf("Saklient\\Cloud\\Resources\\Ipv4Net", $swytch->ipv4Nets[0]);
		fprintf(\STDERR, "%s - %s\n", $swytch->ipv4Nets[0]->range->first, $swytch->ipv4Nets[0]->range->last);
		fprintf(\STDERR, print_r($swytch->ipv4Nets[0]->range->asArray, true));
		$this->assertEquals($maskLenCnt-5, count($swytch->ipv4Nets[0]->range->asArray));
		$this->assertEquals(0, count($swytch->collectUsedIpv4Addresses()));
		$this->assertEquals($maskLenCnt-5, count($swytch->collectUnusedIpv4Addresses())); 
		
		//
		fprintf(\STDERR, 'サーバを作成しています...'."\n");
		$server = $api->server->create();
		$server->name = $name;
		$server->description = $description;
		$server->tags = [$tag];
		$server->plan = $api->product->server->getBySpec(1, 1);
		$server->save();
		
		//
		fprintf(\STDERR, 'インタフェースを増設しています...'."\n");
		$iface = $server->addIface();
		
		//
		fprintf(\STDERR, 'インタフェースをルータ＋スイッチに接続しています...'."\n");
		$iface->connectToSwytch($swytch);
		
		#
		fprintf(\STDERR, 'インタフェースにIPアドレスを設定しています...'."\n");
		$iface->userIpAddress = $swytch->ipv4Nets[0]->range->asArray[1];
		$iface->save();
		$this->assertEquals(1, count($swytch->collectUsedIpv4Addresses()));
		$this->assertEquals($maskLenCnt-6, count($swytch->collectUnusedIpv4Addresses())); 
		
		//
		fprintf(\STDERR, 'ルータ＋スイッチの帯域プランを変更しています...'."\n");
		$routerIdBefore = $swytch->router->id;
		$swytch->changePlan($swytch->router->bandWidthMbps==100 ? 500 : 100);
		$this->assertNotEquals($routerIdBefore, $swytch->router->id);
		
		//
		fprintf(\STDERR, 'ルータ＋スイッチにIPv6ネットワークを割り当てています...'."\n");
		$v6net = $swytch->addIpv6Net();
		$this->assertInstanceOf("Saklient\\Cloud\\Resources\\Ipv6Net", $v6net);
		$this->assertEquals(1, count($swytch->ipv6Nets));
		
		//
		fprintf(\STDERR, 'ルータ＋スイッチにスタティックルートを割り当てています...'."\n");
		$net0 = $swytch->ipv4Nets[0];
		$nextHop = long2ip(ip2long($net0->address) + 4);
		$sroute = $swytch->addStaticRoute(28, $nextHop);
		$this->assertInstanceOf("Saklient\\Cloud\\Resources\\Ipv4Net", $sroute);
		$this->assertEquals(2, count($swytch->ipv4Nets));
		
		//
		for ($i=count($swytch->ipv4Nets)-1; 1<=$i; $i--) {
			fprintf(\STDERR, 'ルータ＋スイッチからスタティックルートの割当を解除しています...'."\n");
			$net = $swytch->ipv4Nets[$i];
			$swytch->removeStaticRoute($net);
		}
		
		//
		if (0 < count($swytch->ipv6Nets)) {
			fprintf(\STDERR, 'ルータ＋スイッチからIPv6ネットワークの割当を解除しています...'."\n");
			$swytch->removeIpv6Net();
		}
		
		//
		fprintf(\STDERR, 'サーバを削除しています...'."\n");
		$server->destroy();
		
	}
	
}
