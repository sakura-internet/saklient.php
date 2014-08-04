<?php

namespace SakuraInternet\Saclient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Client.php";
use \SakuraInternet\Saclient\Cloud\Client;

/**
 * @ignore
 * @property-read \SakuraInternet\Saclient\Cloud\Client $client
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
	 * @return \SakuraInternet\Saclient\Cloud\Client
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
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _className()
	{
		return null;
	}
	
	/**
	 * @private
	 * @access public
	 * @return string
	 */
	public function _id()
	{
		return null;
	}
	
	/**
	 * @private
	 * @access public
	 * @param \SakuraInternet\Saclient\Cloud\Client $client
	 */
	public function __construct(\SakuraInternet\Saclient\Cloud\Client $client)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($client, "\\SakuraInternet\\Saclient\\Cloud\\Client");
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
	 * @param mixed $r
	 * @return void
	 */
	protected function _onAfterApiDeserialize($r)
	{
		Util::validateArgCount(func_num_args(), 1);
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
	 * @param mixed $r
	 * @return void
	 */
	public function apiDeserialize($r)
	{
		Util::validateArgCount(func_num_args(), 1);
		$this->apiDeserializeImpl($r);
		$this->_onAfterApiDeserialize($r);
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
	 * このローカルオブジェクトに現在設定されているリソース情報をAPIに送信し、上書き保存します。
	 * 
	 * @private
	 * @access protected
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Resource this
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
		$this->apiDeserialize($result->{$this->_rootKey()});
		return $this;
	}
	
	/**
	 * このローカルオブジェクトのIDと対応するリソースの削除リクエストをAPIに送信します。
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
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Resource this
	 */
	protected function _reload()
	{
		$result = $this->_client->request("GET", $this->_apiPath() . "/" . Util::urlEncode($this->_id()));
		$this->apiDeserialize($result->{$this->_rootKey()});
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

