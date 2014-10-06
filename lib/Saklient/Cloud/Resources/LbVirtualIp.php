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
		$this->_virtualIpAddress = Util::getByPath($obj, "VirtualIPAddress");
		$port = Util::getByPath($obj, "Port");
		$this->_port = $port == null ? null : intval($port);
		$delayLoop = Util::getByPath($obj, "DelayLoop");
		$this->_delayLoop = $delayLoop == null ? null : intval($delayLoop);
		$this->_servers = new \ArrayObject([]);
		$servers = Util::getByPath($obj, "Servers");
		foreach ($servers as $server) {
			$this->_servers->append(new LbServer($server));
		}
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

