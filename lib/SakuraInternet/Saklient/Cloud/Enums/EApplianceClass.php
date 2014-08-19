<?php

namespace SakuraInternet\Saklient\Cloud\Enums;

require_once dirname(__FILE__) . "/../../../Saklient/Cloud/Enums/EnumBase.php";
use \SakuraInternet\Saklient\Cloud\Enums\EnumBase;
require_once dirname(__FILE__) . "/../../../Saklient/Util.php";
use \SakuraInternet\Saklient\Util;
require_once dirname(__FILE__) . "/../../../Saklient/Errors/SaklientException.php";
use \SakuraInternet\Saklient\Errors\SaklientException;

/** アプライアンスのクラスを表す列挙子。 */
class EApplianceClass extends EnumBase {
	
	/** @access public */
	const loadbalancer = "loadbalancer";
	
	/** @access public */
	const vpcrouter = "vpcrouter";
	
	
	
	/** @ignore */
	static function _map() {
		return [
			"loadbalancer" => 10,
			"vpcrouter" => 20
		];
	}
	
	

}

