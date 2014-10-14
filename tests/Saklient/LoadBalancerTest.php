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
	
	const TESTS_CONFIG_READYMADE_LB_ID = 112600809060;
	
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
			
			// search a switch
			fprintf(\STDERR, "searching a swytch...\n");
			$swytches = $api->swytch->withTag("lb-attached")->limit(1)->find();
			$this->assertGreaterThan(0, count($swytches));
			$swytch = $swytches[0];
			$this->assertInstanceOf("Saklient\\Cloud\\Resources\\Swytch", $swytch);
			$this->assertGreaterThan(0, count($swytch->ipv4Nets));
			$net = $swytch->ipv4Nets[0];
			fprintf(\STDERR, "%s/%d -> %s\n", $net->address, $net->maskLen, $net->defaultRoute);
			
			// create a loadbalancer
			fprintf(\STDERR, "creating a LB...\n");
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
			fprintf(\STDERR, "waiting the LB becomes up...\n");
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
		$vip2Srv2 = $vip2->addServer();
		$vip2Srv2->ipAddress = $vip2SrvIp2;
		$vip2Srv2->port = 80;
		$vip2Srv2->protocol = "tcp";
		$lb->save();
		$lb->reload();
		
		$this->assertEquals($lb->virtualIps->count(), 2);
		$this->assertEquals($lb->virtualIps[0]->virtualIpAddress, $vip1Ip);
		$this->assertEquals($lb->virtualIps[0]->servers->count(), 3);
		$this->assertEquals($lb->virtualIps[0]->servers[0]->ipAddress, $vip1SrvIp1);
		$this->assertEquals($lb->virtualIps[0]->servers[0]->port, 80);
		$this->assertEquals($lb->virtualIps[0]->servers[0]->protocol, "http");
		$this->assertEquals($lb->virtualIps[0]->servers[0]->pathToCheck, "/index.html");
		$this->assertEquals($lb->virtualIps[0]->servers[0]->responseExpected, 200);
		$this->assertEquals($lb->virtualIps[0]->servers[1]->ipAddress, $vip1SrvIp2);
		$this->assertEquals($lb->virtualIps[0]->servers[1]->port, 80);
		$this->assertEquals($lb->virtualIps[0]->servers[1]->protocol, "https");
		$this->assertEquals($lb->virtualIps[0]->servers[1]->pathToCheck, "/");
		$this->assertEquals($lb->virtualIps[0]->servers[1]->responseExpected, 200);
		$this->assertEquals($lb->virtualIps[0]->servers[2]->ipAddress, $vip1SrvIp3);
		$this->assertEquals($lb->virtualIps[0]->servers[2]->port, 80);
		$this->assertEquals($lb->virtualIps[0]->servers[2]->protocol, "tcp");
		$this->assertEquals($lb->virtualIps[1]->virtualIpAddress, $vip2Ip);
		$this->assertEquals($lb->virtualIps[1]->servers->count(), 2);
		$this->assertEquals($lb->virtualIps[1]->servers[0]->ipAddress, $vip2SrvIp1);
		$this->assertEquals($lb->virtualIps[1]->servers[0]->port, 80);
		$this->assertEquals($lb->virtualIps[1]->servers[0]->protocol, "http");
		$this->assertEquals($lb->virtualIps[1]->servers[0]->pathToCheck, "/index.html");
		$this->assertEquals($lb->virtualIps[1]->servers[0]->responseExpected, 200);
		$this->assertEquals($lb->virtualIps[1]->servers[1]->ipAddress, $vip2SrvIp2);
		$this->assertEquals($lb->virtualIps[1]->servers[1]->port, 80);
		$this->assertEquals($lb->virtualIps[1]->servers[1]->protocol, "tcp");
		
		
		
		// setting virtual ips test 2
		
		$lb->getVirtualIpByAddress($vip1Ip)->addServer([
			"ip" => $vip1SrvIp4,
			"port" => 80,
			"protocol" => "ping"
		]);
		$lb->save();
		$lb->reload();
		
		$this->assertEquals($lb->virtualIps->count(), 2);
		$this->assertEquals($lb->virtualIps[0]->servers->count(), 4);
		$this->assertEquals($lb->virtualIps[0]->servers[3]->ipAddress, $vip1SrvIp4);
		$this->assertEquals($lb->virtualIps[0]->servers[3]->port, 80);
		$this->assertEquals($lb->virtualIps[0]->servers[3]->protocol, "ping");
		$this->assertEquals($lb->virtualIps[1]->servers->count(), 2);
		
		
		
		// checking status
		
		$lb->reloadStatus();
		foreach ($lb->virtualIps as $vip) {
			printf("  vip %s:%s every %ssec(s)\n", $vip->virtualIpAddress, $vip->port, $vip->delayLoop);
			foreach ($vip->servers as $server) {
				printf("    [%s(%s)]", $server->status, $server->activeConnections);
				printf(" server %s://%s", $server->protocol, $server->ipAddress);
				if ($server->port) printf(":%d", $server->port);
				if ($server->pathToCheck) echo $server->pathToCheck;
				echo " answers";
				if ($server->responseExpected) printf(" %d", $server->responseExpected);
				echo "\n";
				$this->assertEquals($server->status, "down");
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
