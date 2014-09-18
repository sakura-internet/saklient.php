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
	 * @param int $status
	 * @param string $code=null
	 * @param string $message=""
	 */
	public function __construct($status, $code=null, $message="")
	{
		parent::__construct($status, $code, $message == null || $message == "" ? "この操作は認証が必要です。IDまたはパスワードが誤っている可能性があります。" : $message);
	}
	
	

}

