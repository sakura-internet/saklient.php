<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Errors/HttpBadRequestException.php";
use \SakuraInternet\Saclient\Errors\HttpBadRequestException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * 不適切な要求です。アカウントが存在しません。IDをご確認ください。
 */
class AccountNotFoundException extends HttpBadRequestException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "不適切な要求です。アカウントが存在しません。IDをご確認ください。";
	
	

}

