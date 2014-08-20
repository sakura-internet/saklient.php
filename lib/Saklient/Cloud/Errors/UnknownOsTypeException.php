<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpServiceUnavailableException.php";
use \Saklient\Errors\HttpServiceUnavailableException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** サービスが利用できません。ディスクにインストールされたOSが特定できないため、正しく修正できません。 */
class UnknownOsTypeException extends HttpServiceUnavailableException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "サービスが利用できません。ディスクにインストールされたOSが特定できないため、正しく修正できません。";
	
	

}

