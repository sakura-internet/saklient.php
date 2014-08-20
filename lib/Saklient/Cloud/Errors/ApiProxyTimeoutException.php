<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpGatewayTimeoutException.php";
use \Saklient\Errors\HttpGatewayTimeoutException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** APIプロクシがタイムアウトしました。サーバが混雑している可能性があります。 */
class ApiProxyTimeoutException extends HttpGatewayTimeoutException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "APIプロクシがタイムアウトしました。サーバが混雑している可能性があります。";
	
	

}

