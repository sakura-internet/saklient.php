<?php

namespace Saklient\Cloud\Models;

require_once __DIR__ . "/../../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../../Saklient/Cloud/Models/Model.php";
use \Saklient\Cloud\Models\Model;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Resource.php";
use \Saklient\Cloud\Resources\Resource;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Swytch.php";
use \Saklient\Cloud\Resources\Swytch;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/** スイッチを検索・作成するための機能を備えたクラス。 */
class Model_Swytch extends Model {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPath()
	{
		return "/switch";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey()
	{
		return "Switch";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM()
	{
		return "Switches";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _className()
	{
		return "Swytch";
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
		return new Swytch($this->_client, $obj, $wrapped);
	}
	
	/**
	 * 次に取得するリストの開始オフセットを指定します。
	 * 
	 * @access public
	 * @param int $offset オフセット
	 * @return \Saklient\Cloud\Models\Model_Swytch this
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
	 * @return \Saklient\Cloud\Models\Model_Swytch this
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
	 * @return \Saklient\Cloud\Models\Model_Swytch
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
	 * @return \Saklient\Cloud\Models\Model_Swytch this
	 */
	public function reset()
	{
		return $this->_reset();
	}
	
	/**
	 * 新規リソース作成用のオブジェクトを用意します。
	 * 
	 * 返り値のオブジェクトにパラメータを設定し、save() を呼ぶことで実際のリソースが作成されます。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Resources\Swytch リソースオブジェクト
	 */
	public function create()
	{
		return $this->_create();
	}
	
	/**
	 * 指定したIDを持つ唯一のリソースを取得します。
	 * 
	 * @access public
	 * @param string $id
	 * @return \Saklient\Cloud\Resources\Swytch リソースオブジェクト
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
	 * @return \Saklient\Cloud\Resources\Swytch[] リソースオブジェクトの配列
	 */
	public function find()
	{
		return $this->_find();
	}
	
	/**
	 * 指定した文字列を名前に含むリソースに絞り込みます。
	 * 
	 * 大文字・小文字は区別されません。
	 * 半角スペースで区切られた複数の文字列は、それらをすべて含むことが条件とみなされます。
	 * 
	 * @todo Implement test case
	 * @access public
	 * @param string $name
	 * @return \Saklient\Cloud\Models\Model_Swytch
	 */
	public function withNameLike($name)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($name, "string");
		return $this->_withNameLike($name);
	}
	
	/**
	 * 指定したタグを持つリソースに絞り込みます。
	 * 
	 * 複数のタグを指定する場合は withTags() を利用してください。
	 * 
	 * @todo Implement test case
	 * @access public
	 * @param string $tag
	 * @return \Saklient\Cloud\Models\Model_Swytch
	 */
	public function withTag($tag)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($tag, "string");
		return $this->_withTag($tag);
	}
	
	/**
	 * 指定したすべてのタグを持つリソースに絞り込みます。
	 * 
	 * @todo Implement test case
	 * @access public
	 * @param string[] $tags
	 * @return \Saklient\Cloud\Models\Model_Swytch
	 */
	public function withTags($tags)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($tags, "\\ArrayObject");
		return $this->_withTags($tags);
	}
	
	/**
	 * 指定したDNFに合致するタグを持つリソースに絞り込みます。
	 * 
	 * @todo Implement test case
	 * @access public
	 * @param string[][] $dnf
	 * @return \Saklient\Cloud\Models\Model_Swytch
	 */
	public function withTagDnf($dnf)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($dnf, "\\ArrayObject");
		return $this->_withTagDnf($dnf);
	}
	
	/**
	 * 名前でソートします。
	 * 
	 * @todo Implement test case
	 * @access public
	 * @param boolean $reverse=false
	 * @return \Saklient\Cloud\Models\Model_Swytch
	 */
	public function sortByName($reverse=false)
	{
		Util::validateType($reverse, "boolean");
		return $this->_sortByName($reverse);
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
	
	

}

