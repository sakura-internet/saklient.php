<?php

namespace SakuraInternet\Saclient\Tests;

require_once "Common.php";
use \SakuraInternet\Saclient\Cloud\Util;

class UtilTest extends \PHPUnit_Framework_TestCase
{
	use \SakuraInternet\Saclient\Tests\Common;
	
	public function testCreateClassInstance()
	{
		$config = $this->loadConfig();
		$client = Util::createClassInstance("saclient.cloud.Client", aobj($config->SACLOUD_TOKEN, $config->SACLOUD_SECRET));
		$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Client", $client);
	}
	
}
