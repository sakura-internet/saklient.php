<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Errors/HttpConflictException.php";
use \SakuraInternet\Saclient\Cloud\Errors\HttpConflictException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * 要求された操作を行えません。現在のアカウントで使用している全てのリソースを削除した後に実行してください。
 */
class DeleteResB4AccountException extends HttpConflictException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作を行えません。現在のアカウントで使用している全てのリソースを削除した後に実行してください。";
	
	

}

