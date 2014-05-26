<?php

namespace SakuraInternet\Cloud\Tests;

require_once "Common.php";

class UtilTest extends \PHPUnit_Framework_TestCase
{
	use \SakuraInternet\Cloud\Tests\Common;
	
	public function testCreateClassInstance()
	{
		$config = $this->loadConfig();
		$client = \SakuraInternet\Saclient\Cloud\Util::createClassInstance("saclient.cloud.Client", [$config->SACLOUD_TOKEN, $config->SACLOUD_SECRET]);
		$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Client", $client);
	}
	
}
