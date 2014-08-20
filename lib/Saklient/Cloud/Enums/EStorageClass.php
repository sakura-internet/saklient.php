<?php

namespace Saklient\Cloud\Enums;

require_once __DIR__ . "/../../../Saklient/Cloud/Enums/EnumBase.php";
use \Saklient\Cloud\Enums\EnumBase;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/** ストレージのクラスを表す列挙子。 */
class EStorageClass extends EnumBase {
	
	/** @access public */
	const iscsi1204 = "iscsi1204";
	
	
	
	/** @ignore */
	static function _map() {
		return [
			"iscsi1204" => 110
		];
	}
	
	

}

