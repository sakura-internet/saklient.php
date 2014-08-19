<?php

namespace SakuraInternet\Saklient\Cloud\Model;

require_once dirname(__FILE__) . "/../../../Saklient/Cloud/Model/Model.php";
use \SakuraInternet\Saklient\Cloud\Model\Model;
require_once dirname(__FILE__) . "/../../../Saklient/Cloud/Resource/Icon.php";
use \SakuraInternet\Saklient\Cloud\Resource\Icon;
require_once dirname(__FILE__) . "/../../../Saklient/Cloud/Enums/EScope.php";
use \SakuraInternet\Saklient\Cloud\Enums\EScope;
require_once dirname(__FILE__) . "/../../../Saklient/Util.php";
use \SakuraInternet\Saklient\Util;
require_once dirname(__FILE__) . "/../../../Saklient/Errors/SaklientException.php";
use \SakuraInternet\Saklient\Errors\SaklientException;

/** アイコンを検索・作成するための機能を備えたクラス。 */
class Model_Icon extends Model {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPath()
	{
		return "/icon";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey()
	{
		return "Icon";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM()
	{
		return "Icons";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _className()
	{
		return "Icon";
	}
	
	/**
	 * 次に取得するリストの開始オフセットを指定します。
	 * 
	 * @access public
	 * @param int $offset オフセット
	 * @return \SakuraInternet\Saklient\Cloud\Model\Model_Icon this
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
	 * @return \SakuraInternet\Saklient\Cloud\Model\Model_Icon this
	 */
	public function limit($count)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($count, "int");
		return $this->_limit($count);
	}
	
	/**
	 * APIのフィルタリング設定を直接指定します。
	 * 
	 * @access public
	 * @param mixed $value
	 * @param boolean $multiple = false
	 * @param string $key
	 * @return \SakuraInternet\Saklient\Cloud\Model\Model_Icon
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
	 * @return \SakuraInternet\Saklient\Cloud\Model\Model_Icon this
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
	 * @return \SakuraInternet\Saklient\Cloud\Resource\Icon リソースオブジェクト
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
	 * @return \SakuraInternet\Saklient\Cloud\Resource\Icon[] リソースオブジェクトの配列
	 */
	public function find()
	{
		return $this->_find();
	}
	
	/**
	 * 指定した文字列を名前に含むリソースに絞り込みます。
	 * 大文字・小文字は区別されません。
	 * 半角スペースで区切られた複数の文字列は、それらをすべて含むことが条件とみなされます。
	 * 
	 * @access public
	 * @param string $name
	 * @return \SakuraInternet\Saklient\Cloud\Model\Model_Icon
	 */
	public function withNameLike($name)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($name, "string");
		return $this->_withNameLike($name);
	}
	
	/**
	 * 指定したタグを持つリソースに絞り込みます。
	 * 複数のタグを指定する場合は withTags() を利用してください。
	 * 
	 * @access public
	 * @param string $tag
	 * @return \SakuraInternet\Saklient\Cloud\Model\Model_Icon
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
	 * @access public
	 * @param string[] $tags
	 * @return \SakuraInternet\Saklient\Cloud\Model\Model_Icon
	 */
	public function withTags($tags)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($tags, "\\ArrayObject");
		return $this->_withTags($tags);
	}
	
	/**
	 * 名前でソートします。
	 * 
	 * @access public
	 * @param boolean $reverse = false
	 * @return \SakuraInternet\Saklient\Cloud\Model\Model_Icon
	 */
	public function sortByName($reverse=false)
	{
		Util::validateType($reverse, "boolean");
		return $this->_sortByName($reverse);
	}
	
	/**
	 * パブリックアイコンに絞り込みます。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saklient\Cloud\Model\Model_Icon
	 */
	public function withSharedScope()
	{
		$this->_filterBy("Scope", EScope::shared);
		return $this;
	}
	
	/**
	 * プライベートアイコンに絞り込みます。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saklient\Cloud\Model\Model_Icon
	 */
	public function withUserScope()
	{
		$this->_filterBy("Scope", EScope::user);
		return $this;
	}
	
	

}

