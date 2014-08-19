<?php

namespace SakuraInternet\Saklient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saklient/Errors/HttpNotFoundException.php";
use \SakuraInternet\Saklient\Errors\HttpNotFoundException;
require_once dirname(__FILE__) . "/../../../Saklient/Util.php";
use \SakuraInternet\Saklient\Util;

/** 対象が見つかりません。パスに誤りがあります。 */
class ResourcePathNotFoundException extends HttpNotFoundException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "対象が見つかりません。パスに誤りがあります。";
	
	

}

