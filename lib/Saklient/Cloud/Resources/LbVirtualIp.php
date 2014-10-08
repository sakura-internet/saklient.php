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
 * @property-read string $virtualIpAddress VIPアドレス 
 * @property-read int $port ポート番号 
 * @property-read int $delayLoop チェック間隔 [秒] 
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
	 * @param mixed $obj
	 */
	public function __construct($obj)
	{
		Util::validateArgCount(func_num_args(), 1);
		$vip = Util::getByPathAny(new \ArrayObject([$obj]), new \ArrayObject([
			"VirtualIPAddress",
			"virtualIpAddress",
			"virtual_ip_address",
			"vip"
		]));
		$this->_virtualIpAddress = $vip;
		$port = Util::getByPathAny(new \ArrayObject([$obj]), new \ArrayObject(["Port", "port"]));
		$this->_port = $port == null ? null : intval($port);
		if ($this->_port == 0) {
			$this->_port = null;
		}
		$delayLoop = Util::getByPathAny(new \ArrayObject([$obj]), new \ArrayObject([
			"DelayLoop",
			"delayLoop",
			"delay_loop",
			"delay"
		]));
		$this->_delayLoop = $delayLoop == null ? null : intval($delayLoop);
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
	 * @param mixed $settings
	 * @return \Saklient\Cloud\Resources\LbVirtualIp
	 */
	public function addServer($settings)
	{
		Util::validateArgCount(func_num_args(), 1);
		$this->_servers->append(new LbServer($settings));
		return $this;
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

}

