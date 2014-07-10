<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * 要求された操作を行えません。このディスクへのコピー処理が進行中です。完了後に再度お試しください。
 */
class DiskIsCopyingException extends HttpConflictException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作を行えません。このディスクへのコピー処理が進行中です。完了後に再度お試しください。";
	
	

}
