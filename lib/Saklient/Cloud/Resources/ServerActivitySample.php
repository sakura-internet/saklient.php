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
 * @property-read double $cpuTime CPU時間 
 */
class ServerActivitySample {
	
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
	protected $_cpuTime;
	
	/**
	 * @access public
	 * @ignore
	 * @return double
	 */
	public function get_cpuTime()
	{
		return $this->_cpuTime;
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
		$this->_isAvailable = false;
		$v = $data->{"CPU-TIME"};
		if ($v != null) {
			$this->_isAvailable = true;
			$this->_cpuTime = $v;
		}
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "at": return $this->get_at();
			case "isAvailable": return $this->get_isAvailable();
			case "cpuTime": return $this->get_cpuTime();
			default: return null;
		}
	}

}

