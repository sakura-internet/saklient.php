<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpConflictException.php";
use \Saklient\Errors\HttpConflictException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** 要求を受け付けできません。ゾーン内リソース数上限により、リソースの割り当てに失敗しました。 */
class LimitCountInZoneException extends HttpConflictException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求を受け付けできません。ゾーン内リソース数上限により、リソースの割り当てに失敗しました。";
	
	

}

