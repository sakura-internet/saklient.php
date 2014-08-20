<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpConflictException.php";
use \Saklient\Errors\HttpConflictException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** 要求された操作を行えません。ライセンスの問題により、組み合わせて使用できないディスクが接続されています。 */
class DiskLicenseMismatchException extends HttpConflictException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作を行えません。ライセンスの問題により、組み合わせて使用できないディスクが接続されています。";
	
	

}

