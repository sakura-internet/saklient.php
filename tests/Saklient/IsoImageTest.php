<?php

namespace Saklient\Tests;

require_once "Common.php";
use Saklient\Cloud\API;
use Saklient\Cloud\Resources\Server;
use Saklient\Cloud\Resources\IsoImage;

class IsoImageTest extends \PHPUnit_Framework_TestCase
{
	use \Saklient\Tests\Common;
	
	public function testAuthorize()
	{
		return $this->authorize();
	}
	
	/**
	 * @depends testAuthorize
	 */
	public function testCreate(API $api)
	{
		$name = "!phpunit-" . date("Ymd_His") . "-" . uniqid();
		$description = "This instance was created by Saklient PHPUnit Test";
		$tag = "saklient-test";
		
		$iso = $api->isoImage->create();
		$this->assertInstanceOf("Saklient\\Cloud\\Resources\\IsoImage", $iso);
		$iso->name = $name;
		$iso->description = $description;
		$iso->tags = [$tag];
		$iso->sizeMib = 5120;
		$iso->save();
		
		//
		$ftp = $iso->ftpInfo;
		$this->assertInstanceOf("Saklient\\Cloud\\Resources\\FtpInfo", $ftp);
		$this->assertNotEmpty($ftp->hostName);
		$this->assertNotEmpty($ftp->user);
		$this->assertNotEmpty($ftp->password);
		$ftp2 = $iso->openFtp(true)->ftpInfo;
		$this->assertInstanceOf("Saklient\\Cloud\\Resources\\FtpInfo", $ftp2);
		$this->assertNotEmpty($ftp2->hostName);
		$this->assertNotEmpty($ftp2->user);
		$this->assertNotEmpty($ftp2->password);
		$this->assertNotEquals($ftp->password, $ftp2->password);
		
		//
		$temp = tempnam(sys_get_temp_dir(), "saklient-");
		$cmd = "dd if=/dev/urandom bs=4096 count=64 > $temp; ls -l $temp";
		fprintf(\STDERR, "%s\n%s", $cmd, `( $cmd ) 2>&1`);
		$cmd  = "set ftp:ssl-allow true;";
		$cmd .= "set ftp:ssl-force true;";
		$cmd .= "set ftp:ssl-protect-data true;";
		$cmd .= "set ftp:ssl-protect-list true;";
		$cmd .= "put $temp;";
		$cmd .= "exit";
		$cmd = sprintf(
			"lftp -u %s,%s -p 21 -e '%s' %s",
			$ftp2->user, $ftp2->password, $cmd, $ftp2->hostName
		);
		fprintf(\STDERR, "%s\n%s", $cmd, `( $cmd ) 2>&1`);
		$cmd = "rm -f $temp";
		fprintf(\STDERR, "%s\n%s", $cmd, `( $cmd ) 2>&1`);
		
		$iso->closeFtp();
		
		//
		$iso->destroy();
	}
	
	/**
	 * @depends testAuthorize
	 */
	public function testInsertEject(API $api)
	{
		
		$name = "!phpunit-" . date("Ymd_His") . "-" . uniqid();
		$description = "This instance was created by Saklient PHPUnit Test";
		$tag = "saklient-test";
		
		// search iso images
		fprintf(\STDERR, "searching iso images...\n");
		$isos = $api->isoImage
			->withNameLike('CentOS 64bit')
			->withSharedScope()
			->limit(1)
			->find();
		$this->assertGreaterThan(0, count($isos));
		$iso = $isos[0];
		
		// create a server
		fprintf(\STDERR, "creating a server...\n");
		$server = $api->server->create();
		$this->assertInstanceOf("Saklient\\Cloud\\Resources\\Server", $server);
		$server->name = $name;
		$server->description = $description;
		$server->tags = [$tag];
		$server->plan = $api->product->server->getBySpec(1, 1);
		$server->save();
		
		// insert iso image while the server is down
		fprintf(\STDERR, "inserting an ISO image to the server...\n");
		$server->insertIsoImage($iso);
		$this->assertInstanceOf("Saklient\\Cloud\\Resources\\IsoImage", $server->instance->isoImage);
		$this->assertEquals($iso->id, $server->instance->isoImage->id);
		
		// eject iso image while the server is down
		fprintf(\STDERR, "ejecting the ISO image from the server...\n");
		$server->ejectIsoImage();
		$this->assertNull($server->instance->isoImage);
		
		// boot
		fprintf(\STDERR, "booting the server...\n");
		$server->boot();
		sleep(3);
		
		// insert iso image while the server is up
		fprintf(\STDERR, "inserting an ISO image to the server...\n");
		$server->insertIsoImage($iso);
		$this->assertInstanceOf("Saklient\\Cloud\\Resources\\IsoImage", $server->instance->isoImage);
		$this->assertEquals($iso->id, $server->instance->isoImage->id);
		
		// eject iso image while the server is up
		fprintf(\STDERR, "ejecting the ISO image from the server...\n");
		$server->ejectIsoImage();
		$this->assertNull($server->instance->isoImage);
		
		// stop
		sleep(1);
		fprintf(\STDERR, "stopping the server...\n");
		if (!$server->stop()->sleepUntilDown()) $this->fail('サーバが正常に停止しません');
		
		// delete the server
		fprintf(\STDERR, "deleting the server...\n");
		$server->destroy();
		
	}
	
}
