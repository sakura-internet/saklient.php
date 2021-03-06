<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpServiceUnavailableException.php";
use \Saklient\Errors\HttpServiceUnavailableException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** 要求を受け付けできません。契約コードを発行することができません。メンテナンス情報、サポートサイトをご確認ください。 */
class ContractCreationException extends HttpServiceUnavailableException {
	
	/**
	 * @access public
	 * @param int $status
	 * @param string $code=null
	 * @param string $message=""
	 */
	public function __construct($status, $code=null, $message="")
	{
		parent::__construct($status, $code, $message == null || $message == "" ? "要求を受け付けできません。契約コードを発行することができません。メンテナンス情報、サポートサイトをご確認ください。" : $message);
	}
	
	

}

