<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpConflictException.php";
use \Saklient\Errors\HttpConflictException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** 要求された操作を行えません。現在のアカウントで使用している全てのリソースを削除した後に実行してください。 */
class DeleteResB4AccountException extends HttpConflictException {
	
	/**
	 * @access public
	 * @param int $status
	 * @param string $code=null
	 * @param string $message=""
	 */
	public function __construct($status, $code=null, $message="")
	{
		parent::__construct($status, $code, $message == null || $message == "" ? "要求された操作を行えません。現在のアカウントで使用している全てのリソースを削除した後に実行してください。" : $message);
	}
	
	

}

