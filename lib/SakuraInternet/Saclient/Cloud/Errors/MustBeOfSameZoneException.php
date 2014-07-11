<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Errors/HttpBadRequestException.php";
use \SakuraInternet\Saclient\Cloud\Errors\HttpBadRequestException;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * 不適切な要求です。参照するリソースは同一ゾーンに存在しなければなりません。
 */
class MustBeOfSameZoneException extends HttpBadRequestException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "不適切な要求です。参照するリソースは同一ゾーンに存在しなければなりません。";
	
	

}

