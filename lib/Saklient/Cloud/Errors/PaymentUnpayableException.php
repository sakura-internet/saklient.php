<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpPaymentRequiredException.php";
use \Saklient\Errors\HttpPaymentRequiredException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** お客様のご都合により操作を受け付けることができません。 */
class PaymentUnpayableException extends HttpPaymentRequiredException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "お客様のご都合により操作を受け付けることができません。";
	
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

