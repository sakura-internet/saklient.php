<?php

namespace SakuraInternet\Saclient\Cloud;

require_once dirname(__FILE__) . "/../../Saclient/Cloud/Model/Model_ServerPlan.php";
use \SakuraInternet\Saclient\Cloud\Model\Model_ServerPlan;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Model/Model_DiskPlan.php";
use \SakuraInternet\Saclient\Cloud\Model\Model_DiskPlan;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Model/Model_InternetPlan.php";
use \SakuraInternet\Saclient\Cloud\Model\Model_InternetPlan;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Client.php";
use \SakuraInternet\Saclient\Cloud\Client;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * @property-read \SakuraInternet\Saclient\Cloud\Model\Model_ServerPlan $server
 * @property-read \SakuraInternet\Saclient\Cloud\Model\Model_DiskPlan $disk
 * @property-read \SakuraInternet\Saclient\Cloud\Model\Model_InternetPlan $internet
 */
class Product {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Model_ServerPlan
	 */
	protected $_server;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_ServerPlan
	 */
	protected function get_server()
	{
		return $this->_server;
	}
	
	/**
	 * @access public
	 * @readOnly
	 */
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Model_DiskPlan
	 */
	protected $_disk;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_DiskPlan
	 */
	protected function get_disk()
	{
		return $this->_disk;
	}
	
	/**
	 * @access public
	 * @readOnly
	 */
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Model_InternetPlan
	 */
	protected $_internet;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_InternetPlan
	 */
	protected function get_internet()
	{
		return $this->_internet;
	}
	
	/**
	 * @access public
	 * @readOnly
	 */
	
	
	/**
	 * @access public
	 * @param \SakuraInternet\Saclient\Cloud\Client $client
	 */
	public function __construct($client)
	{
		$this->_server = new Model_ServerPlan($client);
		$this->_disk = new Model_DiskPlan($client);
		$this->_internet = new Model_InternetPlan($client);
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "server": return $this->get_server();
			case "disk": return $this->get_disk();
			case "internet": return $this->get_internet();
			default: return null;
		}
	}

}

