<?php

namespace SakuraInternet\Saclient\Cloud\Enums;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Enums/EnumBase.php";
use \SakuraInternet\Saclient\Cloud\Enums\EnumBase;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

class EScope extends EnumBase {
	
	/**
	 * @access public
	 */
	const user = "user";
	
	/**
	 * @access public
	 */
	const shared = "shared";
	
	
	
	
	static function _map() {
		return [
			"user" => 100,
			"shared" => 200
		];
	}
	
	

}

