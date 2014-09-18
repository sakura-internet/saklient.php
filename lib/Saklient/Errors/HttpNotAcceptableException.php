<?php

namespace Saklient\Errors;

require_once __DIR__ . "/../../Saklient/Errors/HttpException.php";
use \Saklient\Errors\HttpException;
require_once __DIR__ . "/../../Saklient/Util.php";
use \Saklient\Util;

/** 要求を受け付けできません。サポートサイトやメンテナンス情報をご確認ください。 */
class HttpNotAcceptableException extends HttpException {
	
	/**
	 * @access public
	 * @param int $status
	 * @param string $code=null
	 * @param string $message=""
	 */
	public function __construct($status, $code=null, $message="")
	{
		parent::__construct($status, $code, $message == null || $message == "" ? "要求を受け付けできません。サポートサイトやメンテナンス情報をご確認ください。" : $message);
	}
	
	

}

