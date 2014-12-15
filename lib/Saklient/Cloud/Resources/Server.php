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
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Disk.php";
use \Saklient\Cloud\Resources\Disk;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Iface.php";
use \Saklient\Cloud\Resources\Iface;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/ServerPlan.php";
use \Saklient\Cloud\Resources\ServerPlan;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/ServerInstance.php";
use \Saklient\Cloud\Resources\ServerInstance;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/IsoImage.php";
use \Saklient\Cloud\Resources\IsoImage;
require_once __DIR__ . "/../../../Saklient/Cloud/Enums/EServerInstanceStatus.php";
use \Saklient\Cloud\Enums\EServerInstanceStatus;
require_once __DIR__ . "/../../../Saklient/Cloud/Enums/EAvailability.php";
use \Saklient\Cloud\Enums\EAvailability;
require_once __DIR__ . "/../../../Saklient/Cloud/Models/Model_Disk.php";
use \Saklient\Cloud\Models\Model_Disk;
require_once __DIR__ . "/../../../Saklient/Cloud/Models/Model_Iface.php";
use \Saklient\Cloud\Models\Model_Iface;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/**
 * サーバの実体1つに対応し、属性の取得や操作を行うためのクラス。
 * 
 * @property-read string $id ID 
 * @property string $name 名前 
 * @property string $description 説明 
 * @property \ArrayObject $tags タグ文字列の配列 
 * @property \Saklient\Cloud\Resources\Icon $icon アイコン 
 * @property \Saklient\Cloud\Resources\ServerPlan $plan プラン 
 * @property-read \ArrayObject $ifaces インタフェース 
 * @property-read \Saklient\Cloud\Resources\ServerInstance $instance インスタンス情報 
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
	 * タグ文字列の配列
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
	 * @return \Saklient\Cloud\Resources\Server this
	 */
	public function save()
	{
		return $this->_save();
	}
	
	/**
	 * 最新のリソース情報を再取得します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\Server this
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
	 * @return \Saklient\Cloud\Resources\Server this
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
	 * @return \Saklient\Cloud\Resources\Server this
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
	 * @return \Saklient\Cloud\Resources\Server this
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
	 * @return \Saklient\Cloud\Resources\Server this
	 */
	public function reboot()
	{
		$this->_client->request("PUT", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/reset");
		return $this->reload();
	}
	
	/**
	 * サーバが起動するまで待機します。
	 * 
	 * @access public
	 * @param int $timeoutSec=180
	 * @return boolean
	 */
	public function sleepUntilUp($timeoutSec=180)
	{
		Util::validateType($timeoutSec, "int");
		return $this->sleepUntil(EServerInstanceStatus::up, $timeoutSec);
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
		$step = 10;
		while (0 < $timeoutSec) {
			$this->reload();
			$s = null;
			$inst = $this->instance;
			if ($inst != null) {
				$s = $inst->status;
			}
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
	 * @param \Saklient\Cloud\Resources\ServerPlan $planTo
	 * @return \Saklient\Cloud\Resources\Server this
	 */
	public function changePlan(\Saklient\Cloud\Resources\ServerPlan $planTo)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($planTo, "\\Saklient\\Cloud\\Resources\\ServerPlan");
		$path = $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/to/plan/" . Util::urlEncode($planTo->_id());
		$result = $this->_client->request("PUT", $path);
		$this->apiDeserialize($result, true);
		return $this;
	}
	
	/**
	 * サーバに接続されているディスクのリストを取得します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\Disk[]
	 */
	public function findDisks()
	{
		$model = Util::createClassInstance("saklient.cloud.models.Model_Disk", new \ArrayObject([$this->_client]));
		return $model->withServerId($this->_id())->find();
	}
	
	/**
	 * サーバにインタフェースを1つ増設し、それを取得します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\Iface 増設されたインタフェース
	 */
	public function addIface()
	{
		$model = Util::createClassInstance("saklient.cloud.models.Model_Iface", new \ArrayObject([$this->_client]));
		$res = $model->create();
		$res->serverId = $this->_id();
		return $res->save();
	}
	
	/**
	 * サーバにISOイメージを挿入します。
	 * 
	 * @access public
	 * @param \Saklient\Cloud\Resources\IsoImage $iso
	 * @return \Saklient\Cloud\Resources\Server this
	 */
	public function insertIsoImage(\Saklient\Cloud\Resources\IsoImage $iso)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($iso, "\\Saklient\\Cloud\\Resources\\IsoImage");
		$path = $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/cdrom";
		$q = (object)['CDROM' => (object)['ID' => $iso->_id()]];
		$this->_client->request("PUT", $path, $q);
		$this->reload();
		return $this;
	}
	
	/**
	 * サーバに挿入されているISOイメージを排出します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\Server this
	 */
	public function ejectIsoImage()
	{
		$path = $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/cdrom";
		$this->_client->request("DELETE", $path);
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
	private $n_plan = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return \Saklient\Cloud\Resources\ServerPlan
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
	 * @param \Saklient\Cloud\Resources\ServerPlan $v
	 * @return \Saklient\Cloud\Resources\ServerPlan
	 */
	private function set_plan(\Saklient\Cloud\Resources\ServerPlan $v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "\\Saklient\\Cloud\\Resources\\ServerPlan");
		if (!$this->isNew) {
			throw new SaklientException("immutable_field", "Immutable fields cannot be modified after the resource creation: " . "Saklient\\Cloud\\Resources\\Server#plan");
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
	private $n_instance = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return \Saklient\Cloud\Resources\ServerInstance
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
			default: return parent::__get($key);
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
			default: return parent::__set($key, $v);
		}
	}

}

