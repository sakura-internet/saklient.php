<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Errors/HttpConflictException.php";
use \SakuraInternet\Saclient\Errors\HttpConflictException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * 要求を受け付けできません。ネットワーク内リソース数上限により、リソースの割り当てに失敗しました。
 */
class LimitCountInNetworkException extends HttpConflictException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求を受け付けできません。ネットワーク内リソース数上限により、リソースの割り当てに失敗しました。";
	
	

}

