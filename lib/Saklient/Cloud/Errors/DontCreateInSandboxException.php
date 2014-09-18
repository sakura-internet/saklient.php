<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpForbiddenException.php";
use \Saklient\Errors\HttpForbiddenException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** 要求された操作は許可されていません。ゾーンをまたぐ一部のリソースは課金対象です。料金をご確認の上、他のゾーンで作成してください。 */
class DontCreateInSandboxException extends HttpForbiddenException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作は許可されていません。ゾーンをまたぐ一部のリソースは課金対象です。料金をご確認の上、他のゾーンで作成してください。";
	
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

