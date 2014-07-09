<?php

namespace SakuraInternet\Saclient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Client.php";
use \SakuraInternet\Saclient\Cloud\Client;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Resource.php";
use \SakuraInternet\Saclient\Cloud\Resource\Resource;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Icon.php";
use \SakuraInternet\Saclient\Cloud\Resource\Icon;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/DiskPlan.php";
use \SakuraInternet\Saclient\Cloud\Resource\DiskPlan;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Server.php";
use \SakuraInternet\Saclient\Cloud\Resource\Server;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Enums/EDiskConnection.php";
use \SakuraInternet\Saclient\Cloud\Enums\EDiskConnection;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * ディスクのリソース情報へのアクセス機能や操作機能を備えたクラス。
 * 
 * @property-read int $sizeGib
 * @property-read string $id
 * @property string $name
 * @property string $description
 * @property string[] $tags
 * @property \SakuraInternet\Saclient\Cloud\Resource\Icon $icon
 * @property-read int $sizeMib
 * @property-read string $serviceClass
 * @property-read \SakuraInternet\Saclient\Cloud\Resource\DiskPlan $plan
 * @property-read \SakuraInternet\Saclient\Cloud\Resource\Server $server
 */
class Disk extends Resource {
	
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
	 * プラン
	 * 
	 * @access protected
	 * @ignore
	 * @var DiskPlan
	 */
	protected $m_plan;
	
	/**
	 * 接続先のサーバ
	 * 
	 * @access protected
	 * @ignore
	 * @var Server
	 */
	protected $m_server;
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPath()
	{
		return "/disk";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey()
	{
		return "Disk";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM()
	{
		return "Disks";
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
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Disk this
	 */
	public function save()
	{
		return $this->_save();
	}
	
	/**
	 * 最新のリソース情報を再取得します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Disk this
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
		$this->apiDeserialize($r);
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
	 * ディスクをサーバに取り付けます。
	 * 
	 * @access public
	 * @param string $serverId
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Disk
	 */
	public function attachTo($serverId)
	{
		$this->_client->request("PUT", "/disk/" . $this->_id() . "/to/server/" . $serverId);
		return $this;
	}
	
	/**
	 * ディスクをサーバから取り外します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Disk
	 */
	public function detach()
	{
		$this->_client->request("DELETE", "/disk/" . $this->_id() . "/to/server");
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
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_plan = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Resource\DiskPlan
	 */
	private function get_plan()
	{
		return $this->m_plan;
	}
	
	/**
	 * プラン
	 */
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_server = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Server
	 */
	private function get_server()
	{
		return $this->m_server;
	}
	
	/**
	 * 接続先のサーバ
	 */
	
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access public
	 * @param mixed $r
	 */
	public function apiDeserialize($r)
	{
		$this->isNew = $r == null;
		if ($this->isNew) {
			$r = (object)[];
		}
		$this->isIncomplete = false;
		if (array_key_exists("ID", $r)) {
			$this->m_id = $r->{"ID"} == null ? null : "" . $r->{"ID"};
		}
		else {
			$this->m_id = null;
			$this->isIncomplete = true;
		}
		$this->n_id = false;
		if (array_key_exists("Name", $r)) {
			$this->m_name = $r->{"Name"} == null ? null : "" . $r->{"Name"};
		}
		else {
			$this->m_name = null;
			$this->isIncomplete = true;
		}
		$this->n_name = false;
		if (array_key_exists("Description", $r)) {
			$this->m_description = $r->{"Description"} == null ? null : "" . $r->{"Description"};
		}
		else {
			$this->m_description = null;
			$this->isIncomplete = true;
		}
		$this->n_description = false;
		if (array_key_exists("Tags", $r)) {
			if ($r->{"Tags"} == null) {
				$this->m_tags = new \ArrayObject([]);
			}
			else {
				$this->m_tags = new \ArrayObject([]);
				foreach ($r->{"Tags"} as $t) {
					$v = null;
					$v = $t == null ? null : "" . $t;
					$this->m_tags->append($v);
				}
			}
		}
		else {
			$this->m_tags = null;
			$this->isIncomplete = true;
		}
		$this->n_tags = false;
		if (array_key_exists("Icon", $r)) {
			$this->m_icon = $r->{"Icon"} == null ? null : new Icon($this->_client, $r->{"Icon"});
		}
		else {
			$this->m_icon = null;
			$this->isIncomplete = true;
		}
		$this->n_icon = false;
		if (array_key_exists("SizeMB", $r)) {
			$this->m_sizeMib = $r->{"SizeMB"} == null ? null : intval("" . $r->{"SizeMB"});
		}
		else {
			$this->m_sizeMib = null;
			$this->isIncomplete = true;
		}
		$this->n_sizeMib = false;
		if (array_key_exists("ServiceClass", $r)) {
			$this->m_serviceClass = $r->{"ServiceClass"} == null ? null : "" . $r->{"ServiceClass"};
		}
		else {
			$this->m_serviceClass = null;
			$this->isIncomplete = true;
		}
		$this->n_serviceClass = false;
		if (array_key_exists("Plan", $r)) {
			$this->m_plan = $r->{"Plan"} == null ? null : new DiskPlan($this->_client, $r->{"Plan"});
		}
		else {
			$this->m_plan = null;
			$this->isIncomplete = true;
		}
		$this->n_plan = false;
		if (array_key_exists("Server", $r)) {
			$this->m_server = $r->{"Server"} == null ? null : new Server($this->_client, $r->{"Server"});
		}
		else {
			$this->m_server = null;
			$this->isIncomplete = true;
		}
		$this->n_server = false;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access public
	 * @param boolean $withClean = false
	 * @return mixed
	 */
	public function apiSerialize($withClean=false)
	{
		$ret = (object)[];
		if ($withClean || $this->n_id) {
			$ret->{"ID"} = $this->m_id;
		}
		if ($withClean || $this->n_name) {
			$ret->{"Name"} = $this->m_name;
		}
		if ($withClean || $this->n_description) {
			$ret->{"Description"} = $this->m_description;
		}
		if ($withClean || $this->n_tags) {
			$ret->{"Tags"} = new \ArrayObject([]);
			foreach ($this->m_tags as $r) {
				$v = null;
				$v = $r;
				$ret->{"Tags"}->append($v);
			}
		}
		if ($withClean || $this->n_icon) {
			$ret->{"Icon"} = $withClean ? ($this->m_icon == null ? null : $this->m_icon->apiSerialize($withClean)) : ($this->m_icon == null ? (object)['ID' => "0"] : $this->m_icon->apiSerializeID());
		}
		if ($withClean || $this->n_sizeMib) {
			$ret->{"SizeMB"} = $this->m_sizeMib;
		}
		if ($withClean || $this->n_serviceClass) {
			$ret->{"ServiceClass"} = $this->m_serviceClass;
		}
		if ($withClean || $this->n_plan) {
			$ret->{"Plan"} = $withClean ? ($this->m_plan == null ? null : $this->m_plan->apiSerialize($withClean)) : ($this->m_plan == null ? (object)['ID' => "0"] : $this->m_plan->apiSerializeID());
		}
		if ($withClean || $this->n_server) {
			$ret->{"Server"} = $withClean ? ($this->m_server == null ? null : $this->m_server->apiSerialize($withClean)) : ($this->m_server == null ? (object)['ID' => "0"] : $this->m_server->apiSerializeID());
		}
		return $ret;
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "sizeGib": return $this->get_sizeGib();
			case "id": return $this->get_id();
			case "name": return $this->get_name();
			case "description": return $this->get_description();
			case "tags": return $this->get_tags();
			case "icon": return $this->get_icon();
			case "sizeMib": return $this->get_sizeMib();
			case "serviceClass": return $this->get_serviceClass();
			case "plan": return $this->get_plan();
			case "server": return $this->get_server();
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
			case "tags": return $this->set_tags($v);
			case "icon": return $this->set_icon($v);
			default: return $v;
		}
	}

}

