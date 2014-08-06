<?php

namespace SakuraInternet\Saclient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Client.php";
use \SakuraInternet\Saclient\Cloud\Client;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Resource.php";
use \SakuraInternet\Saclient\Cloud\Resource\Resource;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;
require_once dirname(__FILE__) . "/../../../Saclient/Errors/SaclientException.php";
use \SakuraInternet\Saclient\Errors\SaclientException;

/**
 * インタフェースのリソース情報へのアクセス機能や操作機能を備えたクラス。
 * 
 * @property-read string $id
 * @property-read string $macAddress
 * @property-read string $ipAddress
 * @property string $userIpAddress
 * @property string $serverId
 */
class Iface extends Resource {
	
	/**
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_id;
	
	/**
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_macAddress;
	
	/**
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_ipAddress;
	
	/**
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_userIpAddress;
	
	/**
	 * サーバ
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_serverId;
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPath()
	{
		return "/interface";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey()
	{
		return "Interface";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM()
	{
		return "Interfaces";
	}
	
	/**
	 * @private
	 * @access public
	 * @return string
	 */
	public function _id()
	{
		return $this->get_id();
	}
	
	/**
	 * このローカルオブジェクトに現在設定されているリソース情報をAPIに送信し、上書き保存します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Iface this
	 */
	public function save()
	{
		return $this->_save();
	}
	
	/**
	 * 最新のリソース情報を再取得します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Iface this
	 */
	public function reload()
	{
		return $this->_reload();
	}
	
	/**
	 * @private
	 * @access public
	 * @param \SakuraInternet\Saclient\Cloud\Client $client
	 * @param mixed $r
	 */
	public function __construct(\SakuraInternet\Saclient\Cloud\Client $client, $r)
	{
		parent::__construct($client);
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($client, "\\SakuraInternet\\Saclient\\Cloud\\Client");
		$this->apiDeserialize($r);
	}
	
	/**
	 * 共有セグメントに接続します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Iface
	 */
	public function connectToSharedSegment()
	{
		$this->_client->request("PUT", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/to/switch/shared");
		return $this->reload();
	}
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_id = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_id()
	{
		return $this->m_id;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_macAddress = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_macAddress()
	{
		return $this->m_macAddress;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_ipAddress = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_ipAddress()
	{
		return $this->m_ipAddress;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_userIpAddress = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_userIpAddress()
	{
		return $this->m_userIpAddress;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	private function set_userIpAddress($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "string");
		$this->m_userIpAddress = $v;
		$this->n_userIpAddress = true;
		return $this->m_userIpAddress;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_serverId = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_serverId()
	{
		return $this->m_serverId;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	private function set_serverId($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "string");
		$this->m_serverId = $v;
		$this->n_serverId = true;
		return $this->m_serverId;
	}
	
	/**
	 * サーバ
	 */
	
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access protected
	 * @ignore
	 * @param mixed $r
	 */
	protected function apiDeserializeImpl($r)
	{
		Util::validateArgCount(func_num_args(), 1);
		$this->isNew = $r == null;
		if ($this->isNew) {
			$r = (object)[];
		}
		$this->isIncomplete = false;
		if (Util::existsPath($r, "ID")) {
			$this->m_id = Util::getByPath($r, "ID") == null ? null : "" . Util::getByPath($r, "ID");
		}
		else {
			$this->m_id = null;
			$this->isIncomplete = true;
		}
		$this->n_id = false;
		if (Util::existsPath($r, "MACAddress")) {
			$this->m_macAddress = Util::getByPath($r, "MACAddress") == null ? null : "" . Util::getByPath($r, "MACAddress");
		}
		else {
			$this->m_macAddress = null;
			$this->isIncomplete = true;
		}
		$this->n_macAddress = false;
		if (Util::existsPath($r, "IPAddress")) {
			$this->m_ipAddress = Util::getByPath($r, "IPAddress") == null ? null : "" . Util::getByPath($r, "IPAddress");
		}
		else {
			$this->m_ipAddress = null;
			$this->isIncomplete = true;
		}
		$this->n_ipAddress = false;
		if (Util::existsPath($r, "UserIPAddress")) {
			$this->m_userIpAddress = Util::getByPath($r, "UserIPAddress") == null ? null : "" . Util::getByPath($r, "UserIPAddress");
		}
		else {
			$this->m_userIpAddress = null;
			$this->isIncomplete = true;
		}
		$this->n_userIpAddress = false;
		if (Util::existsPath($r, "Server.ID")) {
			$this->m_serverId = Util::getByPath($r, "Server.ID") == null ? null : "" . Util::getByPath($r, "Server.ID");
		}
		else {
			$this->m_serverId = null;
			$this->isIncomplete = true;
		}
		$this->n_serverId = false;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access protected
	 * @ignore
	 * @param boolean $withClean = false
	 * @return mixed
	 */
	protected function apiSerializeImpl($withClean=false)
	{
		Util::validateType($withClean, "boolean");
		$ret = (object)[];
		if ($withClean || $this->n_id) {
			Util::setByPath($ret, "ID", $this->m_id);
		}
		if ($withClean || $this->n_macAddress) {
			Util::setByPath($ret, "MACAddress", $this->m_macAddress);
		}
		if ($withClean || $this->n_ipAddress) {
			Util::setByPath($ret, "IPAddress", $this->m_ipAddress);
		}
		if ($withClean || $this->n_userIpAddress) {
			Util::setByPath($ret, "UserIPAddress", $this->m_userIpAddress);
		}
		if ($withClean || $this->n_serverId) {
			Util::setByPath($ret, "Server.ID", $this->m_serverId);
		}
		return $ret;
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "id": return $this->get_id();
			case "macAddress": return $this->get_macAddress();
			case "ipAddress": return $this->get_ipAddress();
			case "userIpAddress": return $this->get_userIpAddress();
			case "serverId": return $this->get_serverId();
			default: return null;
		}
	}
	
	/**
	 * @ignore
	 */
	public function __set($key, $v) {
		switch ($key) {
			case "userIpAddress": return $this->set_userIpAddress($v);
			case "serverId": return $this->set_serverId($v);
			default: throw new SaclientException('non_writable_field', 'Non-writable field: SakuraInternet\\Saclient\\Cloud\\Resource\\Iface#'.$key);
		}
	}

}

