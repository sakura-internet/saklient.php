<?php

namespace SakuraInternet\Saklient\Cloud\Enums;

require_once dirname(__FILE__) . "/../../../Saklient/Cloud/Enums/EnumBase.php";
use \SakuraInternet\Saklient\Cloud\Enums\EnumBase;
require_once dirname(__FILE__) . "/../../../Saklient/Util.php";
use \SakuraInternet\Saklient\Util;
require_once dirname(__FILE__) . "/../../../Saklient/Errors/SaklientException.php";
use \SakuraInternet\Saklient\Errors\SaklientException;

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

