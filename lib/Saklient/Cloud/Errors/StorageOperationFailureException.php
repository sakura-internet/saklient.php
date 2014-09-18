<?php

namespace Saklient\Cloud\Errors;

require_once __DIR__ . "/../../../Saklient/Errors/HttpServiceUnavailableException.php";
use \Saklient\Errors\HttpServiceUnavailableException;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;

/** サービスが利用できません。ストレージの操作に失敗しました。サーバが混雑している可能性があります。 */
class StorageOperationFailureException extends HttpServiceUnavailableException {
	
	/**
	 * @access public
	 * @var string
	 */
	static public $defaultMessage = "サービスが利用できません。ストレージの操作に失敗しました。サーバが混雑している可能性があります。";
	
	/**
	 * @access public
	 * @param int $status
	 * @param string $code=null
	 * @param string $message=""
	 */
	public function __construct($status, $code=null, $message="")
	{
		parent::__construct($status, $code, $message);
	}
	
	

}

