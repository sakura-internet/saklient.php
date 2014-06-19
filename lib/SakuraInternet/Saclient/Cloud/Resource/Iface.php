<?php

namespace SakuraInternet\Saclient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Client.php";
use \SakuraInternet\Saclient\Cloud\Client;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Resource.php";
use \SakuraInternet\Saclient\Cloud\Resource\Resource;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * インタフェースのリソース情報へのアクセス機能や操作機能を備えたクラス。
 * 
 * @property-read string $id
 * @property-read string $macAddress
 * @property-read string $ipAddress
 * @property string $userIpAddress
 */
class Iface extends Resource {
	
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
	protected $m_macAddress;
	
	/**
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_ipAddress;
	
	/**
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_userIpAddress;
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPath()
	{
		return "/interface";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey()
	{
		return "Interface";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM()
	{
		return "Interfaces";
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
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Iface this
	 */
	public function save()
	{
		return $this->_save();
	}
	
	/**
	 * 最新のリソース情報を再取得します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Iface this
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
	private $n_macAddress = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_macAddress()
	{
		return $this->m_macAddress;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_ipAddress = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_ipAddress()
	{
		return $this->m_ipAddress;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_userIpAddress = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_userIpAddress()
	{
		return $this->m_userIpAddress;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	private function set_userIpAddress($v)
	{
		$this->m_userIpAddress = $v;
		$this->n_userIpAddress = true;
		return $this->m_userIpAddress;
	}
	
	
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access public
	 * @param mixed $r
	 */
	public function apiDeserialize($r)
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
		if (array_key_exists("MACAddress", $r)) {
			$this->m_macAddress = $r->{"MACAddress"} == null ? null : "" . $r->{"MACAddress"};
		}
		else {
			$this->m_macAddress = null;
			$this->isIncomplete = true;
		}
		$this->n_macAddress = false;
		if (array_key_exists("IPAddress", $r)) {
			$this->m_ipAddress = $r->{"IPAddress"} == null ? null : "" . $r->{"IPAddress"};
		}
		else {
			$this->m_ipAddress = null;
			$this->isIncomplete = true;
		}
		$this->n_ipAddress = false;
		if (array_key_exists("UserIPAddress", $r)) {
			$this->m_userIpAddress = $r->{"UserIPAddress"} == null ? null : "" . $r->{"UserIPAddress"};
		}
		else {
			$this->m_userIpAddress = null;
			$this->isIncomplete = true;
		}
		$this->n_userIpAddress = false;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access public
	 * @param boolean $withClean = false
	 * @return mixed
	 */
	public function apiSerialize($withClean=false)
	{
		$ret = (object)[];
		if ($withClean || $this->n_id) {
			$ret->{"ID"} = $this->m_id;
		}
		if ($withClean || $this->n_macAddress) {
			$ret->{"MACAddress"} = $this->m_macAddress;
		}
		if ($withClean || $this->n_ipAddress) {
			$ret->{"IPAddress"} = $this->m_ipAddress;
		}
		if ($withClean || $this->n_userIpAddress) {
			$ret->{"UserIPAddress"} = $this->m_userIpAddress;
		}
		return $ret;
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "id": return $this->get_id();
			case "macAddress": return $this->get_macAddress();
			case "ipAddress": return $this->get_ipAddress();
			case "userIpAddress": return $this->get_userIpAddress();
			default: return null;
		}
	}
	
	/**
	 * @ignore
	 */
	public function __set($key, $v) {
		switch ($key) {
			case "userIpAddress": return $this->set_userIpAddress($v);
			default: return $v;
		}
	}

}

