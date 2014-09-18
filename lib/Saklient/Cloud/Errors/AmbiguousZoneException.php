<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpBadRequestException.php";
use \Saklient\Errors\HttpBadRequestException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** 不適切な要求です。リクエストパラメータに指定されたゾーンをパスに含むURLへアクセスしてください。 */
class AmbiguousZoneException extends HttpBadRequestException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "不適切な要求です。リクエストパラメータに指定されたゾーンをパスに含むURLへアクセスしてください。";
	
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

