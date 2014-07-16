<?php

namespace SakuraInternet\Saclient\Tests;

require_once "Common.php";
use SakuraInternet\Saclient\Cloud\API;

class DiskTest extends \PHPUnit_Framework_TestCase
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
		$archives = $api->archive
			->withNameLike('CentOS 6.5 64bit')
			->withSizeGib(20)
			->withSharedScope()
			->limit(1)
			->find();
		$archive = $archives[0];
		
		$disk = $api->disk->create();
		$disk->name = "!saclient.php-" . date("Ymd_His") . "-" . uniqid();
		$disk->description = "This instance was created by saclient.php example";
		$disk->tags = ["saclient-test"];
		$disk->copyFrom($archive);
		$disk->save();
		//print_r($disk->apiSerialize(true));
		
		if (!$disk->sleepWhileCopying()) $this->fail("アーカイブからディスクへのコピーがタイムアウトしました");
		//print_r($disk->apiSerialize(true));
		
		$disk->destroy();
	}
	
}
