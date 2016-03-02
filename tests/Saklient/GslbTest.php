<?php

namespace Saklient\Tests;

require_once "Common.php";
use Saklient\Cloud\API;
use Saklient\Errors\HttpNotFoundException;

class GslbTest extends \PHPUnit_Framework_TestCase
{
	use \Saklient\Tests\Common;
	
	public function testCrud()
	{
		
		$name = "!phpunit-" . date("Ymd_His") . "-" . substr(uniqid(),0,6);
		//
		$api = $this->authorize();
		
		//
		fprintf(\STDERR, 'GSLBを作成しています...'."\n");
		$gslb = $api->commonServiceItem->createGslb("http", 10, true);
		$this->assertInstanceOf("Saklient\\Cloud\\Resources\\Gslb", $gslb);
		$gslb->pathToCheck = '/index.html';
		$gslb->responseExpected = 200;
		$gslb->name = $name;
		$gslb->description = 'This is a test';
		$gslb->save();
		$id = intval($gslb->id);
		$this->assertGreaterThan(0, $id);
		$this->assertEquals($name, $gslb->name);
		$this->assertEquals(0, count($gslb->servers));
		
		$gslb = $api->commonServiceItem->getById($id);
		$this->assertEquals($id, intval($gslb->id));
		$this->assertEquals('/index.html', $gslb->pathToCheck);
		$this->assertEquals(200, $gslb->responseExpected);
		$this->assertEquals($name, $gslb->name);
		$this->assertEquals(0, count($gslb->servers));
		
		$server = $gslb->addServer();
		$server->enabled = true;
		$server->weight = 10;
		$server->ipAddress = "49.212.82.90";
		$gslb->save();
		$this->assertEquals(1, count($gslb->servers));
		
		$gslb = $api->commonServiceItem->getById($id);
		$this->assertEquals(1, count($gslb->servers));
		
		fprintf(\STDERR, 'GSLBを削除しています...'."\n");
		$gslb->destroy();
		
		$ok = false;
		try {
			$gslb = $api->commonServiceItem->getById($id);
		}
		catch (HttpNotFoundException $ex) {
			$ok = true;
		}
		if (!$ok) $this->fail('GSLBが正しく削除されていません');
		
	}
	
}
