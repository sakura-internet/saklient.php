<?php

namespace SakuraInternet\Saclient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Client.php";
use \SakuraInternet\Saclient\Cloud\Client;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

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
	public function __construct($client)
	{
		$this->_client = $client;
	}
	
	/**
	 * @access protected
	 * @ignore
	 * @var boolean
	 */
	protected $isIncomplete;
	
	/**
	 * @access public
	 * @param mixed $r
	 * @return void
	 */
	public function apiDeserialize($r)
	{}
	
	/**
	 * @access public
	 * @param boolean $withClean = false
	 * @return mixed
	 */
	public function apiSerialize($withClean=false)
	{
		return null;
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
	 * このローカルオブジェクトに現在設定されているリソース情報をAPIに送信し、新しいインスタンスを作成します。
	 * 
	 * @private
	 * @access protected
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Resource this
	 */
	protected function _create()
	{
		return $this;
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
		$r = (object)[];
		$r->{$this->_rootKey()} = $this->apiSerialize();
		$result = $this->_client->request("PUT", $this->_apiPath() . "/" . Util::urlEncode($this->_id()), $r);
		$this->apiDeserialize($result->{$this->_rootKey()});
		return $this;
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
	 * @access public
	 * @return mixed
	 */
	public function dump()
	{
		return $this->apiSerialize();
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

