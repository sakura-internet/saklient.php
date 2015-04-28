<?php

namespace Saklient\Cloud;

use Saklient\Errors\ExceptionFactory;

/**
 * @ignore
 */
class Client {
	
	private static function println($msg) {
		fprintf(\STDERR, "%s\n", $msg);
	}
	
	public static function arrayObject2array($obj) {
		if ($obj instanceof \ArrayObject) {
			return $obj->getArrayCopy();
		}
		if (is_object($obj)) {
			$ret = (object)[];
			foreach ($obj as $i=>$v) $ret->{$i} = self::arrayObject2Array($v);
			return $ret;
		}
		return $obj;
	}
	
	public static function array2ArrayObject($obj) {
		if (is_array($obj)) {
			return new \ArrayObject($obj);
		}
		if (is_object($obj)) {
			$ret = (object)[];
			foreach ($obj as $i=>$v) $ret->{$i} = self::array2ArrayObject($v);
			return $ret;
		}
		return $obj;
	}
	
	public $additionalParams;
	
	private $config;
	
	public function __construct($token, $secret) {
		$this->config = (object)[];
		$this->config->apiRoot = "https://secure.sakura.ad.jp/cloud/";
		$this->config->apiRootSuffix = null;
		$this->setAccessKey($token, $secret);
		$this->additionalParams = (object)[];
	}
	
	public function cloneInstance() {
		$c = new Client($this->config->token, $this->config->secret);
		$c->config->apiRoot = $this->config->apiRoot;
		$c->config->apiRootSuffix = $this->config->apiRootSuffix;
		$p = json_encode(self::arrayObject2array($this->additionalParams));
		$c->additionalParams = self::array2ArrayObject(json_decode($p));
		return $c;
	}
	
	public function setApiRoot($url) {
		$this->config->apiRoot = $url;
	}
	
	public function setApiRootSuffix($suffix) {
		$this->config->apiRootSuffix = $suffix;
	}
	
	public function setAccessKey($token, $secret) {
		$this->config->token = $token;
		$this->config->secret = $secret;
		$this->config->authorization = "Basic " . base64_encode($token.":".$secret);
	}

	public function request($method, $path, $params=null) {
		$method = strtoupper($method);
		$path = preg_replace('/^\\/?/', '/', $path);
		$json = null;
		$aParams = self::arrayObject2array($this->additionalParams);
		if ($params != null) {
			foreach (self::arrayObject2array($params) as $k=>$v) {
				if (!isset($aParams->{$k})) $aParams->{$k} = $v;
			}
		}
		if ($aParams) $json = json_encode($aParams);
		if ($method=="GET") {
			if ($json != null) $path .= "?" . rawurlencode($json);
			$json = null;
		}
		if (!preg_match('/^http/', $path)) {
			$urlRoot = $this->config->apiRoot;
			if ($this->config->apiRootSuffix != null) {
				$urlRoot .= $this->config->apiRootSuffix;
				$urlRoot = preg_replace('/\\/?$/', '/', $urlRoot);
			}
			$path = $urlRoot . 'api/cloud/1.1' . $path;
		}
//		self::println("// APIリクエスト中: ".$method." ".$path);
//		self::println($json);
		
		$context = stream_context_create(array(
			"http" => array(
				'ignore_errors' => true,
				'method'  => $method != 'GET' ? 'POST' : 'GET',
				'header'  => implode("\r\n", array(
					'Content-Type: application/x-www-form-urlencoded',
					'Authorization: '.$this->config->authorization,
					'User-Agent: saklient.php ver-0.0.2.7 rev-3f3b3b7ce4b10e7ebcd77c17497763ba558bf424',
					'X-Requested-With: XMLHttpRequest',
					'X-Sakura-No-Authenticate-Header: 1',
					'X-Sakura-HTTP-Method: '.$method,
					'X-Sakura-Request-Format: json',
					'X-Sakura-Response-Format: json',
					'X-Sakura-Error-Level: warning',
				)),
				'content' => $json,
			),
		));		
		
//		self::println($path);
		$data = file_get_contents($path, null, $context);
		$resh = array();
		foreach ($http_response_header as $h) {
			if (preg_match('|^HTTP/[0-9\\.]+ +(.+)|', $h, $m)) {
				$resh['Status'] = $m[1];
			}
			else {
				$h = preg_split('/ *: */', $h, 2);
				if (2 <= count($h)) $resh[$h[0]] = $h[1];
			}
		}
		$status = explode(" ", $resh['Status']);
		$status = $status[0];
//		self::println('// > '.$resh['Status']);
//		print_r($resh);
		
		$ret = null;
		if ($data != null) $ret = self::array2ArrayObject(json_decode($data, false));
		//trace("DATA="+data);
		
		if (!(200 <= $status && $status < 300)) throw ExceptionFactory::create($status, $ret ? $ret->error_code : null, $ret ? $ret->error_msg : null);
		
		return $ret;//Util.localizeKeys(ret);
	}
	
}

