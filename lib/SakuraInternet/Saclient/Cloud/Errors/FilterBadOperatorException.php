<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Errors/HttpBadRequestException.php";
use \SakuraInternet\Saclient\Cloud\Errors\HttpBadRequestException;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * 不適切な要求です。フィールドの型に対応していない演算子がフィルタ中に含まれています。
 */
class FilterBadOperatorException extends HttpBadRequestException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "不適切な要求です。フィールドの型に対応していない演算子がフィルタ中に含まれています。";
	
	

}

