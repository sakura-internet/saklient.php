<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpPaymentRequiredException.php";
use \Saklient\Errors\HttpPaymentRequiredException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** 要求を受け付けできません。クレジットカードの使用期限、利用限度額をご確認ください。 */
class PaymentCreditCardException extends HttpPaymentRequiredException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求を受け付けできません。クレジットカードの使用期限、利用限度額をご確認ください。";
	
	/**
	 * @access public
	 * @param int $status
	 * @param string $code=null
	 * @param string $message=""
	 */
	public function __construct($status, $code=null, $message="")
	{
		parent::__construct($status, $code, $message);
	}
	
	

}

