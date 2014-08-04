<?php

namespace SakuraInternet\Saclient\Errors;

require_once dirname(__FILE__) . "/../../Saclient/Errors/HttpException.php";
use \SakuraInternet\Saclient\Errors\HttpException;
require_once dirname(__FILE__) . "/../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * サーバ内部エラーが発生しました。このエラーが繰り返し発生する場合は、メンテナンス情報、サポートサイトをご確認ください。
 */
class HttpInternalServerErrorException extends HttpException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "サーバ内部エラーが発生しました。このエラーが繰り返し発生する場合は、メンテナンス情報、サポートサイトをご確認ください。";
	
	

}

