<?php

namespace Saklient\Cloud\Resources;

require_once __DIR__ . "/../../../Saklient/Errors/HttpException.php";
use \Saklient\Errors\HttpException;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;
require_once __DIR__ . "/../../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Resource.php";
use \Saklient\Cloud\Resources\Resource;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Icon.php";
use \Saklient\Cloud\Resources\Icon;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Swytch.php";
use \Saklient\Cloud\Resources\Swytch;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Ipv4Net.php";
use \Saklient\Cloud\Resources\Ipv4Net;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Ipv6Net.php";
use \Saklient\Cloud\Resources\Ipv6Net;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/RouterActivity.php";
use \Saklient\Cloud\Resources\RouterActivity;
require_once __DIR__ . "/../../../Saklient/Cloud/Models/Model_Swytch.php";
use \Saklient\Cloud\Models\Model_Swytch;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/**
 * ルータの実体1つに対応し、属性の取得や操作を行うためのクラス。
 * 
 * @property-read \Saklient\Cloud\Resources\RouterActivity $activity アクティビティ 
 * @property-read string $id ID 
 * @property string $name 名前 
 * @property string $description 説明 
 * @property int $networkMaskLen ネットワークのマスク長 
 * @property int $bandWidthMbps 帯域幅 
 * @property-read string $swytchId スイッチ 
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
	 * @ignore
	 * @return string
	 */
	public function _className()
	{
		return "Router";
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
	 * @return \Saklient\Cloud\Resources\Router this
	 */
	public function save()
	{
		return $this->_save();
	}
	
	/**
	 * 最新のリソース情報を再取得します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\Router this
	 */
	public function reload()
	{
		return $this->_reload();
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var RouterActivity
	 */
	protected $_activity;
	
	/**
	 * @access public
	 * @ignore
	 * @return \Saklient\Cloud\Resources\RouterActivity
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
		$this->_activity = new RouterActivity($client);
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
	 * 作成中のルータが利用可能になるまで待機します。
	 * 
	 * @ignore
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
	 * @param int $timeoutSec=120
	 * @return boolean 成功時はtrue、タイムアウトやエラーによる失敗時はfalseを返します。
	 */
	public function sleepWhileCreating($timeoutSec=120)
	{
		Util::validateType($timeoutSec, "int");
		$step = 3;
		while (0 < $timeoutSec) {
			try {
				if ($this->exists()) {
					$this->reload();
					return true;
				}
			}
			catch (HttpException $ex) {
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
	 * @return \Saklient\Cloud\Resources\Swytch
	 */
	public function getSwytch()
	{
		$model = Util::createClassInstance("saklient.cloud.models.Model_Swytch", new \ArrayObject([$this->_client]));
		$id = $this->get_swytchId();
		return $model->getById($id);
	}
	
	/**
	 * このルータ＋スイッチでIPv6アドレスを有効にします。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\Ipv6Net 有効化されたIPv6ネットワーク
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
	 * @param \Saklient\Cloud\Resources\Ipv6Net $ipv6Net
	 * @return \Saklient\Cloud\Resources\Router this
	 */
	public function removeIpv6Net(\Saklient\Cloud\Resources\Ipv6Net $ipv6Net)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($ipv6Net, "\\Saklient\\Cloud\\Resources\\Ipv6Net");
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
	 * @return \Saklient\Cloud\Resources\Ipv4Net 追加されたスタティックルート
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
	 * @param \Saklient\Cloud\Resources\Ipv4Net $ipv4Net
	 * @return \Saklient\Cloud\Resources\Router this
	 */
	public function removeStaticRoute(\Saklient\Cloud\Resources\Ipv4Net $ipv4Net)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($ipv4Net, "\\Saklient\\Cloud\\Resources\\Ipv4Net");
		$this->_client->request("DELETE", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/subnet/" . $ipv4Net->_id());
		$this->reload();
		return $this;
	}
	
	/**
	 * このルータ＋スイッチの帯域プランを変更します。
	 * 
	 * 成功時はリソースIDが変わることにご注意ください。
	 * 
	 * @access public
	 * @param int $bandWidthMbps
	 * @return \Saklient\Cloud\Resources\Router this
	 */
	public function changePlan($bandWidthMbps)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($bandWidthMbps, "int");
		$path = $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/bandwidth";
		$q = (object)[];
		Util::setByPath($q, "Internet.BandWidthMbps", $bandWidthMbps);
		$result = $this->_client->request("PUT", $path, $q);
		$this->apiDeserialize($result, true);
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
	 * @param int|null $v
	 * @return int
	 */
	private function set_networkMaskLen($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "int");
		if (!$this->isNew) {
			throw new SaklientException("immutable_field", "Immutable fields cannot be modified after the resource creation: " . "Saklient\\Cloud\\Resources\\Router#networkMaskLen");
		}
		$this->m_networkMaskLen = $v;
		$this->n_networkMaskLen = true;
		return $this->m_networkMaskLen;
	}
	
	
	
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
	 * @param int|null $v
	 * @return int
	 */
	private function set_bandWidthMbps($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "int");
		if (!$this->isNew) {
			throw new SaklientException("immutable_field", "Immutable fields cannot be modified after the resource creation: " . "Saklient\\Cloud\\Resources\\Router#bandWidthMbps");
		}
		$this->m_bandWidthMbps = $v;
		$this->n_bandWidthMbps = true;
		return $this->m_bandWidthMbps;
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
		if ($withClean || $this->n_networkMaskLen) {
			Util::setByPath($ret, "NetworkMaskLen", $this->m_networkMaskLen);
		}
		else {
			if ($this->isNew) {
				$missing->append("networkMaskLen");
			}
		}
		if ($withClean || $this->n_bandWidthMbps) {
			Util::setByPath($ret, "BandWidthMbps", $this->m_bandWidthMbps);
		}
		else {
			if ($this->isNew) {
				$missing->append("bandWidthMbps");
			}
		}
		if ($withClean || $this->n_swytchId) {
			Util::setByPath($ret, "Switch.ID", $this->m_swytchId);
		}
		if ($missing->count() > 0) {
			throw new SaklientException("required_field", "Required fields must be set before the Router creation: " . implode(", ", (array)($missing)));
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
			case "name": return $this->get_name();
			case "description": return $this->get_description();
			case "networkMaskLen": return $this->get_networkMaskLen();
			case "bandWidthMbps": return $this->get_bandWidthMbps();
			case "swytchId": return $this->get_swytchId();
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
			case "networkMaskLen": return $this->set_networkMaskLen($v);
			case "bandWidthMbps": return $this->set_bandWidthMbps($v);
			default: return parent::__set($key, $v);
		}
	}

}

