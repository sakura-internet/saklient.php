<?php

namespace SakuraInternet\Saclient\Cloud\Model;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Model/Model.php";
use \SakuraInternet\Saclient\Cloud\Model\Model;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Swytch.php";
use \SakuraInternet\Saclient\Cloud\Resource\Swytch;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

/**
 * スイッチを検索するための機能を備えたクラス。
 */
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
	 * 次に取得するリストの開始オフセットを指定します。
	 * 
	 * @access public
	 * @param int $offset オフセット
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Swytch this
	 */
	public function offset($offset)
	{
		return $this->_offset($offset);
	}
	
	/**
	 * 次に取得するリストの上限レコード数を指定します。
	 * 
	 * @access public
	 * @param int $count 上限レコード数
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Swytch this
	 */
	public function limit($count)
	{
		return $this->_limit($count);
	}
	
	/**
	 * APIのフィルタリング設定を直接指定します。
	 * 
	 * @access public
	 * @param mixed $value
	 * @param boolean $multiple = false
	 * @param string $key
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Swytch
	 */
	public function filterBy($key, $value, $multiple=false)
	{
		return $this->_filterBy($key, $value, $multiple);
	}
	
	/**
	 * 次のリクエストのために設定されているステートをすべて破棄します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Swytch this
	 */
	public function reset()
	{
		return $this->_reset();
	}
	
	/**
	 * *
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Swytch
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
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Swytch リソースオブジェクト
	 */
	public function getById($id)
	{
		return $this->_getById($id);
	}
	
	/**
	 * リソースの検索リクエストを実行し、結果をリストで取得します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Swytch[] リソースオブジェクトの配列
	 */
	public function find()
	{
		return $this->_find();
	}
	
	/**
	 * 指定した文字列を名前に含むスイッチに絞り込みます。
	 * 
	 * @access public
	 * @param string $name
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Swytch
	 */
	public function withNameLike($name)
	{
		$this->_filterBy("Name", $name);
		return $this;
	}
	
	

}

