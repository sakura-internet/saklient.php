<?php

namespace Saclient\Cloud;


class Util {
	
	/**
	 * @access public
	 * @param \ArrayObject $arguments
	 * @param string $classPath
	 * @return mixed
	 */
	static public function createClassInstance($classPath, $arguments) {
		$ret = null;
		$classPath = str_replace('.', '\\', $classPath);
		$ref = new \ReflectionClass($classPath);
		$ret = $ref->newInstanceArgs(Client::arrayObject2array($arguments));
		if ($ret == null) {
			throw new \Exception("Could not create class instance of " . $classPath);
		};
		return $ret;
	}
	
	/**
	 * @access public
	 * @param string $s
	 * @return NativeDate
	 */
	static public function str2date($s) {
		if ($s == null) {
			return null;
		};
		return new \DateTime($s);
	}
	
	/**
	 * @access public
	 * @param NativeDate $d
	 * @return string
	 */
	static public function date2str($d) {
		if ($d == null) {
			return null;
		};
		return $d->format("c");
	}
	
	/**
	 * @access public
	 * @param string $s
	 * @return string
	 */
	static public function urlEncode($s) {
		return rawurlencode($s);
	}
	
	/**
	 * @access public
	 * @param U $clazz
	 * @param T[] $a
	 * @return U[]
	 */
	static public function castArray($a, $clazz) {
		return $a;
	}
	
	

}

