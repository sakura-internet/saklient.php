<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * 要求された操作は許可されていません。XHRまたはAPIキーによるアクセスのみ許可されています。
 */
class AccessXhrOrApiKeyException extends HttpForbiddenException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作は許可されていません。XHRまたはAPIキーによるアクセスのみ許可されています。";
	
	

}

