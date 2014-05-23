<?php

namespace Saclient\Cloud\Model;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Model/Model.php";
use \Saclient\Cloud\Model\Model;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/InternetPlan.php";
use \Saclient\Cloud\Resource\InternetPlan;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \Saclient\Cloud\Util;

class Model_InternetPlan extends Model {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPath() {
		return "/product/internet";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey() {
		return "InternetPlan";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM() {
		return "InternetPlans";
	}
	
	/**
	 * 次に取得するリストの開始オフセットを指定します。
	 * 
	 * @access public
	 * @param int $offset オフセット
	 * @return \Saclient\Cloud\Model\Model_InternetPlan this
	 */
	public function offset($offset) {
		return $this->_offset($offset);
	}
	
	/**
	 * 次に取得するリストの上限レコード数を指定します。
	 * 
	 * @access public
	 * @param int $count 上限レコード数
	 * @return \Saclient\Cloud\Model\Model_InternetPlan this
	 */
	public function limit($count) {
		return $this->_limit($count);
	}
	
	/**
	 * 次のリクエストのために設定されているステートをすべて破棄します。
	 * 
	 * @access public
	 * @return \Saclient\Cloud\Model\Model_InternetPlan this
	 */
	public function reset() {
		return $this->_reset();
	}
	
	/**
	 * 指定したIDを持つ唯一のリソースを取得します。
	 * 
	 * @access public
	 * @param string $id
	 * @return \Saclient\Cloud\Resource\InternetPlan リソースオブジェクト
	 */
	public function get($id) {
		return $this->_get($id);
	}
	
	/**
	 * リソースの検索リクエストを実行し、結果をリストで取得します。
	 * 
	 * @access public
	 * @return \Saclient\Cloud\Resource\InternetPlan[] リソースオブジェクトの配列
	 */
	public function find() {
		return Util::castArray($this->_find(), null);
	}
	
	

}

