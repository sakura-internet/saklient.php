<?php

namespace Saclient\Cloud;

class Client {
	
	private static function println($msg) {
		fprintf(\STDERR, "%s\n", $msg);
	}
	
	public static function arrayObject2array($obj) {
		if ($obj instanceof \ArrayObject) {
			$obj = $obj->getArrayCopy();
		}
		elseif (is_object($obj)) {
			$obj = clone $obj;
		}
		if (is_object($obj) || is_array($obj)) {
			foreach ($obj as &$v) $v = self::arrayObject2Array($v);
		}
		return $obj;
	}
	
	public static function array2ArrayObject($obj) {
	    if (is_array($obj)) {
	        $obj = new \ArrayObject($obj);
	    }
	    elseif (is_object($obj)) {
	        $obj = clone $obj;
	    }
	    if (is_object($obj)) {
	        foreach ($obj as &$v) $v = self::array2ArrayObject($v);
	    }
	    return $obj;
	}
	
	private $config;
	
	public function __construct($token, $secret) {
		$this->config = (object)[];
		$this->config->api_root = "https://secure.sakura.ad.jp/cloud/";
		$this->config->api_root_suffix = null;
		$this->set_access_key($token, $secret);
	}
	
	public function clone_instance() {
		$c = new Client($this->config->token, $this->config->secret);
		$c->config->api_root = $this->config->api_root;
		$c->config->api_root_suffix = $this->config->api_root_suffix;
		return $c;
	}
	
	public function set_api_root($url) {
		$this->config->api_root = $url;
	}
	
	public function set_api_root_suffix($suffix) {
		$this->config->api_root_suffix = $suffix;
	}
	
	public function set_access_key($token, $secret) {
		$this->config->token = $token;
		$this->config->secret = $secret;
		$this->config->authorization = "Basic " . base64_encode($token.":".$secret);
	}

	public function request($method, $path, $params=null) {
		$method = strtoupper($method);
		$path = preg_replace('/^\\/?/', '/', $path);
		$json = $params!=null ? json_encode(self::arrayObject2array($params)) : null;
		if ($method=="GET") {
			if ($json != null) $path .= "?" . rawurlencode($json);
			$json = null;
		}
		if (!preg_match('/^http/', $path)) {
			$urlRoot = $this->config->api_root;
			if ($this->config->api_root_suffix != null) {
				if (preg_match('/is1[v-z]/', $this->config->api_root_suffix)) {
					$urlRoot = preg_replace('|/cloud/$|', '/cloud-test/', $urlRoot);
				}
				$urlRoot .= $this->config->api_root_suffix;
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
					'User-Agent: sacloud-client-php',
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
		
//		trace(http.responseData);
		
		if (!(200 <= $status && $status < 300)) throw new \Exception($resh['Status']);
		//trace("DATA="+data);
		$ret = null;
		if ($data != null) $ret = self::array2ArrayObject(json_decode($data, false));
//		println("//  -> " + status);
		return $ret;//Util.localizeKeys(ret);
	}
	
}

