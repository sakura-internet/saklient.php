<?php

namespace Saklient\Cloud\Resources;

require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/** @ignore */
class Resource {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Client
	 */
	protected $_client;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \Saklient\Cloud\Client
	 */
	protected function get_client()
	{
		return $this->_client;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var mixed
	 */
	protected $_query;
	
	/**
	 * @ignore
	 * @access public
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	public function setParam($key, $value)
	{
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($key, "string");
		$this->_query->{$key} = $value;
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPath()
	{
		return null;
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey()
	{
		return null;
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM()
	{
		return null;
	}
	
	/**
	 * @private
	 * @access public
	 * @ignore
	 * @return string
	 */
	public function _className()
	{
		return null;
	}
	
	/**
	 * @private
	 * @access public
	 * @ignore
	 * @return string
	 */
	public function _id()
	{
		return null;
	}
	
	/**
	 * @ignore
	 * @access public
	 * @param \Saklient\Cloud\Client $client
	 */
	public function __construct(\Saklient\Cloud\Client $client)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($client, "\\Saklient\\Cloud\\Client");
		$this->_client = $client;
		$this->_query = (object)[];
	}
	
	/**
	 * @ignore
	 * @access protected
	 * @var boolean
	 */
	protected $isNew;
	
	/**
	 * @ignore
	 * @access protected
	 * @var boolean
	 */
	protected $isIncomplete;
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @param mixed $query
	 * @return void
	 */
	protected function _onBeforeSave($query)
	{
		Util::validateArgCount(func_num_args(), 1);
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @param mixed $r
	 * @param mixed $root
	 * @return void
	 */
	protected function _onAfterApiDeserialize($r, $root)
	{
		Util::validateArgCount(func_num_args(), 2);
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @param mixed $r
	 * @param boolean $withClean
	 * @return void
	 */
	protected function _onAfterApiSerialize($r, $withClean)
	{
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($withClean, "boolean");
	}
	
	/**
	 * @ignore
	 * @access protected
	 * @param mixed $r
	 * @return void
	 */
	protected function apiDeserializeImpl($r)
	{
		Util::validateArgCount(func_num_args(), 1);
	}
	
	/**
	 * @ignore
	 * @access public
	 * @param mixed $obj
	 * @param boolean $wrapped=false
	 * @return void
	 */
	public function apiDeserialize($obj, $wrapped=false)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($wrapped, "boolean");
		$root = null;
		$record = null;
		$rkey = $this->_rootKey();
		if ($obj != null) {
			if (!$wrapped) {
				if ($rkey != null) {
					$root = (object)[];
					$root->{$rkey} = $obj;
				}
				$record = $obj;
			}
			else {
				$root = $obj;
				$record = $obj->{$rkey};
			}
		}
		$this->apiDeserializeImpl($record);
		$this->_onAfterApiDeserialize($record, $root);
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
		return null;
	}
	
	/**
	 * @ignore
	 * @access public
	 * @param boolean $withClean=false
	 * @return mixed
	 */
	public function apiSerialize($withClean=false)
	{
		Util::validateType($withClean, "boolean");
		$ret = $this->apiSerializeImpl($withClean);
		$this->_onAfterApiSerialize($ret, $withClean);
		return $ret;
	}
	
	/**
	 * @ignore
	 * @access protected
	 * @return mixed
	 */
	protected function apiSerializeID()
	{
		$id = $this->_id();
		if ($id == null) {
			return null;
		}
		$r = (object)[];
		$r->{"ID"} = $id;
		return $r;
	}
	
	/**
	 * @ignore
	 * @access protected
	 * @param string $name
	 * @return string
	 */
	protected function normalizeFieldName($name)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($name, "string");
		return $name;
	}
	
	/**
	 * @ignore
	 * @access public
	 * @param string $name
	 * @return mixed
	 */
	public function getProperty($name)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($name, "string");
		$name = $this->normalizeFieldName($name);
		return $this->__get($name);
	}
	
	/**
	 * @ignore
	 * @access public
	 * @param string $name
	 * @param mixed $value
	 * @return void
	 */
	public function setProperty($name, $value)
	{
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($name, "string");
		$name = $this->normalizeFieldName($name);
		$this->__set($name, $value);
	}
	
	/**
	 * このローカルオブジェクトに現在設定されているリソース情報をAPIに送信し、新規作成または上書き保存します。
	 * 
	 * @private
	 * @access protected
	 * @ignore
	 * @return \Saklient\Cloud\Resources\Resource this
	 */
	protected function _save()
	{
		$r = $this->apiSerialize();
		$query = $this->_query;
		$this->_query = (object)[];
		$keys = array_keys((array)$query);
		foreach ($keys as $k) {
			$v = $query->{$k};
			$r->{$k} = $v;
		}
		$method = $this->isNew ? "POST" : "PUT";
		$path = $this->_apiPath();
		if (!$this->isNew) {
			$path .= "/" . Util::urlEncode($this->_id());
		}
		$q = (object)[];
		$q->{$this->_rootKey()} = $r;
		$this->_onBeforeSave($q);
		$result = $this->_client->request($method, $path, $q);
		$this->apiDeserialize($result, true);
		return $this;
	}
	
	/**
	 * このローカルオブジェクトのIDと一致するリソースの削除リクエストをAPIに送信します。
	 * 
	 * @access public
	 * @return void
	 */
	public function destroy()
	{
		if ($this->isNew) {
			return;
		}
		$path = $this->_apiPath() . "/" . Util::urlEncode($this->_id());
		$this->_client->request("DELETE", $path);
	}
	
	/**
	 * 最新のリソース情報を再取得します。
	 * 
	 * @private
	 * @access protected
	 * @ignore
	 * @return \Saklient\Cloud\Resources\Resource this
	 */
	protected function _reload()
	{
		$result = $this->_client->request("GET", $this->_apiPath() . "/" . Util::urlEncode($this->_id()));
		$this->apiDeserialize($result, true);
		return $this;
	}
	
	/**
	 * このリソースが存在するかを調べます。
	 * 
	 * @access public
	 * @return boolean
	 */
	public function exists()
	{
		$query = (object)[];
		Util::setByPath($query, "Filter.ID", new \ArrayObject([$this->_id()]));
		Util::setByPath($query, "Include", new \ArrayObject(["ID"]));
		$result = $this->_client->request("GET", $this->_apiPath(), $query);
		$cnt = $result->{"Count"};
		return $cnt == 1;
	}
	
	/**
	 * @ignore
	 * @access public
	 * @return mixed
	 */
	public function dump()
	{
		return $this->apiSerialize(true);
	}
	
	/**
	 * @ignore
	 * @access public
	 * @return string
	 */
	public function trueClassName()
	{
		return null;
	}
	
	/**
	 * @ignore
	 * @access public
	 * @param string $className
	 * @param \Saklient\Cloud\Client $client
	 * @param mixed $obj
	 * @param boolean $wrapped=false
	 * @return \Saklient\Cloud\Resources\Resource
	 */
	static public function createWith($className, \Saklient\Cloud\Client $client, $obj, $wrapped=false)
	{
		Util::validateArgCount(func_num_args(), 3);
		Util::validateType($className, "string");
		Util::validateType($client, "\\Saklient\\Cloud\\Client");
		Util::validateType($wrapped, "boolean");
		$a = new \ArrayObject([
			$client,
			$obj,
			$wrapped
		]);
		$ret = Util::createClassInstance("saklient.cloud.resources." . $className, $a);
		$trueClassName = $ret->trueClassName();
		if ($trueClassName != null) {
			$ret = Util::createClassInstance("saklient.cloud.resources." . $trueClassName, $a);
		}
		return $ret;
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "client": return $this->get_client();
			default: return null;
		}
	}

}

