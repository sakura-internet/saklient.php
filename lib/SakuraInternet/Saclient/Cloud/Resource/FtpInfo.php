<?php

namespace SakuraInternet\Saclient\Cloud\Resource;

require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;
require_once dirname(__FILE__) . "/../../../Saclient/Errors/SaclientException.php";
use \SakuraInternet\Saclient\Errors\SaclientException;

/**
 * FTPサーバのアカウント情報
 * 
 * @property-read string $hostName
 * @property-read string $user
 * @property-read string $password
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
	 * @return string
	 */
	public function get_hostName()
	{
		return $this->_hostName;
	}
	
	/**
	 * ホスト名
	 */
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_user;
	
	/**
	 * @access public
	 * @return string
	 */
	public function get_user()
	{
		return $this->_user;
	}
	
	/**
	 * ユーザ名
	 */
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_password;
	
	/**
	 * @access public
	 * @return string
	 */
	public function get_password()
	{
		return $this->_password;
	}
	
	/**
	 * パスワード
	 */
	
	
	/**
	 * @private
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

