<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Errors/HttpForbiddenException.php";
use \SakuraInternet\Saclient\Cloud\Errors\HttpForbiddenException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * 要求された操作は許可されていません。この操作は有効期限内のトークンが必要です。
 */
class AccessTokenException extends HttpForbiddenException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作は許可されていません。この操作は有効期限内のトークンが必要です。";
	
	

}

