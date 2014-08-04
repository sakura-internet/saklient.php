<?php

namespace SakuraInternet\Saclient\Errors;

require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpException.php";
use \SakuraInternet\Saclient\Errors\HttpException;
require_once dirname(__FILE__) . "/../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * HTTPエラー。Not Extended.
 */
class HttpNotExtendedException extends HttpException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "HTTPエラー。Not Extended.";
	
	

}

