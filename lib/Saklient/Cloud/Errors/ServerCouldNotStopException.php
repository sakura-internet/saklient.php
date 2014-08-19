<?php

namespace Saklient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saklient/Errors/HttpServiceUnavailableException.php";
use \Saklient\Errors\HttpServiceUnavailableException;
require_once dirname(__FILE__) . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** サービスが利用できません。サーバを停止できません。再度お試しください。 */
class ServerCouldNotStopException extends HttpServiceUnavailableException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "サービスが利用できません。サーバを停止できません。再度お試しください。";
	
	

}

