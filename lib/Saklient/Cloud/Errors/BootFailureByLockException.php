<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpServiceUnavailableException.php";
use \Saklient\Errors\HttpServiceUnavailableException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** サービスが利用できません。サーバが予期せず終了したため、ロックされています。しばらく時間をおいてから再度お試しください。 */
class BootFailureByLockException extends HttpServiceUnavailableException {
	
	/**
	 * @access public
	 * @param int $status
	 * @param string $code=null
	 * @param string $message=""
	 */
	public function __construct($status, $code=null, $message="")
	{
		parent::__construct($status, $code, $message == null || $message == "" ? "サービスが利用できません。サーバが予期せず終了したため、ロックされています。しばらく時間をおいてから再度お試しください。" : $message);
	}
	
	

}

