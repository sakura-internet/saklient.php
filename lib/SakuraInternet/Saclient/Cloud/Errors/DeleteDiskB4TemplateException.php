<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * 要求された操作を行えません。このテンプレートから作成したすべてのディスクを削除した後に実行してください。
 */
class DeleteDiskB4TemplateException extends HttpConflictException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作を行えません。このテンプレートから作成したすべてのディスクを削除した後に実行してください。";
	
	

}

