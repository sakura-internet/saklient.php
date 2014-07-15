<?php

namespace SakuraInternet\Saclient\Cloud\Enums;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Enums/EnumBase.php";
use \SakuraInternet\Saclient\Cloud\Enums\EnumBase;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

class EAvailability extends EnumBase {
	
	/**
	 * @access public
	 */
	const unavailable = "unavailable";
	
	/**
	 * @access public
	 */
	const creating = "creating";
	
	/**
	 * @access public
	 */
	const prepared = "prepared";
	
	/**
	 * @access public
	 */
	const discontinued = "discontinued";
	
	/**
	 * @access public
	 */
	const visible = "visible";
	
	/**
	 * @access public
	 */
	const abnormal = "abnormal";
	
	/**
	 * @access public
	 */
	const recoverable = "recoverable";
	
	/**
	 * @access public
	 */
	const disabled = "disabled";
	
	/**
	 * @access public
	 */
	const selectable = "selectable";
	
	/**
	 * @access public
	 */
	const migrating = "migrating";
	
	/**
	 * @access public
	 */
	const precreate = "precreate";
	
	/**
	 * @access public
	 */
	const replicating = "replicating";
	
	/**
	 * @access public
	 */
	const transfering = "transfering";
	
	/**
	 * @access public
	 */
	const stopped = "stopped";
	
	/**
	 * @access public
	 */
	const failed = "failed";
	
	/**
	 * @access public
	 */
	const charged = "charged";
	
	/**
	 * @access public
	 */
	const uploading = "uploading";
	
	/**
	 * @access public
	 */
	const available = "available";
	
	
	
	
	static function _map() {
		return [
			"unavailable" => 0,
			"creating" => 10,
			"prepared" => 20,
			"discontinued" => 30,
			"visible" => 49,
			"abnormal" => 50,
			"recoverable" => 59,
			"disabled" => 60,
			"selectable" => 69,
			"migrating" => 70,
			"precreate" => 71,
			"replicating" => 72,
			"transfering" => 73,
			"stopped" => 75,
			"failed" => 78,
			"charged" => 79,
			"uploading" => 80,
			"available" => 100
		];
	}
	
	

}

