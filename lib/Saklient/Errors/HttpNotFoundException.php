<?php

namespace Saklient\Errors;

require_once dirname(__FILE__) . "/../../Saklient/Errors/HttpException.php";
use \Saklient\Errors\HttpException;
require_once dirname(__FILE__) . "/../../Saklient/Util.php";
use \Saklient\Util;

/** 対象が見つかりません。対象は利用できない状態か、IDまたはパスに誤りがあります。 */
class HttpNotFoundException extends HttpException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "対象が見つかりません。対象は利用できない状態か、IDまたはパスに誤りがあります。";
	
	

}

