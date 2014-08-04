<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Errors/HttpPaymentRequiredException.php";
use \SakuraInternet\Saclient\Cloud\Errors\HttpPaymentRequiredException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * 要求を受け付けできません。支払情報が未登録です。会員メニューから支払、クレジットカードの情報を登録してください
 */
class PaymentRegistrationException extends HttpPaymentRequiredException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求を受け付けできません。支払情報が未登録です。会員メニューから支払、クレジットカードの情報を登録してください";
	
	

}

