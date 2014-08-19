<?php

namespace Saklient\Cloud;

require_once dirname(__FILE__) . "/../../Saklient/Cloud/Model/Model_ServerPlan.php";
use \Saklient\Cloud\Model\Model_ServerPlan;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Model/Model_DiskPlan.php";
use \Saklient\Cloud\Model\Model_DiskPlan;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Model/Model_RouterPlan.php";
use \Saklient\Cloud\Model\Model_RouterPlan;
require_once dirname(__FILE__) . "/../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once dirname(__FILE__) . "/../../Saklient/Util.php";
use \Saklient\Util;
require_once dirname(__FILE__) . "/../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/**
 * 商品情報にアクセスするためのモデルを集めたクラス。
 * 
 * @property-read \Saklient\Cloud\Model\Model_ServerPlan $server サーバプラン情報。 
 * @property-read \Saklient\Cloud\Model\Model_DiskPlan $disk ディスクプラン情報。 
 * @property-read \Saklient\Cloud\Model\Model_RouterPlan $router ルータ帯域プラン情報。 
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
	 * @return \Saklient\Cloud\Model\Model_ServerPlan
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
	 * @return \Saklient\Cloud\Model\Model_DiskPlan
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
	 * @return \Saklient\Cloud\Model\Model_RouterPlan
	 */
	protected function get_router()
	{
		return $this->_router;
	}
	
	
	
	/**
	 * @ignore
	 * @access public
	 * @param \Saklient\Cloud\Client $client
	 */
	public function __construct(\Saklient\Cloud\Client $client)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($client, "\\Saklient\\Cloud\\Client");
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

