<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Errors/HttpException.php";
use \SakuraInternet\Saclient\Cloud\Errors\HttpException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * HTTPエラー。Gateway Timeout.
 */
class HttpGatewayTimeoutException extends HttpException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "HTTPエラー。Gateway Timeout.";
	
	

}

