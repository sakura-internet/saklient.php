<?php

namespace Saklient\Cloud\Resources;

require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Script.php";
use \Saklient\Cloud\Resources\Script;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/**
 * ディスク修正のパラメータ。
 * 
 * @property string $hostName ホスト名 
 * @property string $password ログインパスワード 
 * @property string $sshKey SSHキー 
 * @property string $ipAddress IPアドレス 
 * @property string $defaultRoute デフォルトルート 
 * @property int $networkMaskLen ネットワークマスク長 
 * @property-read \ArrayObject $scripts スタートアップスクリプト {@link \Saklient\Cloud\Resources\Script} の配列（pushによりスクリプトを追加できます） 
 */
class DiskConfig {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Client
	 */
	protected $_client;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \Saklient\Cloud\Client
	 */
	protected function get_client()
	{
		return $this->_client;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_diskId;
	
	/**
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function get_diskId()
	{
		return $this->_diskId;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_hostName;
	
	/**
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function get_hostName()
	{
		return $this->_hostName;
	}
	
	/**
	 * @access protected
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	protected function set_hostName($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "string");
		$this->_hostName = $v;
		return $v;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_password;
	
	/**
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function get_password()
	{
		return $this->_password;
	}
	
	/**
	 * @access protected
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	protected function set_password($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "string");
		$this->_password = $v;
		return $v;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_sshKey;
	
	/**
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function get_sshKey()
	{
		return $this->_sshKey;
	}
	
	/**
	 * @access protected
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	protected function set_sshKey($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "string");
		$this->_sshKey = $v;
		return $v;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_ipAddress;
	
	/**
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function get_ipAddress()
	{
		return $this->_ipAddress;
	}
	
	/**
	 * @access protected
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	protected function set_ipAddress($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "string");
		$this->_ipAddress = $v;
		return $v;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_defaultRoute;
	
	/**
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function get_defaultRoute()
	{
		return $this->_defaultRoute;
	}
	
	/**
	 * @access protected
	 * @ignore
	 * @param string $v
	 * @return string
	 */
	protected function set_defaultRoute($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "string");
		$this->_defaultRoute = $v;
		return $v;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var int
	 */
	protected $_networkMaskLen;
	
	/**
	 * @access protected
	 * @ignore
	 * @return int
	 */
	protected function get_networkMaskLen()
	{
		return $this->_networkMaskLen;
	}
	
	/**
	 * @access protected
	 * @ignore
	 * @param int|null $v
	 * @return int
	 */
	protected function set_networkMaskLen($v)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($v, "int");
		$this->_networkMaskLen = $v;
		return $v;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Script[]
	 */
	protected $_scripts;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \Saklient\Cloud\Resources\Script[]
	 */
	protected function get_scripts()
	{
		return $this->_scripts;
	}
	
	
	
	/**
	 * @ignore
	 * @access public
	 * @param \Saklient\Cloud\Client $client
	 * @param string $diskId
	 */
	public function __construct(\Saklient\Cloud\Client $client, $diskId)
	{
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($client, "\\Saklient\\Cloud\\Client");
		Util::validateType($diskId, "string");
		$this->_client = $client;
		$this->_diskId = $diskId;
		$this->_hostName = null;
		$this->_password = null;
		$this->_sshKey = null;
		$this->_ipAddress = null;
		$this->_defaultRoute = null;
		$this->_networkMaskLen = null;
		$this->_scripts = new \ArrayObject([]);
	}
	
	/**
	 * スタートアップスクリプトを追加します。
	 * 
	 * diskConfig.addScript(script) と diskConfig.scripts.push(script) の効果は同等です。
	 * 
	 * @access public
	 * @param \Saklient\Cloud\Resources\Script $script
	 * @return \Saklient\Cloud\Resources\DiskConfig this
	 */
	public function addScript(\Saklient\Cloud\Resources\Script $script)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($script, "\\Saklient\\Cloud\\Resources\\Script");
		$this->_scripts->append($script);
		return $this;
	}
	
	/**
	 * 修正内容を実際のディスクに書き込みます。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\DiskConfig this
	 */
	public function write()
	{
		$q = (object)[];
		if ($this->_hostName != null) {
			Util::setByPath($q, "HostName", $this->_hostName);
		}
		if ($this->_password != null) {
			Util::setByPath($q, "Password", $this->_password);
		}
		if ($this->_sshKey != null) {
			Util::setByPath($q, "SSHKey.PublicKey", $this->_sshKey);
		}
		if ($this->_ipAddress != null) {
			Util::setByPath($q, "UserIPAddress", $this->_ipAddress);
		}
		if ($this->_defaultRoute != null) {
			Util::setByPath($q, "UserSubnet.DefaultRoute", $this->_defaultRoute);
		}
		if ($this->_networkMaskLen != null) {
			Util::setByPath($q, "UserSubnet.NetworkMaskLen", $this->_networkMaskLen);
		}
		if (0 < $this->_scripts->count()) {
			$notes = new \ArrayObject([]);
			foreach ($this->_scripts as $script) {
				$notes->append((object)['ID' => $script->_id()]);
			}
			Util::setByPath($q, "Notes", $notes);
		}
		$path = "/disk/" . $this->_diskId . "/config";
		$this->_client->request("PUT", $path, $q);
		return $this;
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "client": return $this->get_client();
			case "diskId": return $this->get_diskId();
			case "hostName": return $this->get_hostName();
			case "password": return $this->get_password();
			case "sshKey": return $this->get_sshKey();
			case "ipAddress": return $this->get_ipAddress();
			case "defaultRoute": return $this->get_defaultRoute();
			case "networkMaskLen": return $this->get_networkMaskLen();
			case "scripts": return $this->get_scripts();
			default: return null;
		}
	}
	
	/**
	 * @ignore
	 */
	public function __set($key, $v) {
		switch ($key) {
			case "hostName": return $this->set_hostName($v);
			case "password": return $this->set_password($v);
			case "sshKey": return $this->set_sshKey($v);
			case "ipAddress": return $this->set_ipAddress($v);
			case "defaultRoute": return $this->set_defaultRoute($v);
			case "networkMaskLen": return $this->set_networkMaskLen($v);
			default: throw new SaklientException('non_writable_field', 'Non-writable field: Saklient\\Cloud\\Resources\\DiskConfig#'.$key);
		}
	}

}

