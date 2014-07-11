<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Errors/HttpServiceUnavailableException.php";
use \SakuraInternet\Saclient\Cloud\Errors\HttpServiceUnavailableException;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * サービスが利用できません。サーバを停止できません。再度お試しください。
 */
class ServerCouldNotStopException extends HttpServiceUnavailableException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "サービスが利用できません。サーバを停止できません。再度お試しください。";
	
	

}

