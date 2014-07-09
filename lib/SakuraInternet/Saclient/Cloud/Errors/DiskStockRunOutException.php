<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * サービスが利用できません。作成済みディスクを確保できませんでした。サーバが混雑している可能性があります。
 */
class DiskStockRunOutException extends HttpServiceUnavailableException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "サービスが利用できません。作成済みディスクを確保できませんでした。サーバが混雑している可能性があります。";
	
	

}

