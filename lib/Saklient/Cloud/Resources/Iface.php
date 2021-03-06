<?php

namespace Saklient\Cloud\Resources;

require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;
require_once __DIR__ . "/../../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Resource.php";
use \Saklient\Cloud\Resources\Resource;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Swytch.php";
use \Saklient\Cloud\Resources\Swytch;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/IfaceActivity.php";
use \Saklient\Cloud\Resources\IfaceActivity;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/**
 * インタフェースの実体1つに対応し、属性の取得や操作を行うためのクラス。
 * 
 * @property-read \Saklient\Cloud\Resources\IfaceActivity $activity アクティビティ 
 * @property-read string $id ID 
 * @property-read string $macAddress MACアドレス 
 * @property-read string $ipAddress IPv4アドレス（共有セグメントによる自動割当） 
 * @property string $userIpAddress ユーザ設定IPv4アドレス 
 * @property string $serverId このインタフェースが取り付けられているサーバのID 
 * @property string $swytchId このインタフェースの接続先スイッチのID 
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
	 * このインタフェースの接続先スイッチのID
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_swytchId;
	
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
	 * @return \Saklient\Cloud\Resources\Iface this
	 */
	public function save()
	{
		return $this->_save();
	}
	
	/**
	 * 最新のリソース情報を再取得します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\Iface this
	 */
	public function reload()
	{
		return $this->_reload();
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var IfaceActivity
	 */
	protected $_activity;
	
	/**
	 * @access public
	 * @ignore
	 * @return \Saklient\Cloud\Resources\IfaceActivity
	 */
	public function get_activity()
	{
		return $this->_activity;
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
		$this->_activity = new IfaceActivity($client);
		$this->apiDeserialize($obj, $wrapped);
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
		if ($r != null) {
			$this->_activity->setSourceId($this->_id());
		}
	}
	
	/**
	 * スイッチに接続します。
	 * 
	 * @access public
	 * @param \Saklient\Cloud\Resources\Swytch $swytch 接続先のスイッチ。
	 * @return \Saklient\Cloud\Resources\Iface this
	 */
	public function connectToSwytch(\Saklient\Cloud\Resources\Swytch $swytch)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($swytch, "\\Saklient\\Cloud\\Resources\\Swytch");
		$this->_client->request("PUT", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/to/switch/" . Util::urlEncode($swytch->_id()));
		return $this->reload();
	}
	
	/**
	 * 指定したIDのスイッチに接続します。
	 * 
	 * @access public
	 * @param string $swytchId 接続先のスイッチID。
	 * @return \Saklient\Cloud\Resources\Iface this
	 */
	public function connectToSwytchById($swytchId)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($swytchId, "string");
		$this->_client->request("PUT", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/to/switch/" . $swytchId);
		return $this->reload();
	}
	
	/**
	 * 共有セグメントに接続します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\Iface this
	 */
	public function connectToSharedSegment()
	{
		$this->_client->request("PUT", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/to/switch/shared");
		return $this->reload();
	}
	
	/**
	 * スイッチから切断します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\Iface this
	 */
	public function disconnectFromSwytch()
	{
		$this->_client->request("DELETE", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/to/switch");
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
			throw new SaklientException("immutable_field", "Immutable fields cannot be modified after the resource creation: " . "Saklient\\Cloud\\Resources\\Iface#serverId");
		}
		$this->m_serverId = $v;
		$this->n_serverId = true;
		return $this->m_serverId;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_swytchId = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_swytchId()
	{
		return $this->m_swytchId;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	private function set_swytchId($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "string");
		if (!$this->isNew) {
			throw new SaklientException("immutable_field", "Immutable fields cannot be modified after the resource creation: " . "Saklient\\Cloud\\Resources\\Iface#swytchId");
		}
		$this->m_swytchId = $v;
		$this->n_swytchId = true;
		return $this->m_swytchId;
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
		if (Util::existsPath($r, "Switch.ID")) {
			$this->m_swytchId = Util::getByPath($r, "Switch.ID") == null ? null : "" . Util::getByPath($r, "Switch.ID");
		}
		else {
			$this->m_swytchId = null;
			$this->isIncomplete = true;
		}
		$this->n_swytchId = false;
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
		if ($withClean || $this->n_swytchId) {
			Util::setByPath($ret, "Switch.ID", $this->m_swytchId);
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
			case "activity": return $this->get_activity();
			case "id": return $this->get_id();
			case "macAddress": return $this->get_macAddress();
			case "ipAddress": return $this->get_ipAddress();
			case "userIpAddress": return $this->get_userIpAddress();
			case "serverId": return $this->get_serverId();
			case "swytchId": return $this->get_swytchId();
			default: return parent::__get($key);
		}
	}
	
	/**
	 * @ignore
	 */
	public function __set($key, $v) {
		switch ($key) {
			case "userIpAddress": return $this->set_userIpAddress($v);
			case "serverId": return $this->set_serverId($v);
			case "swytchId": return $this->set_swytchId($v);
			default: return parent::__set($key, $v);
		}
	}

}

