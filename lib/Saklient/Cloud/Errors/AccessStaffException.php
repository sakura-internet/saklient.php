<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpForbiddenException.php";
use \Saklient\Errors\HttpForbiddenException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** 要求された操作は許可されていません。権限エラー。 */
class AccessStaffException extends HttpForbiddenException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作は許可されていません。権限エラー。";
	
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

