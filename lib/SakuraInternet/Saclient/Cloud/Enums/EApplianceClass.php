<?php

namespace SakuraInternet\Saclient\Cloud\Enums;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Enums/EnumBase.php";
use \SakuraInternet\Saclient\Cloud\Enums\EnumBase;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;
require_once dirname(__FILE__) . "/../../../Saclient/Errors/SaclientException.php";
use \SakuraInternet\Saclient\Errors\SaclientException;

/** アプライアンスのクラスを表す列挙子。 */
class EApplianceClass extends EnumBase {
	
	/** @access public */
	const loadbalancer = "loadbalancer";
	
	/** @access public */
	const vpcrouter = "vpcrouter";
	
	
	
	/** @ignore */
	static function _map() {
		return [
			"loadbalancer" => 10,
			"vpcrouter" => 20
		];
	}
	
	

}

