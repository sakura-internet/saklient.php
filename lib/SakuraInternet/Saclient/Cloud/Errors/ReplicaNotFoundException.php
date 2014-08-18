<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Errors/HttpNotFoundException.php";
use \SakuraInternet\Saclient\Errors\HttpNotFoundException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/** 対象が見つかりません。このストレージには指定リソースの複製が存在しません。 */
class ReplicaNotFoundException extends HttpNotFoundException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "対象が見つかりません。このストレージには指定リソースの複製が存在しません。";
	
	

}

