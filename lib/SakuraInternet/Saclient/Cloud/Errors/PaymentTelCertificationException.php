<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Errors/HttpPaymentRequiredException.php";
use \SakuraInternet\Saclient\Errors\HttpPaymentRequiredException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/** 要求を受け付けできません。電話認証を先に実行してください。 */
class PaymentTelCertificationException extends HttpPaymentRequiredException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求を受け付けできません。電話認証を先に実行してください。";
	
	

}

