<?php

namespace SakuraInternet\Saclient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saclient/Errors/SaclientException.php";
use \SakuraInternet\Saclient\Errors\SaclientException;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Client.php";
use \SakuraInternet\Saclient\Cloud\Client;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Resource.php";
use \SakuraInternet\Saclient\Cloud\Resource\Resource;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Icon.php";
use \SakuraInternet\Saclient\Cloud\Resource\Icon;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * スクリプトのリソース情報へのアクセス機能や操作機能を備えたクラス。
 * 
 * @property-read string $id
 * @property-read string $scope
 * @property string $clazz
 * @property-read string $name
 * @property string $description
 * @property string[] $tags
 * @property \SakuraInternet\Saclient\Cloud\Resource\Icon $icon
 * @property string $content
 * @property mixed $annotation
 */
class Script extends Resource {
	
	/**
	 * ID
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_id;
	
	/**
	 * スコープ
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_scope;
	
	/**
	 * クラス
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
	 * 内容
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_content;
	
	/**
	 * 注釈
	 * 
	 * @access protected
	 * @ignore
	 * @var mixed
	 */
	protected $m_annotation;
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPath()
	{
		return "/note";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey()
	{
		return "Note";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM()
	{
		return "Notes";
	}
	
	/**
	 * @access public
	 * @return string
	 */
	public function className()
	{
		return "Script";
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
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Script this
	 */
	public function save()
	{
		return $this->_save();
	}
	
	/**
	 * 最新のリソース情報を再取得します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Script this
	 */
	public function reload()
	{
		return $this->_reload();
	}
	
	/**
	 * @private
	 * @access public
	 * @param mixed $obj
	 * @param boolean $wrapped = false
	 * @param \SakuraInternet\Saclient\Cloud\Client $client
	 */
	public function __construct(\SakuraInternet\Saclient\Cloud\Client $client, $obj, $wrapped=false)
	{
		parent::__construct($client);
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($client, "\\SakuraInternet\\Saclient\\Cloud\\Client");
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
	 * ID
	 */
	
	
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
	 * スコープ
	 */
	
	
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
		$this->m_clazz = $v;
		$this->n_clazz = true;
		return $this->m_clazz;
	}
	
	/**
	 * クラス
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
	 * タグ
	 */
	
	
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
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Icon
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
	 * @param \SakuraInternet\Saclient\Cloud\Resource\Icon|null $v
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Icon
	 */
	private function set_icon(\SakuraInternet\Saclient\Cloud\Resource\Icon $v=null)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "\\SakuraInternet\\Saclient\\Cloud\\Resource\\Icon");
		$this->m_icon = $v;
		$this->n_icon = true;
		return $this->m_icon;
	}
	
	/**
	 * アイコン
	 */
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_content = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_content()
	{
		return $this->m_content;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	private function set_content($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "string");
		$this->m_content = $v;
		$this->n_content = true;
		return $this->m_content;
	}
	
	/**
	 * 内容
	 */
	
	
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
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @param mixed $v
	 * @return mixed
	 */
	private function set_annotation($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		$this->m_annotation = $v;
		$this->n_annotation = true;
		return $this->m_annotation;
	}
	
	/**
	 * 注釈
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
		if (Util::existsPath($r, "Scope")) {
			$this->m_scope = Util::getByPath($r, "Scope") == null ? null : "" . Util::getByPath($r, "Scope");
		}
		else {
			$this->m_scope = null;
			$this->isIncomplete = true;
		}
		$this->n_scope = false;
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
		if (Util::existsPath($r, "Content")) {
			$this->m_content = Util::getByPath($r, "Content") == null ? null : "" . Util::getByPath($r, "Content");
		}
		else {
			$this->m_content = null;
			$this->isIncomplete = true;
		}
		$this->n_content = false;
		if (Util::existsPath($r, "Remark")) {
			$this->m_annotation = Util::getByPath($r, "Remark");
		}
		else {
			$this->m_annotation = null;
			$this->isIncomplete = true;
		}
		$this->n_annotation = false;
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
		$missing = new \ArrayObject([]);
		$ret = (object)[];
		if ($withClean || $this->n_id) {
			Util::setByPath($ret, "ID", $this->m_id);
		}
		if ($withClean || $this->n_scope) {
			Util::setByPath($ret, "Scope", $this->m_scope);
		}
		if ($withClean || $this->n_clazz) {
			Util::setByPath($ret, "Class", $this->m_clazz);
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
		if ($withClean || $this->n_content) {
			Util::setByPath($ret, "Content", $this->m_content);
		}
		else {
			if ($this->isNew) {
				$missing->append("content");
			}
		}
		if ($withClean || $this->n_annotation) {
			Util::setByPath($ret, "Remark", $this->m_annotation);
		}
		if ($missing->count() > 0) {
			throw new SaclientException("required_field", "Required fields must be set before the Script creation: " . implode(", ", (array)($missing)));
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
			case "clazz": return $this->get_clazz();
			case "name": return $this->get_name();
			case "description": return $this->get_description();
			case "tags": return $this->get_tags();
			case "icon": return $this->get_icon();
			case "content": return $this->get_content();
			case "annotation": return $this->get_annotation();
			default: return null;
		}
	}
	
	/**
	 * @ignore
	 */
	public function __set($key, $v) {
		switch ($key) {
			case "clazz": return $this->set_clazz($v);
			case "description": return $this->set_description($v);
			case "tags": return $this->set_tags($v);
			case "icon": return $this->set_icon($v);
			case "content": return $this->set_content($v);
			case "annotation": return $this->set_annotation($v);
			default: throw new SaclientException('non_writable_field', 'Non-writable field: SakuraInternet\\Saclient\\Cloud\\Resource\\Script#'.$key);
		}
	}

}

