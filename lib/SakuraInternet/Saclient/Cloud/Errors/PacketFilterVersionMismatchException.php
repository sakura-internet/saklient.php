<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * 要求された操作を行えません。起動中のサーバが収容されているハイパーバイザとパケットフィルタのバージョンが合致しません。コントロールパネルまたはAPIからの操作によりサーバを一旦停止し、再度起動後にお試しください。
 */
class PacketFilterVersionMismatchException extends HttpConflictException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作を行えません。起動中のサーバが収容されているハイパーバイザとパケットフィルタのバージョンが合致しません。コントロールパネルまたはAPIからの操作によりサーバを一旦停止し、再度起動後にお試しください。";
	
	

}
