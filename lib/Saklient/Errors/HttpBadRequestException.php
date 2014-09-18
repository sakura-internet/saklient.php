<?php

namespace Saklient\Errors;

require_once __DIR__ . "/../../Saklient/Errors/HttpException.php";
use \Saklient\Errors\HttpException;
require_once __DIR__ . "/../../Saklient/Util.php";
use \Saklient\Util;

/** 不適切な要求です。パラメータの指定誤り、入力規則違反です。入力内容をご確認ください。 */
class HttpBadRequestException extends HttpException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "不適切な要求です。パラメータの指定誤り、入力規則違反です。入力内容をご確認ください。";
	
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

