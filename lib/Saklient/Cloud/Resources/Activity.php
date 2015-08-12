<?php

namespace Saklient\Cloud\Resources;

require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

class Activity {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Client
	 */
	protected $_client;
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_sourceId;
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPathPrefix()
	{
		return null;
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
	}
	
	/**
	 * @ignore
	 * @access public
	 * @param \Saklient\Cloud\Client $client
	 */
	public function __construct(\Saklient\Cloud\Client $client)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($client, "\\Saklient\\Cloud\\Client");
		$this->_client = $client;
	}
	
	/**
	 * @ignore
	 * @access public
	 * @param string $id
	 * @return void
	 */
	public function setSourceId($id)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($id, "string");
		$this->_sourceId = $id;
	}
	
	/**
	 * 現在の最新のアクティビティ情報を取得し、samplesに格納します。
	 *  
	 *  	 * @return this
	 * 
	 * @private
	 * @access public
	 * @ignore
	 * @param NativeDate|null $startDate=null
	 * @param NativeDate|null $endDate=null
	 * @return \Saklient\Cloud\Resources\Activity
	 */
	public function _fetch(NativeDate $startDate=null, NativeDate $endDate=null)
	{
		Util::validateType($startDate, "NativeDate");
		Util::validateType($endDate, "NativeDate");
		$query = (object)[];
		if ($startDate != null) {
			$query->{"Start"} = Util::date2str($startDate);
		}
		if ($endDate != null) {
			$query->{"End"} = Util::date2str($endDate);
		}
		$path = $this->_apiPathPrefix() . "/" . Util::urlEncode($this->_sourceId) . $this->_apiPathSuffix();
		$data = $this->_client->request("GET", $path);
		if ($data == null) {
			return null;
		}
		$data = $data->{"Data"};
		if ($data == null) {
			return null;
		}
		$dates = new \ArrayObject(array_keys((array)$data));
		$dates = Util::sortArray($dates);
		foreach ($dates as $date) {
			$this->_addSample($date, $data->{$date});
		}
		return $this;
	}
	
	

}

