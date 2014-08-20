<?php

namespace Saklient\Cloud\Resource;

require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;
require_once __DIR__ . "/../../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../../Saklient/Cloud/Resource/Resource.php";
use \Saklient\Cloud\Resource\Resource;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/**
 * インタフェースの実体1つに対応し、属性の取得や操作を行うためのクラス。
 * 
 * @property-read string $id ID 
 * @property-read string $macAddress MACアドレス 
 * @property-read string $ipAddress IPv4アドレス（共有セグメントによる自動割当） 
 * @property string $userIpAddress ユーザ設定IPv4アドレス 
 * @property string $serverId このインタフェースが取り付けられているサーバのID 
 */
class Iface extends Resource {
	
	/**
	 * ID
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_id;
	
	/**
	 * MACアドレス
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_macAddress;
	
	/**
	 * IPv4アドレス（共有セグメントによる自動割当）
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_ipAddress;
	
	/**
	 * ユーザ設定IPv4アドレス
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_userIpAddress;
	
	/**
	 * このインタフェースが取り付けられているサーバのID
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
	 * @ignore
	 * @return string
	 */
	public function _className()
	{
		return "Iface";
	}
	
	/**
	 * @private
	 * @access public
	 * @ignore
	 * @return string
	 */
	public function _id()
	{
		return $this->get_id();
	}
	
	/**
	 * このローカルオブジェクトに現在設定されているリソース情報をAPIに送信し、新規作成または上書き保存します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resource\Iface this
	 */
	public function save()
	{
		return $this->_save();
	}
	
	/**
	 * 最新のリソース情報を再取得します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resource\Iface this
	 */
	public function reload()
	{
		return $this->_reload();
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
		parent::__construct($client);
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($client, "\\Saklient\\Cloud\\Client");
		Util::validateType($wrapped, "boolean");
		$this->apiDeserialize($obj, $wrapped);
	}
	
	/**
	 * 共有セグメントに接続します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resource\Iface this
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
		if (!$this->isNew) {
			throw new SaklientException("immutable_field", "Immutable fields cannot be modified after the resource creation: " . "Saklient\\Cloud\\Resource\\Iface#serverId");
		}
		$this->m_serverId = $v;
		$this->n_serverId = true;
		return $this->m_serverId;
	}
	
	
	
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
	 * @ignore
	 * @access protected
	 * @param boolean $withClean=false
	 * @return mixed
	 */
	protected function apiSerializeImpl($withClean=false)
	{
		Util::validateType($withClean, "boolean");
		$missing = new \ArrayObject([]);
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
		else {
			if ($this->isNew) {
				$missing->append("serverId");
			}
		}
		if ($missing->count() > 0) {
			throw new SaklientException("required_field", "Required fields must be set before the Iface creation: " . implode(", ", (array)($missing)));
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
			default: throw new SaklientException('non_writable_field', 'Non-writable field: Saklient\\Cloud\\Resource\\Iface#'.$key);
		}
	}

}

