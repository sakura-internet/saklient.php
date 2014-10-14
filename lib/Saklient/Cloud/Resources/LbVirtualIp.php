<?php

namespace Saklient\Cloud\Resources;

require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/LbServer.php";
use \Saklient\Cloud\Resources\LbServer;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/**
 * ロードバランサの仮想IPアドレス。
 * 
 * @property string $virtualIpAddress VIPアドレス 
 * @property int $port ポート番号 
 * @property int $delayLoop チェック間隔 [秒] 
 * @property-read \ArrayObject $servers 実サーバ 
 */
class LbVirtualIp {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_virtualIpAddress;
	
	/**
	 * @access public
	 * @ignore
	 * @return string
	 */
	public function get_virtualIpAddress()
	{
		return $this->_virtualIpAddress;
	}
	
	/**
	 * @access public
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	public function set_virtualIpAddress($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "string");
		$this->_virtualIpAddress = $v;
		return $this->_virtualIpAddress;
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
	 * @var int
	 */
	protected $_delayLoop;
	
	/**
	 * @access public
	 * @ignore
	 * @return int
	 */
	public function get_delayLoop()
	{
		return $this->_delayLoop;
	}
	
	/**
	 * @access public
	 * @ignore
	 * @param int|null $v
	 * @return int
	 */
	public function set_delayLoop($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "int");
		$this->_delayLoop = $v;
		return $this->_delayLoop;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var LbServer[]
	 */
	protected $_servers;
	
	/**
	 * @access public
	 * @ignore
	 * @return \Saklient\Cloud\Resources\LbServer[]
	 */
	public function get_servers()
	{
		return $this->_servers;
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
		$vip = Util::getByPathAny(new \ArrayObject([$obj]), new \ArrayObject([
			"VirtualIPAddress",
			"virtualIpAddress",
			"virtual_ip_address",
			"vip"
		]));
		$this->_virtualIpAddress = $vip;
		$port = Util::getByPathAny(new \ArrayObject([$obj]), new \ArrayObject(["Port", "port"]));
		$this->_port = null;
		if ($port != null) {
			$this->_port = intval($port);
		}
		if ($this->_port == 0) {
			$this->_port = null;
		}
		$delayLoop = Util::getByPathAny(new \ArrayObject([$obj]), new \ArrayObject([
			"DelayLoop",
			"delayLoop",
			"delay_loop",
			"delay"
		]));
		$this->_delayLoop = null;
		if ($delayLoop != null) {
			$this->_delayLoop = intval($delayLoop);
		}
		if ($this->_delayLoop == 0) {
			$this->_delayLoop = null;
		}
		$this->_servers = new \ArrayObject([]);
		$serversDyn = Util::getByPathAny(new \ArrayObject([$obj]), new \ArrayObject(["Servers", "servers"]));
		if ($serversDyn != null) {
			$servers = $serversDyn;
			foreach ($servers as $server) {
				$this->_servers->append(new LbServer($server));
			}
		}
	}
	
	/**
	 * @access public
	 * @param mixed $settings=null
	 * @return \Saklient\Cloud\Resources\LbServer
	 */
	public function addServer($settings=null)
	{
		$ret = new LbServer($settings);
		$this->_servers->append($ret);
		return $ret;
	}
	
	/**
	 * @access public
	 * @return mixed
	 */
	public function toRawSettings()
	{
		$servers = new \ArrayObject([]);
		foreach ($this->_servers as $server) {
			$servers->append($server->toRawSettings());
		}
		return (object)[
			'VirtualIPAddress' => $this->_virtualIpAddress,
			'Port' => $this->_port,
			'DelayLoop' => $this->_delayLoop,
			'Servers' => $servers
		];
	}
	
	/**
	 * @access public
	 * @param string $address
	 * @return \Saklient\Cloud\Resources\LbServer
	 */
	public function getServerByAddress($address)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($address, "string");
		foreach ($this->_servers as $srv) {
			if ($srv->ipAddress == $address) {
				return $srv;
			}
		}
		return null;
	}
	
	/**
	 * @access public
	 * @param \ArrayObject $srvs
	 * @return \Saklient\Cloud\Resources\LbVirtualIp
	 */
	public function updateStatus($srvs)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($srvs, "\\ArrayObject");
		foreach ($srvs as $srvDyn) {
			$ip = $srvDyn->{"IPAddress"};
			$srv = $this->getServerByAddress($ip);
			if ($srv == null) {
				continue;
			}
			$srv->updateStatus($srvDyn);
		}
		return $this;
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "virtualIpAddress": return $this->get_virtualIpAddress();
			case "port": return $this->get_port();
			case "delayLoop": return $this->get_delayLoop();
			case "servers": return $this->get_servers();
			default: return null;
		}
	}
	
	/**
	 * @ignore
	 */
	public function __set($key, $v) {
		switch ($key) {
			case "virtualIpAddress": return $this->set_virtualIpAddress($v);
			case "port": return $this->set_port($v);
			case "delayLoop": return $this->set_delayLoop($v);
			default: throw new SaklientException('non_writable_field', 'Non-writable field: Saklient\\Cloud\\Resources\\LbVirtualIp#'.$key);
		}
	}

}

