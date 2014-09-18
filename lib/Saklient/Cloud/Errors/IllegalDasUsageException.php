<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpConflictException.php";
use \Saklient\Errors\HttpConflictException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** 要求された操作を行えません。DASの利用方法に問題があります。1台のサーバには同一のストレージ上にあるDASのみを接続できます。 */
class IllegalDasUsageException extends HttpConflictException {
	
	/**
	 * @access public
	 * @param int $status
	 * @param string $code=null
	 * @param string $message=""
	 */
	public function __construct($status, $code=null, $message="")
	{
		parent::__construct($status, $code, $message == null || $message == "" ? "要求された操作を行えません。DASの利用方法に問題があります。1台のサーバには同一のストレージ上にあるDASのみを接続できます。" : $message);
	}
	
	

}

