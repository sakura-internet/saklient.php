<?php

namespace Saklient\Errors;

require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpException.php";
use \Saklient\Errors\HttpException;
require_once dirname(__FILE__) . "/../../Saklient/Util.php";
use \Saklient\Util;

/** この操作は認証が必要です。IDまたはパスワードが誤っている可能性があります。 */
class HttpUnauthorizedException extends HttpException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "この操作は認証が必要です。IDまたはパスワードが誤っている可能性があります。";
	
	

}

