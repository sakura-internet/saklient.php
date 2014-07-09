<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * 要求された操作を行えません。ライセンスの問題により、組み合わせて使用できないディスクが接続されています。
 */
class DiskLicenseMismatchException extends HttpConflictException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作を行えません。ライセンスの問題により、組み合わせて使用できないディスクが接続されています。";
	
	

}

