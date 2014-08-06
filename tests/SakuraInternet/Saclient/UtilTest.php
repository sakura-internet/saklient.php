<?php

namespace SakuraInternet\Saclient\Tests;

require_once "Common.php";
use \SakuraInternet\Saclient\Util;
use \SakuraInternet\Saclient\Cloud\API;
use \SakuraInternet\Saclient\Errors\SaclientException;

class UtilTest extends \PHPUnit_Framework_TestCase
{
	use \SakuraInternet\Saclient\Tests\Common;
	
	public function testCreateClassInstance()
	{
		$config = $this->loadConfig();
		$client = Util::createClassInstance("saclient.cloud.Client", aobj($config->SACLOUD_TOKEN, $config->SACLOUD_SECRET));
		$this->assertInstanceOf("SakuraInternet\\Saclient\\Cloud\\Client", $client);
	}
	
	public function testObjectAccessByPath()
	{
		$test = (object)[];
		Util::setByPath($test, "top", 123);
		$this->assertEquals(123, $test->top);
		Util::setByPath($test, "first.second", 456);
		$this->assertEquals(456, $test->first->second);
		Util::setByPath($test, ".weird..path", 789);
		$this->assertEquals(789, $test->weird->path);
		Util::setByPath($test, "existing.null", null);
		$this->assertNotEmpty(Util::getByPath($test, "existing"));
		$this->assertNull(Util::getByPath($test, "existing.null"));
		//
		$this->assertEquals(123, Util::getByPath($test, "top"));
		$this->assertEquals(456, Util::getByPath($test, "first.second"));
		$this->assertEquals(789, Util::getByPath($test, ".weird..path"));
		//
		$this->assertNull(Util::getByPath($test, "nothing"));
		$this->assertNull(Util::getByPath($test, "nothing.child"));
		$this->assertNull(Util::getByPath($test, "top.child"));
		//
		$this->assertTrue(Util::existsPath($test, "top"));
		$this->assertFalse(Util::existsPath($test, "top.child"));
		$this->assertTrue(Util::existsPath($test, "first.second"));
		$this->assertTrue(Util::existsPath($test, ".weird..path"));
		$this->assertFalse(Util::existsPath($test, "nothing"));
		$this->assertFalse(Util::existsPath($test, "nothing.child"));
		$this->assertTrue(Util::existsPath($test, "existing"));
		$this->assertTrue(Util::existsPath($test, "existing.null"));
		//
		$test->first->second *= 10;
		$this->assertEquals(4560, Util::getByPath($test, "first.second"));
		
		//
		Util::validateType(1, 'int');
		Util::validateType(1, 'float');
		Util::validateType(1, 'string');
		Util::validateType(1.1, 'float');
		Util::validateType(1.1, 'string');
		$ex = new SaclientException('a', 'a');
		Util::validateType($ex, '\\SakuraInternet\\Saclient\\Errors\\SaclientException');
		Util::validateType($ex, '\\Exception');
		
		//
		$ok = false;
		try {
			API::authorize('abc', []);
		}
		catch (SaclientException $ex) {
			$ok = true;
		}
		if (!$ok) $this->fail('引数の型が異なる時は SaclientException がスローされなければなりません');
		
		//
		$ok = false;
		try {
			$server = API::authorize('a', 'a')->server->create();
			$server->name = ['abc'];
		}
		catch (SaclientException $ex) {
			$ok = true;
		}
		if (!$ok) $this->fail('引数の型が異なる時は SaclientException がスローされなければなりません');
		
		//
		$ok = false;
		try {
			$server = API::authorize('a', 'a')->server->create();
			$server->availability = 'available';
			echo $server->availability;
		}
		catch (SaclientException $ex) {
			$ok = true;
		}
		if (!$ok) $this->fail('未定義または読み取り専用フィールドへのset時は SaclientException がスローされなければなりません');
		
	}
	
}
