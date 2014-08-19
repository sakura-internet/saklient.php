<?php

namespace Saklient\Errors;

require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpException.php";
use \Saklient\Errors\HttpException;
require_once dirname(__FILE__) . "/../../Saklient/Util.php";
use \Saklient\Util;

/** HTTPエラー。Failed Dependency. */
class HttpFailedDependencyException extends HttpException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "HTTPエラー。Failed Dependency.";
	
	

}

