<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Errors/HttpPaymentRequiredException.php";
use \SakuraInternet\Saclient\Cloud\Errors\HttpPaymentRequiredException;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * お客様のご都合により操作を受け付けることができません。
 */
class PaymentPaymentException extends HttpPaymentRequiredException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "お客様のご都合により操作を受け付けることができません。";
	
	

}

