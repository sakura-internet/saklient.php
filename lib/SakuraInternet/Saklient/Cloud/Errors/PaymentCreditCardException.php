<?php

namespace SakuraInternet\Saklient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saklient/Errors/HttpPaymentRequiredException.php";
use \SakuraInternet\Saklient\Errors\HttpPaymentRequiredException;
require_once dirname(__FILE__) . "/../../../Saklient/Util.php";
use \SakuraInternet\Saklient\Util;

/** 要求を受け付けできません。クレジットカードの使用期限、利用限度額をご確認ください。 */
class PaymentCreditCardException extends HttpPaymentRequiredException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求を受け付けできません。クレジットカードの使用期限、利用限度額をご確認ください。";
	
	

}

