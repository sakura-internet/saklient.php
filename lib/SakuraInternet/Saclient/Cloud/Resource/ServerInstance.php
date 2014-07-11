<?php

namespace SakuraInternet\Saclient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Client.php";
use \SakuraInternet\Saclient\Cloud\Client;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Resource.php";
use \SakuraInternet\Saclient\Cloud\Resource\Resource;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Enums/EServerInstanceStatus.php";
use \SakuraInternet\Saclient\Cloud\Enums\EServerInstanceStatus;

/**
 * サーバインスタンスのリソース情報へのアクセス機能や操作機能を備えたクラス。
 * 
 * @property-read string $status
 * @property-read string $beforeStatus
 * @property-read NativeDate $statusChangedAt
 */
class ServerInstance extends Resource {
	
	/**
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_status;
	
	/**
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_beforeStatus;
	
	/**
	 * @access protected
	 * @ignore
	 * @var NativeDate
	 */
	protected $m_statusChangedAt;
	
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
	 * サーバが起動しているときtrueを返します。
	 * 
	 * @access public
	 * @return boolean
	 */
	public function isUp()
	{
		return $this->get_status() != null && EServerInstanceStatus::compare($this->get_status(), EServerInstanceStatus::up) == 0;
	}
	
	/**
	 * サーバが停止しているときtrueを返します。
	 * 
	 * @access public
	 * @return boolean
	 */
	public function isDown()
	{
		return $this->get_status() == null || EServerInstanceStatus::compare($this->get_status(), EServerInstanceStatus::down) == 0;
	}
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_status = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_status()
	{
		return $this->m_status;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_beforeStatus = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return string
	 */
	private function get_beforeStatus()
	{
		return $this->m_beforeStatus;
	}
	
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_statusChangedAt = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return NativeDate
	 */
	private function get_statusChangedAt()
	{
		return $this->m_statusChangedAt;
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
		if (array_key_exists("Status", $r)) {
			$this->m_status = $r->{"Status"} == null ? null : "" . $r->{"Status"};
		}
		else {
			$this->m_status = null;
			$this->isIncomplete = true;
		}
		$this->n_status = false;
		if (array_key_exists("BeforeStatus", $r)) {
			$this->m_beforeStatus = $r->{"BeforeStatus"} == null ? null : "" . $r->{"BeforeStatus"};
		}
		else {
			$this->m_beforeStatus = null;
			$this->isIncomplete = true;
		}
		$this->n_beforeStatus = false;
		if (array_key_exists("StatusChangedAt", $r)) {
			$this->m_statusChangedAt = $r->{"StatusChangedAt"} == null ? null : Util::str2date("" . $r->{"StatusChangedAt"});
		}
		else {
			$this->m_statusChangedAt = null;
			$this->isIncomplete = true;
		}
		$this->n_statusChangedAt = false;
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
		if ($withClean || $this->n_status) {
			$ret->{"Status"} = $this->m_status;
		}
		if ($withClean || $this->n_beforeStatus) {
			$ret->{"BeforeStatus"} = $this->m_beforeStatus;
		}
		if ($withClean || $this->n_statusChangedAt) {
			$ret->{"StatusChangedAt"} = $this->m_statusChangedAt == null ? null : Util::date2str($this->m_statusChangedAt);
		}
		return $ret;
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "status": return $this->get_status();
			case "beforeStatus": return $this->get_beforeStatus();
			case "statusChangedAt": return $this->get_statusChangedAt();
			default: return null;
		}
	}

}

