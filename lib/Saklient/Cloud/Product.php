<?php

namespace Saklient\Cloud;

require_once __DIR__ . "/../../Saklient/Cloud/Models/Model_ServerPlan.php";
use \Saklient\Cloud\Models\Model_ServerPlan;
require_once __DIR__ . "/../../Saklient/Cloud/Models/Model_DiskPlan.php";
use \Saklient\Cloud\Models\Model_DiskPlan;
require_once __DIR__ . "/../../Saklient/Cloud/Models/Model_RouterPlan.php";
use \Saklient\Cloud\Models\Model_RouterPlan;
require_once __DIR__ . "/../../Saklient/Cloud/Models/Model_LicenseInfo.php";
use \Saklient\Cloud\Models\Model_LicenseInfo;
require_once __DIR__ . "/../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/**
 * 商品情報にアクセスするためのモデルを集めたクラス。
 * 
 * @property-read \Saklient\Cloud\Models\Model_ServerPlan $server サーバプラン情報。 
 * @property-read \Saklient\Cloud\Models\Model_DiskPlan $disk ディスクプラン情報。 
 * @property-read \Saklient\Cloud\Models\Model_RouterPlan $router ルータ帯域プラン情報。 
 * @property-read \Saklient\Cloud\Models\Model_LicenseInfo $license ライセンス種別情報。 
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
	 * @return \Saklient\Cloud\Models\Model_ServerPlan
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
	 * @return \Saklient\Cloud\Models\Model_DiskPlan
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
	 * @return \Saklient\Cloud\Models\Model_RouterPlan
	 */
	protected function get_router()
	{
		return $this->_router;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Model_LicenseInfo
	 */
	protected $_license;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \Saklient\Cloud\Models\Model_LicenseInfo
	 */
	protected function get_license()
	{
		return $this->_license;
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
		$this->_license = new Model_LicenseInfo($client);
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "server": return $this->get_server();
			case "disk": return $this->get_disk();
			case "router": return $this->get_router();
			case "license": return $this->get_license();
			default: return null;
		}
	}

}

