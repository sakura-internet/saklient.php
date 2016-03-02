<?php

namespace Saklient\Cloud\Resources;

require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;
require_once __DIR__ . "/../../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/CommonServiceItem.php";
use \Saklient\Cloud\Resources\CommonServiceItem;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/GslbServer.php";
use \Saklient\Cloud\Resources\GslbServer;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/**
 * GSLBの実体1つに対応し、属性の取得や操作を行うためのクラス。
 * 
 * @property-read \ArrayObject $servers 仮想IPアドレス {@link \Saklient\Cloud\Resources\GslbServer} の配列 
 * @property string $protocol 監視方法 
 * @property string $pathToCheck 監視対象パス 
 * @property int $responseExpected 監視時に期待されるレスポンスコード 
 * @property int $delayLoop チェック間隔(秒) 
 * @property boolean $weighted 重み付け応答 
 */
class Gslb extends CommonServiceItem {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var GslbServer[]
	 */
	protected $_servers;
	
	/**
	 * @access public
	 * @ignore
	 * @return \Saklient\Cloud\Resources\GslbServer[]
	 */
	public function get_servers()
	{
		return $this->_servers;
	}
	
	
	
	/**
	 * @access public
	 * @ignore
	 * @return string
	 */
	public function get_protocol()
	{
		$raw = Util::getByPath($this->rawSettings, "GSLB.HealthCheck.Protocol");
		if ($raw == null) {
			throw new SaklientException("invalid_data", "Data of the resource is invalid");
		}
		return $raw;
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
		$this->_normalize();
		Util::setByPath($this->rawSettings, "GSLB.HealthCheck.Protocol", $v);
		return $v;
	}
	
	
	
	/**
	 * @access public
	 * @ignore
	 * @return string
	 */
	public function get_pathToCheck()
	{
		if (!Util::existsPath($this->rawSettings, "GSLB.HealthCheck.Path")) {
			return null;
		}
		$raw = Util::getByPath($this->rawSettings, "GSLB.HealthCheck.Path");
		return $raw;
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
		$this->_normalize();
		Util::setByPath($this->rawSettings, "GSLB.HealthCheck.Path", $v);
		return $v;
	}
	
	
	
	/**
	 * @access public
	 * @ignore
	 * @return int
	 */
	public function get_responseExpected()
	{
		$raw = Util::getByPath($this->rawSettings, "GSLB.HealthCheck.Status");
		if ($raw == null) {
			throw new SaklientException("invalid_data", "Data of the resource is invalid");
		}
		return intval($raw);
	}
	
	/**
	 * @access public
	 * @ignore
	 * @param int $v
	 * @return int
	 */
	public function set_responseExpected($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "int");
		$this->_normalize();
		Util::setByPath($this->rawSettings, "GSLB.HealthCheck.Status", $v);
		return $v;
	}
	
	
	
	/**
	 * @access public
	 * @ignore
	 * @return int
	 */
	public function get_delayLoop()
	{
		$delayLoop = Util::getByPath($this->rawSettings, "GSLB.DelayLoop");
		if ($delayLoop == null) {
			throw new SaklientException("invalid_data", "Data of the resource is invalid");
		}
		return intval($delayLoop);
	}
	
	/**
	 * @access public
	 * @ignore
	 * @param int $v
	 * @return int
	 */
	public function set_delayLoop($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "int");
		$this->_normalize();
		Util::setByPath($this->rawSettings, "GSLB.DelayLoop", $v);
		return $v;
	}
	
	
	
	/**
	 * @access public
	 * @ignore
	 * @return boolean
	 */
	public function get_weighted()
	{
		$weighted = Util::getByPath($this->rawSettings, "GSLB.Weighted");
		if ($weighted == null) {
			throw new SaklientException("invalid_data", "Data of the resource is invalid");
		}
		return strtolower($weighted) == "true";
	}
	
	/**
	 * @access public
	 * @ignore
	 * @param boolean $v
	 * @return boolean
	 */
	public function set_weighted($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "boolean");
		$this->_normalize();
		Util::setByPath($this->rawSettings, "GSLB.Weighted", $v ? "True" : "False");
		return $v;
	}
	
	
	
	/**
	 * @ignore
	 * @access public
	 * @param \Saklient\Cloud\Client $client
	 * @param mixed $obj
	 * @param boolean $wrapped=false
	 */
	public function __construct(\Saklient\Cloud\Client $client, $obj, $wrapped=false)
	{
		parent::__construct($client, $obj, $wrapped);
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($client, "\\Saklient\\Cloud\\Client");
		Util::validateType($wrapped, "boolean");
		$this->_normalize();
	}
	
	/**
	 * @private
	 * @ignore 
	 * @access private
	 * @ignore
	 * @return void
	 */
	private function _normalize()
	{
		if ($this->_servers == null) {
			$this->_servers = new \ArrayObject([]);
		}
		if ($this->rawSettings == null) {
			$this->rawSettings = (object)[];
		}
		if (!Util::existsPath($this->rawSettings, "GSLB")) {
			Util::setByPath($this->rawSettings, "GSLB", (object)[]);
		}
		if (!Util::existsPath($this->rawSettings, "GSLB.HealthCheck")) {
			Util::setByPath($this->rawSettings, "GSLB.HealthCheck", (object)[]);
		}
		if (!Util::existsPath($this->rawSettings, "GSLB.Servers")) {
			Util::setByPath($this->rawSettings, "GSLB.Servers", new \ArrayObject([]));
		}
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @param mixed $r
	 * @param mixed $root
	 * @return void
	 */
	protected function _onAfterApiDeserialize($r, $root)
	{
		Util::validateArgCount(func_num_args(), 2);
		$this->_normalize();
		$this->_servers = new \ArrayObject([]);
		$settings = $this->rawSettings;
		if ($settings != null) {
			$raw = Util::getByPath($settings, "GSLB.Servers");
			if ($raw == null) {
				$raw = new \ArrayObject([]);
			}
			$servers = $raw;
			foreach ($servers as $server) {
				$this->_servers->append(new GslbServer($server));
			}
		}
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @param boolean $withClean
	 * @return void
	 */
	protected function _onBeforeApiSerialize($withClean)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($withClean, "boolean");
		$this->_normalize();
		$servers = new \ArrayObject([]);
		foreach ($this->_servers as $server) {
			$servers->append($server->toRawSettings());
		}
		Util::setByPath($this->rawSettings, "GSLB.Servers", $servers);
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @param mixed $r
	 * @param boolean $withClean
	 * @return void
	 */
	protected function _onAfterApiSerialize($r, $withClean)
	{
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($withClean, "boolean");
		if ($r == null) {
			return;
		}
		Util::setByPath($r, "Provider", (object)[]);
		Util::setByPath($r, "Provider.Class", "gslb");
	}
	
	/**
	 * @ignore
	 * @access public
	 * @param string $protocol
	 * @param int $delayLoop=10
	 * @param boolean $weighted=true
	 * @return \Saklient\Cloud\Resources\Gslb
	 */
	public function setInitialParams($protocol, $delayLoop=10, $weighted=true)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($protocol, "string");
		Util::validateType($delayLoop, "int");
		Util::validateType($weighted, "boolean");
		$settings = $this->rawSettings;
		$this->protocol = $protocol;
		$this->delayLoop = $delayLoop;
		$this->weighted = $weighted;
		return $this;
	}
	
	/**
	 * 監視対象サーバ設定を追加します。
	 * 
	 * @access public
	 * @param mixed $settings=null 設定オブジェクト
	 * @return \Saklient\Cloud\Resources\GslbServer
	 */
	public function addServer($settings=null)
	{
		$ret = new GslbServer($settings);
		$this->_servers->append($ret);
		return $ret;
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "servers": return $this->get_servers();
			case "protocol": return $this->get_protocol();
			case "pathToCheck": return $this->get_pathToCheck();
			case "responseExpected": return $this->get_responseExpected();
			case "delayLoop": return $this->get_delayLoop();
			case "weighted": return $this->get_weighted();
			default: return parent::__get($key);
		}
	}
	
	/**
	 * @ignore
	 */
	public function __set($key, $v) {
		switch ($key) {
			case "protocol": return $this->set_protocol($v);
			case "pathToCheck": return $this->set_pathToCheck($v);
			case "responseExpected": return $this->set_responseExpected($v);
			case "delayLoop": return $this->set_delayLoop($v);
			case "weighted": return $this->set_weighted($v);
			default: return parent::__set($key, $v);
		}
	}

}

