<?php

namespace SakuraInternet\Saclient\Cloud\Enums;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Enums/EnumBase.php";
use \SakuraInternet\Saclient\Cloud\Enums\EnumBase;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

class EApplianceClass extends EnumBase {
	
	/**
	 * @access public
	 */
	const loadbalancer = "loadbalancer";
	
	/**
	 * @access public
	 */
	const vpcrouter = "vpcrouter";
	
	
	
	
	static function _map() {
		return [
			"loadbalancer" => 10,
			"vpcrouter" => 20
		];
	}
	
	

}

