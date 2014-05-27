<?php

namespace SakuraInternet\Saclient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Client.php";
use \SakuraInternet\Saclient\Cloud\Client;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * ルータのプラン情報へのアクセス機能を備えたクラス。
 * 
 * @property-read string $id
 * @property-read string $name
 * @property-read int $bandWidthMbps
 * @property-read string $serviceClass
 */
class InternetPlan extends Resource {
	
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
	protected $m_name;
	
	/**
	 * @access protected
	 * @ignore
	 * @var int
	 */
	protected $m_bandWidthMbps;
	
	/**
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_serviceClass;
	
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
	private $n_name = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_name()
	{
		return $this->m_name;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_bandWidthMbps = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return int
	 */
	private function get_bandWidthMbps()
	{
		return $this->m_bandWidthMbps;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_serviceClass = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_serviceClass()
	{
		return $this->m_serviceClass;
	}
	
	
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access public
	 * @param mixed $r
	 */
	public function apiDeserialize($r)
	{
		$this->isIncomplete = true;
		if (array_key_exists("ID", $r)) {
			$this->m_id = $r->{"ID"} == null ? null : "" . $r->{"ID"};
			$this->n_id = false;
		}
		else {
			$this->isIncomplete = false;
		}
		if (array_key_exists("Name", $r)) {
			$this->m_name = $r->{"Name"} == null ? null : "" . $r->{"Name"};
			$this->n_name = false;
		}
		else {
			$this->isIncomplete = false;
		}
		if (array_key_exists("BandWidthMbps", $r)) {
			$this->m_bandWidthMbps = $r->{"BandWidthMbps"} == null ? null : intval("" . $r->{"BandWidthMbps"});
			$this->n_bandWidthMbps = false;
		}
		else {
			$this->isIncomplete = false;
		}
		if (array_key_exists("ServiceClass", $r)) {
			$this->m_serviceClass = $r->{"ServiceClass"} == null ? null : "" . $r->{"ServiceClass"};
			$this->n_serviceClass = false;
		}
		else {
			$this->isIncomplete = false;
		}
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
		if ($withClean || $this->n_name) {
			$ret->{"Name"} = $this->m_name;
		}
		if ($withClean || $this->n_bandWidthMbps) {
			$ret->{"BandWidthMbps"} = $this->m_bandWidthMbps;
		}
		if ($withClean || $this->n_serviceClass) {
			$ret->{"ServiceClass"} = $this->m_serviceClass;
		}
		return $ret;
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "id": return $this->get_id();
			case "name": return $this->get_name();
			case "bandWidthMbps": return $this->get_bandWidthMbps();
			case "serviceClass": return $this->get_serviceClass();
			default: return null;
		}
	}

}

