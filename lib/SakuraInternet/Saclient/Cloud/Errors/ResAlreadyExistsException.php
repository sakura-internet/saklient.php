<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Errors/HttpConflictException.php";
use \SakuraInternet\Saclient\Cloud\Errors\HttpConflictException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * 要求された操作を行えません。このIDのリソースは既に存在します。
 */
class ResAlreadyExistsException extends HttpConflictException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作を行えません。このIDのリソースは既に存在します。";
	
	

}

