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
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/**
 * ロードバランサの実体1つに対応し、属性の取得や操作を行うためのクラス。
 * 
 * @property-read \ArrayObject $virtualIps 仮想IPアドレス 
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
		$this->_virtualIps = new \ArrayObject([]);
		$settings = $this->rawSettings;
		if ($settings == null) {
			return;
		}
		$lb = $settings->{"LoadBalancer"};
		$vips = $lb;
		if ($vips == null) {
			return;
		}
		foreach ($vips as $vip) {
			$this->_virtualIps->append(new LbVirtualIp($vip));
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
	}
	
	/**
	 * @access public
	 * @param mixed $settings
	 * @return \Saklient\Cloud\Resources\LoadBalancer
	 */
	public function addVirtualIp($settings)
	{
		Util::validateArgCount(func_num_args(), 1);
		$this->_virtualIps->append(new LbVirtualIp($settings));
		return $this;
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
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "virtualIps": return $this->get_virtualIps();
			default: return parent::__get($key);
		}
	}

}

