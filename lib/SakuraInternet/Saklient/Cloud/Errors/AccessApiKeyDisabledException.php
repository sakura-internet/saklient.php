<?php

namespace SakuraInternet\Saklient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saklient/Errors/HttpForbiddenException.php";
use \SakuraInternet\Saklient\Errors\HttpForbiddenException;
require_once dirname(__FILE__) . "/../../../Saklient/Util.php";
use \SakuraInternet\Saklient\Util;

/** 要求された操作は許可されていません。APIキーによるアクセスはできません。 */
class AccessApiKeyDisabledException extends HttpForbiddenException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作は許可されていません。APIキーによるアクセスはできません。";
	
	

}

