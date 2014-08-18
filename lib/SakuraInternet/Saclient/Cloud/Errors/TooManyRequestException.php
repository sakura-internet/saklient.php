<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Errors/HttpServiceUnavailableException.php";
use \SakuraInternet\Saclient\Errors\HttpServiceUnavailableException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/** 要求を受け付けできません。リクエストの密度が高すぎます。 */
class TooManyRequestException extends HttpServiceUnavailableException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求を受け付けできません。リクエストの密度が高すぎます。";
	
	

}

