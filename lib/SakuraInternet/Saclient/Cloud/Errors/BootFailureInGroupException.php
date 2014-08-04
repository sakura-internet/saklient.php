<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Errors/HttpServiceUnavailableException.php";
use \SakuraInternet\Saclient\Errors\HttpServiceUnavailableException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * サービスが利用できません。サーバ起動グループ指定に問題がある可能性があります。
 */
class BootFailureInGroupException extends HttpServiceUnavailableException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "サービスが利用できません。サーバ起動グループ指定に問題がある可能性があります。";
	
	

}

