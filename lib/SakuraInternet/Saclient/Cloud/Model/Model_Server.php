<?php

namespace SakuraInternet\Saclient\Cloud\Model;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Model/Model.php";
use \SakuraInternet\Saclient\Cloud\Model\Model;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Server.php";
use \SakuraInternet\Saclient\Cloud\Resource\Server;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/ServerPlan.php";
use \SakuraInternet\Saclient\Cloud\Resource\ServerPlan;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * サーバを検索するための機能を備えたクラス。
 */
class Model_Server extends Model {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPath()
	{
		return "/server";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey()
	{
		return "Server";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM()
	{
		return "Servers";
	}
	
	/**
	 * 次に取得するリストの開始オフセットを指定します。
	 * 
	 * @access public
	 * @param int $offset オフセット
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Server this
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
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Server this
	 */
	public function limit($count)
	{
		return $this->_limit($count);
	}
	
	/**
	 * 次のリクエストのために設定されているステートをすべて破棄します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Server this
	 */
	public function reset()
	{
		return $this->_reset();
	}
	
	/**
	 * *
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Server
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
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Server リソースオブジェクト
	 */
	public function get($id)
	{
		return $this->_get($id);
	}
	
	/**
	 * リソースの検索リクエストを実行し、結果をリストで取得します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Server[] リソースオブジェクトの配列
	 */
	public function find()
	{
		return Util::castArray($this->_find(), null);
	}
	
	/**
	 * 指定した文字列を名前に含むサーバに絞り込みます。
	 * 
	 * @access public
	 * @param string $name
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Server
	 */
	public function withNameLike($name)
	{
		$this->_filterBy("Name", $name);
		return $this;
	}
	
	/**
	 * 指定したタグを持つサーバに絞り込みます。
	 * 
	 * @access public
	 * @param string $tag
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Server
	 */
	public function withTag($tag)
	{
		$this->_filterBy("Tags.Name", $tag, true);
		return $this;
	}
	
	/**
	 * 指定したタグを持つサーバに絞り込みます。
	 * 
	 * @access public
	 * @param \SakuraInternet\Saclient\Cloud\Resource\ServerPlan $plan
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Server
	 */
	public function withPlan(\SakuraInternet\Saclient\Cloud\Resource\ServerPlan $plan)
	{
		$this->_filterBy("ServerPlan.ID", $plan->_id(), true);
		return $this;
	}
	
	/**
	 * インスタンスが指定した状態にあるサーバに絞り込みます。
	 * 
	 * @access public
	 * @param string $status
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Server
	 */
	public function withInstanceStatus($status)
	{
		$this->_filterBy("Instance.Status", $status, true);
		return $this;
	}
	
	

}

