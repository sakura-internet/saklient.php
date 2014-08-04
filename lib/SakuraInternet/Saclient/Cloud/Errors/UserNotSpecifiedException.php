<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Errors/HttpForbiddenException.php";
use \SakuraInternet\Saclient\Cloud\Errors\HttpForbiddenException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * 要求された操作は許可されていません。このAPIはユーザを特定できる認証方法でアクセスする必要があります。
 */
class UserNotSpecifiedException extends HttpForbiddenException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作は許可されていません。このAPIはユーザを特定できる認証方法でアクセスする必要があります。";
	
	

}

