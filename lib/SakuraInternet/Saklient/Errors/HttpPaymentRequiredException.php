<?php

namespace SakuraInternet\Saklient\Errors;

require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpException.php";
use \SakuraInternet\Saklient\Errors\HttpException;
require_once dirname(__FILE__) . "/../../Saklient/Util.php";
use \SakuraInternet\Saklient\Util;

/** HTTPエラー。Payment Required. */
class HttpPaymentRequiredException extends HttpException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "HTTPエラー。Payment Required.";
	
	

}

