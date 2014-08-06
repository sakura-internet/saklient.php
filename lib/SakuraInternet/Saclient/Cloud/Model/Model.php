<?php

namespace SakuraInternet\Saclient\Cloud\Model;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Client.php";
use \SakuraInternet\Saclient\Cloud\Client;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/Resource.php";
use \SakuraInternet\Saclient\Cloud\Resource\Resource;
require_once dirname(__FILE__) . "/../../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;
require_once dirname(__FILE__) . "/../../../Saclient/Errors/SaclientException.php";
use \SakuraInternet\Saclient\Errors\SaclientException;

/**
 * @ignore
 * @property-read \SakuraInternet\Saclient\Cloud\Client $client
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
	 * @return \SakuraInternet\Saclient\Cloud\Client
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
	 * @param \SakuraInternet\Saclient\Cloud\Client $client
	 */
	public function __construct(\SakuraInternet\Saclient\Cloud\Client $client)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($client, "\\SakuraInternet\\Saclient\\Cloud\\Client");
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
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model this
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
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model this
	 */
	protected function _limit($count)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($count, "int");
		$this->_params->{"Count"} = $count;
		return $this;
	}
	
	/**
	 * APIのフィルタリング設定を直接指定します。
	 * 
	 * @private
	 * @access protected
	 * @ignore
	 * @param mixed $value
	 * @param boolean $multiple = false
	 * @param string $key
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model
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
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model this
	 */
	protected function _reset()
	{
		$this->_params = (object)[];
		$this->_total = 0;
		$this->_count = 0;
		return $this;
	}
	
	/**
	 *  *
	 * 
	 * @private
	 * @access protected
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Resource
	 */
	protected function _create()
	{
		return Util::createClassInstance("saclient.cloud.resource." . $this->_className(), new \ArrayObject([$this->_client, null]));
	}
	
	/**
	 * 指定したIDを持つ唯一のリソースを取得します。
	 * 
	 * @private
	 * @access protected
	 * @ignore
	 * @param string $id
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Resource リソースオブジェクト
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
		$record = $result->{$this->_rootKey()};
		return Util::createClassInstance("saclient.cloud.resource." . $this->_className(), new \ArrayObject([$this->_client, $record]));
	}
	
	/**
	 * リソースの検索リクエストを実行し、結果をリストで取得します。
	 * 
	 * @private
	 * @access protected
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Resource[] リソースオブジェクトの配列
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
			$i = Util::createClassInstance("saclient.cloud.resource." . $this->_className(), new \ArrayObject([$this->_client, $record]));
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
	 * @return \SakuraInternet\Saclient\Cloud\Resource\Resource リソースオブジェクト
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
		return Util::createClassInstance("saclient.cloud.resource." . $this->_className(), new \ArrayObject([$this->_client, $records[0]]));
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

