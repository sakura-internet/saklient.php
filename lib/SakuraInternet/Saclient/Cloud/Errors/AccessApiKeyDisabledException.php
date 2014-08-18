<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Errors/HttpForbiddenException.php";
use \SakuraInternet\Saclient\Errors\HttpForbiddenException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/** 要求された操作は許可されていません。APIキーによるアクセスはできません。 */
class AccessApiKeyDisabledException extends HttpForbiddenException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作は許可されていません。APIキーによるアクセスはできません。";
	
	

}

