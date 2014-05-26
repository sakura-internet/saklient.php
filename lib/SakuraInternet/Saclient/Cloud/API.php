<?php

namespace SakuraInternet\Saclient\Cloud;

require_once dirname(__FILE__) . "/../../Saclient/Cloud/Client.php";
use \SakuraInternet\Saclient\Cloud\Client;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Product.php";
use \SakuraInternet\Saclient\Cloud\Product;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Model/Model_Icon.php";
use \SakuraInternet\Saclient\Cloud\Model\Model_Icon;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Model/Model_Server.php";
use \SakuraInternet\Saclient\Cloud\Model\Model_Server;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Model/Model_Disk.php";
use \SakuraInternet\Saclient\Cloud\Model\Model_Disk;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Model/Model_IPv6Net.php";
use \SakuraInternet\Saclient\Cloud\Model\Model_IPv6Net;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * さくらのクラウドAPIクライアントを利用する際、最初にアクセスすべきルートとなるクラス。
 * 
 * @see API.authorize
 * @property-read \SakuraInternet\Saclient\Cloud\Client $client
 * @property-read \SakuraInternet\Saclient\Cloud\Product $product
 * @property-read \SakuraInternet\Saclient\Cloud\Model\Model_Icon $icon
 * @property-read \SakuraInternet\Saclient\Cloud\Model\Model_Server $server
 * @property-read \SakuraInternet\Saclient\Cloud\Model\Model_Disk $disk
 * @property-read \SakuraInternet\Saclient\Cloud\Model\Model_IPv6Net $ipv6net
 */
class API {
	
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
	 * @access public
	 * @readOnly
	 */
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Product
	 */
	protected $_product;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Product
	 */
	protected function get_product()
	{
		return $this->_product;
	}
	
	/**
	 * @access public
	 * @readOnly
	 */
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Model_Icon
	 */
	protected $_icon;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Icon
	 */
	protected function get_icon()
	{
		return $this->_icon;
	}
	
	/**
	 * @access public
	 * @readOnly
	 */
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Model_Server
	 */
	protected $_server;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Server
	 */
	protected function get_server()
	{
		return $this->_server;
	}
	
	/**
	 * @access public
	 * @readOnly
	 */
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Model_Disk
	 */
	protected $_disk;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Disk
	 */
	protected function get_disk()
	{
		return $this->_disk;
	}
	
	/**
	 * @access public
	 * @readOnly
	 */
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Model_IPv6Net
	 */
	protected $_ipv6net;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_IPv6Net
	 */
	protected function get_ipv6net()
	{
		return $this->_ipv6net;
	}
	
	/**
	 * @access public
	 * @readOnly
	 */
	
	
	/**
	 * @access protected
	 * @ignore
	 * @param \SakuraInternet\Saclient\Cloud\Client $client
	 */
	protected function __construct($client)
	{
		$this->_client = $client;
		$this->_product = new Product($client);
		$this->_icon = new Model_Icon($client);
		$this->_server = new Model_Server($client);
		$this->_disk = new Model_Disk($client);
		$this->_ipv6net = new Model_IPv6Net($client);
	}
	
	/**
	 * 指定した認証情報を用いてアクセスを行うAPIクライアントを作成します。
	 * 必要な認証情報は、コントロールパネル右上にあるアカウントのプルダウンから
	 * 「設定」を選択し、「APIキー」のページにて作成できます。
	 * 
	 * @access public
	 * @param string $token ACCESS TOKEN
	 * @param string $secret ACCESS TOKEN SECRET
	 * @return \SakuraInternet\Saclient\Cloud\API APIクライアント
	 */
	static public function authorize($token, $secret)
	{
		$c = new Client($token, $secret);
		return new API($c);
	}
	
	/**
	 * 認証情報を引き継ぎ、指定したゾーンへのアクセスを行うAPIクライアントを作成します。
	 * 
	 * @access public
	 * @param string $name ゾーン名
	 * @return \SakuraInternet\Saclient\Cloud\API APIクライアント
	 */
	public function inZone($name)
	{
		$ret = new API($this->_client->cloneInstance());
		$ret->_client->setApiRootSuffix("zone/" . $name);
		return $ret;
	}
	
	/**
	 * @ignore
	 */
	public function __get($key) {
		switch ($key) {
			case "client": return $this->get_client();
			case "product": return $this->get_product();
			case "icon": return $this->get_icon();
			case "server": return $this->get_server();
			case "disk": return $this->get_disk();
			case "ipv6net": return $this->get_ipv6net();
			default: return null;
		}
	}

}

