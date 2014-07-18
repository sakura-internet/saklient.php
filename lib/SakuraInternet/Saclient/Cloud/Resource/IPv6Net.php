<?php

namespace SakuraInternet\Saclient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Client.php";
use \SakuraInternet\Saclient\Cloud\Client;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Resource.php";
use \SakuraInternet\Saclient\Cloud\Resource\Resource;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * IPv6ネットワークのリソース情報へのアクセス機能や操作機能を備えたクラス。
 * 
 * @property-read string $id
 * @property-read string $ipv6Prefix
 * @property-read int $ipv6PrefixLen
 * @property-read string $ipv6PrefixTail
 */
class IPv6Net extends Resource {
	
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
	protected $m_ipv6Prefix;
	
	/**
	 * @access protected
	 * @ignore
	 * @var int
	 */
	protected $m_ipv6PrefixLen;
	
	/**
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_ipv6PrefixTail;
	
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
	private $n_ipv6Prefix = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_ipv6Prefix()
	{
		return $this->m_ipv6Prefix;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_ipv6PrefixLen = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return int
	 */
	private function get_ipv6PrefixLen()
	{
		return $this->m_ipv6PrefixLen;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_ipv6PrefixTail = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_ipv6PrefixTail()
	{
		return $this->m_ipv6PrefixTail;
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
		if (Util::existsPath($r, "IPv6Prefix")) {
			$this->m_ipv6Prefix = Util::getByPath($r, "IPv6Prefix") == null ? null : "" . Util::getByPath($r, "IPv6Prefix");
		}
		else {
			$this->m_ipv6Prefix = null;
			$this->isIncomplete = true;
		}
		$this->n_ipv6Prefix = false;
		if (Util::existsPath($r, "IPv6PrefixLen")) {
			$this->m_ipv6PrefixLen = Util::getByPath($r, "IPv6PrefixLen") == null ? null : intval("" . Util::getByPath($r, "IPv6PrefixLen"));
		}
		else {
			$this->m_ipv6PrefixLen = null;
			$this->isIncomplete = true;
		}
		$this->n_ipv6PrefixLen = false;
		if (Util::existsPath($r, "IPv6PrefixTail")) {
			$this->m_ipv6PrefixTail = Util::getByPath($r, "IPv6PrefixTail") == null ? null : "" . Util::getByPath($r, "IPv6PrefixTail");
		}
		else {
			$this->m_ipv6PrefixTail = null;
			$this->isIncomplete = true;
		}
		$this->n_ipv6PrefixTail = false;
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
		if ($withClean || $this->n_ipv6Prefix) {
			Util::setByPath($ret, "IPv6Prefix", $this->m_ipv6Prefix);
		}
		if ($withClean || $this->n_ipv6PrefixLen) {
			Util::setByPath($ret, "IPv6PrefixLen", $this->m_ipv6PrefixLen);
		}
		if ($withClean || $this->n_ipv6PrefixTail) {
			Util::setByPath($ret, "IPv6PrefixTail", $this->m_ipv6PrefixTail);
		}
		return $ret;
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "id": return $this->get_id();
			case "ipv6Prefix": return $this->get_ipv6Prefix();
			case "ipv6PrefixLen": return $this->get_ipv6PrefixLen();
			case "ipv6PrefixTail": return $this->get_ipv6PrefixTail();
			default: return null;
		}
	}

}

