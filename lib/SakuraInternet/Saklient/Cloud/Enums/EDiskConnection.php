<?php

namespace SakuraInternet\Saklient\Cloud\Enums;

require_once dirname(__FILE__) . "/../../../Saklient/Cloud/Enums/EnumBase.php";
use \SakuraInternet\Saklient\Cloud\Enums\EnumBase;
require_once dirname(__FILE__) . "/../../../Saklient/Util.php";
use \SakuraInternet\Saklient\Util;
require_once dirname(__FILE__) . "/../../../Saklient/Errors/SaklientException.php";
use \SakuraInternet\Saklient\Errors\SaklientException;

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

