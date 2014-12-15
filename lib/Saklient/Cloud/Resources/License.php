<?php

namespace Saklient\Cloud\Resources;

require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;
require_once __DIR__ . "/../../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Resource.php";
use \Saklient\Cloud\Resources\Resource;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/LicenseInfo.php";
use \Saklient\Cloud\Resources\LicenseInfo;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/**
 * ライセンスの実体1つに対応し、属性の取得や操作を行うためのクラス。
 * 
 * @property-read string $id ID 
 * @property string $name 名前 
 * @property \Saklient\Cloud\Resources\LicenseInfo $info ライセンス種別情報 
 */
class License extends Resource {
	
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
	 * ライセンス種別情報
	 * 
	 * @access protected
	 * @ignore
	 * @var LicenseInfo
	 */
	protected $m_info;
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPath()
	{
		return "/license";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey()
	{
		return "License";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM()
	{
		return "Licenses";
	}
	
	/**
	 * @private
	 * @access public
	 * @ignore
	 * @return string
	 */
	public function _className()
	{
		return "License";
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
	 * @return \Saklient\Cloud\Resources\License this
	 */
	public function save()
	{
		return $this->_save();
	}
	
	/**
	 * 最新のリソース情報を再取得します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\License this
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
	private $n_info = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return \Saklient\Cloud\Resources\LicenseInfo
	 */
	private function get_info()
	{
		return $this->m_info;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @param \Saklient\Cloud\Resources\LicenseInfo $v
	 * @return \Saklient\Cloud\Resources\LicenseInfo
	 */
	private function set_info(\Saklient\Cloud\Resources\LicenseInfo $v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "\\Saklient\\Cloud\\Resources\\LicenseInfo");
		if (!$this->isNew) {
			throw new SaklientException("immutable_field", "Immutable fields cannot be modified after the resource creation: " . "Saklient\\Cloud\\Resources\\License#info");
		}
		$this->m_info = $v;
		$this->n_info = true;
		return $this->m_info;
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
		if (Util::existsPath($r, "LicenseInfo")) {
			$this->m_info = Util::getByPath($r, "LicenseInfo") == null ? null : new LicenseInfo($this->_client, Util::getByPath($r, "LicenseInfo"));
		}
		else {
			$this->m_info = null;
			$this->isIncomplete = true;
		}
		$this->n_info = false;
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
		if ($withClean || $this->n_info) {
			Util::setByPath($ret, "LicenseInfo", $withClean ? ($this->m_info == null ? null : $this->m_info->apiSerialize($withClean)) : ($this->m_info == null ? (object)['ID' => "0"] : $this->m_info->apiSerializeID()));
		}
		else {
			if ($this->isNew) {
				$missing->append("info");
			}
		}
		if ($missing->count() > 0) {
			throw new SaklientException("required_field", "Required fields must be set before the License creation: " . implode(", ", (array)($missing)));
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
			case "info": return $this->get_info();
			default: return parent::__get($key);
		}
	}
	
	/**
	 * @ignore
	 */
	public function __set($key, $v) {
		switch ($key) {
			case "name": return $this->set_name($v);
			case "info": return $this->set_info($v);
			default: return parent::__set($key, $v);
		}
	}

}

