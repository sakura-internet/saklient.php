<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * 要求された操作を行えません。同一ゾーン内の他のリソースが既にこのリソースを使用中です。
 */
class ResUsedInZoneException extends HttpConflictException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作を行えません。同一ゾーン内の他のリソースが既にこのリソースを使用中です。";
	
	

}
