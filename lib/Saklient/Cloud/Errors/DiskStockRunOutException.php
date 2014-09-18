<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpServiceUnavailableException.php";
use \Saklient\Errors\HttpServiceUnavailableException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** サービスが利用できません。作成済みディスクを確保できませんでした。サーバが混雑している可能性があります。 */
class DiskStockRunOutException extends HttpServiceUnavailableException {
	
	/**
	 * @access public
	 * @param int $status
	 * @param string $code=null
	 * @param string $message=""
	 */
	public function __construct($status, $code=null, $message="")
	{
		parent::__construct($status, $code, $message == null || $message == "" ? "サービスが利用できません。作成済みディスクを確保できませんでした。サーバが混雑している可能性があります。" : $message);
	}
	
	

}

