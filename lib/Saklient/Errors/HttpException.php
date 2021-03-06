<?php

namespace Saklient\Errors;

require_once __DIR__ . "/../../Saklient/Util.php";
use \Saklient\Util;

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
	 * @param int $status
	 * @param string $code=null
	 * @param string $message=""
	 */
	public function __construct($status, $code=null, $message="")
	{
		parent::__construct($message);
		$this->status = $status;
		$this->code = $code;
	}
	
	

}

