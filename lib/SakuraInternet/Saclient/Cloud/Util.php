<?php

namespace SakuraInternet\Saclient\Cloud;


class Util {
	
	/**
	 * @access public
	 * @param \ArrayObject $arguments
	 * @param string $classPath
	 * @return mixed
	 */
	static public function createClassInstance($classPath, \ArrayObject $arguments)
	{
		$ret = null;
		$classPath = implode('\\', array_map(function($x){return strtoupper(substr($x,0,1)).substr($x,1);}, explode('.', $classPath)));
		$ref = new \ReflectionClass('SakuraInternet\\'.$classPath);
		$ret = $ref->newInstanceArgs(Client::arrayObject2array($arguments));
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
	 * @param T[] $a
	 * @return U[]
	 */
	static public function castArray(\ArrayObject $a, $clazz)
	{
		return $a;
	}
	
	

}

