<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpGatewayTimeoutException.php";
use \Saklient\Errors\HttpGatewayTimeoutException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** APIプロクシが応答しません。要求は実行された可能性があります。しばらく時間をおいてからご確認ください。 */
class ApiProxyTimeoutNonGetException extends HttpGatewayTimeoutException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "APIプロクシが応答しません。要求は実行された可能性があります。しばらく時間をおいてからご確認ください。";
	
	/**
	 * @access public
	 * @param int $status
	 * @param string $code=null
	 * @param string $message=""
	 */
	public function __construct($status, $code=null, $message="")
	{
		parent::__construct($status, $code, $message);
	}
	
	

}

