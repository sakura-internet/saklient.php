<?php

namespace SakuraInternet\Saclient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Client.php";
use \SakuraInternet\Saclient\Cloud\Client;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Resource.php";
use \SakuraInternet\Saclient\Cloud\Resource\Resource;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Icon.php";
use \SakuraInternet\Saclient\Cloud\Resource\Icon;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Router.php";
use \SakuraInternet\Saclient\Cloud\Resource\Router;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Ipv4Net.php";
use \SakuraInternet\Saclient\Cloud\Resource\Ipv4Net;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Ipv6Net.php";
use \SakuraInternet\Saclient\Cloud\Resource\Ipv6Net;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;
require_once dirname(__FILE__) . "/../../../Saclient/Errors/SaclientException.php";
use \SakuraInternet\Saclient\Errors\SaclientException;

/**
 * スイッチのリソース情報へのアクセス機能や操作機能を備えたクラス。
 * 
 * @property-read string $id
 * @property string $name
 * @property string $description
 * @property-read string $userDefaultRoute
 * @property-read int $userMaskLen
 * @property-read \SakuraInternet\Saclient\Cloud\Resource\Router $router
 * @property-read \SakuraInternet\Saclient\Cloud\Resource\Ipv4Net[] $ipv4Nets
 * @property-read \SakuraInternet\Saclient\Cloud\Resource\Ipv6Net[] $ipv6Nets
 */
class Swytch extends Resource {
	
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
	 * ユーザ設定ネットワークのゲートウェイ
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_userDefaultRoute;
	
	/**
	 * ユーザ設定ネットワークのマスク長
	 * 
	 * @access protected
	 * @ignore
	 * @var int
	 */
	protected $m_userMaskLen;
	
	/**
	 * 接続されているルータ
	 * 
	 * @access protected
	 * @ignore
	 * @var Router
	 */
	protected $m_router;
	
	/**
	 * IPv4ネットワーク
	 * 
	 * @access protected
	 * @ignore
	 * @var Ipv4Net[]
	 */
	protected $m_ipv4Nets;
	
	/**
	 * IPv6ネットワーク
	 * 
	 * @access protected
	 * @ignore
	 * @var Ipv6Net[]
	 */
	protected $m_ipv6Nets;
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPath()
	{
		return "/switch";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey()
	{
		return "Switch";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM()
	{
		return "Switches";
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
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Swytch this
	 */
	public function save()
	{
		return $this->_save();
	}
	
	/**
	 * 最新のリソース情報を再取得します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Swytch this
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
	 * このルータ＋スイッチでIPv6アドレスを有効にします。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Ipv6Net
	 */
	public function addIpv6Net()
	{
		$ret = $this->get_router()->addIpv6Net();
		$this->reload();
		return $ret;
	}
	
	/**
	 * このルータ＋スイッチでIPv6アドレスを無効にします。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Swytch
	 */
	public function removeIpv6Net()
	{
		$nets = $this->get_ipv6Nets();
		$this->get_router()->removeIpv6Net($nets[0]);
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
		$ret = $this->get_router()->addStaticRoute($maskLen, $nextHop);
		$this->reload();
		return $ret;
	}
	
	/**
	 * このルータ＋スイッチからスタティックルートを削除します。
	 * 
	 * @access public
	 * @param \SakuraInternet\Saclient\Cloud\Resource\Ipv4Net $ipv4Net
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Swytch
	 */
	public function removeStaticRoute(\SakuraInternet\Saclient\Cloud\Resource\Ipv4Net $ipv4Net)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($ipv4Net, "\\SakuraInternet\\Saclient\\Cloud\\Resource\\Ipv4Net");
		$this->get_router()->removeStaticRoute($ipv4Net);
		$this->reload();
		return $this;
	}
	
	/**
	 * このルータ＋スイッチの帯域プランを変更します。
	 * 
	 * @access public
	 * @param int $bandWidthMbps
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Swytch
	 */
	public function changePlan($bandWidthMbps)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($bandWidthMbps, "int");
		$this->get_router()->changePlan($bandWidthMbps);
		$this->reload();
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
	private $n_userDefaultRoute = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_userDefaultRoute()
	{
		return $this->m_userDefaultRoute;
	}
	
	/**
	 * ユーザ設定ネットワークのゲートウェイ
	 */
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_userMaskLen = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return int
	 */
	private function get_userMaskLen()
	{
		return $this->m_userMaskLen;
	}
	
	/**
	 * ユーザ設定ネットワークのマスク長
	 */
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_router = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Router
	 */
	private function get_router()
	{
		return $this->m_router;
	}
	
	/**
	 * 接続されているルータ
	 */
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_ipv4Nets = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Ipv4Net[]
	 */
	private function get_ipv4Nets()
	{
		return $this->m_ipv4Nets;
	}
	
	/**
	 * IPv4ネットワーク
	 */
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_ipv6Nets = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Ipv6Net[]
	 */
	private function get_ipv6Nets()
	{
		return $this->m_ipv6Nets;
	}
	
	/**
	 * IPv6ネットワーク
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
		if (Util::existsPath($r, "UserSubnet.DefaultRoute")) {
			$this->m_userDefaultRoute = Util::getByPath($r, "UserSubnet.DefaultRoute") == null ? null : "" . Util::getByPath($r, "UserSubnet.DefaultRoute");
		}
		else {
			$this->m_userDefaultRoute = null;
			$this->isIncomplete = true;
		}
		$this->n_userDefaultRoute = false;
		if (Util::existsPath($r, "UserSubnet.NetworkMaskLen")) {
			$this->m_userMaskLen = Util::getByPath($r, "UserSubnet.NetworkMaskLen") == null ? null : intval("" . Util::getByPath($r, "UserSubnet.NetworkMaskLen"));
		}
		else {
			$this->m_userMaskLen = null;
			$this->isIncomplete = true;
		}
		$this->n_userMaskLen = false;
		if (Util::existsPath($r, "Internet")) {
			$this->m_router = Util::getByPath($r, "Internet") == null ? null : new Router($this->_client, Util::getByPath($r, "Internet"));
		}
		else {
			$this->m_router = null;
			$this->isIncomplete = true;
		}
		$this->n_router = false;
		if (Util::existsPath($r, "Subnets")) {
			if (Util::getByPath($r, "Subnets") == null) {
				$this->m_ipv4Nets = new \ArrayObject([]);
			}
			else {
				$this->m_ipv4Nets = new \ArrayObject([]);
				foreach (Util::getByPath($r, "Subnets") as $t) {
					$v1 = null;
					$v1 = $t == null ? null : new Ipv4Net($this->_client, $t);
					$this->m_ipv4Nets->append($v1);
				}
			}
		}
		else {
			$this->m_ipv4Nets = null;
			$this->isIncomplete = true;
		}
		$this->n_ipv4Nets = false;
		if (Util::existsPath($r, "IPv6Nets")) {
			if (Util::getByPath($r, "IPv6Nets") == null) {
				$this->m_ipv6Nets = new \ArrayObject([]);
			}
			else {
				$this->m_ipv6Nets = new \ArrayObject([]);
				foreach (Util::getByPath($r, "IPv6Nets") as $t) {
					$v2 = null;
					$v2 = $t == null ? null : new Ipv6Net($this->_client, $t);
					$this->m_ipv6Nets->append($v2);
				}
			}
		}
		else {
			$this->m_ipv6Nets = null;
			$this->isIncomplete = true;
		}
		$this->n_ipv6Nets = false;
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
		if ($withClean || $this->n_userDefaultRoute) {
			Util::setByPath($ret, "UserSubnet.DefaultRoute", $this->m_userDefaultRoute);
		}
		if ($withClean || $this->n_userMaskLen) {
			Util::setByPath($ret, "UserSubnet.NetworkMaskLen", $this->m_userMaskLen);
		}
		if ($withClean || $this->n_router) {
			Util::setByPath($ret, "Internet", $withClean ? ($this->m_router == null ? null : $this->m_router->apiSerialize($withClean)) : ($this->m_router == null ? (object)['ID' => "0"] : $this->m_router->apiSerializeID()));
		}
		if ($withClean || $this->n_ipv4Nets) {
			Util::setByPath($ret, "Subnets", new \ArrayObject([]));
			foreach ($this->m_ipv4Nets as $r1) {
				$v = null;
				$v = $withClean ? ($r1 == null ? null : $r1->apiSerialize($withClean)) : ($r1 == null ? (object)['ID' => "0"] : $r1->apiSerializeID());
				$ret->{"Subnets"}->append($v);
			}
		}
		if ($withClean || $this->n_ipv6Nets) {
			Util::setByPath($ret, "IPv6Nets", new \ArrayObject([]));
			foreach ($this->m_ipv6Nets as $r2) {
				$v = null;
				$v = $withClean ? ($r2 == null ? null : $r2->apiSerialize($withClean)) : ($r2 == null ? (object)['ID' => "0"] : $r2->apiSerializeID());
				$ret->{"IPv6Nets"}->append($v);
			}
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
			case "userDefaultRoute": return $this->get_userDefaultRoute();
			case "userMaskLen": return $this->get_userMaskLen();
			case "router": return $this->get_router();
			case "ipv4Nets": return $this->get_ipv4Nets();
			case "ipv6Nets": return $this->get_ipv6Nets();
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
			default: throw new SaclientException('non_writable_field', 'Non-writable field: SakuraInternet\\Saclient\\Cloud\\Resource\\Swytch#'.$key);
		}
	}

}

