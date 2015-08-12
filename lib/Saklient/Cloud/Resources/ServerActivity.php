<?php

namespace Saklient\Cloud\Resources;

require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Activity.php";
use \Saklient\Cloud\Resources\Activity;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/ServerActivitySample.php";
use \Saklient\Cloud\Resources\ServerActivitySample;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/** @property-read \ArrayObject $samples サンプル列  */
class ServerActivity extends Activity {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var ServerActivitySample[]
	 */
	protected $_samples;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \Saklient\Cloud\Resources\ServerActivitySample[]
	 */
	protected function get_samples()
	{
		return $this->_samples;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPathPrefix()
	{
		return "/server";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @param string $atStr
	 * @param mixed $data
	 * @return void
	 */
	protected function _addSample($atStr, $data)
	{
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($atStr, "string");
		$this->_samples->append(new ServerActivitySample($atStr, $data));
	}
	
	/**
	 * 現在の最新のアクティビティ情報を取得し、samplesに格納します。
	 *  
	 *  	 * @return this
	 * 
	 * @access public
	 * @param NativeDate|null $startDate=null
	 * @param NativeDate|null $endDate=null
	 * @return \Saklient\Cloud\Resources\ServerActivity
	 */
	public function fetch(NativeDate $startDate=null, NativeDate $endDate=null)
	{
		Util::validateType($startDate, "NativeDate");
		Util::validateType($endDate, "NativeDate");
		$this->_samples = new \ArrayObject([]);
		return $this->_fetch($startDate, $endDate);
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "samples": return $this->get_samples();
			default: return parent::__get($key);
		}
	}

}

