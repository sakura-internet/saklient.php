<?php

namespace SakuraInternet\Saclient\Tests;

require_once "Common.php";
use SakuraInternet\Saclient\Cloud\API;
use SakuraInternet\Saclient\Cloud\Resource\Archive;

class ArchiveTest extends \PHPUnit_Framework_TestCase
{
	use \SakuraInternet\Saclient\Tests\Common;
	
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
		$description = "This instance was created by Saclient PHPUnit Test";
		$tag = "saclient-test";
		
		$archive = $api->archive->create();
		$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Resource\\Archive", $archive);
		$archive->name = $name;
		$archive->description = $description;
		$archive->tags = [$tag];
		$archive->sizeMib = 20480;
		$archive->save();
		
		//
		$ftp = $archive->ftpInfo;
		$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Resource\\FtpInfo", $ftp);
		$this->assertNotEmpty($ftp->hostName);
		$this->assertNotEmpty($ftp->user);
		$this->assertNotEmpty($ftp->password);
		$ftp2 = $archive->openFtp(true)->ftpInfo;
		$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Resource\\FtpInfo", $ftp2);
		$this->assertNotEmpty($ftp2->hostName);
		$this->assertNotEmpty($ftp2->user);
		$this->assertNotEmpty($ftp2->password);
		$this->assertNotEquals($ftp->password, $ftp2->password);
		
		//
		$temp = tempnam(sys_get_temp_dir(), "saclient-");
		$cmd = "dd if=/dev/urandom bs=4096 count=64 > $temp; ls -l $temp";
		echo $cmd, "\n"; echo `( $cmd ) 2>&1`;
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
		echo $cmd, "\n"; echo `( $cmd ) 2>&1`;
		$cmd = "rm -f $temp";
		echo $cmd, "\n"; echo `( $cmd ) 2>&1`;
		
		$archive->closeFtp();
		
		//
		$archive->destroy();
	}
	
}
