<?php

namespace Saklient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once dirname(__FILE__) . "/../../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once dirname(__FILE__) . "/../../../Saklient/Cloud/Resource/Resource.php";
use \Saklient\Cloud\Resource\Resource;
require_once dirname(__FILE__) . "/../../../Saklient/Cloud/Resource/IsoImage.php";
use \Saklient\Cloud\Resource\IsoImage;
require_once dirname(__FILE__) . "/../../../Saklient/Cloud/Enums/EServerInstanceStatus.php";
use \Saklient\Cloud\Enums\EServerInstanceStatus;
require_once dirname(__FILE__) . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/**
 * サーバインスタンスの実体1つに対応し、属性の取得や操作を行うためのクラス。
 * 
 * @property-read string $status 起動状態 {@link \Saklient\Cloud\Enums\EServerInstanceStatus} 
 * @property-read string $beforeStatus 前回の起動状態 {@link \Saklient\Cloud\Enums\EServerInstanceStatus} 
 * @property-read NativeDate $statusChangedAt 現在の起動状態に変化した日時 
 * @property-read \Saklient\Cloud\Resource\IsoImage $isoImage 挿入されているISOイメージ 
 */
class ServerInstance extends Resource {
	
	/**
	 * 起動状態 {@link \Saklient\Cloud\Enums\EServerInstanceStatus}
	 * 
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $m_status;
	
	/**
	 * 前回の起動状態 {@link \Saklient\Cloud\Enums\EServerInstanceStatus}
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
	 * @return \Saklient\Cloud\Resource\IsoImage
	 */
	private function get_isoImage()
	{
		return $this->m_isoImage;
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
	 * @ignore
	 * @access protected
	 * @param boolean $withClean=false
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

