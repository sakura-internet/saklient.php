<?php

namespace SakuraInternet\Saclient\Cloud;

require_once dirname(__FILE__) . "/../../Saclient/Cloud/Model/Model_ServerPlan.php";
use \SakuraInternet\Saclient\Cloud\Model\Model_ServerPlan;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Model/Model_DiskPlan.php";
use \SakuraInternet\Saclient\Cloud\Model\Model_DiskPlan;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Model/Model_RouterPlan.php";
use \SakuraInternet\Saclient\Cloud\Model\Model_RouterPlan;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Client.php";
use \SakuraInternet\Saclient\Cloud\Client;
require_once dirname(__FILE__) . "/../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * @property-read \SakuraInternet\Saclient\Cloud\Model\Model_ServerPlan $server
 * @property-read \SakuraInternet\Saclient\Cloud\Model\Model_DiskPlan $disk
 * @property-read \SakuraInternet\Saclient\Cloud\Model\Model_RouterPlan $router
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
	 * @private
	 * @access protected
	 * @ignore
	 * @var Model_RouterPlan
	 */
	protected $_router;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_RouterPlan
	 */
	protected function get_router()
	{
		return $this->_router;
	}
	
	
	
	/**
	 * @access public
	 * @param \SakuraInternet\Saclient\Cloud\Client $client
	 */
	public function __construct(\SakuraInternet\Saclient\Cloud\Client $client)
	{
		$this->_server = new Model_ServerPlan($client);
		$this->_disk = new Model_DiskPlan($client);
		$this->_router = new Model_RouterPlan($client);
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "server": return $this->get_server();
			case "disk": return $this->get_disk();
			case "router": return $this->get_router();
			default: return null;
		}
	}

}

