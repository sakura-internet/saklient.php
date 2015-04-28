<?php

namespace Saklient\Tests;

require_once "Common.php";
use Saklient\Cloud\API;
use Saklient\Cloud\Enums\EServerInstanceStatus;
use Saklient\Cloud\Resources\LbServer;
use Saklient\Errors\SaklientException;
use Saklient\Errors\HttpConflictException;
use Saklient\Cloud\Resources\LoadBalancer;

class LoadBalancerTest extends \PHPUnit_Framework_TestCase
{
	use \Saklient\Tests\Common;
	
	const TESTS_CONFIG_READYMADE_LB_ID = null;
	
	public function testAuthorize()
	{
		return $this->authorize();
	}

	/**
	 * @depends testAuthorize
	 */
	public function testCrud(API $api)
	{
		
		$name = "!phpunit-" . date("Ymd_His") . "-" . substr(uniqid(),0,6);
		$description = "This instance was created by Saklient PHPUnit Test";
		$tag = "saklient-test";
		
		
		
		// create a LB
		
		if (!self::TESTS_CONFIG_READYMADE_LB_ID) {
			
			//
			fprintf(\STDERR, '作成済みのスイッチを検索しています...'."\n");
			$swytches = $api->swytch->withNameLike('saklient-lb-attached')->limit(1)->find();
			if (0 < count($swytches)) {
				$swytch = $swytches[0];
			}
			else {
				fprintf(\STDERR, 'ルータ＋スイッチを作成しています...'."\n");
				$router = $api->router->create();
				$router->name = 'saklient-lb-attached';
				$router->bandWidthMbps = 100;
				$router->networkMaskLen = 28;
				$router->save();
				
				fprintf(\STDERR, 'ルータ＋スイッチの作成完了を待機しています...'."\n");
				if (!$router->sleepWhileCreating()) $this->fail('ルータが正常に作成されません');
				$swytch = $router->getSwytch();
			}
			$this->assertInstanceOf("Saklient\\Cloud\\Resources\\Swytch", $swytch);
			$this->assertGreaterThan(0, count($swytch->ipv4Nets));
			$net = $swytch->ipv4Nets[0];
			fprintf(\STDERR, "%s/%d -> %s\n", $net->address, $net->maskLen, $net->defaultRoute);
			
			// create a loadbalancer
			fprintf(\STDERR, 'ロードバランサを作成しています...'."\n");
			$vrid = 123;
			$realIp1 = long2ip(ip2long($net->defaultRoute) + 3);
			$realIp2 = long2ip(ip2long($net->defaultRoute) + 4);
			$lb = $api->appliance->createLoadBalancer($swytch, $vrid, [$realIp1, $realIp2], true);
			
			$ok = false;
			try {
				$lb->save();
			}
			catch (SaklientException $ex) {
				$ok = true;
			}
			if (!$ok) $this->fail('Requiredフィールドが未set時は SaklientException がスローされなければなりません');
			$lb->name = $name;
			$lb->description = "";
			$lb->tags = [$tag];
			$lb->save();
			
			$lb->reload();
			$this->assertEquals($net->defaultRoute, $lb->defaultRoute);
			$this->assertEquals($net->maskLen, $lb->maskLen);
			$this->assertEquals($vrid, $lb->vrid);
			$this->assertEquals($swytch->id, $lb->swytchId);
			
			// wait the LB becomes up
			fprintf(\STDERR, 'ロードバランサの起動を待機しています...'."\n");
			if (!$lb->sleepUntilUp()) $this->fail("ロードバランサが正常に起動しません");
			
		}
		else {
			
			$lb = $api->appliance->getById(self::TESTS_CONFIG_READYMADE_LB_ID);
			$this->assertInstanceOf("Saklient\\Cloud\\Resources\\LoadBalancer", $lb);
			$swytch = $lb->getSwytch();
			$this->assertInstanceOf("Saklient\\Cloud\\Resources\\Swytch", $swytch);
			$net = $swytch->ipv4Nets[0];
			$this->assertInstanceOf("Saklient\\Cloud\\Resources\\Ipv4Net", $net);
			fprintf(\STDERR, "%s/%d -> %s\n", $net->address, $net->maskLen, $net->defaultRoute);
			
		}
		
		
		
		// clear virtual ips
		
		$lb->clearVirtualIps();
		$lb->save();
		$lb->reload();
		$this->assertEquals($lb->virtualIps->count(), 0);
		
		
		
		// setting virtual ips test 1
		
		$vip1Ip     = long2ip(ip2long($net->defaultRoute) + 5);
		$vip1SrvIp1 = long2ip(ip2long($net->defaultRoute) + 6);
		$vip1SrvIp2 = long2ip(ip2long($net->defaultRoute) + 7);
		$vip1SrvIp3 = long2ip(ip2long($net->defaultRoute) + 8);
		$vip1SrvIp4 = long2ip(ip2long($net->defaultRoute) + 9);
		
		$lb->addVirtualIp([
			"vip" => $vip1Ip,
			"port" => 80,
			"delay" => 15,
			"servers" => [
				[ "ip"=>$vip1SrvIp1, "port"=>80, "protocol"=>"http", "pathToCheck"=>"/index.html", "responseExpected"=>200 ],
				[ "ip"=>$vip1SrvIp2, "port"=>80, "protocol"=>"https", "pathToCheck"=>"/", "responseExpected"=>200 ],
				[ "ip"=>$vip1SrvIp3, "port"=>80, "protocol"=>"tcp" ]
			]
		]);
		
		$vip2Ip     = long2ip(ip2long($net->defaultRoute) + 10);
		$vip2SrvIp1 = long2ip(ip2long($net->defaultRoute) + 11);
		$vip2SrvIp2 = long2ip(ip2long($net->defaultRoute) + 12);
		
		$vip2 = $lb->addVirtualIp();
		$vip2->virtualIpAddress = $vip2Ip;
		$vip2->port = 80;
		$vip2->delayLoop = 15;
		$vip2Srv1 = $vip2->addServer();
		$vip2Srv1->ipAddress = $vip2SrvIp1;
		$vip2Srv1->port = 80;
		$vip2Srv1->protocol = "http";
		$vip2Srv1->pathToCheck = "/index.html";
		$vip2Srv1->responseExpected = 200;
		$vip2SrvD = $vip2->addServer();
		$vip2SrvD->ipAddress = "10.0.0.1";
		$vip2SrvD->port = 80;
		$vip2SrvD->protocol = "tcp";
		$vip2Srv2 = $vip2->addServer();
		$vip2Srv2->ipAddress = $vip2SrvIp2;
		$vip2Srv2->port = 80;
		$vip2Srv2->protocol = "tcp";
		$vip2->removeServerByAddress("10.0.0.1");
		$lb->save();
		$lb->reload();
		
		$this->assertEquals(2,             $lb->virtualIps->count());
		$this->assertEquals($vip1Ip,       $lb->virtualIps[0]->virtualIpAddress);
		$this->assertEquals(3,             $lb->virtualIps[0]->servers->count());
		$this->assertEquals($vip1SrvIp1,   $lb->virtualIps[0]->servers[0]->ipAddress);
		$this->assertEquals(80,            $lb->virtualIps[0]->servers[0]->port);
		$this->assertEquals("http",        $lb->virtualIps[0]->servers[0]->protocol);
		$this->assertEquals("/index.html", $lb->virtualIps[0]->servers[0]->pathToCheck);
		$this->assertEquals(200,           $lb->virtualIps[0]->servers[0]->responseExpected);
		$this->assertEquals($vip1SrvIp2,   $lb->virtualIps[0]->servers[1]->ipAddress);
		$this->assertEquals(80,            $lb->virtualIps[0]->servers[1]->port);
		$this->assertEquals("https",       $lb->virtualIps[0]->servers[1]->protocol);
		$this->assertEquals("/",           $lb->virtualIps[0]->servers[1]->pathToCheck);
		$this->assertEquals(200,           $lb->virtualIps[0]->servers[1]->responseExpected);
		$this->assertEquals($vip1SrvIp3,   $lb->virtualIps[0]->servers[2]->ipAddress);
		$this->assertEquals(80,            $lb->virtualIps[0]->servers[2]->port);
		$this->assertEquals("tcp",         $lb->virtualIps[0]->servers[2]->protocol);
		$this->assertEquals($vip2Ip,       $lb->virtualIps[1]->virtualIpAddress);
		$this->assertEquals(2,             $lb->virtualIps[1]->servers->count());
		$this->assertEquals($vip2SrvIp1,   $lb->virtualIps[1]->servers[0]->ipAddress);
		$this->assertEquals(80,            $lb->virtualIps[1]->servers[0]->port);
		$this->assertEquals("http",        $lb->virtualIps[1]->servers[0]->protocol);
		$this->assertEquals("/index.html", $lb->virtualIps[1]->servers[0]->pathToCheck);
		$this->assertEquals(200,           $lb->virtualIps[1]->servers[0]->responseExpected);
		$this->assertEquals($vip2SrvIp2,   $lb->virtualIps[1]->servers[1]->ipAddress);
		$this->assertEquals(80,            $lb->virtualIps[1]->servers[1]->port);
		$this->assertEquals("tcp",         $lb->virtualIps[1]->servers[1]->protocol);
		
		
		
		// setting virtual ips test 2
		
		$lb->getVirtualIpByAddress($vip1Ip)->addServer([
			"ip" => $vip1SrvIp4,
			"port" => 80,
			"protocol" => "ping"
		]);
		$lb->save();
		$lb->reload();
		
		$this->assertEquals(2,           $lb->virtualIps->count());
		$this->assertEquals(4,           $lb->virtualIps[0]->servers->count());
		$this->assertEquals($vip1SrvIp4, $lb->virtualIps[0]->servers[3]->ipAddress);
		$this->assertEquals(80,          $lb->virtualIps[0]->servers[3]->port);
		$this->assertEquals("ping",      $lb->virtualIps[0]->servers[3]->protocol);
		$this->assertEquals(2,           $lb->virtualIps[1]->servers->count());
		
		
		
		// checking status
		
		$lb->reloadStatus();
		foreach ($lb->virtualIps as $vip) {
			printf("  vip %s:%s every %ssec(s)\n", $vip->virtualIpAddress, $vip->port, $vip->delayLoop);
			foreach ($vip->servers as $server) {
				printf("    [%s(%s)]", $server->status, $server->activeConnections);
				printf(" server %s://%s", $server->protocol, $server->ipAddress);
				if ($server->port) printf(":%d", $server->port);
				if ($server->pathToCheck) fprintf(\STDERR, $server->pathToCheck);
				fprintf(\STDERR, " answers");
				if ($server->responseExpected) printf(" %d", $server->responseExpected);
				fprintf(\STDERR, "\n");
				$this->assertTrue($server->status==null || $server->status=="down");
			}
		}
		
		
		
		// delete the LB
		
		if (!self::TESTS_CONFIG_READYMADE_LB_ID) {
			// stop the LB
			sleep(1);
			fprintf(\STDERR, "stopping the LB...\n");
			if (!$lb->stop()->sleepUntilDown()) $this->fail('ロードバランサが正常に停止しません');
			
			// delete the LB
			fprintf(\STDERR, "deleting the LB...\n");
			$lb->destroy();
		}
		
	}
	
}
