<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * 不適切な要求です。対応するAAAAレコードが見つかりません。
 */
class DnsAaaaRecordNotFoundException extends HttpBadRequestException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "不適切な要求です。対応するAAAAレコードが見つかりません。";
	
	

}

