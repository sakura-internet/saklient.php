<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Errors/HttpServiceUnavailableException.php";
use \SakuraInternet\Saclient\Errors\HttpServiceUnavailableException;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/** サービスが利用できません。ストレージが問題が発生している可能性があります。このエラーが繰り返し発生する場合は、メンテナンス情報、サポートサイトをご確認ください。 */
class StorageAbnormalException extends HttpServiceUnavailableException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "サービスが利用できません。ストレージが問題が発生している可能性があります。このエラーが繰り返し発生する場合は、メンテナンス情報、サポートサイトをご確認ください。";
	
	

}

