<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Errors/HttpConflictException.php";
use \SakuraInternet\Saclient\Errors\HttpConflictException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * 要求された操作を行えません。複数のインタフェースから同一のスイッチに接続することはできません。
 */
class ConnectToSameSwitchException extends HttpConflictException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作を行えません。複数のインタフェースから同一のスイッチに接続することはできません。";
	
	

}

