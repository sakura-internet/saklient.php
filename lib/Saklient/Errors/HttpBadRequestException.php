<?php

namespace Saklient\Errors;

require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpException.php";
use \Saklient\Errors\HttpException;
require_once dirname(__FILE__) . "/../../Saklient/Util.php";
use \Saklient\Util;

/** 不適切な要求です。パラメータの指定誤り、入力規則違反です。入力内容をご確認ください。 */
class HttpBadRequestException extends HttpException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "不適切な要求です。パラメータの指定誤り、入力規則違反です。入力内容をご確認ください。";
	
	

}

