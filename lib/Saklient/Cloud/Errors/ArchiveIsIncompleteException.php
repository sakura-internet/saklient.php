<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpConflictException.php";
use \Saklient\Errors\HttpConflictException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** 要求された操作を行えません。このアーカイブは不完全です。複製処理等の完了後に再度お試しください。 */
class ArchiveIsIncompleteException extends HttpConflictException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作を行えません。このアーカイブは不完全です。複製処理等の完了後に再度お試しください。";
	
	

}

