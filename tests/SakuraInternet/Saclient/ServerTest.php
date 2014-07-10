<?php

namespace SakuraInternet\Saclient\Tests;

require_once "Common.php";
use SakuraInternet\Saclient\Cloud\API;
use SakuraInternet\Saclient\Cloud\Enums\EServerInstanceStatus;
use SakuraInternet\Saclient\Cloud\Errors\HttpConflictException;
use SakuraInternet\Saclient\Cloud\Resource\Server;

class ServerTest extends \PHPUnit_Framework_TestCase
{
	use \SakuraInternet\Saclient\Tests\Common;
	
	public function testAuthorize()
	{
		return $this->authorize();
	}

	/**
	 * @depends testAuthorize
	 */
	public function testFind(API $api)
	{
		$servers = $api->server->find();
		$this->assertInstanceOf("ArrayObject", $servers);
		$this->assertCountAtLeast(1, $servers, "server");
		return $servers;
	}

	/**
	 * @depends testFind
	 */
	public function testFields(\ArrayObject $servers)
	{
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

	/**
	 * @depends testAuthorize
	 */
	public function testCreate(API $api)
	{
		$name = "!phpunit-" . date("Ymd_His") . "-" . uniqid();
		$description = "This instance was created by Saclient PHPUnit Test";
		$tag = "saclient-test";
		$cpu = 1;
		$mem = 2;
		//
		$server = $api->server->create();
		$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Resource\\Server", $server);
		$server->name = $name;
		$server->description = $description;
		$server->tags = [$tag];
		$server->plan = $api->product->server->getBySpec($cpu, $mem);
		$server->save();
		//
		$this->assertGreaterThanOrEqual(1, $server->id);
		$this->assertEquals($server->name, $name);
		$this->assertEquals($server->description, $description);
		$this->assertInstanceOf("\\ArrayObject", $server->tags);
		$this->assertEquals(count($server->tags), 1);
		$this->assertEquals($server->tags[0], $tag);
		$this->assertEquals($server->plan->cpu, $cpu);
		$this->assertEquals($server->plan->memoryGib, $mem);
		//
		return $server;
	}

	/**
	 * @depends testCreate
	 */
	public function testBoot(Server $server)
	{
		$server->boot();
		return $server;
	}

	/**
	 * @depends testBoot
	 */
	public function testBootConflict(Server $server)
	{
		try {
			$server->boot();
		}
		catch (HttpConflictException $ex) {
			return $server;
		}
		$this->fail('サーバ起動中の起動試行時は HttpConflictException がスローされなければなりません');
		return $server;
	}

	/**
	 * @depends testBootConflict
	 */
	public function testStop(Server $server)
	{
		$server->stop();
		for ($i=0; $i<5; $i++) {
			sleep(1);
			$server->reload();
			if ($server->instance->status == EServerInstanceStatus::down) return $server;
		}
		$this->fail('サーバが正常に停止しません');
		return $server;
	}

	/**
	 * @depends testStop
	 */
	public function testDestroy(Server $server)
	{
		$server->destroy();
		return $server;
	}
	
}
