<?php

namespace SakuraInternet\Saklient\Errors;

require_once dirname(__FILE__) . "/../../Saklient/Util.php";
use \SakuraInternet\Saklient\Util;

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
		$this->status = $status;
		$this->code = $code;
		$this->message = $message;
	}
	
	

}

