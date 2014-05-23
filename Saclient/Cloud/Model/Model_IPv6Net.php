<?php

namespace Saclient\Cloud\Model;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Model/Model.php";
use \Saclient\Cloud\Model\Model;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/IPv6Net.php";
use \Saclient\Cloud\Resource\IPv6Net;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \Saclient\Cloud\Util;

class Model_IPv6Net extends Model {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPath() {
		return "/ipv6net";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey() {
		return "IPv6Net";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM() {
		return "IPv6Nets";
	}
	
	/**
	 * 次に取得するリストの開始オフセットを指定します。
	 * 
	 * @access public
	 * @param int $offset オフセット
	 * @return \Saclient\Cloud\Model\Model_IPv6Net this
	 */
	public function offset($offset) {
		return $this->_offset($offset);
	}
	
	/**
	 * 次に取得するリストの上限レコード数を指定します。
	 * 
	 * @access public
	 * @param int $count 上限レコード数
	 * @return \Saclient\Cloud\Model\Model_IPv6Net this
	 */
	public function limit($count) {
		return $this->_limit($count);
	}
	
	/**
	 * 次のリクエストのために設定されているステートをすべて破棄します。
	 * 
	 * @access public
	 * @return \Saclient\Cloud\Model\Model_IPv6Net this
	 */
	public function reset() {
		return $this->_reset();
	}
	
	/**
	 * 指定したIDを持つ唯一のリソースを取得します。
	 * 
	 * @access public
	 * @param string $id
	 * @return \Saclient\Cloud\Resource\IPv6Net リソースオブジェクト
	 */
	public function get($id) {
		return $this->_get($id);
	}
	
	/**
	 * リソースの検索リクエストを実行し、結果をリストで取得します。
	 * 
	 * @access public
	 * @return \Saclient\Cloud\Resource\IPv6Net[] リソースオブジェクトの配列
	 */
	public function find() {
		return Util::castArray($this->_find(), null);
	}
	
	

}

