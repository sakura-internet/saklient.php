<?php

namespace SakuraInternet\Saclient\Cloud\Enums;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Enums/EnumBase.php";
use \SakuraInternet\Saclient\Cloud\Enums\EnumBase;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;
require_once dirname(__FILE__) . "/../../../Saclient/Errors/SaclientException.php";
use \SakuraInternet\Saclient\Errors\SaclientException;

/** スクリプトのクラスを表す列挙子。 */
class EScriptClass extends EnumBase {
	
	/** @access public */
	const shell = "shell";
	
	/** @access public */
	const ansible = "ansible";
	
	
	
	/** @ignore */
	static function _map() {
		return [
			"shell" => 200,
			"ansible" => 300
		];
	}
	
	

}

