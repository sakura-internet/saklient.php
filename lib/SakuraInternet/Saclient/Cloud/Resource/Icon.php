<?php

namespace SakuraInternet\Saclient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Client.php";
use \SakuraInternet\Saclient\Cloud\Client;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Resource.php";
use \SakuraInternet\Saclient\Cloud\Resource\Resource;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;
require_once dirname(__FILE__) . "/../../../Saclient/Errors/SaclientException.php";
use \SakuraInternet\Saclient\Errors\SaclientException;

/**
 * アイコンのリソース情報へのアクセス機能や操作機能を備えたクラス。
 * 
 * @property-read string $id
 * @property-read string $scope
 * @property-read string $name
 * @property-read string $url
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
	 * スコープ
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
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Icon this
	 */
	public function save()
	{
		return $this->_save();
	}
	
	/**
	 * 最新のリソース情報を再取得します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Icon this
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
	 * URL
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
		if ($withClean || $this->n_scope) {
			Util::setByPath($ret, "Scope", $this->m_scope);
		}
		if ($withClean || $this->n_name) {
			Util::setByPath($ret, "Name", $this->m_name);
		}
		if ($withClean || $this->n_url) {
			Util::setByPath($ret, "URL", $this->m_url);
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
			default: return null;
		}
	}

}

