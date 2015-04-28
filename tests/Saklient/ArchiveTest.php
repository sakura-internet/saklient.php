<?php

namespace Saklient\Tests;

require_once "Common.php";
use Saklient\Cloud\API;
use Saklient\Cloud\Resources\Archive;

class ArchiveTest extends \PHPUnit_Framework_TestCase
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
		
		$archive = $api->archive->create();
		$this->assertInstanceOf("Saklient\\Cloud\\Resources\\Archive", $archive);
		$archive->name = $name;
		$archive->description = $description;
		$archive->tags = [$tag];
		$archive->sizeMib = 20480;
		$archive->save();
		
		//
		$ftp = $archive->ftpInfo;
		$this->assertInstanceOf("Saklient\\Cloud\\Resources\\FtpInfo", $ftp);
		$this->assertNotEmpty($ftp->hostName);
		$this->assertNotEmpty($ftp->user);
		$this->assertNotEmpty($ftp->password);
		$ftp2 = $archive->openFtp(true)->ftpInfo;
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
		
		$archive->closeFtp();
		
		//
		$archive->destroy();
	}
	
	/**
	 * @depends testAuthorize
	 */
	public function testCopy(API $api)
	{
		$name = "!phpunit-" . date("Ymd_His") . "-" . uniqid();
		$description = "This instance was created by Saklient PHPUnit Test";
		$tag = "saklient-test";
		
		$disk = $api->disk->create();
		$disk->name = $name;
		$disk->description = $description;
		$disk->tags = [$tag];
		$disk->sizeGib = 20;
		$disk->plan = $api->product->disk->ssd;
		$disk->save();
		
		$archive = $api->archive->create();
		$archive->name = $name;
		$archive->description = $description;
		$archive->tags = [$tag];
		$archive->source = $disk;
		$archive->save();
		
		if (!$archive->sleepWhileCopying()) {
			$this->fail('ディスクからアーカイブへのコピーがタイムアウトまたは失敗しました');
		}
		
		$disk->destroy();
		
		$ftp = $archive->openFtp()->ftpInfo;
		$this->assertInstanceOf("Saklient\\Cloud\\Resources\\FtpInfo", $ftp);
		$this->assertNotEmpty($ftp->hostName);
		$this->assertNotEmpty($ftp->user);
		$this->assertNotEmpty($ftp->password);
		
		$archive->closeFtp();
		$archive->destroy();
		
	}
	
}
