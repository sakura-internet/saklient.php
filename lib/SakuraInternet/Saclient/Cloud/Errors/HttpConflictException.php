<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * 要求された操作を行えません。現在の対象の状態では、この操作を受け付けできません。
 */
class HttpConflictException extends HttpException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作を行えません。現在の対象の状態では、この操作を受け付けできません。";
	
	

}

