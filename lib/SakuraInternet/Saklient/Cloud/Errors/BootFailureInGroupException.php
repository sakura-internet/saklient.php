<?php

namespace SakuraInternet\Saklient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saklient/Errors/HttpServiceUnavailableException.php";
use \SakuraInternet\Saklient\Errors\HttpServiceUnavailableException;
require_once dirname(__FILE__) . "/../../../Saklient/Util.php";
use \SakuraInternet\Saklient\Util;

/** サービスが利用できません。サーバ起動グループ指定に問題がある可能性があります。 */
class BootFailureInGroupException extends HttpServiceUnavailableException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "サービスが利用できません。サーバ起動グループ指定に問題がある可能性があります。";
	
	

}

