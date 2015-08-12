<?php

namespace Saklient\Cloud\Resources;

require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/**
 * @ignore
 * @property-read NativeDate $at 記録日時 
 * @property-read boolean $isAvailable 有効な値のとき真 
 * @property-read double $write ライト[BPS] 
 * @property-read double $read リード[BPS] 
 */
class DiskActivitySample {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var NativeDate
	 */
	protected $_at;
	
	/**
	 * @access public
	 * @ignore
	 * @return NativeDate
	 */
	public function get_at()
	{
		return $this->_at;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var boolean
	 */
	protected $_isAvailable;
	
	/**
	 * @access public
	 * @ignore
	 * @return boolean
	 */
	public function get_isAvailable()
	{
		return $this->_isAvailable;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var double
	 */
	protected $_write;
	
	/**
	 * @access public
	 * @ignore
	 * @return double
	 */
	public function get_write()
	{
		return $this->_write;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var double
	 */
	protected $_read;
	
	/**
	 * @access public
	 * @ignore
	 * @return double
	 */
	public function get_read()
	{
		return $this->_read;
	}
	
	
	
	/**
	 * @access public
	 * @param string $atStr
	 * @param mixed $data
	 */
	public function __construct($atStr, $data)
	{
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($atStr, "string");
		$this->_at = Util::str2date($atStr);
		$this->_isAvailable = true;
		$v = null;
		$v = $data->{"Write"};
		if ($v == null) {
			$this->_isAvailable = false;
		}
		else {
			$this->_write = $v;
		}
		$v = $data->{"Read"};
		if ($v == null) {
			$this->_isAvailable = false;
		}
		else {
			$this->_read = $v;
		}
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "at": return $this->get_at();
			case "isAvailable": return $this->get_isAvailable();
			case "write": return $this->get_write();
			case "read": return $this->get_read();
			default: return null;
		}
	}

}

