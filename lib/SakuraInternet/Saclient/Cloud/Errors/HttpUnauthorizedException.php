<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * この操作は認証が必要です。IDまたはパスワードが誤っている可能性があります。
 */
class HttpUnauthorizedException extends HttpException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "この操作は認証が必要です。IDまたはパスワードが誤っている可能性があります。";
	
	

}

