<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpBadRequestException.php";
use \Saklient\Errors\HttpBadRequestException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** 不適切な要求です。配列とは比較できない演算子がフィルタ中に含まれています。 */
class FilterArrayComparisonException extends HttpBadRequestException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "不適切な要求です。配列とは比較できない演算子がフィルタ中に含まれています。";
	
	/**
	 * @access public
	 * @param int $status
	 * @param string $code=null
	 * @param string $message=""
	 */
	public function __construct($status, $code=null, $message="")
	{
		parent::__construct($status, $code, $message);
	}
	
	

}

