<?php
 
namespace SakuraInternet\Saclient\Cloud\Enums;

/**
 * 列挙型の基底クラス。
 * 
 * @package SakuraInternet\Saclient\Cloud\Enums
 * @ignore
 */
class EnumBase {
	
	/** @ignore */
	static $map;
	
	/** 
	 * サブクラスで列挙されている文字列から、対応する数値に変換します。
	 * 
	 * 通常、このメソッドを使用する必要はありません。
	 * 
	 * @param string $str
	 * @return int
	 */
	public static function strToNum($str) {
		$clazz = get_called_class();
		if (!isset(self::$map)) self::$map = array();
		if (!isset(self::$map[$clazz])) self::$map[$clazz] = static::_map();
		return @self::$map[$clazz][$str];
	}
    
	/** 
	 * サブクラスで列挙されている2つの文字列を、数値として比較します。
	 * 
	 * 通常、このメソッドを使用する必要はありません。
	 * 
	 * @param string $lhs
	 * @param string $rhs
	 * @return int $lhs<$rhsのときは-1、$rhs<$lhsのときは1、等しいときは0を返します。
	 */
	public static function compare($lhs, $rhs) {
		$l = static::strToNum($lhs);
		$r = static::strToNum($rhs);
		if (is_null($l) || is_null($r)) return null;
		$ret = $l - $r;
		return (0 < $ret) - ($ret < 0);
	}
 
}

