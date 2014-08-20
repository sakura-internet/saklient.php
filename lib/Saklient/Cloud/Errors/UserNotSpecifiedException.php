<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpForbiddenException.php";
use \Saklient\Errors\HttpForbiddenException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** 要求された操作は許可されていません。このAPIはユーザを特定できる認証方法でアクセスする必要があります。 */
class UserNotSpecifiedException extends HttpForbiddenException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作は許可されていません。このAPIはユーザを特定できる認証方法でアクセスする必要があります。";
	
	

}

