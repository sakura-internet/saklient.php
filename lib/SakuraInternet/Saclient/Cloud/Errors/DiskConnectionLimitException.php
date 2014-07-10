<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * 要求された操作を行えません。この接続インタフェースにこれ以上のディスクを接続することができません。
 */
class DiskConnectionLimitException extends HttpConflictException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作を行えません。この接続インタフェースにこれ以上のディスクを接続することができません。";
	
	

}
