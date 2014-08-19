<?php

namespace Saklient\Errors;

require_once dirname(__FILE__) . "/../../Saklient/Util.php";
use \Saklient\Util;

class SaklientException extends \Exception {
	
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
	 * @param string $code = null
	 */
	public function __construct($code=null, $message="")
	{
		parent::__construct($message);
		$this->code = $code;
		$this->message = $message;
	}
	
	

}

