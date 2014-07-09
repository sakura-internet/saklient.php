<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * 対象が見つかりません。対象は利用できない状態か、IDまたはパスに誤りがあります。
 */
class HttpNotFoundException extends HttpException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "対象が見つかりません。対象は利用できない状態か、IDまたはパスに誤りがあります。";
	
	

}

