<?php

namespace Saklient\Cloud\Resources;

require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/**
 * GSLBの監視対象サーバ設定。
 * 
 * @property boolean $enabled 有効状態 
 * @property string $ipAddress IPアドレス 
 * @property int $weight 重み値 
 */
class GslbServer {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var boolean
	 */
	protected $_enabled;
	
	/**
	 * @access public
	 * @ignore
	 * @return boolean
	 */
	public function get_enabled()
	{
		return $this->_enabled;
	}
	
	/**
	 * @access public
	 * @ignore
	 * @param boolean|null $v
	 * @return boolean
	 */
	public function set_enabled($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "boolean");
		$this->_enabled = $v;
		return $this->_enabled;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_ipAddress;
	
	/**
	 * @access public
	 * @ignore
	 * @return string
	 */
	public function get_ipAddress()
	{
		return $this->_ipAddress;
	}
	
	/**
	 * @access public
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	public function set_ipAddress($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "string");
		$this->_ipAddress = $v;
		return $this->_ipAddress;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var int
	 */
	protected $_weight;
	
	/**
	 * @access public
	 * @ignore
	 * @return int
	 */
	public function get_weight()
	{
		return $this->_weight;
	}
	
	/**
	 * @access public
	 * @ignore
	 * @param int|null $v
	 * @return int
	 */
	public function set_weight($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "int");
		$this->_weight = $v;
		return $this->_weight;
	}
	
	
	
	/**
	 * @ignore
	 * @access public
	 * @param mixed $obj=null
	 */
	public function __construct($obj=null)
	{
		if ($obj == null) {
			$obj = (object)[];
		}
		$enabled = Util::getByPathAny(new \ArrayObject([$obj]), new \ArrayObject(["Enabled", "enabled"]));
		$this->_enabled = null;
		if ($enabled != null) {
			$enabledStr = $enabled;
			$this->_enabled = strtolower($enabledStr) == "true";
		}
		$this->_ipAddress = Util::getByPathAny(new \ArrayObject([$obj]), new \ArrayObject([
			"IPAddress",
			"ipAddress",
			"ip_address",
			"ip"
		]));
		$weight = Util::getByPathAny(new \ArrayObject([$obj]), new \ArrayObject(["Weight", "weight"]));
		$this->_weight = null;
		if ($weight != null) {
			$this->_weight = intval($weight);
		}
		if ($this->_weight == 0) {
			$this->_weight = null;
		}
	}
	
	/**
	 * @access public
	 * @return mixed
	 */
	public function toRawSettings()
	{
		return (object)[
			'Enabled' => $this->_enabled == null ? null : ($this->_enabled ? "True" : "False"),
			'IPAddress' => $this->_ipAddress,
			'Weight' => $this->_weight
		];
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "enabled": return $this->get_enabled();
			case "ipAddress": return $this->get_ipAddress();
			case "weight": return $this->get_weight();
			default: return null;
		}
	}
	
	/**
	 * @ignore
	 */
	public function __set($key, $v) {
		switch ($key) {
			case "enabled": return $this->set_enabled($v);
			case "ipAddress": return $this->set_ipAddress($v);
			case "weight": return $this->set_weight($v);
			default: throw new SaklientException('non_writable_field', 'Non-writable field: Saklient\\Cloud\\Resources\\GslbServer#'.$key);
		}
	}

}

