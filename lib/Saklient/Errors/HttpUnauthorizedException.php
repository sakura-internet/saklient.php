<?php

namespace Saklient\Errors;

require_once __DIR__ . "/../../Saklient/Errors/HttpException.php";
use \Saklient\Errors\HttpException;
require_once __DIR__ . "/../../Saklient/Util.php";
use \Saklient\Util;

/** この操作は認証が必要です。IDまたはパスワードが誤っている可能性があります。 */
class HttpUnauthorizedException extends HttpException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "この操作は認証が必要です。IDまたはパスワードが誤っている可能性があります。";
	
	

}

