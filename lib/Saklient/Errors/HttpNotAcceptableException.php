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
	 * @var string
	 */
	static public $defaultMessage = "要求を受け付けできません。サポートサイトやメンテナンス情報をご確認ください。";
	
	

}

