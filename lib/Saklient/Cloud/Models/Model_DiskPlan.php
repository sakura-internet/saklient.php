<?php

namespace Saklient\Cloud\Models;

require_once __DIR__ . "/../../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../../Saklient/Cloud/Models/Model.php";
use \Saklient\Cloud\Models\Model;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/DiskPlan.php";
use \Saklient\Cloud\Resources\DiskPlan;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/**
 * ディスクプランを検索するための機能を備えたクラス。
 * 
 * @property-read \Saklient\Cloud\Resources\DiskPlan $hdd 標準プラン 
 * @property-read \Saklient\Cloud\Resources\DiskPlan $ssd SSDプラン 
 */
class Model_DiskPlan extends Model {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPath()
	{
		return "/product/disk";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey()
	{
		return "DiskPlan";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM()
	{
		return "DiskPlans";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _className()
	{
		return "DiskPlan";
	}
	
	/**
	 * 次に取得するリストの開始オフセットを指定します。
	 * 
	 * @access public
	 * @param int $offset オフセット
	 * @return \Saklient\Cloud\Models\Model_DiskPlan this
	 */
	public function offset($offset)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($offset, "int");
		return $this->_offset($offset);
	}
	
	/**
	 * 次に取得するリストの上限レコード数を指定します。
	 * 
	 * @access public
	 * @param int $count 上限レコード数
	 * @return \Saklient\Cloud\Models\Model_DiskPlan this
	 */
	public function limit($count)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($count, "int");
		return $this->_limit($count);
	}
	
	/**
	 * Web APIのフィルタリング設定を直接指定します。
	 * 
	 * @access public
	 * @param string $key キー
	 * @param mixed $value 値
	 * @param boolean $multiple=false valueに配列を与え、OR条件で完全一致検索する場合にtrueを指定します。通常、valueはスカラ値であいまい検索されます。
	 * @return \Saklient\Cloud\Models\Model_DiskPlan
	 */
	public function filterBy($key, $value, $multiple=false)
	{
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($key, "string");
		Util::validateType($multiple, "boolean");
		return $this->_filterBy($key, $value, $multiple);
	}
	
	/**
	 * 次のリクエストのために設定されているステートをすべて破棄します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Models\Model_DiskPlan this
	 */
	public function reset()
	{
		return $this->_reset();
	}
	
	/**
	 * 指定したIDを持つ唯一のリソースを取得します。
	 * 
	 * @access public
	 * @param string $id
	 * @return \Saklient\Cloud\Resources\DiskPlan リソースオブジェクト
	 */
	public function getById($id)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($id, "string");
		return $this->_getById($id);
	}
	
	/**
	 * リソースの検索リクエストを実行し、結果をリストで取得します。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\DiskPlan[] リソースオブジェクトの配列
	 */
	public function find()
	{
		return $this->_find();
	}
	
	/**
	 * @ignore
	 * @access public
	 * @param \Saklient\Cloud\Client $client
	 */
	public function __construct(\Saklient\Cloud\Client $client)
	{
		parent::__construct($client);
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($client, "\\Saklient\\Cloud\\Client");
		$this->_hdd = null;
		$this->_ssd = null;
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var DiskPlan
	 */
	protected $_hdd;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \Saklient\Cloud\Resources\DiskPlan
	 */
	protected function get_hdd()
	{
		if ($this->_hdd == null) {
			$this->_hdd = $this->getById("2");
		}
		return $this->_hdd;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var DiskPlan
	 */
	protected $_ssd;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \Saklient\Cloud\Resources\DiskPlan
	 */
	protected function get_ssd()
	{
		if ($this->_ssd == null) {
			$this->_ssd = $this->getById("4");
		}
		return $this->_ssd;
	}
	
	
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "hdd": return $this->get_hdd();
			case "ssd": return $this->get_ssd();
			default: return parent::__get($key);
		}
	}

}

