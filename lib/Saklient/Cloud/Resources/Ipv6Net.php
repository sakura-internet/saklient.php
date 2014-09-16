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
 * IPv6ネットワークの実体1つに対応し、属性の取得や操作を行うためのクラス。
 * 
 * @property-read string $id ID 
 * @property-read string $prefix ネットワークプレフィックス 
 * @property-read int $prefixLen ネットワークプレフィックス長 
 * @property-read string $prefixTail このネットワーク範囲における最後のIPv6アドレス 
 */
class Ipv6Net extends Resource {
	
	/**
	 * ID
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_id;
	
	/**
	 * ネットワークプレフィックス
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_prefix;
	
	/**
	 * ネットワークプレフィックス長
	 * 
	 * @access protected
	 * @ignore
	 * @var int
	 */
	protected $m_prefixLen;
	
	/**
	 * このネットワーク範囲における最後のIPv6アドレス
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_prefixTail;
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPath()
	{
		return "/ipv6net";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey()
	{
		return "IPv6Net";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM()
	{
		return "IPv6Nets";
	}
	
	/**
	 * @private
	 * @access public
	 * @ignore
	 * @return string
	 */
	public function _className()
	{
		return "Ipv6Net";
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
	private $n_prefix = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_prefix()
	{
		return $this->m_prefix;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_prefixLen = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return int
	 */
	private function get_prefixLen()
	{
		return $this->m_prefixLen;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_prefixTail = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_prefixTail()
	{
		return $this->m_prefixTail;
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
		if (Util::existsPath($r, "IPv6Prefix")) {
			$this->m_prefix = Util::getByPath($r, "IPv6Prefix") == null ? null : "" . Util::getByPath($r, "IPv6Prefix");
		}
		else {
			$this->m_prefix = null;
			$this->isIncomplete = true;
		}
		$this->n_prefix = false;
		if (Util::existsPath($r, "IPv6PrefixLen")) {
			$this->m_prefixLen = Util::getByPath($r, "IPv6PrefixLen") == null ? null : intval("" . Util::getByPath($r, "IPv6PrefixLen"));
		}
		else {
			$this->m_prefixLen = null;
			$this->isIncomplete = true;
		}
		$this->n_prefixLen = false;
		if (Util::existsPath($r, "IPv6PrefixTail")) {
			$this->m_prefixTail = Util::getByPath($r, "IPv6PrefixTail") == null ? null : "" . Util::getByPath($r, "IPv6PrefixTail");
		}
		else {
			$this->m_prefixTail = null;
			$this->isIncomplete = true;
		}
		$this->n_prefixTail = false;
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
		if ($withClean || $this->n_prefix) {
			Util::setByPath($ret, "IPv6Prefix", $this->m_prefix);
		}
		if ($withClean || $this->n_prefixLen) {
			Util::setByPath($ret, "IPv6PrefixLen", $this->m_prefixLen);
		}
		if ($withClean || $this->n_prefixTail) {
			Util::setByPath($ret, "IPv6PrefixTail", $this->m_prefixTail);
		}
		return $ret;
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "id": return $this->get_id();
			case "prefix": return $this->get_prefix();
			case "prefixLen": return $this->get_prefixLen();
			case "prefixTail": return $this->get_prefixTail();
			default: return null;
		}
	}

}

