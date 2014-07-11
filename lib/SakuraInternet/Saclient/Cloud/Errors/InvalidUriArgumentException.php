<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Errors/HttpNotFoundException.php";
use \SakuraInternet\Saclient\Cloud\Errors\HttpNotFoundException;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * 対象が見つかりません。パスに使用できない文字が含まれています。
 */
class InvalidUriArgumentException extends HttpNotFoundException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "対象が見つかりません。パスに使用できない文字が含まれています。";
	
	

}

