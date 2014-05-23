<?php

namespace Saclient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \Saclient\Cloud\Util;

/**
 * @property-read int $memoryGib
 * @property-read string $id
 * @property-read string $name
 * @property-read int $cpu
 * @property-read int $memoryMib
 * @property-read string $serviceClass
 */
class ServerPlan extends Resource {
	
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
	protected $m_cpu;
	
	/**
	 * @access protected
	 * @ignore
	 * @var int
	 */
	protected $m_memoryMib;
	
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
	public function _id() {
		return $this->get_id();
	}
	
	/**
	 * @private
	 * @access public
	 * @param Client $client
	 * @param mixed $r
	 */
	public function __construct($client, $r) {
		parent::__construct($client);
		$this->apiDeserialize($r);
	}
	
	/**
	 * @access protected
	 * @ignore
	 * @return int
	 */
	protected function get_memoryGib() {
		return $this->get_memoryMib() >> 10;
	}
	
	/**
	 * @access public
	 * @readOnly
	 */
	
	
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
	private function get_id() {
		return $this->m_id;
	}
	
	/**
	 * @access public
	 * @readOnly
	 */
	
	
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
	private function get_name() {
		return $this->m_name;
	}
	
	/**
	 * @access public
	 * @readOnly
	 */
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_cpu = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return int
	 */
	private function get_cpu() {
		return $this->m_cpu;
	}
	
	/**
	 * @access public
	 * @readOnly
	 */
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_memoryMib = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return int
	 */
	private function get_memoryMib() {
		return $this->m_memoryMib;
	}
	
	/**
	 * @access public
	 * @readOnly
	 */
	
	
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
	private function get_serviceClass() {
		return $this->m_serviceClass;
	}
	
	/**
	 * @access public
	 * @readOnly
	 */
	
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access public
	 * @param mixed $r
	 */
	public function apiDeserialize($r) {
		$this->m_id = $r->{"ID"} == null ? null : "" . $r->{"ID"};
		$this->n_id = false;
		$this->m_name = $r->{"Name"} == null ? null : "" . $r->{"Name"};
		$this->n_name = false;
		$this->m_cpu = $r->{"CPU"} == null ? null : intval("" . $r->{"CPU"});
		$this->n_cpu = false;
		$this->m_memoryMib = $r->{"MemoryMB"} == null ? null : intval("" . $r->{"MemoryMB"});
		$this->n_memoryMib = false;
		$this->m_serviceClass = $r->{"ServiceClass"} == null ? null : "" . $r->{"ServiceClass"};
		$this->n_serviceClass = false;
	}
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access public
	 * @param boolean $withClean = false
	 * @return mixed
	 */
	public function apiSerialize($withClean=false) {
		$ret = (object)[];
		if ($withClean || $this->n_id) {
			{
				$ret->{"ID"} = $this->m_id;
			};
		};
		if ($withClean || $this->n_name) {
			{
				$ret->{"Name"} = $this->m_name;
			};
		};
		if ($withClean || $this->n_cpu) {
			{
				$ret->{"CPU"} = $this->m_cpu;
			};
		};
		if ($withClean || $this->n_memoryMib) {
			{
				$ret->{"MemoryMB"} = $this->m_memoryMib;
			};
		};
		if ($withClean || $this->n_serviceClass) {
			{
				$ret->{"ServiceClass"} = $this->m_serviceClass;
			};
		};
		return $ret;
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "memoryGib": return $this->get_memoryGib();
			case "id": return $this->get_id();
			case "name": return $this->get_name();
			case "cpu": return $this->get_cpu();
			case "memoryMib": return $this->get_memoryMib();
			case "serviceClass": return $this->get_serviceClass();
			default: return null;
		}
	}

}

