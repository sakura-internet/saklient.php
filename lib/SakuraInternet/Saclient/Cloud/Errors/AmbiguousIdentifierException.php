<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * 対象が見つかりません。識別名から一意にリソースを特定できません。
 */
class AmbiguousIdentifierException extends HttpNotFoundException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "対象が見つかりません。識別名から一意にリソースを特定できません。";
	
	

}
