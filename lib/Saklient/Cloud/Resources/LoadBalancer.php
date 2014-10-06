<?php

namespace Saklient\Cloud\Resources;

require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;
require_once __DIR__ . "/../../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Appliance.php";
use \Saklient\Cloud\Resources\Appliance;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** ロードバランサの実体1つに対応し、属性の取得や操作を行うためのクラス。 */
class LoadBalancer extends Appliance {
	
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
	
	

}

