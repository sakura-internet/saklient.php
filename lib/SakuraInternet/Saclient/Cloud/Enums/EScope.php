<?php

namespace SakuraInternet\Saclient\Cloud\Enums;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Enums/EnumBase.php";
use \SakuraInternet\Saclient\Cloud\Enums\EnumBase;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;
require_once dirname(__FILE__) . "/../../../Saclient/Errors/SaclientException.php";
use \SakuraInternet\Saclient\Errors\SaclientException;

/** リソースの公開範囲を表す列挙子。 */
class EScope extends EnumBase {
	
	/** @access public */
	const user = "user";
	
	/** @access public */
	const shared = "shared";
	
	
	
	/** @ignore */
	static function _map() {
		return [
			"user" => 100,
			"shared" => 200
		];
	}
	
	

}

