<?php

namespace SakuraInternet\Saklient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saklient/Errors/HttpConflictException.php";
use \SakuraInternet\Saklient\Errors\HttpConflictException;
require_once dirname(__FILE__) . "/../../../Saklient/Util.php";
use \SakuraInternet\Saklient\Util;

/** 要求された操作を行えません。このISOイメージは不完全です。複製処理等の完了後に再度お試しください。 */
class CdromIsIncompleteException extends HttpConflictException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作を行えません。このISOイメージは不完全です。複製処理等の完了後に再度お試しください。";
	
	

}

