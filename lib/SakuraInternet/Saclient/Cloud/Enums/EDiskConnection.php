<?php

namespace SakuraInternet\Saclient\Cloud\Enums;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Enums/EnumBase.php";
use \SakuraInternet\Saclient\Cloud\Enums\EnumBase;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;
require_once dirname(__FILE__) . "/../../../Saclient/Errors/SaclientException.php";
use \SakuraInternet\Saclient\Errors\SaclientException;

class EDiskConnection extends EnumBase {
	
	/**
	 * @access public
	 */
	const ide = "ide";
	
	/**
	 * @access public
	 */
	const virtio = "virtio";
	
	
	
	
	static function _map() {
		return [
			"ide" => 100,
			"virtio" => 300
		];
	}
	
	

}

