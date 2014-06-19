<?php

namespace SakuraInternet\Saclient\Tests;

function aobj() {
	return new \ArrayObject(func_get_args());
}

trait Common
{
	
	public function loadConfig()
	{
		$root = dirname(dirname(dirname(dirname(__FILE__))));
		$testOkFile = $root . "/testok";
		if (!file_exists($testOkFile)) $this->fail("$testOkFile is not found (You must 'touch' this file to confirm that the tests can make your expenses)");
		$configFile = $root . "/config.sh";
		if (!file_exists($configFile)) $this->fail("$configFile is not found (Read README.md)");
		$config = (object)[];
		foreach (file($configFile) as $line) {
			if (!preg_match('/^\\s*export\s+(\w+)\s*=\s*(.+?)\s*$/', $line, $m)) continue;
			$config->{$m[1]} = preg_replace_callback('/\'([^\']*)\'|"([^"]*)"|\\\\(.)|(.)/', function ($n) {
				if (isset($n[1])) return $n[1];
				if (isset($n[2])) return $n[2];
				if (isset($n[3])) return $n[3]; // Escape sequences are not usable
				if (isset($n[4])) return $n[4];
			}, $m[2]);
		}
		if (empty($config->SACLOUD_TOKEN))  $this->fail("SACLOUD_TOKEN must be defined in config.sh");
		if (empty($config->SACLOUD_SECRET)) $this->fail("SACLOUD_SECRET must be defined in config.sh");
		return $config;
	}
	
	public function authorize()
	{
		$config = $this->loadConfig();
		return \SakuraInternet\Saclient\Cloud\API::authorize($config->SACLOUD_TOKEN, $config->SACLOUD_SECRET);
	}
	
	public function assertCountAtLeast($num, $actual, $type)
	{
		$this->assertGreaterThanOrEqual($num, count($actual), "At least $num ${type}(s) is/are needed to test. Create them on the control panel and try again.");
	}
	
}
