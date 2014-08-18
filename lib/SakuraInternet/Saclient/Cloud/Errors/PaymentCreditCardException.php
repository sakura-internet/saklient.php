<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Errors/HttpPaymentRequiredException.php";
use \SakuraInternet\Saclient\Errors\HttpPaymentRequiredException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/** 要求を受け付けできません。クレジットカードの使用期限、利用限度額をご確認ください。 */
class PaymentCreditCardException extends HttpPaymentRequiredException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求を受け付けできません。クレジットカードの使用期限、利用限度額をご確認ください。";
	
	

}

