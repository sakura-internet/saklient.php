<?php

namespace SakuraInternet\Saclient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Client.php";
use \SakuraInternet\Saclient\Cloud\Client;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Resource.php";
use \SakuraInternet\Saclient\Cloud\Resource\Resource;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/IsoImage.php";
use \SakuraInternet\Saclient\Cloud\Resource\IsoImage;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Enums/EServerInstanceStatus.php";
use \SakuraInternet\Saclient\Cloud\Enums\EServerInstanceStatus;
require_once dirname(__FILE__) . "/../../../Saclient/Errors/SaclientException.php";
use \SakuraInternet\Saclient\Errors\SaclientException;

/**
 * サーバインスタンスのリソース情報へのアクセス機能や操作機能を備えたクラス。
 * 
 * @property-read string $status
 * @property-read string $beforeStatus
 * @property-read NativeDate $statusChangedAt
 * @property-read \SakuraInternet\Saclient\Cloud\Resource\IsoImage $isoImage
 */
class ServerInstance extends Resource {
	
	/**
	 * 起動状態
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_status;
	
	/**
	 * 前回の起動状態
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_beforeStatus;
	
	/**
	 * 現在の起動状態に変化した日時
	 * 
	 * @access protected
	 * @ignore
	 * @var NativeDate
	 */
	protected $m_statusChangedAt;
	
	/**
	 * 挿入されているISOイメージ
	 * 
	 * @access protected
	 * @ignore
	 * @var IsoImage
	 */
	protected $m_isoImage;
	
	/**
	 * @private
	 * @access public
	 * @param mixed $obj
	 * @param boolean $wrapped = false
	 * @param \SakuraInternet\Saclient\Cloud\Client $client
	 */
	public function __construct(\SakuraInternet\Saclient\Cloud\Client $client, $obj, $wrapped=false)
	{
		parent::__construct($client);
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($client, "\\SakuraInternet\\Saclient\\Cloud\\Client");
		Util::validateType($wrapped, "boolean");
		$this->apiDeserialize($obj, $wrapped);
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
	 * 起動状態
	 */
	
	
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
	 * 前回の起動状態
	 */
	
	
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
	 * 現在の起動状態に変化した日時
	 */
	
	
	/**
	 * @access private
	 * @ignore
	 * @var boolean
	 */
	private $n_isoImage = false;
	
	/**
	 * (This method is generated in Translator_default#buildImpl)
	 * 
	 * @access private
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Resource\IsoImage
	 */
	private function get_isoImage()
	{
		return $this->m_isoImage;
	}
	
	/**
	 * 挿入されているISOイメージ
	 */
	
	
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
		if (Util::existsPath($r, "Status")) {
			$this->m_status = Util::getByPath($r, "Status") == null ? null : "" . Util::getByPath($r, "Status");
		}
		else {
			$this->m_status = null;
			$this->isIncomplete = true;
		}
		$this->n_status = false;
		if (Util::existsPath($r, "BeforeStatus")) {
			$this->m_beforeStatus = Util::getByPath($r, "BeforeStatus") == null ? null : "" . Util::getByPath($r, "BeforeStatus");
		}
		else {
			$this->m_beforeStatus = null;
			$this->isIncomplete = true;
		}
		$this->n_beforeStatus = false;
		if (Util::existsPath($r, "StatusChangedAt")) {
			$this->m_statusChangedAt = Util::getByPath($r, "StatusChangedAt") == null ? null : Util::str2date("" . Util::getByPath($r, "StatusChangedAt"));
		}
		else {
			$this->m_statusChangedAt = null;
			$this->isIncomplete = true;
		}
		$this->n_statusChangedAt = false;
		if (Util::existsPath($r, "CDROM")) {
			$this->m_isoImage = Util::getByPath($r, "CDROM") == null ? null : new IsoImage($this->_client, Util::getByPath($r, "CDROM"));
		}
		else {
			$this->m_isoImage = null;
			$this->isIncomplete = true;
		}
		$this->n_isoImage = false;
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
		Util::validateType($withClean, "boolean");
		$ret = (object)[];
		if ($withClean || $this->n_status) {
			Util::setByPath($ret, "Status", $this->m_status);
		}
		if ($withClean || $this->n_beforeStatus) {
			Util::setByPath($ret, "BeforeStatus", $this->m_beforeStatus);
		}
		if ($withClean || $this->n_statusChangedAt) {
			Util::setByPath($ret, "StatusChangedAt", $this->m_statusChangedAt == null ? null : Util::date2str($this->m_statusChangedAt));
		}
		if ($withClean || $this->n_isoImage) {
			Util::setByPath($ret, "CDROM", $withClean ? ($this->m_isoImage == null ? null : $this->m_isoImage->apiSerialize($withClean)) : ($this->m_isoImage == null ? (object)['ID' => "0"] : $this->m_isoImage->apiSerializeID()));
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
			case "isoImage": return $this->get_isoImage();
			default: return null;
		}
	}

}

