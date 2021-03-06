<?php

namespace Saklient\Cloud\Resources;

require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../../Saklient/Errors/HttpException.php";
use \Saklient\Errors\HttpException;
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
	protected function _onBeforeApiDeserialize($r, $root)
	{
		Util::validateArgCount(func_num_args(), 2);
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
	 * @param boolean $withClean
	 * @return void
	 */
	protected function _onBeforeApiSerialize($withClean)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($withClean, "boolean");
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
		$this->_onBeforeApiDeserialize($record, $root);
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
		$this->_onBeforeApiSerialize($withClean);
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
		$keys = new \ArrayObject(array_keys((array)$query));
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
		$this->requestRetry("DELETE", $path);
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
		$id = $this->_id();
		if ($id != null) {
			$result = $this->requestRetry("GET", $this->_apiPath() . "/" . Util::urlEncode($id));
			$this->apiDeserialize($result, true);
		}
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
		$result = $this->requestRetry("GET", $this->_apiPath(), $query);
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
		return Util::createClassInstance("saklient.cloud.resources." . $className, $a);
	}
	
	/**
	 * @access public
	 * @param string $method
	 * @param string $path
	 * @param mixed $query=null
	 * @param int $retryCount=5
	 * @param int $retrySleep=5
	 * @return mixed
	 */
	public function requestRetry($method, $path, $query=null, $retryCount=5, $retrySleep=5)
	{
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($method, "string");
		Util::validateType($path, "string");
		Util::validateType($retryCount, "int");
		Util::validateType($retrySleep, "int");
		$ret = null;
		while (1 < $retryCount) {
			$isOk = false;
			try {
				$ret = $this->_client->request($method, $path, $query);
				$isOk = true;
			}
			catch (HttpException $ex) {
				$isOk = false;
			}
			if ($isOk) {
				$retryCount = -1;
			}
			else {
				$retryCount -= 1;
				Util::sleep($retrySleep);
			}
		}
		if ($retryCount == 0) {
			$ret = $this->_client->request($method, $path, $query);
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

