<?php

namespace SakuraInternet\Saclient\Cloud\Errors;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * 要求を受け付けできません。契約コードを発行することができません。メンテナンス情報、サポートサイトをご確認ください。
 */
class ContractCreationException extends HttpServiceUnavailableException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "要求を受け付けできません。契約コードを発行することができません。メンテナンス情報、サポートサイトをご確認ください。";
	
	

}
