<?php

namespace Saclient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Resource.php";
use \Saclient\Cloud\Resource\Resource;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/DiskPlan.php";
use \Saclient\Cloud\Resource\DiskPlan;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Server.php";
use \Saclient\Cloud\Resource\Server;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \Saclient\Cloud\Util;

/**
 * @property-read int $sizeGib
 * @property-read string $id
 * @property string $name
 * @property string $description
 * @property-read int $sizeMib
 * @property-read string $serviceClass
 * @property-read \Saclient\Cloud\Resource\DiskPlan $plan
 * @property-read \Saclient\Cloud\Resource\Server $server
 */
class Disk extends Resource {
	
	/**
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_id;
	
	/**
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_name;
	
	/**
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_description;
	
	/**
	 * @access protected
	 * @ignore
	 * @var int
	 */
	protected $m_sizeMib;
	
	/**
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_serviceClass;
	
	/**
	 * @access protected
	 * @ignore
	 * @var DiskPlan
	 */
	protected $m_plan;
	
	/**
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
	protected function _apiPath() {
		return "/disk";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey() {
		return "Disk";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM() {
		return "Disks";
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
	 * @return \Saclient\Cloud\Resource\Disk this
	 */
	public function create() {
		return $this->_create();
	}
	
	/**
	 * このローカルオブジェクトに現在設定されているリソース情報をAPIに送信し、上書き保存します。
	 * 
	 * @access public
	 * @return \Saclient\Cloud\Resource\Disk this
	 */
	public function save() {
		return $this->_save();
	}
	
	/**
	 * 最新のリソース情報を再取得します。
	 * 
	 * @access public
	 * @return \Saclient\Cloud\Resource\Disk this
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
	 * @access protected
	 * @ignore
	 * @return int
	 */
	protected function get_sizeGib() {
		return $this->get_sizeMib() >> 10;
	}
	
	/**
	 * @access public
	 * @readOnly
	 */
	
	
	/**
	 * ディスクをサーバに取り付けます。
	 * 
	 * @access public
	 * @param string $serverId
	 * @return \Saclient\Cloud\Resource\Disk
	 */
	public function attachTo($serverId) {
		$this->_client->request("PUT", "/disk/" . $this->_id() . "/to/server/" . $serverId);
		return $this;
	}
	
	/**
	 * ディスクをサーバから取り外します。
	 * 
	 * @access public
	 * @return \Saclient\Cloud\Resource\Disk
	 */
	public function detach() {
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
	private function get_id() {
		return $this->m_id;
	}
	
	/**
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
	 * @access public
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
	private function get_sizeMib() {
		return $this->m_sizeMib;
	}
	
	/**
	 * @access public
	 * @readOnly
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
	private function get_serviceClass() {
		return $this->m_serviceClass;
	}
	
	/**
	 * @access public
	 * @readOnly
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
	 * @return \Saclient\Cloud\Resource\DiskPlan
	 */
	private function get_plan() {
		return $this->m_plan;
	}
	
	/**
	 * @access public
	 * @readOnly
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
	 * @return \Saclient\Cloud\Resource\Server
	 */
	private function get_server() {
		return $this->m_server;
	}
	
	/**
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
		$this->m_sizeMib = $r->{"SizeMB"} == null ? null : intval("" . $r->{"SizeMB"});
		$this->n_sizeMib = false;
		$this->m_serviceClass = $r->{"ServiceClass"} == null ? null : "" . $r->{"ServiceClass"};
		$this->n_serviceClass = false;
		$this->m_plan = $r->{"Plan"} == null ? null : new DiskPlan($this->_client, $r->{"Plan"});
		$this->n_plan = false;
		$this->m_server = $r->{"Server"} == null ? null : new Server($this->_client, $r->{"Server"});
		$this->n_server = false;
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
		if ($withClean || $this->n_sizeMib) {
			{
				$ret->{"SizeMB"} = $this->m_sizeMib;
			};
		};
		if ($withClean || $this->n_serviceClass) {
			{
				$ret->{"ServiceClass"} = $this->m_serviceClass;
			};
		};
		if ($withClean || $this->n_plan) {
			{
				$ret->{"Plan"} = $this->m_plan == null ? null : $withClean ? $this->m_plan->apiSerialize($withClean) : $this->m_plan->apiSerializeID();
			};
		};
		if ($withClean || $this->n_server) {
			{
				$ret->{"Server"} = $this->m_server == null ? null : $withClean ? $this->m_server->apiSerialize($withClean) : $this->m_server->apiSerializeID();
			};
		};
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
			default: return $v;
		}
	}

}

