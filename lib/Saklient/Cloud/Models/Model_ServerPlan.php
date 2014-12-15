<?php

namespace Saklient\Cloud\Models;

require_once __DIR__ . "/../../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../../Saklient/Cloud/Models/Model.php";
use \Saklient\Cloud\Models\Model;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Resource.php";
use \Saklient\Cloud\Resources\Resource;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/ServerPlan.php";
use \Saklient\Cloud\Resources\ServerPlan;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/** サーバプランを検索するための機能を備えたクラス。 */
class Model_ServerPlan extends Model {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPath()
	{
		return "/product/server";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey()
	{
		return "ServerPlan";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM()
	{
		return "ServerPlans";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _className()
	{
		return "ServerPlan";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @param mixed $obj
	 * @param boolean $wrapped=false
	 * @return \Saklient\Cloud\Resources\Resource
	 */
	protected function _createResourceImpl($obj, $wrapped=false)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($wrapped, "boolean");
		return new ServerPlan($this->_client, $obj, $wrapped);
	}
	
	/**
	 * 次に取得するリストの開始オフセットを指定します。
	 * 
	 * @access public
	 * @param int $offset オフセット
	 * @return \Saklient\Cloud\Models\Model_ServerPlan this
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
	 * @return \Saklient\Cloud\Models\Model_ServerPlan this
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
	 * @return \Saklient\Cloud\Models\Model_ServerPlan
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
	 * @return \Saklient\Cloud\Models\Model_ServerPlan this
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
	 * @return \Saklient\Cloud\Resources\ServerPlan リソースオブジェクト
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
	 * @return \Saklient\Cloud\Resources\ServerPlan[] リソースオブジェクトの配列
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
	}
	
	/**
	 * 指定したスペックのプランを取得します。
	 * 
	 * @access public
	 * @param int $cores
	 * @param int $memoryGib
	 * @return \Saklient\Cloud\Resources\ServerPlan
	 */
	public function getBySpec($cores, $memoryGib)
	{
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($cores, "int");
		Util::validateType($memoryGib, "int");
		$this->_filterBy("CPU", new \ArrayObject([$cores]));
		$this->_filterBy("MemoryMB", new \ArrayObject([$memoryGib * 1024]));
		return $this->_findOne();
	}
	
	

}

