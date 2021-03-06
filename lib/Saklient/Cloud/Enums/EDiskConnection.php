<?php

namespace Saklient\Cloud\Enums;

require_once __DIR__ . "/../../../Saklient/Cloud/Enums/EnumBase.php";
use \Saklient\Cloud\Enums\EnumBase;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/** ディスクの接続方式を表す列挙子。 */
class EDiskConnection extends EnumBase {
	
	/** @access public */
	const ide = "ide";
	
	/** @access public */
	const virtio = "virtio";
	
	
	
	/** @ignore */
	static function _map() {
		return [
			"ide" => 100,
			"virtio" => 300
		];
	}
	
	

}

