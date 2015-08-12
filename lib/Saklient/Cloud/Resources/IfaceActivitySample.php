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
 * @property-read double $send 送信[byte/sec] 
 * @property-read double $receive 受信[byte/sec] 
 */
class IfaceActivitySample {
	
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
	protected $_send;
	
	/**
	 * @access public
	 * @ignore
	 * @return double
	 */
	public function get_send()
	{
		return $this->_send;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var double
	 */
	protected $_receive;
	
	/**
	 * @access public
	 * @ignore
	 * @return double
	 */
	public function get_receive()
	{
		return $this->_receive;
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
		$v = $data->{"Send"};
		if ($v == null) {
			$this->_isAvailable = false;
		}
		else {
			$this->_send = $v;
		}
		$v = $data->{"Receive"};
		if ($v == null) {
			$this->_isAvailable = false;
		}
		else {
			$this->_receive = $v;
		}
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "at": return $this->get_at();
			case "isAvailable": return $this->get_isAvailable();
			case "send": return $this->get_send();
			case "receive": return $this->get_receive();
			default: return null;
		}
	}

}

