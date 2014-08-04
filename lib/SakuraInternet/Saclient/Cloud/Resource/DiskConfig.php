<?php

namespace SakuraInternet\Saclient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Client.php";
use \SakuraInternet\Saclient\Cloud\Client;

/**
 * ディスク修正のパラメータ
 * 
 * @property-read \SakuraInternet\Saclient\Cloud\Client $client
 * @property-read string $diskId
 * @property string $hostName
 * @property string $password
 * @property string $sshKey
 * @property string $ipAddress
 * @property string $defaultRoute
 * @property int $networkMaskLen
 */
class DiskConfig {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Client
	 */
	protected $_client;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Client
	 */
	protected function get_client()
	{
		return $this->_client;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_diskId;
	
	/**
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function get_diskId()
	{
		return $this->_diskId;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_hostName;
	
	/**
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function get_hostName()
	{
		return $this->_hostName;
	}
	
	/**
	 * @access protected
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	protected function set_hostName($v)
	{
		$this->_hostName = $v;
		return $v;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_password;
	
	/**
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function get_password()
	{
		return $this->_password;
	}
	
	/**
	 * @access protected
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	protected function set_password($v)
	{
		$this->_password = $v;
		return $v;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_sshKey;
	
	/**
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function get_sshKey()
	{
		return $this->_sshKey;
	}
	
	/**
	 * @access protected
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	protected function set_sshKey($v)
	{
		$this->_sshKey = $v;
		return $v;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_ipAddress;
	
	/**
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function get_ipAddress()
	{
		return $this->_ipAddress;
	}
	
	/**
	 * @access protected
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	protected function set_ipAddress($v)
	{
		$this->_ipAddress = $v;
		return $v;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_defaultRoute;
	
	/**
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function get_defaultRoute()
	{
		return $this->_defaultRoute;
	}
	
	/**
	 * @access protected
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	protected function set_defaultRoute($v)
	{
		$this->_defaultRoute = $v;
		return $v;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var int
	 */
	protected $_networkMaskLen;
	
	/**
	 * @access protected
	 * @ignore
	 * @return int
	 */
	protected function get_networkMaskLen()
	{
		return $this->_networkMaskLen;
	}
	
	/**
	 * @access protected
	 * @ignore
	 * @param int|null $v
	 * @return int
	 */
	protected function set_networkMaskLen($v)
	{
		$this->_networkMaskLen = $v;
		return $v;
	}
	
	
	
	/**
	 * @private
	 * @access public
	 * @param string $diskId
	 * @param \SakuraInternet\Saclient\Cloud\Client $client
	 */
	public function __construct(\SakuraInternet\Saclient\Cloud\Client $client, $diskId)
	{
		$this->_client = $client;
		$this->_diskId = $diskId;
		$this->_hostName = null;
		$this->_password = null;
		$this->_sshKey = null;
		$this->_ipAddress = null;
		$this->_defaultRoute = null;
		$this->_networkMaskLen = null;
	}
	
	/**
	 * *
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\DiskConfig
	 */
	public function write()
	{
		$q = (object)[];
		if ($this->_hostName != null) {
			Util::setByPath($q, "HostName", $this->_hostName);
		}
		if ($this->_password != null) {
			Util::setByPath($q, "Password", $this->_password);
		}
		if ($this->_sshKey != null) {
			Util::setByPath($q, "SSHKey.PublicKey", $this->_sshKey);
		}
		if ($this->_ipAddress != null) {
			Util::setByPath($q, "UserIPAddress", $this->_ipAddress);
		}
		if ($this->_defaultRoute != null) {
			Util::setByPath($q, "UserSubnet.DefaultRoute", $this->_defaultRoute);
		}
		if ($this->_networkMaskLen != null) {
			Util::setByPath($q, "UserSubnet.NetworkMaskLen", $this->_networkMaskLen);
		}
		$path = "/disk/" . $this->_diskId . "/config";
		$result = $this->_client->request("PUT", $path, $q);
		return $this;
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "client": return $this->get_client();
			case "diskId": return $this->get_diskId();
			case "hostName": return $this->get_hostName();
			case "password": return $this->get_password();
			case "sshKey": return $this->get_sshKey();
			case "ipAddress": return $this->get_ipAddress();
			case "defaultRoute": return $this->get_defaultRoute();
			case "networkMaskLen": return $this->get_networkMaskLen();
			default: return null;
		}
	}
	
	/**
	 * @ignore
	 */
	public function __set($key, $v) {
		switch ($key) {
			case "hostName": return $this->set_hostName($v);
			case "password": return $this->set_password($v);
			case "sshKey": return $this->set_sshKey($v);
			case "ipAddress": return $this->set_ipAddress($v);
			case "defaultRoute": return $this->set_defaultRoute($v);
			case "networkMaskLen": return $this->set_networkMaskLen($v);
			default: return $v;
		}
	}

}

