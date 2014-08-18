<?php

namespace SakuraInternet\Saclient\Cloud\Enums;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Enums/EnumBase.php";
use \SakuraInternet\Saclient\Cloud\Enums\EnumBase;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;
require_once dirname(__FILE__) . "/../../../Saclient/Errors/SaclientException.php";
use \SakuraInternet\Saclient\Errors\SaclientException;

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

