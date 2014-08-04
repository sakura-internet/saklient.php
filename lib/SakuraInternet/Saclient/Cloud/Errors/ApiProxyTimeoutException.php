<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Errors/HttpGatewayTimeoutException.php";
use \SakuraInternet\Saclient\Cloud\Errors\HttpGatewayTimeoutException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * APIプロクシがタイムアウトしました。サーバが混雑している可能性があります。
 */
class ApiProxyTimeoutException extends HttpGatewayTimeoutException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "APIプロクシがタイムアウトしました。サーバが混雑している可能性があります。";
	
	

}

