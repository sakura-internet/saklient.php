<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * お客様のご都合により操作を受け付けることができません。
 */
class PenaltyOperationException extends HttpPaymentRequiredException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "お客様のご都合により操作を受け付けることができません。";
	
	

}

