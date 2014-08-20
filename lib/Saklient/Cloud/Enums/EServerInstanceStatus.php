<?php

namespace Saklient\Cloud\Enums;

require_once __DIR__ . "/../../../Saklient/Cloud/Enums/EnumBase.php";
use \Saklient\Cloud\Enums\EnumBase;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

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

