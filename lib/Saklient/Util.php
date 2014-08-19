<?php

namespace Saklient;

require_once dirname(__FILE__) . "/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;
require_once dirname(__FILE__) . "/Cloud/Client.php";
use \Saklient\Cloud\Client;

class Util {
	
	/**
	 * @access public
	 * @param mixed $obj
	 * @param string $path
	 * @return mixed
	 */
	static public function existsPath($obj, $path)
	{
		$aPath = explode(".", $path);
		foreach ($aPath as $seg) {
			if ($obj == null) {
				return false;
			}
			if (!is_object($obj)) {
				return false;
			}
			if ($seg == "") {
				continue;
			}
			if (!array_key_exists($seg, $obj)) {
				return false;
			}
			$obj = $obj->{$seg};
		}
		return true;
	}
	
	/**
	 * @access public
	 * @param mixed $obj
	 * @param string $path
	 * @return mixed
	 */
	static public function getByPath($obj, $path)
	{
		$aPath = explode(".", $path);
		foreach ($aPath as $seg) {
			if ($obj == null) {
				return null;
			}
			if (!is_object($obj)) {
				return null;
			}
			if ($seg == "") {
				continue;
			}
			if (!array_key_exists($seg, $obj)) {
				return null;
			}
			$obj = $obj->{$seg};
		}
		return $obj;
	}
	
	/**
	 * @todo array support
	 * @todo overwriting
	 * @todo writing into children of non-object
	 * @access public
	 * @param mixed $obj
	 * @param mixed $value
	 * @param string $path
	 * @return void
	 */
	static public function setByPath($obj, $path, $value)
	{
		$aPath = explode(".", $path);
		$key = array_pop($aPath);
		foreach ($aPath as $seg) {
			if ($seg == "") {
				continue;
			}
			if (!array_key_exists($seg, $obj)) {
				$obj->{$seg} = (object)[];
			}
			$obj = $obj->{$seg};
		}
		$obj->{$key} = $value;
	}
	
	/**
	 * @access public
	 * @param string $classPath
	 * @param \ArrayObject $args
	 * @return mixed
	 */
	static public function createClassInstance($classPath, $args)
	{
		$ret = null;
		$classPath = implode('\\', array_map(function($x){return strtoupper(substr($x,0,1)).substr($x,1);}, explode('.', $classPath)));
		$ref = new \ReflectionClass($classPath);
		$ret = $ref->newInstanceArgs(Client::arrayObject2array($args));
		if ($ret == null) {
			throw new \Exception("Could not create class instance of " . $classPath);
		}
		return $ret;
	}
	
	/**
	 * @access public
	 * @param string $s
	 * @return NativeDate
	 */
	static public function str2date($s)
	{
		if ($s == null) {
			return null;
		}
		return new \DateTime($s);
	}
	
	/**
	 * @access public
	 * @param NativeDate $d
	 * @return string
	 */
	static public function date2str(NativeDate $d)
	{
		if ($d == null) {
			return null;
		}
		return $d->format("c");
	}
	
	/**
	 * @access public
	 * @param string $s
	 * @return string
	 */
	static public function urlEncode($s)
	{
		return rawurlencode($s);
	}
	
	/**
	 * @access public
	 * @param int $sec
	 * @return void
	 */
	static public function sleep($sec)
	{
		\sleep($sec);
	}
	
	/**
	 * @access public
	 * @param int $actual
	 * @param int $expected
	 * @return void
	 */
	static public function validateArgCount($actual, $expected) {
		if ($actual < $expected) throw new SaklientException('argument_count_mismatch', 'Argument count mismatch');
	}
	
	/**
	 * @access public
	 * @param mixed $value
	 * @param string $typeName
	 * @return void
	 */
	static public function validateType($value, $typeName, $force=false)
	{
		$isOk = false;
		if (!$force) {
			if ($typeName=="mixed" || $typeName=="void" || is_null($value)) return;
			switch ($typeName) {
				case 'float':
				case 'double':
				case 'int':
					$isOk = is_numeric($value);
					break;
				case 'string':
					$isOk = is_scalar($value);
					break;
				case 'callback':
					$isOk = is_callable($value);
					break;
				case 'array':
					$isOk = is_array($value);
					break;
				
				//case 'boolean':
				default:
					$isOk = true; // already checked by PHP language
			}
		}
		if (!$isOk) throw new SaklientException('argument_type_mismatch', 'Argument type mismatch (expected '.$typeName.')');
	}
	
	
	
}

