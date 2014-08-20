<?php

namespace Saklient\Cloud\Enums;

require_once __DIR__ . "/../../../Saklient/Cloud/Enums/EnumBase.php";
use \Saklient\Cloud\Enums\EnumBase;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

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

