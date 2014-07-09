<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

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

