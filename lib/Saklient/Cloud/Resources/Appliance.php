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
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Iface.php";
use \Saklient\Cloud\Resources\Iface;
require_once __DIR__ . "/../../../Saklient/Cloud/Enums/EApplianceClass.php";
use \Saklient\Cloud\Enums\EApplianceClass;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/**
 * アプライアンスの実体1つに対応し、属性の取得や操作を行うためのクラス。
 * 
 * @property-read string $id ID 
 * @property string $clazz クラス {@link \Saklient\Cloud\Enums\EApplianceClass} 
 * @property string $name 名前 
 * @property string $description 説明 
 * @property \ArrayObject $tags タグ 
 * @property \Saklient\Cloud\Resources\Icon $icon アイコン 
 * @property-read \ArrayObject $ifaces プラン 
 * @property-read mixed $annotation 注釈 
 * @property mixed $rawSettings 設定の生データ 
 * @property-read string $serviceClass サービスクラス 
 */
class Appliance extends Resource {
	
	/**
	 * ID
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_id;
	
	/**
	 * クラス {@link \Saklient\Cloud\Enums\EApplianceClass}
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_clazz;
	
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
	 * タグ
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
	 * プラン
	 * 
	 * @access protected
	 * @ignore
	 * @var Iface[]
	 */
	protected $m_ifaces;
	
	/**
	 * 注釈
	 * 
	 * @access protected
	 * @ignore
	 * @var mixed
	 */
	protected $m_annotation;
	
	/**
	 * 設定の生データ
	 * 
	 * @access protected
	 * @ignore
	 * @var mixed
	 */
	protected $m_rawSettings;
	
	/**
	 * @ignore
	 * @access protected
	 * @var string
	 */
	protected $m_rawSettingsHash;
	
	/**
	 * サービスクラス
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_serviceClass;
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPath()
	{
		return "/appliance";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey()
	{
		return "Appliance";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM()
	{
		return "Appliances";
	}
	
	/**
	 * @private
	 * @access public
	 * @ignore
	 * @return string
	 */
	public function _className()
	{
		return "Appliance";
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
	 * @return \Saklient\Cloud\Resources\Appliance this
	 */
	public function save()
	{
		return $this->_save();
	}
	
	/**
	 * 最新のリソース情報を再取得します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\Appliance this
	 */
	public function reload()
	{
		return $this->_reload();
	}
	
	/**
	 * @ignore
	 * @access public
	 * @return string
	 */
	public function trueClassName()
	{
		switch ($this->get_clazz()) {
			case "loadbalancer": {
				return "LoadBalancer";
			}
			case "vpcrouter": {
				return "VpcRouter";
			}
		}
		
		return null;
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
	 * @private
	 * @access protected
	 * @ignore
	 * @param mixed $query
	 * @return void
	 */
	protected function _onBeforeSave($query)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::setByPath($query, "OriginalSettingsHash", $this->get_rawSettingsHash());
	}
	
	/**
	 * アプライアンスを起動します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\Appliance this
	 */
	public function boot()
	{
		$this->_client->request("PUT", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/power");
		return $this;
	}
	
	/**
	 * アプライアンスをシャットダウンします。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\Appliance this
	 */
	public function shutdown()
	{
		$this->_client->request("DELETE", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/power");
		return $this;
	}
	
	/**
	 * アプライアンスを強制停止します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\Appliance this
	 */
	public function stop()
	{
		$this->_client->request("DELETE", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/power", (object)['Force' => true]);
		return $this;
	}
	
	/**
	 * アプライアンスを強制再起動します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\Appliance this
	 */
	public function reboot()
	{
		$this->_client->request("PUT", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/reset");
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
	private $n_clazz = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_clazz()
	{
		return $this->m_clazz;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	private function set_clazz($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "string");
		if (!$this->isNew) {
			throw new SaklientException("immutable_field", "Immutable fields cannot be modified after the resource creation: " . "Saklient\\Cloud\\Resources\\Appliance#clazz");
		}
		$this->m_clazz = $v;
		$this->n_clazz = true;
		return $this->m_clazz;
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
	private $n_ifaces = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return \Saklient\Cloud\Resources\Iface[]
	 */
	private function get_ifaces()
	{
		return $this->m_ifaces;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_annotation = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return mixed
	 */
	private function get_annotation()
	{
		return $this->m_annotation;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_rawSettings = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return mixed
	 */
	private function get_rawSettings()
	{
		$this->n_rawSettings = true;
		return $this->m_rawSettings;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @param mixed $v
	 * @return mixed
	 */
	private function set_rawSettings($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		$this->m_rawSettings = $v;
		$this->n_rawSettings = true;
		return $this->m_rawSettings;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_rawSettingsHash = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_rawSettingsHash()
	{
		return $this->m_rawSettingsHash;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_serviceClass = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_serviceClass()
	{
		return $this->m_serviceClass;
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
		if (Util::existsPath($r, "Class")) {
			$this->m_clazz = Util::getByPath($r, "Class") == null ? null : "" . Util::getByPath($r, "Class");
		}
		else {
			$this->m_clazz = null;
			$this->isIncomplete = true;
		}
		$this->n_clazz = false;
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
		if (Util::existsPath($r, "Interfaces")) {
			if (Util::getByPath($r, "Interfaces") == null) {
				$this->m_ifaces = new \ArrayObject([]);
			}
			else {
				$this->m_ifaces = new \ArrayObject([]);
				foreach (Util::getByPath($r, "Interfaces") as $t) {
					$v2 = null;
					$v2 = $t == null ? null : new Iface($this->_client, $t);
					$this->m_ifaces->append($v2);
				}
			}
		}
		else {
			$this->m_ifaces = null;
			$this->isIncomplete = true;
		}
		$this->n_ifaces = false;
		if (Util::existsPath($r, "Remark")) {
			$this->m_annotation = Util::getByPath($r, "Remark");
		}
		else {
			$this->m_annotation = null;
			$this->isIncomplete = true;
		}
		$this->n_annotation = false;
		if (Util::existsPath($r, "Settings")) {
			$this->m_rawSettings = Util::getByPath($r, "Settings");
		}
		else {
			$this->m_rawSettings = null;
			$this->isIncomplete = true;
		}
		$this->n_rawSettings = false;
		if (Util::existsPath($r, "SettingsHash")) {
			$this->m_rawSettingsHash = Util::getByPath($r, "SettingsHash") == null ? null : "" . Util::getByPath($r, "SettingsHash");
		}
		else {
			$this->m_rawSettingsHash = null;
			$this->isIncomplete = true;
		}
		$this->n_rawSettingsHash = false;
		if (Util::existsPath($r, "ServiceClass")) {
			$this->m_serviceClass = Util::getByPath($r, "ServiceClass") == null ? null : "" . Util::getByPath($r, "ServiceClass");
		}
		else {
			$this->m_serviceClass = null;
			$this->isIncomplete = true;
		}
		$this->n_serviceClass = false;
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
		if ($withClean || $this->n_clazz) {
			Util::setByPath($ret, "Class", $this->m_clazz);
		}
		else {
			if ($this->isNew) {
				$missing->append("clazz");
			}
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
		if ($withClean || $this->n_ifaces) {
			Util::setByPath($ret, "Interfaces", new \ArrayObject([]));
			foreach ($this->m_ifaces as $r2) {
				$v = null;
				$v = $withClean ? ($r2 == null ? null : $r2->apiSerialize($withClean)) : ($r2 == null ? (object)['ID' => "0"] : $r2->apiSerializeID());
				$ret->{"Interfaces"}->append($v);
			}
		}
		if ($withClean || $this->n_annotation) {
			Util::setByPath($ret, "Remark", $this->m_annotation);
		}
		if ($withClean || $this->n_rawSettings) {
			Util::setByPath($ret, "Settings", $this->m_rawSettings);
		}
		if ($withClean || $this->n_rawSettingsHash) {
			Util::setByPath($ret, "SettingsHash", $this->m_rawSettingsHash);
		}
		if ($withClean || $this->n_serviceClass) {
			Util::setByPath($ret, "ServiceClass", $this->m_serviceClass);
		}
		if ($missing->count() > 0) {
			throw new SaklientException("required_field", "Required fields must be set before the Appliance creation: " . implode(", ", (array)($missing)));
		}
		return $ret;
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "id": return $this->get_id();
			case "clazz": return $this->get_clazz();
			case "name": return $this->get_name();
			case "description": return $this->get_description();
			case "tags": return $this->get_tags();
			case "icon": return $this->get_icon();
			case "ifaces": return $this->get_ifaces();
			case "annotation": return $this->get_annotation();
			case "rawSettings": return $this->get_rawSettings();
			case "rawSettingsHash": return $this->get_rawSettingsHash();
			case "serviceClass": return $this->get_serviceClass();
			default: return parent::__get($key);
		}
	}
	
	/**
	 * @ignore
	 */
	public function __set($key, $v) {
		switch ($key) {
			case "clazz": return $this->set_clazz($v);
			case "name": return $this->set_name($v);
			case "description": return $this->set_description($v);
			case "tags": return $this->set_tags($v);
			case "icon": return $this->set_icon($v);
			case "rawSettings": return $this->set_rawSettings($v);
			default: return parent::__set($key, $v);
		}
	}

}

