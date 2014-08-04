<?php

namespace SakuraInternet\Saclient\Cloud\Model;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Model/Model.php";
use \SakuraInternet\Saclient\Cloud\Model\Model;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Server.php";
use \SakuraInternet\Saclient\Cloud\Resource\Server;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/ServerPlan.php";
use \SakuraInternet\Saclient\Cloud\Resource\ServerPlan;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/IsoImage.php";
use \SakuraInternet\Saclient\Cloud\Resource\IsoImage;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Enums/EServerInstanceStatus.php";
use \SakuraInternet\Saclient\Cloud\Enums\EServerInstanceStatus;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;

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
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _className()
	{
		return "Server";
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
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($offset, "int");
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
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Server
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
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Server[] リソースオブジェクトの配列
	 */
	public function find()
	{
		return $this->_find();
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
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($name, "string");
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
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($tag, "string");
		$this->_filterBy("Tags.Name", $tag, true);
		return $this;
	}
	
	/**
	 * 指定したタグを持つサーバに絞り込みます。
	 * 
	 * @access public
	 * @param string[] $tags
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Server
	 */
	public function withTags($tags)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($tags, "\\ArrayObject");
		$this->_filterBy("Tags.Name", $tags, true);
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
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($plan, "\\SakuraInternet\\Saclient\\Cloud\\Resource\\ServerPlan");
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
	public function withStatus($status)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($status, "string");
		$this->_filterBy("Instance.Status", $status, true);
		return $this;
	}
	
	/**
	 * インスタンスが起動中のサーバに絞り込みます。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Server
	 */
	public function withStatusUp()
	{
		return $this->withStatus(EServerInstanceStatus::up);
	}
	
	/**
	 * インスタンスが停止中のサーバに絞り込みます。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Server
	 */
	public function withStatusDown()
	{
		return $this->withStatus(EServerInstanceStatus::down);
	}
	
	/**
	 * 指定したISOイメージが挿入されているサーバに絞り込みます。
	 * 
	 * @access public
	 * @param \SakuraInternet\Saclient\Cloud\Resource\IsoImage $iso
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Server
	 */
	public function withIsoImage(\SakuraInternet\Saclient\Cloud\Resource\IsoImage $iso)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($iso, "\\SakuraInternet\\Saclient\\Cloud\\Resource\\IsoImage");
		$this->_filterBy("Instance.CDROM.ID", $iso->_id(), true);
		return $this;
	}
	
	

}

