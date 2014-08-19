<?php

namespace Saklient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saklient/Errors/HttpConflictException.php";
use \Saklient\Errors\HttpConflictException;
require_once dirname(__FILE__) . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** 要求された操作を行えません。ルータを削除することでスイッチは同時に削除されます。 */
class DeleteRouterB4SwitchException extends HttpConflictException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作を行えません。ルータを削除することでスイッチは同時に削除されます。";
	
	

}

