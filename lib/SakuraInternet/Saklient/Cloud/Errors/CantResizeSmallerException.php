<?php

namespace SakuraInternet\Saklient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saklient/Errors/HttpBadRequestException.php";
use \SakuraInternet\Saklient\Errors\HttpBadRequestException;
require_once dirname(__FILE__) . "/../../../Saklient/Util.php";
use \SakuraInternet\Saklient\Util;

/** 不適切な要求です。現在の容量よりも小さくリサイズすることはできません。 */
class CantResizeSmallerException extends HttpBadRequestException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "不適切な要求です。現在の容量よりも小さくリサイズすることはできません。";
	
	

}

