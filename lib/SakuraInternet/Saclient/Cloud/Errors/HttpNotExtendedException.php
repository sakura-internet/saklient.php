<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

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
