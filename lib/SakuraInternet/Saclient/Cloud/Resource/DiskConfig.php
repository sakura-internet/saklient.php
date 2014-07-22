<?php

namespace SakuraInternet\Saclient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Client.php";
use \SakuraInternet\Saclient\Cloud\Client;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * ディスク修正のパラメータ
 * 
 * @property-read \SakuraInternet\Saclient\Cloud\Client $client
 * @property-read string $diskId
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
	 * @access public
	 * @var string
	 */
	public $hostName;
	
	/**
	 * @access public
	 * @var string
	 */
	public $password;
	
	/**
	 * @access public
	 * @var string
	 */
	public $sshKey;
	
	/**
	 * @access public
	 * @var string
	 */
	public $ipAddress;
	
	/**
	 * @access public
	 * @var string
	 */
	public $gateway;
	
	/**
	 * @access public
	 * @var int
	 */
	public $networkMaskLen;
	
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
		$this->hostName = null;
		$this->password = null;
		$this->sshKey = null;
		$this->ipAddress = null;
		$this->gateway = null;
		$this->networkMaskLen = null;
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
		if ($this->hostName != null) {
			Util::setByPath($q, "HostName", $this->hostName);
		}
		if ($this->password != null) {
			Util::setByPath($q, "Password", $this->password);
		}
		if ($this->sshKey != null) {
			Util::setByPath($q, "SSHKey.PublicKey", $this->sshKey);
		}
		if ($this->ipAddress != null) {
			Util::setByPath($q, "UserIPAddress", $this->ipAddress);
		}
		if ($this->gateway != null) {
			Util::setByPath($q, "UserSubnet.DefaultRoute", $this->gateway);
		}
		if ($this->networkMaskLen != null) {
			Util::setByPath($q, "UserSubnet.NetworkMaskLen", $this->networkMaskLen);
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
			default: return null;
		}
	}

}

