<?php

namespace Saklient\Errors;

require_once __DIR__ . "/../../Saklient/Errors/HttpException.php";
use \Saklient\Errors\HttpException;
require_once __DIR__ . "/../../Saklient/Util.php";
use \Saklient\Util;

/** HTTPエラー。Locked. */
class HttpLockedException extends HttpException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "HTTPエラー。Locked.";
	
	

}

