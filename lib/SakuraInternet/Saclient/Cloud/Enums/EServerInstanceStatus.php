<?php

namespace SakuraInternet\Saclient\Cloud\Enums;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Enums/EnumBase.php";
use \SakuraInternet\Saclient\Cloud\Enums\EnumBase;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

class EServerInstanceStatus extends EnumBase {
	
	/**
	 * @access public
	 */
	const down = "down";
	
	/**
	 * @access public
	 */
	const cleaning = "cleaning";
	
	/**
	 * @access public
	 */
	const starting = "starting";
	
	/**
	 * @access public
	 */
	const alive = "alive";
	
	/**
	 * @access public
	 */
	const suspended = "suspended";
	
	/**
	 * @access public
	 */
	const running = "running";
	
	/**
	 * @access public
	 */
	const active = "active";
	
	/**
	 * @access public
	 */
	const migrating = "migrating";
	
	/**
	 * @access public
	 */
	const up = "up";
	
	
	
	
	static function _map() {
		return [
			"down" => 0,
			"cleaning" => 5,
			"starting" => 10,
			"alive" => 49,
			"suspended" => 70,
			"running" => 80,
			"active" => 89,
			"migrating" => 90,
			"up" => 100
		];
	}
	
	

}

