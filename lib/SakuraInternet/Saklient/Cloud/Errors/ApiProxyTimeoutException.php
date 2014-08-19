<?php

namespace SakuraInternet\Saklient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saklient/Errors/HttpGatewayTimeoutException.php";
use \SakuraInternet\Saklient\Errors\HttpGatewayTimeoutException;
require_once dirname(__FILE__) . "/../../../Saklient/Util.php";
use \SakuraInternet\Saklient\Util;

/** APIプロクシがタイムアウトしました。サーバが混雑している可能性があります。 */
class ApiProxyTimeoutException extends HttpGatewayTimeoutException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "APIプロクシがタイムアウトしました。サーバが混雑している可能性があります。";
	
	

}

