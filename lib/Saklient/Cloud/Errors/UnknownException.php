<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpInternalServerErrorException.php";
use \Saklient\Errors\HttpInternalServerErrorException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** 予期しないエラーが発生しました。このエラーが繰り返し発生する場合は、サポートサイトやメンテナンス情報をご確認ください。 */
class UnknownException extends HttpInternalServerErrorException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "予期しないエラーが発生しました。このエラーが繰り返し発生する場合は、サポートサイトやメンテナンス情報をご確認ください。";
	
	

}

