<?php

namespace Saklient\Errors;

require_once __DIR__ . "/../../Saklient/Util.php";
use \Saklient\Util;

class SaklientException extends \Exception {
	
	/**
	 * @access public
	 * @var string
	 */
	public $code;
	
	/**
	 * @access public
	 * @param string $code=null
	 * @param string $message=""
	 */
	public function __construct($code=null, $message="")
	{
		parent::__construct($message);
		$this->code = $code;
	}
	
	

}

