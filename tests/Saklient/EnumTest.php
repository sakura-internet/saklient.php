<?php

namespace Saklient\Tests;

require_once "Common.php";
use Saklient\Cloud\Enums\EServerInstanceStatus;

class EnumTest extends \PHPUnit_Framework_TestCase
{
	use \Saklient\Tests\Common;
	
	public function testDefinition()
	{
		$this->assertEquals(EServerInstanceStatus::up, "up");
		$this->assertEquals(EServerInstanceStatus::down, "down");
	}
	
	public function testComparison()
	{
		$this->assertEquals(EServerInstanceStatus::compare("up", "up"), 0);
		$this->assertEquals(EServerInstanceStatus::compare("up", "down"), 1);
		$this->assertEquals(EServerInstanceStatus::compare("down", "up"), -1);
		$this->assertNull(EServerInstanceStatus::compare("UNDEFINED-SYMBOL", "up"));
		$this->assertNull(EServerInstanceStatus::compare("up", "UNDEFINED-SYMBOL"));
		$this->assertNull(EServerInstanceStatus::compare(null, "up"));
		$this->assertNull(EServerInstanceStatus::compare("up", null));
		$this->assertNull(EServerInstanceStatus::compare(null, null));
	}
	
}
