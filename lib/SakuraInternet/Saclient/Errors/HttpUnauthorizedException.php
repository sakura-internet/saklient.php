<?php

namespace SakuraInternet\Saclient\Errors;

require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpException.php";
use \SakuraInternet\Saclient\Errors\HttpException;
require_once dirname(__FILE__) . "/../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/** この操作は認証が必要です。IDまたはパスワードが誤っている可能性があります。 */
class HttpUnauthorizedException extends HttpException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "この操作は認証が必要です。IDまたはパスワードが誤っている可能性があります。";
	
	

}

