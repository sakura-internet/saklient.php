<?php

namespace SakuraInternet\Saclient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Client.php";
use \SakuraInternet\Saclient\Cloud\Client;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Resource.php";
use \SakuraInternet\Saclient\Cloud\Resource\Resource;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Icon.php";
use \SakuraInternet\Saclient\Cloud\Resource\Icon;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Swytch.php";
use \SakuraInternet\Saclient\Cloud\Resource\Swytch;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Ipv4Net.php";
use \SakuraInternet\Saclient\Cloud\Resource\Ipv4Net;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Ipv6Net.php";
use \SakuraInternet\Saclient\Cloud\Resource\Ipv6Net;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * ルータのリソース情報へのアクセス機能や操作機能を備えたクラス。
 * 
 * @property-read string $id
 * @property string $name
 * @property string $description
 * @property int $networkMaskLen
 * @property int $bandWidthMbps
 * @property-read string $swytchId
 */
class Router extends Resource {
	
	/**
	 * ID
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_id;
	
	/**
	 * 名前
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_name;
	
	/**
	 * 説明
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_description;
	
	/**
	 * ネットワークのマスク長
	 * 
	 * @access protected
	 * @ignore
	 * @var int
	 */
	protected $m_networkMaskLen;
	
	/**
	 * 帯域幅
	 * 
	 * @access protected
	 * @ignore
	 * @var int
	 */
	protected $m_bandWidthMbps;
	
	/**
	 * スイッチ
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
		return "/internet";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey()
	{
		return "Internet";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM()
	{
		return "Internet";
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
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Router this
	 */
	public function save()
	{
		return $this->_save();
	}
	
	/**
	 * 最新のリソース情報を再取得します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Router this
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
	 * 作成中のルータが利用可能になるまで待機します。
	 * 
	 * @access public
	 * @param int $timeoutSec
	 * @param callback $callback
	 * @return void
	 */
	public function afterCreate($timeoutSec, $callback)
	{
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($timeoutSec, "int");
		Util::validateType($callback, "callback");
		$ret = $this->sleepWhileCreating($timeoutSec);
		$callback($this, $ret);
	}
	
	/**
	 * 作成中のルータが利用可能になるまで待機します。
	 * 
	 * @access public
	 * @param int $timeoutSec = 120
	 * @return boolean
	 */
	public function sleepWhileCreating($timeoutSec=120)
	{
		Util::validateType($timeoutSec, "int");
		$step = 3;
		while (0 < $timeoutSec) {
			if ($this->exists()) {
				$this->reload();
				return true;
			}
			$timeoutSec -= $step;
			if (0 < $timeoutSec) {
				Util::sleep($step);
			}
		}
		return false;
	}
	
	/**
	 * このルータが接続されているスイッチを取得します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Swytch
	 */
	public function getSwytch()
	{
		$model = Util::createClassInstance("saclient.cloud.model.Model_Swytch", new \ArrayObject([$this->_client]));
		$id = $this->get_swytchId();
		return $model->getById($id);
	}
	
	/**
	 * このルータ＋スイッチでIPv6アドレスを有効にします。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Ipv6Net
	 */
	public function addIpv6Net()
	{
		$result = $this->_client->request("POST", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/ipv6net");
		$this->reload();
		return new Ipv6Net($this->_client, $result->{"IPv6Net"});
	}
	
	/**
	 * このルータ＋スイッチでIPv6アドレスを無効にします。
	 * 
	 * @access public
	 * @param \SakuraInternet\Saclient\Cloud\Resource\Ipv6Net $ipv6Net
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Router
	 */
	public function removeIpv6Net(\SakuraInternet\Saclient\Cloud\Resource\Ipv6Net $ipv6Net)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($ipv6Net, "\\SakuraInternet\\Saclient\\Cloud\\Resource\\Ipv6Net");
		$this->_client->request("DELETE", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/ipv6net/" . $ipv6Net->_id());
		$this->reload();
		return $this;
	}
	
	/**
	 * このルータ＋スイッチにスタティックルートを追加します。
	 * 
	 * @access public
	 * @param int $maskLen
	 * @param string $nextHop
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Ipv4Net
	 */
	public function addStaticRoute($maskLen, $nextHop)
	{
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($maskLen, "int");
		Util::validateType($nextHop, "string");
		$q = (object)[];
		Util::setByPath($q, "NetworkMaskLen", $maskLen);
		Util::setByPath($q, "NextHop", $nextHop);
		$result = $this->_client->request("POST", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/subnet", $q);
		$this->reload();
		return new Ipv4Net($this->_client, $result->{"Subnet"});
	}
	
	/**
	 * このルータ＋スイッチからスタティックルートを削除します。
	 * 
	 * @access public
	 * @param \SakuraInternet\Saclient\Cloud\Resource\Ipv4Net $ipv4Net
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Router
	 */
	public function removeStaticRoute(\SakuraInternet\Saclient\Cloud\Resource\Ipv4Net $ipv4Net)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($ipv4Net, "\\SakuraInternet\\Saclient\\Cloud\\Resource\\Ipv4Net");
		$this->_client->request("DELETE", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/subnet/" . $ipv4Net->_id());
		$this->reload();
		return $this;
	}
	
	/**
	 * このルータ＋スイッチの帯域プランを変更します。
	 * 
	 * @access public
	 * @param int $bandWidthMbps
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Router
	 */
	public function changePlan($bandWidthMbps)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($bandWidthMbps, "int");
		$path = $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/bandwidth";
		$q = (object)[];
		Util::setByPath($q, "Internet.BandWidthMbps", $bandWidthMbps);
		$result = $this->_client->request("PUT", $path, $q);
		$this->apiDeserialize($result->{$this->_rootKey()});
		return $this;
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
	 * ID
	 */
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_name = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_name()
	{
		return $this->m_name;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	private function set_name($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "string");
		$this->m_name = $v;
		$this->n_name = true;
		return $this->m_name;
	}
	
	/**
	 * 名前
	 */
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_description = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_description()
	{
		return $this->m_description;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	private function set_description($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "string");
		$this->m_description = $v;
		$this->n_description = true;
		return $this->m_description;
	}
	
	/**
	 * 説明
	 */
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_networkMaskLen = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return int
	 */
	private function get_networkMaskLen()
	{
		return $this->m_networkMaskLen;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @param int $v
	 * @return int
	 */
	private function set_networkMaskLen($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "int");
		$this->m_networkMaskLen = $v;
		$this->n_networkMaskLen = true;
		return $this->m_networkMaskLen;
	}
	
	/**
	 * ネットワークのマスク長
	 */
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_bandWidthMbps = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return int
	 */
	private function get_bandWidthMbps()
	{
		return $this->m_bandWidthMbps;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @param int $v
	 * @return int
	 */
	private function set_bandWidthMbps($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "int");
		$this->m_bandWidthMbps = $v;
		$this->n_bandWidthMbps = true;
		return $this->m_bandWidthMbps;
	}
	
	/**
	 * 帯域幅
	 */
	
	
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
	 * スイッチ
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
		if (Util::existsPath($r, "Name")) {
			$this->m_name = Util::getByPath($r, "Name") == null ? null : "" . Util::getByPath($r, "Name");
		}
		else {
			$this->m_name = null;
			$this->isIncomplete = true;
		}
		$this->n_name = false;
		if (Util::existsPath($r, "Description")) {
			$this->m_description = Util::getByPath($r, "Description") == null ? null : "" . Util::getByPath($r, "Description");
		}
		else {
			$this->m_description = null;
			$this->isIncomplete = true;
		}
		$this->n_description = false;
		if (Util::existsPath($r, "NetworkMaskLen")) {
			$this->m_networkMaskLen = Util::getByPath($r, "NetworkMaskLen") == null ? null : intval("" . Util::getByPath($r, "NetworkMaskLen"));
		}
		else {
			$this->m_networkMaskLen = null;
			$this->isIncomplete = true;
		}
		$this->n_networkMaskLen = false;
		if (Util::existsPath($r, "BandWidthMbps")) {
			$this->m_bandWidthMbps = Util::getByPath($r, "BandWidthMbps") == null ? null : intval("" . Util::getByPath($r, "BandWidthMbps"));
		}
		else {
			$this->m_bandWidthMbps = null;
			$this->isIncomplete = true;
		}
		$this->n_bandWidthMbps = false;
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
		if ($withClean || $this->n_name) {
			Util::setByPath($ret, "Name", $this->m_name);
		}
		if ($withClean || $this->n_description) {
			Util::setByPath($ret, "Description", $this->m_description);
		}
		if ($withClean || $this->n_networkMaskLen) {
			Util::setByPath($ret, "NetworkMaskLen", $this->m_networkMaskLen);
		}
		if ($withClean || $this->n_bandWidthMbps) {
			Util::setByPath($ret, "BandWidthMbps", $this->m_bandWidthMbps);
		}
		if ($withClean || $this->n_swytchId) {
			Util::setByPath($ret, "Switch.ID", $this->m_swytchId);
		}
		return $ret;
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "id": return $this->get_id();
			case "name": return $this->get_name();
			case "description": return $this->get_description();
			case "networkMaskLen": return $this->get_networkMaskLen();
			case "bandWidthMbps": return $this->get_bandWidthMbps();
			case "swytchId": return $this->get_swytchId();
			default: return null;
		}
	}
	
	/**
	 * @ignore
	 */
	public function __set($key, $v) {
		switch ($key) {
			case "name": return $this->set_name($v);
			case "description": return $this->set_description($v);
			case "networkMaskLen": return $this->set_networkMaskLen($v);
			case "bandWidthMbps": return $this->set_bandWidthMbps($v);
			default: return $v;
		}
	}

}

