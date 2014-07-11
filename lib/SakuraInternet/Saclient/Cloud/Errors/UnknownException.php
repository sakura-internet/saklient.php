<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Errors/HttpInternalServerErrorException.php";
use \SakuraInternet\Saclient\Cloud\Errors\HttpInternalServerErrorException;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * 予期しないエラーが発生しました。このエラーが繰り返し発生する場合は、サポートサイトやメンテナンス情報をご確認ください。
 */
class UnknownException extends HttpInternalServerErrorException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "予期しないエラーが発生しました。このエラーが繰り返し発生する場合は、サポートサイトやメンテナンス情報をご確認ください。";
	
	

}

