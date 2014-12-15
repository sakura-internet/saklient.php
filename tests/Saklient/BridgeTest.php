<?php

namespace Saklient\Tests;

require_once "Common.php";
use Saklient\Cloud\API;
use Saklient\Cloud\Resources\Bridge;

class BridgeTest extends \PHPUnit_Framework_TestCase
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
		$regionName = "石狩";
		
//		fprintf(\STDERR, "searching bridges...\n");
//		$bridges = $api->bridge->find();
//		foreach ($bridges as $bridge) {
//			fprintf(\STDERR, "%s: %s\n", $bridge->name, $bridge->region->id);
//		}
		
		//
		fprintf(\STDERR, 'リージョンを検索しています...'."\n");
		$regions = $api->facility->region->withNameLike($regionName)->find();
		$this->assertGreaterThan(0, count($regions));
		$region = $regions[0];
		$this->assertInstanceOf("Saklient\\Cloud\\Resources\\Region", $region);
		
		fprintf(\STDERR, 'ブリッジを作成しています...'."\n");
		$bridge = $api->bridge->create();
		$bridge->name = $name;
		$bridge->description = $description;
		$bridge->region = $region;
		$bridge->save();
		
		fprintf(\STDERR, 'ブリッジを削除しています...'."\n");
		$bridge->destroy();
		
	}
	
}
