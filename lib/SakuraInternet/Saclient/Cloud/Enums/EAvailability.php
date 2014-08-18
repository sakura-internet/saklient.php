<?php

namespace SakuraInternet\Saclient\Cloud\Enums;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Enums/EnumBase.php";
use \SakuraInternet\Saclient\Cloud\Enums\EnumBase;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;
require_once dirname(__FILE__) . "/../../../Saclient/Errors/SaclientException.php";
use \SakuraInternet\Saclient\Errors\SaclientException;

/** リソースの有効性を表す列挙子。 */
class EAvailability extends EnumBase {
	
	/** @access public */
	const selectable = "selectable";
	
	/** @access public */
	const migrating = "migrating";
	
	/** @access public */
	const precreate = "precreate";
	
	/** @access public */
	const replicating = "replicating";
	
	/** @access public */
	const transfering = "transfering";
	
	/** @access public */
	const stopped = "stopped";
	
	/** @access public */
	const failed = "failed";
	
	/** @access public */
	const charged = "charged";
	
	/** @access public */
	const uploading = "uploading";
	
	/** @access public */
	const available = "available";
	
	
	
	/** @ignore */
	static function _map() {
		return [
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

