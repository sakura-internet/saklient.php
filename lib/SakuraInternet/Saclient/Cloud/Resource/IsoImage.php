<?php

namespace SakuraInternet\Saclient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Client.php";
use \SakuraInternet\Saclient\Cloud\Client;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Resource.php";
use \SakuraInternet\Saclient\Cloud\Resource\Resource;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Icon.php";
use \SakuraInternet\Saclient\Cloud\Resource\Icon;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/FtpInfo.php";
use \SakuraInternet\Saclient\Cloud\Resource\FtpInfo;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Enums/EScope.php";
use \SakuraInternet\Saclient\Cloud\Enums\EScope;
require_once dirname(__FILE__) . "/../../../Saclient/Errors/SaclientException.php";
use \SakuraInternet\Saclient\Errors\SaclientException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * ISOイメージのリソース情報へのアクセス機能や操作機能を備えたクラス。
 * 
 * @property-read int $sizeGib
 * @property-read \SakuraInternet\Saclient\Cloud\Resource\FtpInfo $ftpInfo
 * @property-read string $id
 * @property string $scope
 * @property string $name
 * @property string $description
 * @property string[] $tags
 * @property \SakuraInternet\Saclient\Cloud\Resource\Icon $icon
 * @property int $sizeMib
 * @property-read string $serviceClass
 */
class IsoImage extends Resource {
	
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
	 * サイズ[MiB]
	 * 
	 * @access protected
	 * @ignore
	 * @var int
	 */
	protected $m_sizeMib;
	
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
		return "/cdrom";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey()
	{
		return "CDROM";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM()
	{
		return "CDROMs";
	}
	
	/**
	 * @access public
	 * @return string
	 */
	public function className()
	{
		return "IsoImage";
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
	 * @return \SakuraInternet\Saclient\Cloud\Resource\IsoImage this
	 */
	public function save()
	{
		return $this->_save();
	}
	
	/**
	 * 最新のリソース情報を再取得します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\IsoImage this
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
	 * @private
	 * @access protected
	 * @ignore
	 * @param mixed $root
	 * @param mixed $r
	 * @return void
	 */
	protected function _onAfterApiDeserialize($r, $root)
	{
		Util::validateArgCount(func_num_args(), 2);
		if ($root == null) {
			return;
		}
		if (array_key_exists("FTPServer", $root)) {
			$ftp = $root->{"FTPServer"};
			if ($ftp != null) {
				$this->_ftpInfo = new FtpInfo($ftp);
			}
		}
	}
	
	/**
	 * @access protected
	 * @ignore
	 * @return int
	 */
	protected function get_sizeGib()
	{
		return $this->get_sizeMib() >> 10;
	}
	
	/**
	 * サイズ[GiB]
	 */
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var FtpInfo
	 */
	protected $_ftpInfo;
	
	/**
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\FtpInfo
	 */
	public function get_ftpInfo()
	{
		return $this->_ftpInfo;
	}
	
	/**
	 * FTP情報
	 */
	
	
	/**
	 * @access public
	 * @param boolean $reset = false
	 * @return \SakuraInternet\Saclient\Cloud\Resource\IsoImage
	 */
	public function openFtp($reset=false)
	{
		Util::validateType($reset, "boolean");
		$path = $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/ftp";
		$q = (object)[];
		Util::setByPath($q, "ChangePassword", $reset);
		$result = $this->_client->request("PUT", $path, $q);
		$this->_onAfterApiDeserialize(null, $result);
		return $this;
	}
	
	/**
	 * @access public
	 * @param boolean $reset = false
	 * @return \SakuraInternet\Saclient\Cloud\Resource\IsoImage
	 */
	public function closeFtp($reset=false)
	{
		Util::validateType($reset, "boolean");
		$path = $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/ftp";
		$result = $this->_client->request("DELETE", $path);
		$this->_ftpInfo = null;
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
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	private function set_scope($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "string");
		$this->m_scope = $v;
		$this->n_scope = true;
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
	private $n_sizeMib = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return int
	 */
	private function get_sizeMib()
	{
		return $this->m_sizeMib;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @param int $v
	 * @return int
	 */
	private function set_sizeMib($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "int");
		if (!$this->isNew) {
			throw new SaclientException("immutable_field", "Immutable fields cannot be modified after the resource creation: " . "SakuraInternet\\Saclient\\Cloud\\Resource\\IsoImage#sizeMib");
		}
		$this->m_sizeMib = $v;
		$this->n_sizeMib = true;
		return $this->m_sizeMib;
	}
	
	/**
	 * サイズ[MiB]
	 */
	
	
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
	 * サービスクラス
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
		if (Util::existsPath($r, "SizeMB")) {
			$this->m_sizeMib = Util::getByPath($r, "SizeMB") == null ? null : intval("" . Util::getByPath($r, "SizeMB"));
		}
		else {
			$this->m_sizeMib = null;
			$this->isIncomplete = true;
		}
		$this->n_sizeMib = false;
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
		if ($withClean || $this->n_sizeMib) {
			Util::setByPath($ret, "SizeMB", $this->m_sizeMib);
		}
		else {
			if ($this->isNew) {
				$missing->append("sizeMib");
			}
		}
		if ($withClean || $this->n_serviceClass) {
			Util::setByPath($ret, "ServiceClass", $this->m_serviceClass);
		}
		if ($missing->count() > 0) {
			throw new SaclientException("required_field", "Required fields must be set before the IsoImage creation: " . implode(", ", (array)($missing)));
		}
		return $ret;
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "sizeGib": return $this->get_sizeGib();
			case "ftpInfo": return $this->get_ftpInfo();
			case "id": return $this->get_id();
			case "scope": return $this->get_scope();
			case "name": return $this->get_name();
			case "description": return $this->get_description();
			case "tags": return $this->get_tags();
			case "icon": return $this->get_icon();
			case "sizeMib": return $this->get_sizeMib();
			case "serviceClass": return $this->get_serviceClass();
			default: return null;
		}
	}
	
	/**
	 * @ignore
	 */
	public function __set($key, $v) {
		switch ($key) {
			case "scope": return $this->set_scope($v);
			case "name": return $this->set_name($v);
			case "description": return $this->set_description($v);
			case "tags": return $this->set_tags($v);
			case "icon": return $this->set_icon($v);
			case "sizeMib": return $this->set_sizeMib($v);
			default: throw new SaclientException('non_writable_field', 'Non-writable field: SakuraInternet\\Saclient\\Cloud\\Resource\\IsoImage#'.$key);
		}
	}

}

