<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpPaymentRequiredException.php";
use \Saklient\Errors\HttpPaymentRequiredException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** 要求を受け付けできません。支払情報が未登録です。会員メニューから支払、クレジットカードの情報を登録してください */
class PaymentRegistrationException extends HttpPaymentRequiredException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求を受け付けできません。支払情報が未登録です。会員メニューから支払、クレジットカードの情報を登録してください";
	
	

}

