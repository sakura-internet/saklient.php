<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Errors/HttpConflictException.php";
use \SakuraInternet\Saclient\Errors\HttpConflictException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/** 要求された操作を行えません。サーバとの接続を切り離した後に実行してください。 */
class DisconnectB4DeleteException extends HttpConflictException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作を行えません。サーバとの接続を切り離した後に実行してください。";
	
	

}

