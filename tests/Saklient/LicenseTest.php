<?php

namespace Saklient\Tests;

require_once "Common.php";
use Saklient\Cloud\API;
use Saklient\Cloud\Resources\License;

class LicenseTest extends \PHPUnit_Framework_TestCase
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
		
		fprintf(\STDERR, "searching licenses...\n");
		$licenses = $api->license->find();
		foreach ($licenses as $license) {
			fprintf(\STDERR, "%s: %s\n", $license->name, $license->info->name);
		}
		
		//
		fprintf(\STDERR, 'ライセンス種別情報を検索しています...'."\n");
		$infos = $api->product->license->withNameLike("Office")->find();
		$this->assertGreaterThan(0, count($infos));
		$info = $infos[0];
		$this->assertInstanceOf("Saklient\\Cloud\\Resources\\LicenseInfo", $info);
		
		fprintf(\STDERR, 'ライセンスを作成しています...'."\n");
		$license = $api->license->create();
		$license->name = $name;
		$license->info = $info;
		$license->save();
		
		fprintf(\STDERR, 'ライセンスを削除しています...'."\n");
		$license->destroy();
		
	}
	
}
