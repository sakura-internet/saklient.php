<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpConflictException.php";
use \Saklient\Errors\HttpConflictException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** 要求された操作を行えません。このテンプレートから作成したすべてのディスクを削除した後に実行してください。 */
class DeleteDiskB4TemplateException extends HttpConflictException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求された操作を行えません。このテンプレートから作成したすべてのディスクを削除した後に実行してください。";
	
	

}
