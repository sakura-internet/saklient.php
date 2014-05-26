<?php

namespace SakuraInternet\Cloud\Tests;

require_once "Common.php";

class ServerTest extends \PHPUnit_Framework_TestCase
{
	use \SakuraInternet\Cloud\Tests\Common;
	
	public function testList()
	{
		$api = $this->authorize();
		$this->assertNotEmpty($api);
		$servers = $api->server->find();
		$this->assertInstanceOf("ArrayObject", $servers);
		$this->assertCountAtLeast(1, $servers, "server");
		foreach ($servers as $server) {
			$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Resource\\Server", $server);
			$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Resource\\ServerPlan", $server->plan);
			$this->assertGreaterThanOrEqual(1, $server->plan->cpu);
			$this->assertGreaterThanOrEqual(1, $server->plan->memoryMib);
			$this->assertGreaterThanOrEqual(1, $server->plan->memoryGib);
			$this->assertEquals($server->plan->memoryMib / $server->plan->memoryGib, 1024);
			$this->assertInstanceOf("ArrayObject", $server->tags);
			foreach ($server->tags as $tag) {
				$this->assertTrue(is_string($tag));
			}
		}
	}
	
}
