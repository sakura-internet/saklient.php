<?php

namespace Saklient\Cloud\Model;

require_once __DIR__ . "/../../../Saklient/Cloud/Model/Model.php";
use \Saklient\Cloud\Model\Model;
require_once __DIR__ . "/../../../Saklient/Cloud/Resource/Server.php";
use \Saklient\Cloud\Resource\Server;
require_once __DIR__ . "/../../../Saklient/Cloud/Resource/ServerPlan.php";
use \Saklient\Cloud\Resource\ServerPlan;
require_once __DIR__ . "/../../../Saklient/Cloud/Resource/IsoImage.php";
use \Saklient\Cloud\Resource\IsoImage;
require_once __DIR__ . "/../../../Saklient/Cloud/Enums/EServerInstanceStatus.php";
use \Saklient\Cloud\Enums\EServerInstanceStatus;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/** サーバを検索・作成するための機能を備えたクラス。 */
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
	 * @return \Saklient\Cloud\Model\Model_Server this
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
	 * @return \Saklient\Cloud\Model\Model_Server this
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
	 * @return \Saklient\Cloud\Model\Model_Server
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
	 * @return \Saklient\Cloud\Model\Model_Server this
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
	 * @return \Saklient\Cloud\Resource\Server リソースオブジェクト
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
	 * @return \Saklient\Cloud\Resource\Server リソースオブジェクト
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
	 * @return \Saklient\Cloud\Resource\Server[] リソースオブジェクトの配列
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
	 * @access public
	 * @param string $name
	 * @return \Saklient\Cloud\Model\Model_Server
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
	 * @access public
	 * @param string $tag
	 * @return \Saklient\Cloud\Model\Model_Server
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
	 * @return \Saklient\Cloud\Model\Model_Server
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
	 * @access public
	 * @param string[][] $dnf
	 * @return \Saklient\Cloud\Model\Model_Server
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
	 * @access public
	 * @param boolean $reverse=false
	 * @return \Saklient\Cloud\Model\Model_Server
	 */
	public function sortByName($reverse=false)
	{
		Util::validateType($reverse, "boolean");
		return $this->_sortByName($reverse);
	}
	
	/**
	 * 指定したプランのサーバに絞り込みます。
	 * 
	 * @access public
	 * @param \Saklient\Cloud\Resource\ServerPlan $plan
	 * @return \Saklient\Cloud\Model\Model_Server
	 */
	public function withPlan(\Saklient\Cloud\Resource\ServerPlan $plan)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($plan, "\\Saklient\\Cloud\\Resource\\ServerPlan");
		$this->_filterBy("ServerPlan.ID", new \ArrayObject([$plan->_id()]));
		return $this;
	}
	
	/**
	 * インスタンスが指定した状態にあるサーバに絞り込みます。
	 * 
	 * @access public
	 * @param string $status
	 * @return \Saklient\Cloud\Model\Model_Server
	 */
	public function withStatus($status)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($status, "string");
		$this->_filterBy("Instance.Status", new \ArrayObject([$status]));
		return $this;
	}
	
	/**
	 * インスタンスが起動中のサーバに絞り込みます。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Model\Model_Server
	 */
	public function withStatusUp()
	{
		return $this->withStatus(EServerInstanceStatus::up);
	}
	
	/**
	 * インスタンスが停止中のサーバに絞り込みます。
	 * 
	 * @access public
	 * @return \Saklient\Cloud\Model\Model_Server
	 */
	public function withStatusDown()
	{
		return $this->withStatus(EServerInstanceStatus::down);
	}
	
	/**
	 * 指定したISOイメージが挿入されているサーバに絞り込みます。
	 * 
	 * @access public
	 * @param \Saklient\Cloud\Resource\IsoImage $iso
	 * @return \Saklient\Cloud\Model\Model_Server
	 */
	public function withIsoImage(\Saklient\Cloud\Resource\IsoImage $iso)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($iso, "\\Saklient\\Cloud\\Resource\\IsoImage");
		$this->_filterBy("Instance.CDROM.ID", new \ArrayObject([$iso->_id()]));
		return $this;
	}
	
	/**
	 * 仮想コア数でソートします。
	 * 
	 * @access public
	 * @param boolean $reverse=false
	 * @return \Saklient\Cloud\Model\Model_Server
	 */
	public function sortByCpu($reverse=false)
	{
		Util::validateType($reverse, "boolean");
		$this->_sort("ServerPlan.CPU", $reverse);
		return $this;
	}
	
	/**
	 * メモリ容量でソートします。
	 * 
	 * @access public
	 * @param boolean $reverse=false
	 * @return \Saklient\Cloud\Model\Model_Server
	 */
	public function sortByMemory($reverse=false)
	{
		Util::validateType($reverse, "boolean");
		$this->_sort("ServerPlan.MemoryMB", $reverse);
		return $this;
	}
	
	

}

