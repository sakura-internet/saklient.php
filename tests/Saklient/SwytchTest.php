<?php

namespace Saklient\Tests;

require_once "Common.php";
use Saklient\Cloud\API;
use Saklient\Cloud\Resources\Swytch;

class SwytchTest extends \PHPUnit_Framework_TestCase
{
	use \Saklient\Tests\Common;
	
	const USE_STATIC_RESOURCE = false;
	
	public function testCrud()
	{
		$name = "!phpunit-" . date("Ymd_His") . "-" . uniqid();
		$description = "This instance was created by Saklient PHPUnit Test";
		//
		$api = $this->authorize();
		
		//
		fprintf(\STDERR, 'スイッチを作成しています...'."\n");
		$swytch = $api->swytch->create();
		$this->assertInstanceOf("Saklient\\Cloud\\Resources\\Swytch", $swytch);
		$swytch->name = $name;
		$swytch->description = $description;
		$swytch->save();
		$this->assertGreaterThan(0, $swytch->id);
		
		//
		fprintf(\STDERR, 'サーバを作成しています...'."\n");
		$server = $api->server->create();
		$this->assertInstanceOf("Saklient\\Cloud\\Resources\\Server", $server);
		$server->name = $name;
		$server->description = $description;
		$server->plan = $api->product->server->getBySpec(1, 1);
		$server->save();
		$this->assertGreaterThan(0, $server->id);
		
		//
		fprintf(\STDERR, 'インタフェースを増設しています...'."\n");
		$iface = $server->addIface();
		$this->assertInstanceOf("Saklient\\Cloud\\Resources\\Iface", $iface);
		$this->assertGreaterThan(0, $iface->id);
		$this->assertEquals($server->id, $iface->serverId);
		$server->reload();
		$this->assertEquals($iface->id, $server->ifaces[0]->id);
		$this->assertEquals($server->id, $server->ifaces[0]->serverId);
		$iface->reload();
		$this->assertNull($iface->swytchId);
		
		//
		fprintf(\STDERR, 'インタフェースをスイッチに接続しています...'."\n");
		$iface->connectToSwytch($swytch);
		$this->assertEquals($swytch->id, $iface->swytchId);
		$this->assertEquals($swytch->id, $api->swytch->getById($iface->swytchId)->id);
		
		//
		fprintf(\STDERR, 'インタフェースをスイッチから切断しています...'."\n");
		$iface->disconnectFromSwytch();
		
		//
		fprintf(\STDERR, 'インタフェースをスイッチに接続しています...'."\n");
		$iface->connectToSwytchById($swytch->id);
		$this->assertEquals($swytch->id, $iface->swytchId);
		
		//
		fprintf(\STDERR, 'インタフェースをスイッチから切断しています...'."\n");
		$iface->disconnectFromSwytch();
		
		//
		fprintf(\STDERR, 'サーバを削除しています...'."\n");
		$server->destroy();
		
		//
		fprintf(\STDERR, 'スイッチを削除しています...'."\n");
		$swytch->destroy();
		
	}
	
}
