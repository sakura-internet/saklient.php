<?php

namespace Saklient\Cloud\Resources;

require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/**
 * IPv4ネットワークのIPアドレス範囲。
 * 
 * @property-read string $first 開始アドレス 
 * @property-read string $last 終了アドレス 
 * @property-read \ArrayObject $asArray * この範囲に属するIPv4アドレスの一覧を取得します。
 */
class Ipv4Range {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_first;
	
	/**
	 * @access public
	 * @ignore
	 * @return string
	 */
	public function get_first()
	{
		return $this->_first;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string
	 */
	protected $_last;
	
	/**
	 * @access public
	 * @ignore
	 * @return string
	 */
	public function get_last()
	{
		return $this->_last;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var string[]
	 */
	protected $_asArray;
	
	/**
	 * @access public
	 * @ignore
	 * @return string[]
	 */
	public function get_asArray()
	{
		$ret = new \ArrayObject([]);
		$i = ip2long($this->_first);
		$i1 = ip2long($this->_last);
		while ($i <= $i1) {
			$ret->append(long2ip($i));
			$i++;
		}
		return $ret;
	}
	
	
	
	/**
	 * @ignore
	 * @access public
	 * @param mixed $obj=null
	 */
	public function __construct($obj=null)
	{
		if ($obj == null) {
			$obj = (object)[];
		}
		$first = Util::getByPathAny(new \ArrayObject([$obj]), new \ArrayObject(["Min", "min"]));
		$this->_first = null;
		if ($first != null) {
			$this->_first = $first;
		}
		if ($this->_first != null && $this->_first == "") {
			$this->_first = null;
		}
		$last = Util::getByPathAny(new \ArrayObject([$obj]), new \ArrayObject(["Max", "max"]));
		$this->_last = null;
		if ($last != null) {
			$this->_last = $last;
		}
		if ($this->_last != null && $this->_last == "") {
			$this->_last = null;
		}
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "first": return $this->get_first();
			case "last": return $this->get_last();
			case "asArray": return $this->get_asArray();
			default: return null;
		}
	}

}

