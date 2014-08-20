<?php

namespace Saklient\Cloud\Model;

require_once __DIR__ . "/../../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../../Saklient/Cloud/Resource/Resource.php";
use \Saklient\Cloud\Resource\Resource;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/**
 * @ignore
 * @property-read \Saklient\Cloud\Client $client
 * @property-read TQueryParams $params
 * @property-read int $total
 * @property-read int $count
 */
class Model {
	
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
	 * @var TQueryParams
	 */
	protected $_params;
	
	/**
	 * @access protected
	 * @ignore
	 * @return TQueryParams
	 */
	protected function get_params()
	{
		return $this->_params;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var int
	 */
	protected $_total;
	
	/**
	 * @access protected
	 * @ignore
	 * @return int
	 */
	protected function get_total()
	{
		return $this->_total;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var int
	 */
	protected $_count;
	
	/**
	 * @access protected
	 * @ignore
	 * @return int
	 */
	protected function get_count()
	{
		return $this->_count;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPath()
	{
		return null;
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey()
	{
		return null;
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM()
	{
		return null;
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _className()
	{
		return null;
	}
	
	/**
	 * @access public
	 * @param \Saklient\Cloud\Client $client
	 */
	public function __construct(\Saklient\Cloud\Client $client)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($client, "\\Saklient\\Cloud\\Client");
		$this->_client = $client;
		$this->_params = (object)[];
		$this->_total = null;
		$this->_count = null;
	}
	
	/**
	 * 次に取得するリストの開始オフセットを指定します。
	 * 
	 * @private
	 * @access protected
	 * @ignore
	 * @param int $offset オフセット
	 * @return \Saklient\Cloud\Model\Model this
	 */
	protected function _offset($offset)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($offset, "int");
		$this->_params->{"Begin"} = $offset;
		return $this;
	}
	
	/**
	 * 次に取得するリストの上限レコード数を指定します。
	 * 
	 * @private
	 * @access protected
	 * @ignore
	 * @param int $count 上限レコード数
	 * @return \Saklient\Cloud\Model\Model this
	 */
	protected function _limit($count)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($count, "int");
		$this->_params->{"Count"} = $count;
		return $this;
	}
	
	/**
	 * 次に取得するリストのソートカラムを指定します。
	 * 
	 * @private
	 * @access protected
	 * @ignore
	 * @param string $column カラム名
	 * @param boolean $reverse=false
	 * @return \Saklient\Cloud\Model\Model this
	 */
	protected function _sort($column, $reverse=false)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($column, "string");
		Util::validateType($reverse, "boolean");
		if (!array_key_exists("Sort", $this->_params)) {
			$this->_params->{"Sort"} = new \ArrayObject([]);
		}
		$sort = $this->_params->{"Sort"};
		$op = $reverse ? "-" : "";
		$sort->append($op . $column);
		return $this;
	}
	
	/**
	 * Web APIのフィルタリング設定を直接指定します。
	 * 
	 * @private
	 * @access protected
	 * @ignore
	 * @param string $key キー
	 * @param mixed $value 値
	 * @param boolean $multiple=false valueに配列を与え、OR条件で完全一致検索する場合にtrueを指定します。通常、valueはスカラ値であいまい検索されます。
	 * @return \Saklient\Cloud\Model\Model
	 */
	protected function _filterBy($key, $value, $multiple=false)
	{
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($key, "string");
		Util::validateType($multiple, "boolean");
		if (!array_key_exists("Filter", $this->_params)) {
			$this->_params->{"Filter"} = (object)[];
		}
		$filter = $this->_params->{"Filter"};
		if ($multiple) {
			if (!array_key_exists($key, $filter)) {
				$filter->{$key} = new \ArrayObject([]);
			}
			$values = $filter->{$key};
			$values->append($value);
		}
		else {
			$filter->{$key} = $value;
		}
		return $this;
	}
	
	/**
	 * 次のリクエストのために設定されているステートをすべて破棄します。
	 * 
	 * @private
	 * @access protected
	 * @ignore
	 * @return \Saklient\Cloud\Model\Model this
	 */
	protected function _reset()
	{
		$this->_params = (object)[];
		$this->_total = 0;
		$this->_count = 0;
		return $this;
	}
	
	/**
	 * 新規リソース作成用のオブジェクトを用意します。
	 * 
	 * 返り値のオブジェクトにパラメータを設定し、save() を呼ぶことで実際のリソースが作成されます。
	 * 
	 * @private
	 * @access protected
	 * @ignore
	 * @return \Saklient\Cloud\Resource\Resource リソースオブジェクト
	 */
	protected function _create()
	{
		return Util::createClassInstance("saklient.cloud.resource." . $this->_className(), new \ArrayObject([$this->_client, null]));
	}
	
	/**
	 * 指定したIDを持つ唯一のリソースを取得します。
	 * 
	 * @private
	 * @access protected
	 * @ignore
	 * @param string $id
	 * @return \Saklient\Cloud\Resource\Resource リソースオブジェクト
	 */
	protected function _getById($id)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($id, "string");
		$params = $this->_params;
		$this->_reset();
		$result = $this->_client->request("GET", $this->_apiPath() . "/" . Util::urlEncode($id), $params);
		$this->_total = 1;
		$this->_count = 1;
		return Util::createClassInstance("saklient.cloud.resource." . $this->_className(), new \ArrayObject([
			$this->_client,
			$result,
			true
		]));
	}
	
	/**
	 * リソースの検索リクエストを実行し、結果をリストで取得します。
	 * 
	 * @private
	 * @access protected
	 * @ignore
	 * @return \Saklient\Cloud\Resource\Resource[] リソースオブジェクトの配列
	 */
	protected function _find()
	{
		$params = $this->_params;
		$this->_reset();
		$result = $this->_client->request("GET", $this->_apiPath(), $params);
		$this->_total = $result->{"Total"};
		$this->_count = $result->{"Count"};
		$records = $result->{$this->_rootKeyM()};
		$data = new \ArrayObject([]);
		foreach ($records as $record) {
			$i = Util::createClassInstance("saklient.cloud.resource." . $this->_className(), new \ArrayObject([$this->_client, $record]));
			$data->append($i);
		}
		return $data;
	}
	
	/**
	 * リソースの検索リクエストを実行し、唯一のリソースを取得します。
	 * 
	 * @private
	 * @access protected
	 * @ignore
	 * @return \Saklient\Cloud\Resource\Resource リソースオブジェクト
	 */
	protected function _findOne()
	{
		$params = $this->_params;
		$this->_reset();
		$result = $this->_client->request("GET", $this->_apiPath(), $params);
		$this->_total = $result->{"Total"};
		$this->_count = $result->{"Count"};
		if ($this->_total == 0) {
			return null;
		}
		$records = $result->{$this->_rootKeyM()};
		return Util::createClassInstance("saklient.cloud.resource." . $this->_className(), new \ArrayObject([$this->_client, $records[0]]));
	}
	
	/**
	 * 指定した文字列を名前に含むリソースに絞り込みます。
	 * 
	 * 大文字・小文字は区別されません。
	 * 半角スペースで区切られた複数の文字列は、それらをすべて含むことが条件とみなされます。
	 * 
	 * @private
	 * @access protected
	 * @ignore
	 * @param string $name
	 * @return \Saklient\Cloud\Model\Model
	 */
	protected function _withNameLike($name)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($name, "string");
		return $this->_filterBy("Name", $name);
	}
	
	/**
	 * 指定したタグを持つリソースに絞り込みます。
	 * 
	 * 複数のタグを指定する場合は withTags() を利用してください。
	 * 
	 * @private
	 * @access protected
	 * @ignore
	 * @param string $tag
	 * @return \Saklient\Cloud\Model\Model
	 */
	protected function _withTag($tag)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($tag, "string");
		return $this->_filterBy("Tags.Name", $tag, true);
	}
	
	/**
	 * 指定したすべてのタグを持つリソースに絞り込みます。
	 * 
	 * @private
	 * @access protected
	 * @ignore
	 * @param string[] $tags
	 * @return \Saklient\Cloud\Model\Model
	 */
	protected function _withTags($tags)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($tags, "\\ArrayObject");
		return $this->_filterBy("Tags.Name", $tags, true);
	}
	
	/**
	 * 名前でソートします。
	 * 
	 * @private
	 * @access protected
	 * @ignore
	 * @param boolean $reverse=false
	 * @return \Saklient\Cloud\Model\Model
	 */
	protected function _sortByName($reverse=false)
	{
		Util::validateType($reverse, "boolean");
		return $this->_sort("Name", $reverse);
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "client": return $this->get_client();
			case "params": return $this->get_params();
			case "total": return $this->get_total();
			case "count": return $this->get_count();
			default: return null;
		}
	}

}

