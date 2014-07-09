<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * 不適切な要求です。配列とは比較できない演算子がフィルタ中に含まれています。
 */
class FilterArrayComparisonException extends HttpBadRequestException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "不適切な要求です。配列とは比較できない演算子がフィルタ中に含まれています。";
	
	

}

