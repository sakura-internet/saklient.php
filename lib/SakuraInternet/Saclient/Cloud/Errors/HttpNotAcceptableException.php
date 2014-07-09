<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * 要求を受け付けできません。サポートサイトやメンテナンス情報をご確認ください。
 */
class HttpNotAcceptableException extends HttpException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求を受け付けできません。サポートサイトやメンテナンス情報をご確認ください。";
	
	

}

