<?php

namespace Saklient\Cloud\Resources;

require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/**
 * ロードバランサの監視対象サーバ。
 * 
 * @property-read string $ipAddress IPアドレス 
 * @property-read int $port ポート番号 
 * @property-read string $protocol 監視方法 
 * @property-read string $pathToCheck パス 
 * @property-read int $expectedStatus レスポンスコード 
 */
class LbServer {
	
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
	 * @private
	 * @access protected
	 * @ignore
	 * @var int
	 */
	protected $_port;
	
	/**
	 * @access public
	 * @ignore
	 * @return int
	 */
	public function get_port()
	{
		return $this->_port;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_protocol;
	
	/**
	 * @access public
	 * @ignore
	 * @return string
	 */
	public function get_protocol()
	{
		return $this->_protocol;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_pathToCheck;
	
	/**
	 * @access public
	 * @ignore
	 * @return string
	 */
	public function get_pathToCheck()
	{
		return $this->_pathToCheck;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var int
	 */
	protected $_expectedStatus;
	
	/**
	 * @access public
	 * @ignore
	 * @return int
	 */
	public function get_expectedStatus()
	{
		return $this->_expectedStatus;
	}
	
	
	
	/**
	 * @ignore
	 * @access public
	 * @param mixed $obj
	 */
	public function __construct($obj)
	{
		Util::validateArgCount(func_num_args(), 1);
		$this->_ipAddress = Util::getByPath($obj, "IPAddress");
		$this->_protocol = Util::getByPath($obj, "HealthCheck.Protocol");
		$this->_pathToCheck = Util::getByPath($obj, "HealthCheck.Path");
		$port = Util::getByPath($obj, "Port");
		$this->_port = $port == null ? null : intval($port);
		$status = Util::getByPath($obj, "HealthCheck.Status");
		$this->_expectedStatus = $status == null ? null : intval($status);
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "ipAddress": return $this->get_ipAddress();
			case "port": return $this->get_port();
			case "protocol": return $this->get_protocol();
			case "pathToCheck": return $this->get_pathToCheck();
			case "expectedStatus": return $this->get_expectedStatus();
			default: return null;
		}
	}

}

