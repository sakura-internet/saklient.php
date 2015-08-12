<?php

namespace Saklient\Cloud\Resources;

require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;
require_once __DIR__ . "/../../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Resource.php";
use \Saklient\Cloud\Resources\Resource;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Icon.php";
use \Saklient\Cloud\Resources\Icon;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Router.php";
use \Saklient\Cloud\Resources\Router;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Ipv4Net.php";
use \Saklient\Cloud\Resources\Ipv4Net;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Ipv6Net.php";
use \Saklient\Cloud\Resources\Ipv6Net;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Bridge.php";
use \Saklient\Cloud\Resources\Bridge;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/**
 * スイッチの実体1つに対応し、属性の取得や操作を行うためのクラス。
 * 
 * @property-read string $id ID 
 * @property string $name 名前 
 * @property string $description 説明 
 * @property \ArrayObject $tags タグ文字列の配列 
 * @property \Saklient\Cloud\Resources\Icon $icon アイコン 
 * @property-read string $userDefaultRoute ユーザ設定IPv4ネットワークのゲートウェイ 
 * @property-read int $userMaskLen ユーザ設定IPv4ネットワークのマスク長 
 * @property-read \Saklient\Cloud\Resources\Router $router 接続されているルータ 
 * @property-read \Saklient\Cloud\Resources\Bridge $bridge 接続されているブリッジ 
 * @property-read \ArrayObject $ipv4Nets IPv4ネットワーク（ルータによる自動割当） {@link \Saklient\Cloud\Resources\Ipv4Net} の配列 
 * @property-read \ArrayObject $ipv6Nets IPv6ネットワーク（ルータによる自動割当） {@link \Saklient\Cloud\Resources\Ipv6Net} の配列 
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
	 * タグ文字列の配列
	 * 
	 * @access protected
	 * @ignore
	 * @var string[]
	 */
	protected $m_tags;
	
	/**
	 * アイコン
	 * 
	 * @access protected
	 * @ignore
	 * @var Icon
	 */
	protected $m_icon;
	
	/**
	 * ユーザ設定IPv4ネットワークのゲートウェイ
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_userDefaultRoute;
	
	/**
	 * ユーザ設定IPv4ネットワークのマスク長
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
	 * 接続されているブリッジ
	 * 
	 * @access protected
	 * @ignore
	 * @var Bridge
	 */
	protected $m_bridge;
	
	/**
	 * IPv4ネットワーク（ルータによる自動割当） {@link \Saklient\Cloud\Resources\Ipv4Net} の配列
	 * 
	 * @access protected
	 * @ignore
	 * @var Ipv4Net[]
	 */
	protected $m_ipv4Nets;
	
	/**
	 * IPv6ネットワーク（ルータによる自動割当） {@link \Saklient\Cloud\Resources\Ipv6Net} の配列
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
	 * @ignore
	 * @return string
	 */
	public function _className()
	{
		return "Swytch";
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
	 * @return \Saklient\Cloud\Resources\Swytch this
	 */
	public function save()
	{
		return $this->_save();
	}
	
	/**
	 * 最新のリソース情報を再取得します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\Swytch this
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
	 * このルータ＋スイッチでIPv6アドレスを有効にします。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\Ipv6Net 有効化されたIPv6ネットワーク
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
	 * @return \Saklient\Cloud\Resources\Swytch this
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
	 * @return \Saklient\Cloud\Resources\Ipv4Net 追加されたIPv4ネットワーク
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
	 * @param \Saklient\Cloud\Resources\Ipv4Net $ipv4Net
	 * @return \Saklient\Cloud\Resources\Swytch this
	 */
	public function removeStaticRoute(\Saklient\Cloud\Resources\Ipv4Net $ipv4Net)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($ipv4Net, "\\Saklient\\Cloud\\Resources\\Ipv4Net");
		$this->get_router()->removeStaticRoute($ipv4Net);
		$this->reload();
		return $this;
	}
	
	/**
	 * このルータ＋スイッチの帯域プランを変更します。
	 * 
	 * @access public
	 * @param int $bandWidthMbps 帯域幅（api.product.router.find() から取得できる {@link RouterPlan} の bandWidthMbps を指定）。
	 * @return \Saklient\Cloud\Resources\Swytch this
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
	 * このルータ＋スイッチをブリッジに接続します。
	 * 
	 * @access public
	 * @param $swytch 接続先のブリッジ。
	 * @param \Saklient\Cloud\Resources\Bridge $bridge
	 * @return \Saklient\Cloud\Resources\Swytch this
	 */
	public function connectToBridge(\Saklient\Cloud\Resources\Bridge $bridge)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($bridge, "\\Saklient\\Cloud\\Resources\\Bridge");
		$result = $this->_client->request("PUT", $this->_apiPath() . "/" . $this->_id() . "/to/bridge/" . $bridge->_id());
		$this->reload();
		return $this;
	}
	
	/**
	 * このルータ＋スイッチをブリッジから切断します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\Swytch this
	 */
	public function disconnectFromBridge()
	{
		$result = $this->_client->request("DELETE", $this->_apiPath() . "/" . $this->_id() . "/to/bridge");
		$this->reload();
		return $this;
	}
	
	/**
	 * @private
	 * @ignore
	 * @access protected
	 * @return mixed
	 */
	protected function _usedIpv4AddressHash()
	{
		$filter = (object)[];
		$filter->{"Switch" . ".ID"} = $this->_id();
		$query = (object)[];
		Util::setByPath($query, "Count", 0);
		Util::setByPath($query, "Filter", $filter);
		Util::setByPath($query, "Include", new \ArrayObject(["IPAddress", "UserIPAddress"]));
		$result = $this->_client->request("GET", "/interface", $query);
		if ($result == null) {
			return null;
		}
		$result = $result->{"Interfaces"};
		if ($result == null) {
			return null;
		}
		$ifaces = $result;
		if ($ifaces == null) {
			return null;
		}
		$found = (object)[];
		foreach ($ifaces as $iface) {
			$ip = $iface->{"IPAddress"};
			$userIp = $iface->{"UserIPAddress"};
			if ($ip == null) {
				$ip = $userIp;
			}
			if ($ip != null) {
				$found->{$ip} = true;
			}
		}
		return $found;
	}
	
	/**
	 * このルータ＋スイッチに接続中のインタフェースに割り当てられているIPアドレスを収集します。
	 * 
	 * @access public
	 * @return string[]
	 */
	public function collectUsedIpv4Addresses()
	{
		$found = $this->_usedIpv4AddressHash();
		return Util::sortArray(new \ArrayObject(array_keys((array)$found)));
	}
	
	/**
	 * このルータ＋スイッチで利用できる未使用のIPアドレスを収集します。
	 * 
	 * @access public
	 * @return string[]
	 */
	public function collectUnusedIpv4Addresses()
	{
		$nets = $this->get_ipv4Nets();
		if ($nets->count() < 1) {
			return null;
		}
		$used = $this->_usedIpv4AddressHash();
		$ret = new \ArrayObject([]);
		foreach ($nets[0]->get_range()->get_asArray() as $ip) {
			if (!array_key_exists($ip, (array)($used))) {
				$ret->append($ip);
			}
		}
		return Util::sortArray($ret);
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
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_tags = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string[]
	 */
	private function get_tags()
	{
		$this->n_tags = true;
		return $this->m_tags;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @param string[] $v
	 * @return string[]
	 */
	private function set_tags($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "\\ArrayObject");
		if (is_array($v)) $v = Client::array2ArrayObject($v);
		$this->m_tags = $v;
		$this->n_tags = true;
		return $this->m_tags;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_icon = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return \Saklient\Cloud\Resources\Icon
	 */
	private function get_icon()
	{
		return $this->m_icon;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @param \Saklient\Cloud\Resources\Icon|null $v
	 * @return \Saklient\Cloud\Resources\Icon
	 */
	private function set_icon(\Saklient\Cloud\Resources\Icon $v=null)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "\\Saklient\\Cloud\\Resources\\Icon");
		$this->m_icon = $v;
		$this->n_icon = true;
		return $this->m_icon;
	}
	
	
	
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
	 * @return \Saklient\Cloud\Resources\Router
	 */
	private function get_router()
	{
		return $this->m_router;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_bridge = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return \Saklient\Cloud\Resources\Bridge
	 */
	private function get_bridge()
	{
		return $this->m_bridge;
	}
	
	
	
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
	 * @return \Saklient\Cloud\Resources\Ipv4Net[]
	 */
	private function get_ipv4Nets()
	{
		return $this->m_ipv4Nets;
	}
	
	
	
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
	 * @return \Saklient\Cloud\Resources\Ipv6Net[]
	 */
	private function get_ipv6Nets()
	{
		return $this->m_ipv6Nets;
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
		if (Util::existsPath($r, "Tags")) {
			if (Util::getByPath($r, "Tags") == null) {
				$this->m_tags = new \ArrayObject([]);
			}
			else {
				$this->m_tags = new \ArrayObject([]);
				foreach (Util::getByPath($r, "Tags") as $t) {
					$v1 = null;
					$v1 = $t == null ? null : "" . $t;
					$this->m_tags->append($v1);
				}
			}
		}
		else {
			$this->m_tags = null;
			$this->isIncomplete = true;
		}
		$this->n_tags = false;
		if (Util::existsPath($r, "Icon")) {
			$this->m_icon = Util::getByPath($r, "Icon") == null ? null : new Icon($this->_client, Util::getByPath($r, "Icon"));
		}
		else {
			$this->m_icon = null;
			$this->isIncomplete = true;
		}
		$this->n_icon = false;
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
		if (Util::existsPath($r, "Bridge")) {
			$this->m_bridge = Util::getByPath($r, "Bridge") == null ? null : new Bridge($this->_client, Util::getByPath($r, "Bridge"));
		}
		else {
			$this->m_bridge = null;
			$this->isIncomplete = true;
		}
		$this->n_bridge = false;
		if (Util::existsPath($r, "Subnets")) {
			if (Util::getByPath($r, "Subnets") == null) {
				$this->m_ipv4Nets = new \ArrayObject([]);
			}
			else {
				$this->m_ipv4Nets = new \ArrayObject([]);
				foreach (Util::getByPath($r, "Subnets") as $t) {
					$v2 = null;
					$v2 = $t == null ? null : new Ipv4Net($this->_client, $t);
					$this->m_ipv4Nets->append($v2);
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
					$v3 = null;
					$v3 = $t == null ? null : new Ipv6Net($this->_client, $t);
					$this->m_ipv6Nets->append($v3);
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
		if ($withClean || $this->n_name) {
			Util::setByPath($ret, "Name", $this->m_name);
		}
		else {
			if ($this->isNew) {
				$missing->append("name");
			}
		}
		if ($withClean || $this->n_description) {
			Util::setByPath($ret, "Description", $this->m_description);
		}
		if ($withClean || $this->n_tags) {
			Util::setByPath($ret, "Tags", new \ArrayObject([]));
			foreach ($this->m_tags as $r1) {
				$v = null;
				$v = $r1;
				$ret->{"Tags"}->append($v);
			}
		}
		if ($withClean || $this->n_icon) {
			Util::setByPath($ret, "Icon", $withClean ? ($this->m_icon == null ? null : $this->m_icon->apiSerialize($withClean)) : ($this->m_icon == null ? (object)['ID' => "0"] : $this->m_icon->apiSerializeID()));
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
		if ($withClean || $this->n_bridge) {
			Util::setByPath($ret, "Bridge", $withClean ? ($this->m_bridge == null ? null : $this->m_bridge->apiSerialize($withClean)) : ($this->m_bridge == null ? (object)['ID' => "0"] : $this->m_bridge->apiSerializeID()));
		}
		if ($withClean || $this->n_ipv4Nets) {
			Util::setByPath($ret, "Subnets", new \ArrayObject([]));
			foreach ($this->m_ipv4Nets as $r2) {
				$v = null;
				$v = $withClean ? ($r2 == null ? null : $r2->apiSerialize($withClean)) : ($r2 == null ? (object)['ID' => "0"] : $r2->apiSerializeID());
				$ret->{"Subnets"}->append($v);
			}
		}
		if ($withClean || $this->n_ipv6Nets) {
			Util::setByPath($ret, "IPv6Nets", new \ArrayObject([]));
			foreach ($this->m_ipv6Nets as $r3) {
				$v = null;
				$v = $withClean ? ($r3 == null ? null : $r3->apiSerialize($withClean)) : ($r3 == null ? (object)['ID' => "0"] : $r3->apiSerializeID());
				$ret->{"IPv6Nets"}->append($v);
			}
		}
		if ($missing->count() > 0) {
			throw new SaklientException("required_field", "Required fields must be set before the Swytch creation: " . implode(", ", (array)($missing)));
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
			case "tags": return $this->get_tags();
			case "icon": return $this->get_icon();
			case "userDefaultRoute": return $this->get_userDefaultRoute();
			case "userMaskLen": return $this->get_userMaskLen();
			case "router": return $this->get_router();
			case "bridge": return $this->get_bridge();
			case "ipv4Nets": return $this->get_ipv4Nets();
			case "ipv6Nets": return $this->get_ipv6Nets();
			default: return parent::__get($key);
		}
	}
	
	/**
	 * @ignore
	 */
	public function __set($key, $v) {
		switch ($key) {
			case "name": return $this->set_name($v);
			case "description": return $this->set_description($v);
			case "tags": return $this->set_tags($v);
			case "icon": return $this->set_icon($v);
			default: return parent::__set($key, $v);
		}
	}

}

