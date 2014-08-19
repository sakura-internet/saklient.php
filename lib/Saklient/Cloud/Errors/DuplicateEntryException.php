<?php

namespace Saklient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saklient/Errors/HttpConflictException.php";
use \Saklient\Errors\HttpConflictException;
require_once dirname(__FILE__) . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** 要求された操作を行えません。リソースが既に存在するか、リソース同士が既に関連付けられています。 */
class DuplicateEntryException extends HttpConflictException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作を行えません。リソースが既に存在するか、リソース同士が既に関連付けられています。";
	
	

}

