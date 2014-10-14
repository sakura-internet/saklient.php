<?php

namespace Saklient\Cloud\Resources;

require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/**
 * ロードバランサの監視対象サーバ。
 * 
 * @property string $ipAddress IPアドレス 
 * @property int $port ポート番号 
 * @property string $protocol 監視方法 
 * @property string $pathToCheck 監視対象パス 
 * @property int $responseExpected 監視時に期待されるレスポンスコード 
 * @property-read int $activeConnections レスポンスコード 
 * @property-read string $status レスポンスコード 
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
	 * @access public
	 * @ignore
	 * @param int|null $v
	 * @return int
	 */
	public function set_port($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "int");
		$this->_port = $v;
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
	 * @access public
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	public function set_protocol($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "string");
		$this->_protocol = $v;
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
	 * @access public
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	public function set_pathToCheck($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "string");
		$this->_pathToCheck = $v;
		return $this->_pathToCheck;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var int
	 */
	protected $_responseExpected;
	
	/**
	 * @access public
	 * @ignore
	 * @return int
	 */
	public function get_responseExpected()
	{
		return $this->_responseExpected;
	}
	
	/**
	 * @access public
	 * @ignore
	 * @param int|null $v
	 * @return int
	 */
	public function set_responseExpected($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "int");
		$this->_responseExpected = $v;
		return $this->_responseExpected;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var int
	 */
	protected $_activeConnections;
	
	/**
	 * @access public
	 * @ignore
	 * @return int
	 */
	public function get_activeConnections()
	{
		return $this->_activeConnections;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_status;
	
	/**
	 * @access public
	 * @ignore
	 * @return string
	 */
	public function get_status()
	{
		return $this->_status;
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
		$this->_pathToCheck = Util::getByPathAny(new \ArrayObject([$health, $obj]), new \ArrayObject([
			"Path",
			"path",
			"pathToCheck",
			"path_to_check"
		]));
		$port = Util::getByPathAny(new \ArrayObject([$obj]), new \ArrayObject(["Port", "port"]));
		$this->_port = null;
		if ($port != null) {
			$this->_port = intval($port);
		}
		if ($this->_port == 0) {
			$this->_port = null;
		}
		$responseExpected = Util::getByPathAny(new \ArrayObject([$health, $obj]), new \ArrayObject([
			"Status",
			"status",
			"responseExpected",
			"response_expected"
		]));
		$this->_responseExpected = null;
		if ($responseExpected != null) {
			$this->_responseExpected = intval($responseExpected);
		}
		if ($this->_responseExpected == 0) {
			$this->_responseExpected = null;
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
				'Status' => $this->_responseExpected
			]
		];
	}
	
	/**
	 * @access public
	 * @param mixed $obj
	 * @return \Saklient\Cloud\Resources\LbServer
	 */
	public function updateStatus($obj)
	{
		Util::validateArgCount(func_num_args(), 1);
		$connStr = $obj->{"ActiveConn"};
		$this->_activeConnections = 0;
		if ($connStr != null) {
			$this->_activeConnections = intval($connStr);
		}
		$status = $obj->{"Status"};
		$this->_status = $status == null ? null : strtolower($status);
		return $this;
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
			case "responseExpected": return $this->get_responseExpected();
			case "activeConnections": return $this->get_activeConnections();
			case "status": return $this->get_status();
			default: return null;
		}
	}
	
	/**
	 * @ignore
	 */
	public function __set($key, $v) {
		switch ($key) {
			case "ipAddress": return $this->set_ipAddress($v);
			case "port": return $this->set_port($v);
			case "protocol": return $this->set_protocol($v);
			case "pathToCheck": return $this->set_pathToCheck($v);
			case "responseExpected": return $this->set_responseExpected($v);
			default: throw new SaklientException('non_writable_field', 'Non-writable field: Saklient\\Cloud\\Resources\\LbServer#'.$key);
		}
	}

}

