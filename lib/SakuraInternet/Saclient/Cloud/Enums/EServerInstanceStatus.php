<?php

namespace SakuraInternet\Saclient\Cloud\Enums;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Enums/EnumBase.php";
use \SakuraInternet\Saclient\Cloud\Enums\EnumBase;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;
require_once dirname(__FILE__) . "/../../../Saclient/Errors/SaclientException.php";
use \SakuraInternet\Saclient\Errors\SaclientException;

/** サーバの起動状態を表す列挙子。 */
class EServerInstanceStatus extends EnumBase {
	
	/** @access public */
	const down = "down";
	
	/** @access public */
	const cleaning = "cleaning";
	
	/** @access public */
	const up = "up";
	
	
	
	/** @ignore */
	static function _map() {
		return [
			"down" => 0,
			"cleaning" => 5,
			"up" => 100
		];
	}
	
	

}

