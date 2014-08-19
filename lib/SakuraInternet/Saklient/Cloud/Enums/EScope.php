<?php

namespace SakuraInternet\Saklient\Cloud\Enums;

require_once dirname(__FILE__) . "/../../../Saklient/Cloud/Enums/EnumBase.php";
use \SakuraInternet\Saklient\Cloud\Enums\EnumBase;
require_once dirname(__FILE__) . "/../../../Saklient/Util.php";
use \SakuraInternet\Saklient\Util;
require_once dirname(__FILE__) . "/../../../Saklient/Errors/SaklientException.php";
use \SakuraInternet\Saklient\Errors\SaklientException;

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

