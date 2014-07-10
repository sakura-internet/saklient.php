<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * 不適切な要求です。参照するリソースのサイズが合致しません。
 */
class SizeMismatchException extends HttpBadRequestException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "不適切な要求です。参照するリソースのサイズが合致しません。";
	
	

}
