<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpForbiddenException.php";
use \Saklient\Errors\HttpForbiddenException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** 要求された操作は許可されていません。XHRまたはAPIキーによるアクセスのみ許可されています。 */
class AccessXhrOrApiKeyException extends HttpForbiddenException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作は許可されていません。XHRまたはAPIキーによるアクセスのみ許可されています。";
	
	

}
