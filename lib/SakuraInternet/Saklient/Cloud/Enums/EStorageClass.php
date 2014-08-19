<?php

namespace SakuraInternet\Saklient\Cloud\Enums;

require_once dirname(__FILE__) . "/../../../Saklient/Cloud/Enums/EnumBase.php";
use \SakuraInternet\Saklient\Cloud\Enums\EnumBase;
require_once dirname(__FILE__) . "/../../../Saklient/Util.php";
use \SakuraInternet\Saklient\Util;
require_once dirname(__FILE__) . "/../../../Saklient/Errors/SaklientException.php";
use \SakuraInternet\Saklient\Errors\SaklientException;

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

