<?php

namespace SakuraInternet\Saclient\Tests;

require_once "Common.php";
use SakuraInternet\Saclient\Cloud\API;
use SakuraInternet\Saclient\Cloud\Resource\Server;
use SakuraInternet\Saclient\Cloud\Resource\IsoImage;

class IsoImageTest extends \PHPUnit_Framework_TestCase
{
	use \SakuraInternet\Saclient\Tests\Common;
	
	public function testAuthorize()
	{
		return $this->authorize();
	}
	
	/**
	 * @depends testAuthorize
	 */
	public function testInsertEject(API $api)
	{
		
		$name = "!phpunit-" . date("Ymd_His") . "-" . uniqid();
		$description = "This instance was created by Saclient PHPUnit Test";
		$tag = "saclient-test";
		
		// search iso images
		echo "searching iso images...\n";
		$isos = $api->isoImage
			->withNameLike('CentOS 6.5 64bit')
			->withSharedScope()
			->limit(1)
			->find();
		$this->assertGreaterThan(0, count($isos));
		$iso = $isos[0];
		
		// create a server
		echo "creating a server...\n";
		$server = $api->server->create();
		$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Resource\\Server", $server);
		$server->name = $name;
		$server->description = $description;
		$server->tags = [$tag];
		$server->plan = $api->product->server->getBySpec(1, 1);
		$server->save();
		
		// insert iso image while the server is down
		echo "inserting an ISO image to the server...\n";
		$server->insertIsoImage($iso);
		$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Resource\\IsoImage", $server->instance->isoImage);
		$this->assertEquals($iso->id, $server->instance->isoImage->id);
		
		// eject iso image while the server is down
		echo "ejecting the ISO image from the server...\n";
		$server->ejectIsoImage();
		$this->assertNull($server->instance->isoImage);
		
		// boot
		echo "booting the server...\n";
		$server->boot();
		sleep(3);
		
		// insert iso image while the server is up
		echo "inserting an ISO image to the server...\n";
		$server->insertIsoImage($iso);
		$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Resource\\IsoImage", $server->instance->isoImage);
		$this->assertEquals($iso->id, $server->instance->isoImage->id);
		
		// eject iso image while the server is up
		echo "ejecting the ISO image from the server...\n";
		$server->ejectIsoImage();
		$this->assertNull($server->instance->isoImage);
		
		// stop
		sleep(1);
		echo "stopping the server...\n";
		if (!$server->stop()->sleepUntilDown()) $this->fail('サーバが正常に停止しません');
		
		// delete the server
		echo "deleting the server...\n";
		$server->destroy();
		
	}
	
}
