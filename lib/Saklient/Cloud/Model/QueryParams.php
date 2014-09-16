<?php

namespace Saklient\Cloud\Model;

require_once __DIR__ . "/../../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/** @ignore */
class QueryParams {
	
	/**
	 * @access public
	 * @var int
	 */
	public $begin;
	
	/**
	 * @access public
	 * @var int
	 */
	public $count;
	
	/**
	 * @access public
	 * @var mixed
	 */
	public $filter;
	
	/**
	 * @access public
	 * @var string[]
	 */
	public $sort;
	
	/** @access public */
	public function __construct()
	{
		$this->begin = 0;
		$this->count = 0;
		$this->filter = (object)[];
		$this->sort = new \ArrayObject([]);
	}
	
	/**
	 * @access public
	 * @return mixed
	 */
	public function build()
	{
		return (object)[
			'From' => $this->begin,
			'Count' => $this->count,
			'Filter' => $this->filter,
			'Sort' => $this->sort
		];
	}
	
	

}

