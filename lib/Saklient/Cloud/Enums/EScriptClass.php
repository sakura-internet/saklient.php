<?php

namespace Saklient\Cloud\Enums;

require_once __DIR__ . "/../../../Saklient/Cloud/Enums/EnumBase.php";
use \Saklient\Cloud\Enums\EnumBase;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

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

