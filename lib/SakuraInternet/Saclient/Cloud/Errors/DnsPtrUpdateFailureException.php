<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Errors/HttpServiceUnavailableException.php";
use \SakuraInternet\Saclient\Cloud\Errors\HttpServiceUnavailableException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * サービスが利用できません。PTRレコードを設定できません。
 */
class DnsPtrUpdateFailureException extends HttpServiceUnavailableException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "サービスが利用できません。PTRレコードを設定できません。";
	
	

}

