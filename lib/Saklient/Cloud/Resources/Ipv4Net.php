<?php

namespace Saklient\Cloud\Resources;

require_once __DIR__ . "/../../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Resource.php";
use \Saklient\Cloud\Resources\Resource;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Swytch.php";
use \Saklient\Cloud\Resources\Swytch;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/**
 * IPv4ネットワークの実体1つに対応し、属性の取得や操作を行うためのクラス。
 * 
 * @property-read string $id ID 
 * @property-read string $address ネットワークアドレス 
 * @property-read int $maskLen マスク長 
 * @property-read string $defaultRoute デフォルトルート 
 * @property-read string $nextHop ネクストホップ 
 */
class Ipv4Net extends Resource {
	
	/**
	 * ID
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_id;
	
	/**
	 * ネットワークアドレス
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_address;
	
	/**
	 * マスク長
	 * 
	 * @access protected
	 * @ignore
	 * @var int
	 */
	protected $m_maskLen;
	
	/**
	 * デフォルトルート
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_defaultRoute;
	
	/**
	 * ネクストホップ
	 * 
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
	 * @ignore
	 * @return string
	 */
	public function _className()
	{
		return "Ipv4Net";
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
	 * 最新のリソース情報を再取得します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\Swytch this
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
	 * @ignore
	 * @access protected
	 * @param boolean $withClean=false
	 * @return mixed
	 */
	protected function apiSerializeImpl($withClean=false)
	{
		Util::validateType($withClean, "boolean");
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

