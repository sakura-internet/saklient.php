<?php

namespace SakuraInternet\Saclient\Cloud\Enums;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Enums/EnumBase.php";
use \SakuraInternet\Saclient\Cloud\Enums\EnumBase;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;
require_once dirname(__FILE__) . "/../../../Saclient/Errors/SaclientException.php";
use \SakuraInternet\Saclient\Errors\SaclientException;

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
			"active" => 89,
			"migrating" => 90,
			"up" => 100
		];
	}
	
	

}

