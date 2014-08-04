<?php

namespace SakuraInternet\Saclient\Errors;

require_once dirname(__FILE__) . "/../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

class HttpException extends \Exception {
	
	/**
	 * @access public
	 * @var int
	 */
	public $status;
	
	/**
	 * @access public
	 * @var string
	 */
	public $code;
	
	/**
	 * @access public
	 * @var string
	 */
	public $message;
	
	/**
	 * @access public
	 * @param string $message = ""
	 * @param int $status
	 * @param string $code = null
	 */
	public function __construct($status, $code=null, $message="")
	{
		parent::__construct($message);
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($status, "int");
		Util::validateType($code, "string");
		Util::validateType($message, "string");
		$this->status = $status;
		$this->code = $code;
		$this->message = $message;
	}
	
	

}

