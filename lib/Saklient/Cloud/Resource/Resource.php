<?php

namespace Saklient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once dirname(__FILE__) . "/../../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once dirname(__FILE__) . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/**
 * @ignore
 * @property-read \Saklient\Cloud\Client $client
 */
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
	protected $_params;
	
	/**
	 * @access public
	 * @param mixed $value
	 * @param string $key
	 * @return void
	 */
	public function setParam($key, $value)
	{
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($key, "string");
		$this->_params->{$key} = $value;
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
		$this->_params = (object)[];
	}
	
	/**
	 * @access protected
	 * @ignore
	 * @var boolean
	 */
	protected $isNew;
	
	/**
	 * @access protected
	 * @ignore
	 * @var boolean
	 */
	protected $isIncomplete;
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @param mixed $r
	 * @return void
	 */
	protected function _onBeforeSave($r)
	{
		Util::validateArgCount(func_num_args(), 1);
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
	}
	
	/**
	 * @access protected
	 * @ignore
	 * @param mixed $r
	 * @return void
	 */
	protected function apiDeserializeImpl($r)
	{
		Util::validateArgCount(func_num_args(), 1);
	}
	
	/**
	 * @access public
	 * @param mixed $obj
	 * @param boolean $wrapped = false
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
	 * @access protected
	 * @ignore
	 * @param boolean $withClean = false
	 * @return mixed
	 */
	protected function apiSerializeImpl($withClean=false)
	{
		Util::validateType($withClean, "boolean");
		return null;
	}
	
	/**
	 * @access public
	 * @param boolean $withClean = false
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
	 * @access protected
	 * @ignore
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
	 * @access protected
	 * @ignore
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
	 * @return \Saklient\Cloud\Resource\Resource this
	 */
	protected function _save()
	{
		$r = $this->apiSerialize();
		$params = $this->_params;
		$this->_params = (object)[];
		$keys = array_keys((array)$params);
		foreach ($keys as $k) {
			$v = $params->{$k};
			$r->{$k} = $v;
		}
		$this->_onBeforeSave($r);
		$method = $this->isNew ? "POST" : "PUT";
		$path = $this->_apiPath();
		if (!$this->isNew) {
			$path .= "/" . Util::urlEncode($this->_id());
		}
		$q = (object)[];
		$q->{$this->_rootKey()} = $r;
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
	 * @return \Saklient\Cloud\Resource\Resource this
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
		$params = (object)[];
		Util::setByPath($params, "Filter.ID", new \ArrayObject([$this->_id()]));
		Util::setByPath($params, "Include", new \ArrayObject(["ID"]));
		$result = $this->_client->request("GET", $this->_apiPath(), $params);
		return $result->{"Count"} == 1;
	}
	
	/**
	 * @access public
	 * @return mixed
	 */
	public function dump()
	{
		return $this->apiSerialize(true);
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

