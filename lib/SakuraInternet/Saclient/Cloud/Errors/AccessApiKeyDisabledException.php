<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Errors/HttpForbiddenException.php";
use \SakuraInternet\Saclient\Cloud\Errors\HttpForbiddenException;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * 要求された操作は許可されていません。APIキーによるアクセスはできません。
 */
class AccessApiKeyDisabledException extends HttpForbiddenException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作は許可されていません。APIキーによるアクセスはできません。";
	
	

}

