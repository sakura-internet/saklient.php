<?php

namespace Saklient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saklient/Errors/HttpForbiddenException.php";
use \Saklient\Errors\HttpForbiddenException;
require_once dirname(__FILE__) . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** 要求された操作は許可されていません。さくらインターネットの会員メニューより認証後に実行してください。 */
class AccessSakuraException extends HttpForbiddenException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作は許可されていません。さくらインターネットの会員メニューより認証後に実行してください。";
	
	

}

