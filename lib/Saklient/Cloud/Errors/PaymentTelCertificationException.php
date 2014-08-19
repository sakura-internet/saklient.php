<?php

namespace Saklient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saklient/Errors/HttpPaymentRequiredException.php";
use \Saklient\Errors\HttpPaymentRequiredException;
require_once dirname(__FILE__) . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** 要求を受け付けできません。電話認証を先に実行してください。 */
class PaymentTelCertificationException extends HttpPaymentRequiredException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求を受け付けできません。電話認証を先に実行してください。";
	
	

}

