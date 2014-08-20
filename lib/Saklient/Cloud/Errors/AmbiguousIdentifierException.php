<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpNotFoundException.php";
use \Saklient\Errors\HttpNotFoundException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** 対象が見つかりません。識別名から一意にリソースを特定できません。 */
class AmbiguousIdentifierException extends HttpNotFoundException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "対象が見つかりません。識別名から一意にリソースを特定できません。";
	
	

}

