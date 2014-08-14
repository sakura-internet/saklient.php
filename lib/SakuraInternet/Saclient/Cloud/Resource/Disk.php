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
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/DiskPlan.php";
use \SakuraInternet\Saclient\Cloud\Resource\DiskPlan;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Server.php";
use \SakuraInternet\Saclient\Cloud\Resource\Server;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Archive.php";
use \SakuraInternet\Saclient\Cloud\Resource\Archive;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/DiskConfig.php";
use \SakuraInternet\Saclient\Cloud\Resource\DiskConfig;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Enums/EAvailability.php";
use \SakuraInternet\Saclient\Cloud\Enums\EAvailability;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Enums/EDiskConnection.php";
use \SakuraInternet\Saclient\Cloud\Enums\EDiskConnection;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * ディスクのリソース情報へのアクセス機能や操作機能を備えたクラス。
 * 
 * @property-read boolean $isAvailable
 * @property int $sizeGib
 * @property mixed $source
 * @property-read string $id
 * @property string $name
 * @property string $description
 * @property string[] $tags
 * @property \SakuraInternet\Saclient\Cloud\Resource\Icon $icon
 * @property int $sizeMib
 * @property-read string $serviceClass
 * @property-read \SakuraInternet\Saclient\Cloud\Resource\DiskPlan $plan
 * @property-read \SakuraInternet\Saclient\Cloud\Resource\Server $server
 * @property-read string $availability
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
	 * 有効状態
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_availability;
	
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
	 * @access protected
	 * @ignore
	 * @return boolean
	 */
	protected function get_isAvailable()
	{
		return $this->get_availability() == EAvailability::available;
	}
	
	/**
	 * ディスクが利用可能なときtrueを返します。
	 */
	
	
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
	 * @access protected
	 * @ignore
	 * @param int $sizeGib
	 * @return int
	 */
	protected function set_sizeGib($sizeGib)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($sizeGib, "int");
		$this->set_sizeMib($sizeGib * 1024);
		return $sizeGib;
	}
	
	/**
	 * サイズ[GiB]
	 */
	
	
	/**
	 * @private
	 * @access private
	 * @ignore
	 * @var mixed
	 */
	private $_source;
	
	/**
	 * @access public
	 * @return mixed
	 */
	public function get_source()
	{
		return $this->_source;
	}
	
	/**
	 * @access public
	 * @param mixed $source
	 * @return mixed
	 */
	public function set_source($source)
	{
		Util::validateArgCount(func_num_args(), 1);
		$this->_source = $source;
		return $source;
	}
	
	/**
	 * ディスクのコピー元
	 */
	
	
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
		if ($r != null) {
			if (array_key_exists("SourceArchive", $r)) {
				$s = $r->{"SourceArchive"};
				if ($s != null) {
					$id = $s->{"ID"};
					if ($id != null) {
						$this->_source = new Archive($this->_client, $s);
					}
				}
			}
			if (array_key_exists("SourceDisk", $r)) {
				$s = $r->{"SourceDisk"};
				if ($s != null) {
					$id = $s->{"ID"};
					if ($id != null) {
						$this->_source = new Disk($this->_client, $s);
					}
				}
			}
		}
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @param boolean $withClean
	 * @param mixed $r
	 * @return void
	 */
	protected function _onAfterApiSerialize($r, $withClean)
	{
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($withClean, "boolean");
		if ($r == null) {
			return;
		}
		if ($this->_source != null) {
			if ($this->_source instanceof Archive) {
				$archive = $this->_source;
				$s = $withClean ? $archive->apiSerialize(true) : (object)['ID' => $archive->_id()];
				$r->{"SourceArchive"} = $s;
			}
			else {
				if ($this->_source instanceof Disk) {
					$disk = $this->_source;
					$s = $withClean ? $disk->apiSerialize(true) : (object)['ID' => $disk->_id()];
					$r->{"SourceDisk"} = $s;
				}
				else {
					$this->_source = null;
					Util::validateType($this->_source, "Disk or Archive", true);
				}
			}
		}
	}
	
	/**
	 * ディスクをサーバに取り付けます。
	 * 
	 * @access public
	 * @param \SakuraInternet\Saclient\Cloud\Resource\Server $server
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Disk
	 */
	public function connectTo(\SakuraInternet\Saclient\Cloud\Resource\Server $server)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($server, "\\SakuraInternet\\Saclient\\Cloud\\Resource\\Server");
		$this->_client->request("PUT", "/disk/" . $this->_id() . "/to/server/" . $server->_id());
		return $this;
	}
	
	/**
	 * ディスクをサーバから取り外します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Disk
	 */
	public function disconnect()
	{
		$this->_client->request("DELETE", "/disk/" . $this->_id() . "/to/server");
		return $this;
	}
	
	/**
	 * *
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\DiskConfig
	 */
	public function createConfig()
	{
		return new DiskConfig($this->_client, $this->_id());
	}
	
	/**
	 * コピー中のディスクが利用可能になるまで待機します。
	 * 
	 * @access public
	 * @param int $timeoutSec
	 * @param callback $callback
	 * @return void
	 */
	public function afterCopy($timeoutSec, $callback)
	{
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($timeoutSec, "int");
		Util::validateType($callback, "callback");
		$ret = $this->sleepWhileCopying($timeoutSec);
		$callback($this, $ret);
	}
	
	/**
	 * コピー中のディスクが利用可能になるまで待機します。
	 * 
	 * @access public
	 * @param int $timeoutSec = 3600
	 * @return boolean
	 */
	public function sleepWhileCopying($timeoutSec=3600)
	{
		Util::validateType($timeoutSec, "int");
		$step = 3;
		while (0 < $timeoutSec) {
			$this->reload();
			$a = $this->get_availability();
			if ($a == EAvailability::available) {
				return true;
			}
			if ($a != EAvailability::migrating) {
				$timeoutSec = 0;
			}
			$timeoutSec -= $step;
			if (0 < $timeoutSec) {
				Util::sleep($step);
			}
		}
		return false;
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
			throw new SaclientException("immutable_field", "Immutable fields cannot be modified after the resource creation: " . "SakuraInternet\\Saclient\\Cloud\\Resource\\Disk#sizeMib");
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
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_availability = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_availability()
	{
		return $this->m_availability;
	}
	
	/**
	 * 有効状態
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
		if (Util::existsPath($r, "Plan")) {
			$this->m_plan = Util::getByPath($r, "Plan") == null ? null : new DiskPlan($this->_client, Util::getByPath($r, "Plan"));
		}
		else {
			$this->m_plan = null;
			$this->isIncomplete = true;
		}
		$this->n_plan = false;
		if (Util::existsPath($r, "Server")) {
			$this->m_server = Util::getByPath($r, "Server") == null ? null : new Server($this->_client, Util::getByPath($r, "Server"));
		}
		else {
			$this->m_server = null;
			$this->isIncomplete = true;
		}
		$this->n_server = false;
		if (Util::existsPath($r, "Availability")) {
			$this->m_availability = Util::getByPath($r, "Availability") == null ? null : "" . Util::getByPath($r, "Availability");
		}
		else {
			$this->m_availability = null;
			$this->isIncomplete = true;
		}
		$this->n_availability = false;
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
		if ($withClean || $this->n_serviceClass) {
			Util::setByPath($ret, "ServiceClass", $this->m_serviceClass);
		}
		if ($withClean || $this->n_plan) {
			Util::setByPath($ret, "Plan", $withClean ? ($this->m_plan == null ? null : $this->m_plan->apiSerialize($withClean)) : ($this->m_plan == null ? (object)['ID' => "0"] : $this->m_plan->apiSerializeID()));
		}
		if ($withClean || $this->n_server) {
			Util::setByPath($ret, "Server", $withClean ? ($this->m_server == null ? null : $this->m_server->apiSerialize($withClean)) : ($this->m_server == null ? (object)['ID' => "0"] : $this->m_server->apiSerializeID()));
		}
		if ($withClean || $this->n_availability) {
			Util::setByPath($ret, "Availability", $this->m_availability);
		}
		return $ret;
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "isAvailable": return $this->get_isAvailable();
			case "sizeGib": return $this->get_sizeGib();
			case "source": return $this->get_source();
			case "id": return $this->get_id();
			case "name": return $this->get_name();
			case "description": return $this->get_description();
			case "tags": return $this->get_tags();
			case "icon": return $this->get_icon();
			case "sizeMib": return $this->get_sizeMib();
			case "serviceClass": return $this->get_serviceClass();
			case "plan": return $this->get_plan();
			case "server": return $this->get_server();
			case "availability": return $this->get_availability();
			default: return null;
		}
	}
	
	/**
	 * @ignore
	 */
	public function __set($key, $v) {
		switch ($key) {
			case "sizeGib": return $this->set_sizeGib($v);
			case "source": return $this->set_source($v);
			case "name": return $this->set_name($v);
			case "description": return $this->set_description($v);
			case "tags": return $this->set_tags($v);
			case "icon": return $this->set_icon($v);
			case "sizeMib": return $this->set_sizeMib($v);
			default: throw new SaclientException('non_writable_field', 'Non-writable field: SakuraInternet\\Saclient\\Cloud\\Resource\\Disk#'.$key);
		}
	}

}

