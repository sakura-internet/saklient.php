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
 * @property-read double $outgoing 送信[BPS] 
 * @property-read double $incoming 受信[BPS] 
 */
class RouterActivitySample {
	
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
	protected $_outgoing;
	
	/**
	 * @access public
	 * @ignore
	 * @return double
	 */
	public function get_outgoing()
	{
		return $this->_outgoing;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var double
	 */
	protected $_incoming;
	
	/**
	 * @access public
	 * @ignore
	 * @return double
	 */
	public function get_incoming()
	{
		return $this->_incoming;
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
		$v = $data->{"Out"};
		if ($v == null) {
			$this->_isAvailable = false;
		}
		else {
			$this->_outgoing = $v;
		}
		$v = $data->{"In"};
		if ($v == null) {
			$this->_isAvailable = false;
		}
		else {
			$this->_incoming = $v;
		}
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "at": return $this->get_at();
			case "isAvailable": return $this->get_isAvailable();
			case "outgoing": return $this->get_outgoing();
			case "incoming": return $this->get_incoming();
			default: return null;
		}
	}

}

