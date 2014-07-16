<?php

namespace SakuraInternet\Saclient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Client.php";
use \SakuraInternet\Saclient\Cloud\Client;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Resource.php";
use \SakuraInternet\Saclient\Cloud\Resource\Resource;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Icon.php";
use \SakuraInternet\Saclient\Cloud\Resource\Icon;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Disk.php";
use \SakuraInternet\Saclient\Cloud\Resource\Disk;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Iface.php";
use \SakuraInternet\Saclient\Cloud\Resource\Iface;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/ServerPlan.php";
use \SakuraInternet\Saclient\Cloud\Resource\ServerPlan;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/ServerInstance.php";
use \SakuraInternet\Saclient\Cloud\Resource\ServerInstance;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Enums/EServerInstanceStatus.php";
use \SakuraInternet\Saclient\Cloud\Enums\EServerInstanceStatus;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * サーバのリソース情報へのアクセス機能や操作機能を備えたクラス。
 * 
 * @property-read string $id
 * @property string $name
 * @property string $description
 * @property string[] $tags
 * @property \SakuraInternet\Saclient\Cloud\Resource\Icon $icon
 * @property \SakuraInternet\Saclient\Cloud\Resource\ServerPlan $plan
 * @property-read \SakuraInternet\Saclient\Cloud\Resource\Iface[] $ifaces
 * @property-read \SakuraInternet\Saclient\Cloud\Resource\ServerInstance $instance
 * @property-read string $availability
 */
class Server extends Resource {
	
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
	 * プラン
	 * 
	 * @access protected
	 * @ignore
	 * @var ServerPlan
	 */
	protected $m_plan;
	
	/**
	 * インタフェース
	 * 
	 * @access protected
	 * @ignore
	 * @var Iface[]
	 */
	protected $m_ifaces;
	
	/**
	 * インスタンス情報
	 * 
	 * @access protected
	 * @ignore
	 * @var ServerInstance
	 */
	protected $m_instance;
	
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
		return "/server";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey()
	{
		return "Server";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM()
	{
		return "Servers";
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
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Server this
	 */
	public function save()
	{
		return $this->_save();
	}
	
	/**
	 * 最新のリソース情報を再取得します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Server this
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
	 * サーバが起動しているときtrueを返します。
	 * 
	 * @access public
	 * @return boolean
	 */
	public function isUp()
	{
		return $this->get_instance()->isUp();
	}
	
	/**
	 * サーバが停止しているときtrueを返します。
	 * 
	 * @access public
	 * @return boolean
	 */
	public function isDown()
	{
		return $this->get_instance()->isDown();
	}
	
	/**
	 * サーバを起動します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Server
	 */
	public function boot()
	{
		$this->_client->request("PUT", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/power");
		return $this->reload();
	}
	
	/**
	 * サーバをシャットダウンします。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Server
	 */
	public function shutdown()
	{
		$this->_client->request("DELETE", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/power");
		return $this->reload();
	}
	
	/**
	 * サーバを強制停止します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Server
	 */
	public function stop()
	{
		$this->_client->request("DELETE", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/power", (object)['Force' => true]);
		return $this->reload();
	}
	
	/**
	 * サーバを強制再起動します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Server
	 */
	public function reboot()
	{
		$this->_client->request("PUT", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/reset");
		return $this->reload();
	}
	
	/**
	 * サーバが停止するまで待機します。
	 * 
	 * @access public
	 * @param int $timeoutSec
	 * @param (Server, boolean) => void $callback
	 * @return void
	 */
	public function afterDown($timeoutSec, $callback)
	{
		$this->afterStatus(EServerInstanceStatus::down, $timeoutSec, $callback);
	}
	
	/**
	 * サーバが指定のステータスに遷移するまで待機します。
	 * 
	 * @ignore
	 * @access private
	 * @param int $timeoutSec
	 * @param string $status
	 * @param (Server, boolean) => void $callback
	 * @return void
	 */
	private function afterStatus($status, $timeoutSec, $callback)
	{
		$ret = $this->sleepUntil($status, $timeoutSec);
		$callback($this, $ret);
	}
	
	/**
	 * サーバが停止するまで待機します。
	 * 
	 * @access public
	 * @param int $timeoutSec = 180
	 * @return boolean
	 */
	public function sleepUntilDown($timeoutSec=180)
	{
		return $this->sleepUntil(EServerInstanceStatus::down, $timeoutSec);
	}
	
	/**
	 * サーバが指定のステータスに遷移するまで待機します。
	 * 
	 * @ignore
	 * @access private
	 * @param int $timeoutSec = 180
	 * @param string $status
	 * @return boolean
	 */
	private function sleepUntil($status, $timeoutSec=180)
	{
		$step = 3;
		while (0 < $timeoutSec) {
			$this->reload();
			$s = $this->get_instance()->status;
			if ($s == null) {
				$s = EServerInstanceStatus::down;
			}
			if ($s == $status) {
				return true;
			}
			$timeoutSec -= $step;
			if (0 < $timeoutSec) {
				Util::sleep($step);
			}
		}
		return false;
	}
	
	/**
	 * サーバのプランを変更します。
	 * 
	 * @access public
	 * @param \SakuraInternet\Saclient\Cloud\Resource\ServerPlan $planTo
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Server
	 */
	public function changePlan(\SakuraInternet\Saclient\Cloud\Resource\ServerPlan $planTo)
	{
		$path = $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/to/plan/" . Util::urlEncode($planTo->_id());
		$result = $this->_client->request("PUT", $path);
		$this->apiDeserialize($result->{$this->_rootKey()});
		return $this;
	}
	
	/**
	 * サーバに接続されているディスクのリストを取得します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Disk[]
	 */
	public function findDisks()
	{
		$model = Util::createClassInstance("saclient.cloud.model.Model_Disk", new \ArrayObject([$this->_client]));
		return $model->withServerId($this->_id())->find();
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
	private $n_plan = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Resource\ServerPlan
	 */
	private function get_plan()
	{
		return $this->m_plan;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @param \SakuraInternet\Saclient\Cloud\Resource\ServerPlan $v
	 * @return \SakuraInternet\Saclient\Cloud\Resource\ServerPlan
	 */
	private function set_plan(\SakuraInternet\Saclient\Cloud\Resource\ServerPlan $v)
	{
		$this->m_plan = $v;
		$this->n_plan = true;
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
	private $n_ifaces = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Iface[]
	 */
	private function get_ifaces()
	{
		return $this->m_ifaces;
	}
	
	/**
	 * インタフェース
	 */
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_instance = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Resource\ServerInstance
	 */
	private function get_instance()
	{
		return $this->m_instance;
	}
	
	/**
	 * インスタンス情報
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
		if (array_key_exists("ServerPlan", $r)) {
			$this->m_plan = $r->{"ServerPlan"} == null ? null : new ServerPlan($this->_client, $r->{"ServerPlan"});
		}
		else {
			$this->m_plan = null;
			$this->isIncomplete = true;
		}
		$this->n_plan = false;
		if (array_key_exists("Interfaces", $r)) {
			if ($r->{"Interfaces"} == null) {
				$this->m_ifaces = new \ArrayObject([]);
			}
			else {
				$this->m_ifaces = new \ArrayObject([]);
				foreach ($r->{"Interfaces"} as $t) {
					$v = null;
					$v = $t == null ? null : new Iface($this->_client, $t);
					$this->m_ifaces->append($v);
				}
			}
		}
		else {
			$this->m_ifaces = null;
			$this->isIncomplete = true;
		}
		$this->n_ifaces = false;
		if (array_key_exists("Instance", $r)) {
			$this->m_instance = $r->{"Instance"} == null ? null : new ServerInstance($this->_client, $r->{"Instance"});
		}
		else {
			$this->m_instance = null;
			$this->isIncomplete = true;
		}
		$this->n_instance = false;
		if (array_key_exists("Availability", $r)) {
			$this->m_availability = $r->{"Availability"} == null ? null : "" . $r->{"Availability"};
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
		if ($withClean || $this->n_plan) {
			$ret->{"ServerPlan"} = $withClean ? ($this->m_plan == null ? null : $this->m_plan->apiSerialize($withClean)) : ($this->m_plan == null ? (object)['ID' => "0"] : $this->m_plan->apiSerializeID());
		}
		if ($withClean || $this->n_ifaces) {
			$ret->{"Interfaces"} = new \ArrayObject([]);
			foreach ($this->m_ifaces as $r) {
				$v = null;
				$v = $withClean ? ($r == null ? null : $r->apiSerialize($withClean)) : ($r == null ? (object)['ID' => "0"] : $r->apiSerializeID());
				$ret->{"Interfaces"}->append($v);
			}
		}
		if ($withClean || $this->n_instance) {
			$ret->{"Instance"} = $withClean ? ($this->m_instance == null ? null : $this->m_instance->apiSerialize($withClean)) : ($this->m_instance == null ? (object)['ID' => "0"] : $this->m_instance->apiSerializeID());
		}
		if ($withClean || $this->n_availability) {
			$ret->{"Availability"} = $this->m_availability;
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
			case "plan": return $this->get_plan();
			case "ifaces": return $this->get_ifaces();
			case "instance": return $this->get_instance();
			case "availability": return $this->get_availability();
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
			case "plan": return $this->set_plan($v);
			default: return $v;
		}
	}

}

