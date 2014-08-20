<?php

namespace Saklient\Cloud\Resource;

require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;
require_once __DIR__ . "/../../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../../Saklient/Cloud/Resource/Resource.php";
use \Saklient\Cloud\Resource\Resource;
require_once __DIR__ . "/../../../Saklient/Cloud/Resource/Icon.php";
use \Saklient\Cloud\Resource\Icon;
require_once __DIR__ . "/../../../Saklient/Cloud/Resource/Disk.php";
use \Saklient\Cloud\Resource\Disk;
require_once __DIR__ . "/../../../Saklient/Cloud/Resource/Iface.php";
use \Saklient\Cloud\Resource\Iface;
require_once __DIR__ . "/../../../Saklient/Cloud/Resource/ServerPlan.php";
use \Saklient\Cloud\Resource\ServerPlan;
require_once __DIR__ . "/../../../Saklient/Cloud/Resource/ServerInstance.php";
use \Saklient\Cloud\Resource\ServerInstance;
require_once __DIR__ . "/../../../Saklient/Cloud/Resource/IsoImage.php";
use \Saklient\Cloud\Resource\IsoImage;
require_once __DIR__ . "/../../../Saklient/Cloud/Enums/EServerInstanceStatus.php";
use \Saklient\Cloud\Enums\EServerInstanceStatus;
require_once __DIR__ . "/../../../Saklient/Cloud/Enums/EAvailability.php";
use \Saklient\Cloud\Enums\EAvailability;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/**
 * サーバの実体1つに対応し、属性の取得や操作を行うためのクラス。
 * 
 * @property-read string $id ID 
 * @property string $name 名前 
 * @property string $description 説明 
 * @property \ArrayObject $tags タグ 
 * @property \Saklient\Cloud\Resource\Icon $icon アイコン 
 * @property \Saklient\Cloud\Resource\ServerPlan $plan プラン 
 * @property-read \ArrayObject $ifaces インタフェース 
 * @property-read \Saklient\Cloud\Resource\ServerInstance $instance インスタンス情報 
 * @property-read string $availability 有効状態 {@link \Saklient\Cloud\Enums\EAvailability} 
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
	 * 有効状態 {@link \Saklient\Cloud\Enums\EAvailability}
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
	 * @ignore
	 * @return string
	 */
	public function _className()
	{
		return "Server";
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
	 * @return \Saklient\Cloud\Resource\Server this
	 */
	public function save()
	{
		return $this->_save();
	}
	
	/**
	 * 最新のリソース情報を再取得します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resource\Server this
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
	 * @return \Saklient\Cloud\Resource\Server this
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
	 * @return \Saklient\Cloud\Resource\Server this
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
	 * @return \Saklient\Cloud\Resource\Server this
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
	 * @return \Saklient\Cloud\Resource\Server this
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
	 * @param callback $callback
	 * @return void 成功時はtrue、タイムアウトやエラーによる失敗時はfalseを返します。
	 */
	public function afterDown($timeoutSec, $callback)
	{
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($timeoutSec, "int");
		Util::validateType($callback, "callback");
		$this->afterStatus(EServerInstanceStatus::down, $timeoutSec, $callback);
	}
	
	/**
	 * サーバが指定のステータスに遷移するまで待機します。
	 * 
	 * @ignore
	 * @access private
	 * @param string $status
	 * @param int $timeoutSec
	 * @param callback $callback
	 * @return void
	 */
	private function afterStatus($status, $timeoutSec, $callback)
	{
		Util::validateArgCount(func_num_args(), 3);
		Util::validateType($status, "string");
		Util::validateType($timeoutSec, "int");
		Util::validateType($callback, "callback");
		$ret = $this->sleepUntil($status, $timeoutSec);
		$callback($this, $ret);
	}
	
	/**
	 * サーバが停止するまで待機します。
	 * 
	 * @access public
	 * @param int $timeoutSec=180
	 * @return boolean 成功時はtrue、タイムアウトやエラーによる失敗時はfalseを返します。
	 */
	public function sleepUntilDown($timeoutSec=180)
	{
		Util::validateType($timeoutSec, "int");
		return $this->sleepUntil(EServerInstanceStatus::down, $timeoutSec);
	}
	
	/**
	 * サーバが指定のステータスに遷移するまで待機します。
	 * 
	 * @ignore
	 * @access private
	 * @param string $status
	 * @param int $timeoutSec=180
	 * @return boolean
	 */
	private function sleepUntil($status, $timeoutSec=180)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($status, "string");
		Util::validateType($timeoutSec, "int");
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
	 * サーバプランを変更します。
	 * 
	 * 成功時はリソースIDが変わることにご注意ください。
	 * 
	 * @access public
	 * @param \Saklient\Cloud\Resource\ServerPlan $planTo
	 * @return \Saklient\Cloud\Resource\Server this
	 */
	public function changePlan(\Saklient\Cloud\Resource\ServerPlan $planTo)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($planTo, "\\Saklient\\Cloud\\Resource\\ServerPlan");
		$path = $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/to/plan/" . Util::urlEncode($planTo->_id());
		$result = $this->_client->request("PUT", $path);
		$this->apiDeserialize($result, true);
		return $this;
	}
	
	/**
	 * サーバに接続されているディスクのリストを取得します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resource\Disk[]
	 */
	public function findDisks()
	{
		$model = Util::createClassInstance("saklient.cloud.model.Model_Disk", new \ArrayObject([$this->_client]));
		return $model->withServerId($this->_id())->find();
	}
	
	/**
	 * サーバにインタフェースを1つ増設し、それを取得します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resource\Iface 増設されたインタフェース
	 */
	public function addIface()
	{
		$model = Util::createClassInstance("saklient.cloud.model.Model_Iface", new \ArrayObject([$this->_client]));
		$res = $model->create();
		$res->setProperty("serverId", $this->_id());
		return $res->save();
	}
	
	/**
	 * サーバにISOイメージを挿入します。
	 * 
	 * @access public
	 * @param \Saklient\Cloud\Resource\IsoImage $iso
	 * @return \Saklient\Cloud\Resource\Server this
	 */
	public function insertIsoImage(\Saklient\Cloud\Resource\IsoImage $iso)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($iso, "\\Saklient\\Cloud\\Resource\\IsoImage");
		$path = $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/cdrom";
		$q = (object)['CDROM' => (object)['ID' => $iso->_id()]];
		$result = $this->_client->request("PUT", $path, $q);
		$this->reload();
		return $this;
	}
	
	/**
	 * サーバに挿入されているISOイメージを排出します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resource\Server this
	 */
	public function ejectIsoImage()
	{
		$path = $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/cdrom";
		$result = $this->_client->request("DELETE", $path);
		$this->reload();
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
	 * @return \Saklient\Cloud\Resource\Icon
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
	 * @param \Saklient\Cloud\Resource\Icon|null $v
	 * @return \Saklient\Cloud\Resource\Icon
	 */
	private function set_icon(\Saklient\Cloud\Resource\Icon $v=null)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "\\Saklient\\Cloud\\Resource\\Icon");
		$this->m_icon = $v;
		$this->n_icon = true;
		return $this->m_icon;
	}
	
	
	
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
	 * @return \Saklient\Cloud\Resource\ServerPlan
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
	 * @param \Saklient\Cloud\Resource\ServerPlan $v
	 * @return \Saklient\Cloud\Resource\ServerPlan
	 */
	private function set_plan(\Saklient\Cloud\Resource\ServerPlan $v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "\\Saklient\\Cloud\\Resource\\ServerPlan");
		if (!$this->isNew) {
			throw new SaklientException("immutable_field", "Immutable fields cannot be modified after the resource creation: " . "Saklient\\Cloud\\Resource\\Server#plan");
		}
		$this->m_plan = $v;
		$this->n_plan = true;
		return $this->m_plan;
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
	 * @return \Saklient\Cloud\Resource\Iface[]
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
	private $n_instance = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return \Saklient\Cloud\Resource\ServerInstance
	 */
	private function get_instance()
	{
		return $this->m_instance;
	}
	
	
	
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
		if (Util::existsPath($r, "ServerPlan")) {
			$this->m_plan = Util::getByPath($r, "ServerPlan") == null ? null : new ServerPlan($this->_client, Util::getByPath($r, "ServerPlan"));
		}
		else {
			$this->m_plan = null;
			$this->isIncomplete = true;
		}
		$this->n_plan = false;
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
		if (Util::existsPath($r, "Instance")) {
			$this->m_instance = Util::getByPath($r, "Instance") == null ? null : new ServerInstance($this->_client, Util::getByPath($r, "Instance"));
		}
		else {
			$this->m_instance = null;
			$this->isIncomplete = true;
		}
		$this->n_instance = false;
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
		if ($withClean || $this->n_plan) {
			Util::setByPath($ret, "ServerPlan", $withClean ? ($this->m_plan == null ? null : $this->m_plan->apiSerialize($withClean)) : ($this->m_plan == null ? (object)['ID' => "0"] : $this->m_plan->apiSerializeID()));
		}
		else {
			if ($this->isNew) {
				$missing->append("plan");
			}
		}
		if ($withClean || $this->n_ifaces) {
			Util::setByPath($ret, "Interfaces", new \ArrayObject([]));
			foreach ($this->m_ifaces as $r2) {
				$v = null;
				$v = $withClean ? ($r2 == null ? null : $r2->apiSerialize($withClean)) : ($r2 == null ? (object)['ID' => "0"] : $r2->apiSerializeID());
				$ret->{"Interfaces"}->append($v);
			}
		}
		if ($withClean || $this->n_instance) {
			Util::setByPath($ret, "Instance", $withClean ? ($this->m_instance == null ? null : $this->m_instance->apiSerialize($withClean)) : ($this->m_instance == null ? (object)['ID' => "0"] : $this->m_instance->apiSerializeID()));
		}
		if ($withClean || $this->n_availability) {
			Util::setByPath($ret, "Availability", $this->m_availability);
		}
		if ($missing->count() > 0) {
			throw new SaklientException("required_field", "Required fields must be set before the Server creation: " . implode(", ", (array)($missing)));
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
			default: throw new SaklientException('non_writable_field', 'Non-writable field: Saklient\\Cloud\\Resource\\Server#'.$key);
		}
	}

}

