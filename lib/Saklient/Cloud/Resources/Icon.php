<?php

namespace Saklient\Cloud\Resources;

require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;
require_once __DIR__ . "/../../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Resource.php";
use \Saklient\Cloud\Resources\Resource;
require_once __DIR__ . "/../../../Saklient/Cloud/Enums/EScope.php";
use \Saklient\Cloud\Enums\EScope;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/**
 * アイコンの実体1つに対応し、属性の取得や操作を行うためのクラス。
 * 
 * @property-read string $id ID 
 * @property-read string $scope スコープ {@link \Saklient\Cloud\Enums\EScope} 
 * @property string $name 名前 
 * @property-read string $url URL 
 */
class Icon extends Resource {
	
	/**
	 * ID
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_id;
	
	/**
	 * スコープ {@link \Saklient\Cloud\Enums\EScope}
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_scope;
	
	/**
	 * 名前
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_name;
	
	/**
	 * URL
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_url;
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPath()
	{
		return "/icon";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey()
	{
		return "Icon";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM()
	{
		return "Icons";
	}
	
	/**
	 * @private
	 * @access public
	 * @ignore
	 * @return string
	 */
	public function _className()
	{
		return "Icon";
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
	 * @return \Saklient\Cloud\Resources\Icon this
	 */
	public function save()
	{
		return $this->_save();
	}
	
	/**
	 * 最新のリソース情報を再取得します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\Icon this
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
	private $n_scope = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_scope()
	{
		return $this->m_scope;
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
	private $n_url = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_url()
	{
		return $this->m_url;
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
		if (Util::existsPath($r, "Scope")) {
			$this->m_scope = Util::getByPath($r, "Scope") == null ? null : "" . Util::getByPath($r, "Scope");
		}
		else {
			$this->m_scope = null;
			$this->isIncomplete = true;
		}
		$this->n_scope = false;
		if (Util::existsPath($r, "Name")) {
			$this->m_name = Util::getByPath($r, "Name") == null ? null : "" . Util::getByPath($r, "Name");
		}
		else {
			$this->m_name = null;
			$this->isIncomplete = true;
		}
		$this->n_name = false;
		if (Util::existsPath($r, "URL")) {
			$this->m_url = Util::getByPath($r, "URL") == null ? null : "" . Util::getByPath($r, "URL");
		}
		else {
			$this->m_url = null;
			$this->isIncomplete = true;
		}
		$this->n_url = false;
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
		if ($withClean || $this->n_scope) {
			Util::setByPath($ret, "Scope", $this->m_scope);
		}
		if ($withClean || $this->n_name) {
			Util::setByPath($ret, "Name", $this->m_name);
		}
		else {
			if ($this->isNew) {
				$missing->append("name");
			}
		}
		if ($withClean || $this->n_url) {
			Util::setByPath($ret, "URL", $this->m_url);
		}
		if ($missing->count() > 0) {
			throw new SaklientException("required_field", "Required fields must be set before the Icon creation: " . implode(", ", (array)($missing)));
		}
		return $ret;
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "id": return $this->get_id();
			case "scope": return $this->get_scope();
			case "name": return $this->get_name();
			case "url": return $this->get_url();
			default: return parent::__get($key);
		}
	}
	
	/**
	 * @ignore
	 */
	public function __set($key, $v) {
		switch ($key) {
			case "name": return $this->set_name($v);
			default: return parent::__set($key, $v);
		}
	}

}

