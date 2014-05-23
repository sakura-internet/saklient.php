<?php

namespace Saclient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Icon.php";
use \Saclient\Cloud\Resource\Icon;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Iface.php";
use \Saclient\Cloud\Resource\Iface;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/ServerPlan.php";
use \Saclient\Cloud\Resource\ServerPlan;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/ServerInstance.php";
use \Saclient\Cloud\Resource\ServerInstance;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \Saclient\Cloud\Util;

/**
 * @property-read string $id
 * @property string $name
 * @property string $description
 * @property string[] $tags
 * @property \Saclient\Cloud\Resource\Icon $icon
 * @property-read \Saclient\Cloud\Resource\ServerPlan $plan
 * @property-read \Saclient\Cloud\Resource\Iface[] $ifaces
 * @property-read \Saclient\Cloud\Resource\ServerInstance $instance
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
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPath() {
		return "/server";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey() {
		return "Server";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM() {
		return "Servers";
	}
	
	/**
	 * @private
	 * @access public
	 * @return string
	 */
	public function _id() {
		return $this->get_id();
	}
	
	/**
	 * このローカルオブジェクトに現在設定されているリソース情報をAPIに送信し、新しいインスタンスを作成します。
	 * 
	 * @access public
	 * @return \Saclient\Cloud\Resource\Server this
	 */
	public function create() {
		return $this->_create();
	}
	
	/**
	 * このローカルオブジェクトに現在設定されているリソース情報をAPIに送信し、上書き保存します。
	 * 
	 * @access public
	 * @return \Saclient\Cloud\Resource\Server this
	 */
	public function save() {
		return $this->_save();
	}
	
	/**
	 * 最新のリソース情報を再取得します。
	 * 
	 * @access public
	 * @return \Saclient\Cloud\Resource\Server this
	 */
	public function reload() {
		return $this->_reload();
	}
	
	/**
	 * @private
	 * @access public
	 * @param Client $client
	 * @param mixed $r
	 */
	public function __construct($client, $r) {
		parent::__construct($client);
		$this->apiDeserialize($r);
	}
	
	/**
	 * サーバを起動します。
	 * 
	 * @access public
	 * @return \Saclient\Cloud\Resource\Server
	 */
	public function boot() {
		$this->_client->request("PUT", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/power");
		return $this;
	}
	
	/**
	 * サーバをシャットダウンします。
	 * 
	 * @access public
	 * @return \Saclient\Cloud\Resource\Server
	 */
	public function shutdown() {
		$this->_client->request("DELETE", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/power");
		return $this;
	}
	
	/**
	 * サーバを強制停止します。
	 * 
	 * @access public
	 * @return \Saclient\Cloud\Resource\Server
	 */
	public function stop() {
		$this->_client->request("DELETE", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/power", (object)['Force' => true]);
		return $this;
	}
	
	/**
	 * サーバを強制再起動します。
	 * 
	 * @access public
	 * @return \Saclient\Cloud\Resource\Server
	 */
	public function reboot() {
		$this->_client->request("PUT", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/reset");
		return $this;
	}
	
	/**
	 * サーバのプランを変更します。
	 * 
	 * @access public
	 * @param \Saclient\Cloud\Resource\ServerPlan $planTo
	 * @return \Saclient\Cloud\Resource\Server
	 */
	public function changePlan($planTo) {
		$path = $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/to/plan/" . Util::urlEncode($planTo->_id());
		$result = $this->_client->request("PUT", $path);
		$this->apiDeserialize($result->{$this->_rootKey()});
		return $this;
	}
	
	/**
	 * サーバに接続されているディスクのリストを取得します。
	 * 
	 * @access public
	 * @return Disk[]
	 */
	public function findDisks() {
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
	private function get_id() {
		return $this->m_id;
	}
	
	/**
	 * ID
	 * 
	 * @access public
	 * @readOnly
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
	private function get_name() {
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
	private function set_name($v) {
		$this->m_name = $v;
		$this->n_name = true;
		return $this->m_name;
	}
	
	/**
	 * 名前
	 * 
	 * @access public
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
	private function get_description() {
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
	private function set_description($v) {
		$this->m_description = $v;
		$this->n_description = true;
		return $this->m_description;
	}
	
	/**
	 * 説明
	 * 
	 * @access public
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
	private function get_tags() {
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
	private function set_tags($v) {
		$this->m_tags = $v;
		$this->n_tags = true;
		return $this->m_tags;
	}
	
	/**
	 * タグ
	 * 
	 * @access public
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
	 * @return \Saclient\Cloud\Resource\Icon
	 */
	private function get_icon() {
		return $this->m_icon;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @param \Saclient\Cloud\Resource\Icon $v
	 * @return \Saclient\Cloud\Resource\Icon
	 */
	private function set_icon($v) {
		$this->m_icon = $v;
		$this->n_icon = true;
		return $this->m_icon;
	}
	
	/**
	 * アイコン
	 * 
	 * @access public
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
	 * @return \Saclient\Cloud\Resource\ServerPlan
	 */
	private function get_plan() {
		return $this->m_plan;
	}
	
	/**
	 * プラン
	 * 
	 * @access public
	 * @readOnly
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
	 * @return \Saclient\Cloud\Resource\Iface[]
	 */
	private function get_ifaces() {
		return $this->m_ifaces;
	}
	
	/**
	 * インタフェース
	 * 
	 * @access public
	 * @readOnly
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
	 * @return \Saclient\Cloud\Resource\ServerInstance
	 */
	private function get_instance() {
		return $this->m_instance;
	}
	
	/**
	 * インスタンス情報
	 * 
	 * @access public
	 * @readOnly
	 */
	
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access public
	 * @param mixed $r
	 */
	public function apiDeserialize($r) {
		$this->m_id = $r->{"ID"} == null ? null : "" . $r->{"ID"};
		$this->n_id = false;
		$this->m_name = $r->{"Name"} == null ? null : "" . $r->{"Name"};
		$this->n_name = false;
		$this->m_description = $r->{"Description"} == null ? null : "" . $r->{"Description"};
		$this->n_description = false;
		if ($r->{"Tags"} == null) {
			{
				$this->m_tags = new \ArrayObject([]);
			};
		}
		else {
			{
				$this->m_tags = new \ArrayObject([]);
				foreach ($r->{"Tags"} as $t) {
					$v = null;
					$v = $t == null ? null : "" . $t;
					$this->m_tags->append($v);
				};
			};
		};
		$this->n_tags = false;
		$this->m_icon = $r->{"Icon"} == null ? null : new Icon($this->_client, $r->{"Icon"});
		$this->n_icon = false;
		$this->m_plan = $r->{"ServerPlan"} == null ? null : new ServerPlan($this->_client, $r->{"ServerPlan"});
		$this->n_plan = false;
		if ($r->{"Interfaces"} == null) {
			{
				$this->m_ifaces = new \ArrayObject([]);
			};
		}
		else {
			{
				$this->m_ifaces = new \ArrayObject([]);
				foreach ($r->{"Interfaces"} as $t) {
					$v = null;
					$v = $t == null ? null : new Iface($this->_client, $t);
					$this->m_ifaces->append($v);
				};
			};
		};
		$this->n_ifaces = false;
		$this->m_instance = $r->{"Instance"} == null ? null : new ServerInstance($this->_client, $r->{"Instance"});
		$this->n_instance = false;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access public
	 * @param boolean $withClean = false
	 * @return mixed
	 */
	public function apiSerialize($withClean=false) {
		$ret = (object)[];
		if ($withClean || $this->n_id) {
			{
				$ret->{"ID"} = $this->m_id;
			};
		};
		if ($withClean || $this->n_name) {
			{
				$ret->{"Name"} = $this->m_name;
			};
		};
		if ($withClean || $this->n_description) {
			{
				$ret->{"Description"} = $this->m_description;
			};
		};
		if ($withClean || $this->n_tags) {
			{
				$ret->{"Tags"} = new \ArrayObject([]);
				foreach ($this->m_tags as $r) {
					$v = null;
					$v = $r;
					$ret->{"Tags"}->append($v);
				};
			};
		};
		if ($withClean || $this->n_icon) {
			{
				$ret->{"Icon"} = $this->m_icon == null ? null : $withClean ? $this->m_icon->apiSerialize($withClean) : $this->m_icon->apiSerializeID();
			};
		};
		if ($withClean || $this->n_plan) {
			{
				$ret->{"ServerPlan"} = $this->m_plan == null ? null : $withClean ? $this->m_plan->apiSerialize($withClean) : $this->m_plan->apiSerializeID();
			};
		};
		if ($withClean || $this->n_ifaces) {
			{
				$ret->{"Interfaces"} = new \ArrayObject([]);
				foreach ($this->m_ifaces as $r) {
					$v = null;
					$v = $r == null ? null : $withClean ? $r->apiSerialize($withClean) : $r->apiSerializeID();
					$ret->{"Interfaces"}->append($v);
				};
			};
		};
		if ($withClean || $this->n_instance) {
			{
				$ret->{"Instance"} = $this->m_instance == null ? null : $withClean ? $this->m_instance->apiSerialize($withClean) : $this->m_instance->apiSerializeID();
			};
		};
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

