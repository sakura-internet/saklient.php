<?php

namespace SakuraInternet\Saclient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Client.php";
use \SakuraInternet\Saclient\Cloud\Client;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Resource.php";
use \SakuraInternet\Saclient\Cloud\Resource\Resource;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Swytch.php";
use \SakuraInternet\Saclient\Cloud\Resource\Swytch;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * IPv4ネットワークのリソース情報へのアクセス機能や操作機能を備えたクラス。
 * 
 * @property-read string $id
 * @property-read string $address
 * @property-read int $maskLen
 * @property-read string $defaultRoute
 * @property-read string $nextHop
 */
class Ipv4Net extends Resource {
	
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
	protected $m_address;
	
	/**
	 * @access protected
	 * @ignore
	 * @var int
	 */
	protected $m_maskLen;
	
	/**
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_defaultRoute;
	
	/**
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_nextHop;
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPath()
	{
		return "/subnet";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey()
	{
		return "Subnet";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM()
	{
		return "Subnets";
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
	 * 最新のリソース情報を再取得します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Swytch this
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
	private $n_address = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_address()
	{
		return $this->m_address;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_maskLen = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return int
	 */
	private function get_maskLen()
	{
		return $this->m_maskLen;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_defaultRoute = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_defaultRoute()
	{
		return $this->m_defaultRoute;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_nextHop = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_nextHop()
	{
		return $this->m_nextHop;
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
		if (Util::existsPath($r, "NetworkAddress")) {
			$this->m_address = Util::getByPath($r, "NetworkAddress") == null ? null : "" . Util::getByPath($r, "NetworkAddress");
		}
		else {
			$this->m_address = null;
			$this->isIncomplete = true;
		}
		$this->n_address = false;
		if (Util::existsPath($r, "NetworkMaskLen")) {
			$this->m_maskLen = Util::getByPath($r, "NetworkMaskLen") == null ? null : intval("" . Util::getByPath($r, "NetworkMaskLen"));
		}
		else {
			$this->m_maskLen = null;
			$this->isIncomplete = true;
		}
		$this->n_maskLen = false;
		if (Util::existsPath($r, "DefaultRoute")) {
			$this->m_defaultRoute = Util::getByPath($r, "DefaultRoute") == null ? null : "" . Util::getByPath($r, "DefaultRoute");
		}
		else {
			$this->m_defaultRoute = null;
			$this->isIncomplete = true;
		}
		$this->n_defaultRoute = false;
		if (Util::existsPath($r, "NextHop")) {
			$this->m_nextHop = Util::getByPath($r, "NextHop") == null ? null : "" . Util::getByPath($r, "NextHop");
		}
		else {
			$this->m_nextHop = null;
			$this->isIncomplete = true;
		}
		$this->n_nextHop = false;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access protected
	 * @ignore
	 * @param boolean $withClean = false
	 * @return mixed
	 */
	protected function apiSerializeImpl($withClean=false)
	{
		$ret = (object)[];
		if ($withClean || $this->n_id) {
			Util::setByPath($ret, "ID", $this->m_id);
		}
		if ($withClean || $this->n_address) {
			Util::setByPath($ret, "NetworkAddress", $this->m_address);
		}
		if ($withClean || $this->n_maskLen) {
			Util::setByPath($ret, "NetworkMaskLen", $this->m_maskLen);
		}
		if ($withClean || $this->n_defaultRoute) {
			Util::setByPath($ret, "DefaultRoute", $this->m_defaultRoute);
		}
		if ($withClean || $this->n_nextHop) {
			Util::setByPath($ret, "NextHop", $this->m_nextHop);
		}
		return $ret;
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "id": return $this->get_id();
			case "address": return $this->get_address();
			case "maskLen": return $this->get_maskLen();
			case "defaultRoute": return $this->get_defaultRoute();
			case "nextHop": return $this->get_nextHop();
			default: return null;
		}
	}

}

