<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Errors/HttpPaymentRequiredException.php";
use \SakuraInternet\Saclient\Errors\HttpPaymentRequiredException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

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

