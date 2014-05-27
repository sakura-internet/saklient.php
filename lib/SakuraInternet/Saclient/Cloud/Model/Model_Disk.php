<?php

namespace SakuraInternet\Saclient\Cloud\Model;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Model/Model.php";
use \SakuraInternet\Saclient\Cloud\Model\Model;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Disk.php";
use \SakuraInternet\Saclient\Cloud\Resource\Disk;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * ディスクを検索するための機能を備えたクラス。
 */
class Model_Disk extends Model {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPath()
	{
		return "/disk";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey()
	{
		return "Disk";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM()
	{
		return "Disks";
	}
	
	/**
	 * 次に取得するリストの開始オフセットを指定します。
	 * 
	 * @access public
	 * @param int $offset オフセット
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Disk this
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
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Disk this
	 */
	public function limit($count)
	{
		return $this->_limit($count);
	}
	
	/**
	 * 次のリクエストのために設定されているステートをすべて破棄します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Disk this
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
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Disk リソースオブジェクト
	 */
	public function get($id)
	{
		return $this->_get($id);
	}
	
	/**
	 * リソースの検索リクエストを実行し、結果をリストで取得します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Disk[] リソースオブジェクトの配列
	 */
	public function find()
	{
		return Util::castArray($this->_find(), null);
	}
	
	/**
	 * 指定した文字列を名前に含むディスクに絞り込みます。
	 * 
	 * @access public
	 * @param string $name
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Disk
	 */
	public function withNameLike($name)
	{
		$this->_filterBy("Name", $name);
		return $this;
	}
	
	/**
	 * 指定したタグを持つディスクに絞り込みます。
	 * 
	 * @access public
	 * @param string $tag
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Disk
	 */
	public function withTag($tag)
	{
		$this->_filterBy("Tags.Name", $tag, true);
		return $this;
	}
	
	/**
	 * 指定したサーバへ接続されているディスクに絞り込みます。
	 * 
	 * @access public
	 * @param string $id
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Disk
	 */
	public function withServerId($id)
	{
		$this->_filterBy("Server.ID", $id);
		return $this;
	}
	
	

}
