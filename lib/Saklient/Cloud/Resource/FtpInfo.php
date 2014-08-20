<?php

namespace Saklient\Cloud\Resource;

require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/**
 * FTPサーバのアカウント情報。
 * 
 * @property-read string $hostName ホスト名 
 * @property-read string $user ユーザ名 
 * @property-read string $password パスワード 
 */
class FtpInfo {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_hostName;
	
	/**
	 * @access public
	 * @ignore
	 * @return string
	 */
	public function get_hostName()
	{
		return $this->_hostName;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_user;
	
	/**
	 * @access public
	 * @ignore
	 * @return string
	 */
	public function get_user()
	{
		return $this->_user;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_password;
	
	/**
	 * @access public
	 * @ignore
	 * @return string
	 */
	public function get_password()
	{
		return $this->_password;
	}
	
	
	
	/**
	 * @ignore
	 * @access public
	 * @param mixed $obj
	 */
	public function __construct($obj)
	{
		Util::validateArgCount(func_num_args(), 1);
		$this->_hostName = $obj->{"HostName"};
		$this->_user = $obj->{"User"};
		$this->_password = $obj->{"Password"};
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "hostName": return $this->get_hostName();
			case "user": return $this->get_user();
			case "password": return $this->get_password();
			default: return null;
		}
	}

}

