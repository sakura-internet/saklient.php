<?php

namespace Saklient\Errors;

require_once __DIR__ . "/../../Saklient/Errors/HttpException.php";
use \Saklient\Errors\HttpException;
require_once __DIR__ . "/../../Saklient/Util.php";
use \Saklient\Util;

/** HTTPエラー。Request Timeout. */
class HttpRequestTimeoutException extends HttpException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "HTTPエラー。Request Timeout.";
	
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

