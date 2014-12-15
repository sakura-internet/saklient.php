<?php

namespace Saklient\Cloud\Resources;

require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;
require_once __DIR__ . "/../../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Appliance.php";
use \Saklient\Cloud\Resources\Appliance;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/LbVirtualIp.php";
use \Saklient\Cloud\Resources\LbVirtualIp;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Swytch.php";
use \Saklient\Cloud\Resources\Swytch;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Ipv4Net.php";
use \Saklient\Cloud\Resources\Ipv4Net;
require_once __DIR__ . "/../../../Saklient/Cloud/Enums/EApplianceClass.php";
use \Saklient\Cloud\Enums\EApplianceClass;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/**
 * ロードバランサの実体1つに対応し、属性の取得や操作を行うためのクラス。
 * 
 * @property-read \ArrayObject $virtualIps 仮想IPアドレス {@link \Saklient\Cloud\Resources\LbVirtualIp} の配列 
 * @property string $defaultRoute デフォルトルート 
 * @property int $maskLen マスク長 
 * @property int $vrid VRID 
 */
class LoadBalancer extends Appliance {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var LbVirtualIp[]
	 */
	protected $_virtualIps;
	
	/**
	 * @access public
	 * @ignore
	 * @return \Saklient\Cloud\Resources\LbVirtualIp[]
	 */
	public function get_virtualIps()
	{
		return $this->_virtualIps;
	}
	
	
	
	/**
	 * @access public
	 * @ignore
	 * @return string
	 */
	public function get_defaultRoute()
	{
		return Util::getByPath($this->rawAnnotation, "Network.DefaultRoute");
	}
	
	/**
	 * @access public
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	public function set_defaultRoute($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "string");
		Util::setByPath($this->rawAnnotation, "Network.DefaultRoute", $v);
		return $v;
	}
	
	
	
	/**
	 * @access public
	 * @ignore
	 * @return int
	 */
	public function get_maskLen()
	{
		$maskLen = Util::getByPath($this->rawAnnotation, "Network.NetworkMaskLen");
		if ($maskLen == null) {
			throw new SaklientException("invalid_data", "Data of the resource is invalid");
		}
		return intval($maskLen);
	}
	
	/**
	 * @access public
	 * @ignore
	 * @param int $v
	 * @return int
	 */
	public function set_maskLen($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "int");
		Util::setByPath($this->rawAnnotation, "Network.NetworkMaskLen", $v);
		return $v;
	}
	
	
	
	/**
	 * @access public
	 * @ignore
	 * @return int
	 */
	public function get_vrid()
	{
		$vrid = Util::getByPath($this->rawAnnotation, "VRRP.VRID");
		if ($vrid == null) {
			throw new SaklientException("invalid_data", "Data of the resource is invalid");
		}
		return intval($vrid);
	}
	
	/**
	 * @access public
	 * @ignore
	 * @param int $v
	 * @return int
	 */
	public function set_vrid($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "int");
		Util::setByPath($this->rawAnnotation, "VRRP.VRID", $v);
		return $v;
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
		parent::__construct($client, $obj, $wrapped);
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($client, "\\Saklient\\Cloud\\Client");
		Util::validateType($wrapped, "boolean");
		if ($this->rawAnnotation == null) {
			$this->rawAnnotation = (object)[];
		}
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @param mixed $r
	 * @param mixed $root
	 * @return void
	 */
	protected function _onAfterApiDeserialize($r, $root)
	{
		Util::validateArgCount(func_num_args(), 2);
		if ($this->rawAnnotation == null) {
			$this->rawAnnotation = (object)[];
		}
		$this->_virtualIps = new \ArrayObject([]);
		$settings = $this->rawSettings;
		if ($settings != null) {
			$lb = $settings->{"LoadBalancer"};
			if ($lb == null) {
				$lb = new \ArrayObject([]);
			}
			$vips = $lb;
			foreach ($vips as $vip) {
				$this->_virtualIps->append(new LbVirtualIp($vip));
			}
		}
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @param boolean $withClean
	 * @return void
	 */
	protected function _onBeforeApiSerialize($withClean)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($withClean, "boolean");
		$lb = new \ArrayObject([]);
		foreach ($this->_virtualIps as $vip) {
			$lb->append($vip->toRawSettings());
		}
		if ($this->rawSettings == null) {
			$this->rawSettings = (object)[];
		}
		$this->rawSettings->{"LoadBalancer"} = $lb;
		if ($this->isNew) {
			$this->clazz = EApplianceClass::loadbalancer;
		}
	}
	
	/**
	 * @ignore
	 * @access public
	 * @param \Saklient\Cloud\Resources\Swytch $swytch
	 * @param int $vrid
	 * @param string[] $realIps
	 * @param boolean $isHighSpec=false
	 * @return \Saklient\Cloud\Resources\LoadBalancer
	 */
	public function setInitialParams(\Saklient\Cloud\Resources\Swytch $swytch, $vrid, $realIps, $isHighSpec=false)
	{
		Util::validateArgCount(func_num_args(), 3);
		Util::validateType($swytch, "\\Saklient\\Cloud\\Resources\\Swytch");
		Util::validateType($vrid, "int");
		Util::validateType($realIps, "\\ArrayObject");
		Util::validateType($isHighSpec, "boolean");
		$annot = $this->rawAnnotation;
		$this->vrid = $vrid;
		Util::setByPath($annot, "Switch.ID", $swytch->_id());
		if ($swytch->ipv4Nets != null && 0 < $swytch->ipv4Nets->count()) {
			$net = $swytch->ipv4Nets[0];
			$this->defaultRoute = $net->defaultRoute;
			$this->maskLen = $net->maskLen;
		}
		else {
			$this->defaultRoute = $swytch->userDefaultRoute;
			$this->maskLen = $swytch->userMaskLen;
		}
		$servers = new \ArrayObject([]);
		foreach ($realIps as $ip) {
			$servers->append((object)['IPAddress' => $ip]);
		}
		Util::setByPath($annot, "Servers", $servers);
		$this->planId = $isHighSpec ? 2 : 1;
		return $this;
	}
	
	/**
	 * @access public
	 * @return \Saklient\Cloud\Resources\LoadBalancer
	 */
	public function clearVirtualIps()
	{
		while (0 < $this->_virtualIps->count()) {
			Util::popAobj($this->_virtualIps);
		}
		return $this;
	}
	
	/**
	 * @access public
	 * @param mixed $settings=null
	 * @return \Saklient\Cloud\Resources\LbVirtualIp
	 */
	public function addVirtualIp($settings=null)
	{
		$ret = new LbVirtualIp($settings);
		$this->_virtualIps->append($ret);
		return $ret;
	}
	
	/**
	 * @access public
	 * @param string $address
	 * @return \Saklient\Cloud\Resources\LbVirtualIp
	 */
	public function getVirtualIpByAddress($address)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($address, "string");
		foreach ($this->_virtualIps as $vip) {
			if ($vip->virtualIpAddress == $address) {
				return $vip;
			}
		}
		return null;
	}
	
	/**
	 * @access public
	 * @return \Saklient\Cloud\Resources\LoadBalancer
	 */
	public function reloadStatus()
	{
		$result = $this->requestRetry("GET", $this->_apiPath() . "/" . Util::urlEncode($this->_id()) . "/status");
		$vips = $result->{"LoadBalancer"};
		foreach ($vips as $vipDyn) {
			$vipStr = $vipDyn->{"VirtualIPAddress"};
			$vip = $this->getVirtualIpByAddress($vipStr);
			if ($vip == null) {
				continue;
			}
			$vip->updateStatus($vipDyn->{"Servers"});
		}
		return $this;
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "virtualIps": return $this->get_virtualIps();
			case "defaultRoute": return $this->get_defaultRoute();
			case "maskLen": return $this->get_maskLen();
			case "vrid": return $this->get_vrid();
			default: return parent::__get($key);
		}
	}
	
	/**
	 * @ignore
	 */
	public function __set($key, $v) {
		switch ($key) {
			case "defaultRoute": return $this->set_defaultRoute($v);
			case "maskLen": return $this->set_maskLen($v);
			case "vrid": return $this->set_vrid($v);
			default: return parent::__set($key, $v);
		}
	}

}

