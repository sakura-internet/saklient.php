<?php
 
namespace SakuraInternet\Saclient\Cloud\Enums;
 
class EnumBase {
	
	static $map;
	
	public static function strToNum($str) {
		$clazz = get_called_class();
		if (!isset(self::$map)) self::$map = array();
		if (!isset(self::$map[$clazz])) self::$map[$clazz] = static::_map();
		return @self::$map[$clazz][$str];
	}
 
	public static function compare($lhs, $rhs) {
		$l = static::strToNum($lhs);
		$r = static::strToNum($rhs);
		if (is_null($l) || is_null($r)) return null;
		$ret = $l - $r;
		return (0 < $ret) - ($ret < 0);
	}
 
}

