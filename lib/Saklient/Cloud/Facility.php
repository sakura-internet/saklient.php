<?php

namespace Saklient\Cloud;

require_once __DIR__ . "/../../Saklient/Cloud/Models/Model_Region.php";
use \Saklient\Cloud\Models\Model_Region;
require_once __DIR__ . "/../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/**
 * 設備情報にアクセスするためのモデルを集めたクラス。
 * 
 * @property-read \Saklient\Cloud\Models\Model_Region $region リージョン情報。 
 */
class Facility {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Model_Region
	 */
	protected $_region;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \Saklient\Cloud\Models\Model_Region
	 */
	protected function get_region()
	{
		return $this->_region;
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
		$this->_region = new Model_Region($client);
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "region": return $this->get_region();
			default: return null;
		}
	}

}

