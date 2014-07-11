<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Errors/HttpConflictException.php";
use \SakuraInternet\Saclient\Cloud\Errors\HttpConflictException;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * 要求された操作を行えません。サーバとの接続を切り離した後に実行してください。
 */
class DisconnectB4DeleteException extends HttpConflictException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作を行えません。サーバとの接続を切り離した後に実行してください。";
	
	

}

