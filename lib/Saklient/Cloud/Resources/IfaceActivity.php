<?php

namespace Saklient\Cloud\Resources;

require_once __DIR__ . "/../../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/Activity.php";
use \Saklient\Cloud\Resources\Activity;
require_once __DIR__ . "/../../../Saklient/Cloud/Resources/IfaceActivitySample.php";
use \Saklient\Cloud\Resources\IfaceActivitySample;
require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/** @property-read \ArrayObject $samples サンプル列  */
class IfaceActivity extends Activity {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var IfaceActivitySample[]
	 */
	protected $_samples;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \Saklient\Cloud\Resources\IfaceActivitySample[]
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
		return "/interface";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPathSuffix()
	{
		return "/monitor";
	}
	
	/**
	 * @ignore
	 * @access public
	 * @param \Saklient\Cloud\Client $client
	 */
	public function __construct(\Saklient\Cloud\Client $client)
	{
		parent::__construct($client);
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($client, "\\Saklient\\Cloud\\Client");
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
		$this->_samples->append(new IfaceActivitySample($atStr, $data));
	}
	
	/**
	 * 現在の最新のアクティビティ情報を取得し、samplesに格納します。
	 *  
	 *  	 * @return this
	 * 
	 * @access public
	 * @param NativeDate|null $startDate=null
	 * @param NativeDate|null $endDate=null
	 * @return \Saklient\Cloud\Resources\IfaceActivity
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

