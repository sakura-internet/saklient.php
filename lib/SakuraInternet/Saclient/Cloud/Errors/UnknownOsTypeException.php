<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Errors/HttpServiceUnavailableException.php";
use \SakuraInternet\Saclient\Errors\HttpServiceUnavailableException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * サービスが利用できません。ディスクにインストールされたOSが特定できないため、正しく修正できません。
 */
class UnknownOsTypeException extends HttpServiceUnavailableException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "サービスが利用できません。ディスクにインストールされたOSが特定できないため、正しく修正できません。";
	
	

}

