<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Errors/HttpException.php";
use \SakuraInternet\Saclient\Cloud\Errors\HttpException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * HTTPエラー。Variant Also Negotiates.
 */
class HttpVariantAlsoNegotiatesException extends HttpException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "HTTPエラー。Variant Also Negotiates.";
	
	

}

