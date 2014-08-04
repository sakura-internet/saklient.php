<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Errors/HttpGatewayTimeoutException.php";
use \SakuraInternet\Saclient\Cloud\Errors\HttpGatewayTimeoutException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * APIプロクシが応答しません。要求は実行された可能性があります。しばらく時間をおいてからご確認ください。
 */
class ApiProxyTimeoutNonGetException extends HttpGatewayTimeoutException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "APIプロクシが応答しません。要求は実行された可能性があります。しばらく時間をおいてからご確認ください。";
	
	

}

