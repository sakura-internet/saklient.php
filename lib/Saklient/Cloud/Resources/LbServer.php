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
		$health = Util::getByPathAny(new \ArrayObject([$obj]), new \ArrayObject([
			"HealthCheck",
			"healthCheck",
			"health_check",
			"health"
		]));
		$this->_ipAddress = Util::getByPathAny(new \ArrayObject([$obj]), new \ArrayObject([
			"IPAddress",
			"ipAddress",
			"ip_address",
			"ip"
		]));
		$this->_protocol = Util::getByPathAny(new \ArrayObject([$health, $obj]), new \ArrayObject(["Protocol", "protocol"]));
		$this->_pathToCheck = Util::getByPathAny(new \ArrayObject([$health, $obj]), new \ArrayObject(["Path", "path"]));
		$port = Util::getByPathAny(new \ArrayObject([$obj]), new \ArrayObject(["Port", "port"]));
		$this->_port = $port == null ? null : intval($port);
		if ($this->_port == 0) {
			$this->_port = null;
		}
		$status = Util::getByPathAny(new \ArrayObject([$health, $obj]), new \ArrayObject(["Status", "status"]));
		$this->_expectedStatus = $status == null ? null : intval($status);
		if ($this->_expectedStatus == 0) {
			$this->_expectedStatus = null;
		}
	}
	
	/**
	 * @access public
	 * @return mixed
	 */
	public function toRawSettings()
	{
		return (object)[
			'IPAddress' => $this->_ipAddress,
			'Port' => $this->_port,
			'HealthCheck' => (object)[
				'Protocol' => $this->_protocol,
				'Path' => $this->_pathToCheck,
				'Status' => $this->_expectedStatus
			]
		];
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

