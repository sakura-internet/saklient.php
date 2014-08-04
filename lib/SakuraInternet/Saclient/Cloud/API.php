<?php

namespace SakuraInternet\Saclient\Cloud;

require_once dirname(__FILE__) . "/../../Saclient/Util.php";
use \SakuraInternet\Saclient\Util;
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
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Model/Model_Appliance.php";
use \SakuraInternet\Saclient\Cloud\Model\Model_Appliance;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Model/Model_Archive.php";
use \SakuraInternet\Saclient\Cloud\Model\Model_Archive;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Model/Model_IsoImage.php";
use \SakuraInternet\Saclient\Cloud\Model\Model_IsoImage;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Model/Model_Iface.php";
use \SakuraInternet\Saclient\Cloud\Model\Model_Iface;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Model/Model_Swytch.php";
use \SakuraInternet\Saclient\Cloud\Model\Model_Swytch;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Model/Model_Router.php";
use \SakuraInternet\Saclient\Cloud\Model\Model_Router;
require_once dirname(__FILE__) . "/../../Saclient/Cloud/Model/Model_Ipv6Net.php";
use \SakuraInternet\Saclient\Cloud\Model\Model_Ipv6Net;

/**
 * さくらのクラウドAPIクライアントを利用する際、最初にアクセスすべきルートとなるクラス。
 * 
 * @see API.authorize
 * @property-read \SakuraInternet\Saclient\Cloud\Client $client
 * @property-read \SakuraInternet\Saclient\Cloud\Product $product
 * @property-read \SakuraInternet\Saclient\Cloud\Model\Model_Icon $icon
 * @property-read \SakuraInternet\Saclient\Cloud\Model\Model_Server $server
 * @property-read \SakuraInternet\Saclient\Cloud\Model\Model_Disk $disk
 * @property-read \SakuraInternet\Saclient\Cloud\Model\Model_Appliance $appliance
 * @property-read \SakuraInternet\Saclient\Cloud\Model\Model_Archive $archive
 * @property-read \SakuraInternet\Saclient\Cloud\Model\Model_IsoImage $isoImage
 * @property-read \SakuraInternet\Saclient\Cloud\Model\Model_Iface $iface
 * @property-read \SakuraInternet\Saclient\Cloud\Model\Model_Swytch $swytch
 * @property-read \SakuraInternet\Saclient\Cloud\Model\Model_Router $router
 * @property-read \SakuraInternet\Saclient\Cloud\Model\Model_Ipv6Net $ipv6Net
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
	 * @private
	 * @access protected
	 * @ignore
	 * @var Model_Appliance
	 */
	protected $_appliance;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Appliance
	 */
	protected function get_appliance()
	{
		return $this->_appliance;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Model_Archive
	 */
	protected $_archive;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Archive
	 */
	protected function get_archive()
	{
		return $this->_archive;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Model_IsoImage
	 */
	protected $_isoImage;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_IsoImage
	 */
	protected function get_isoImage()
	{
		return $this->_isoImage;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Model_Iface
	 */
	protected $_iface;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Iface
	 */
	protected function get_iface()
	{
		return $this->_iface;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Model_Swytch
	 */
	protected $_swytch;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Swytch
	 */
	protected function get_swytch()
	{
		return $this->_swytch;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Model_Router
	 */
	protected $_router;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Router
	 */
	protected function get_router()
	{
		return $this->_router;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Model_Ipv6Net
	 */
	protected $_ipv6Net;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_Ipv6Net
	 */
	protected function get_ipv6Net()
	{
		return $this->_ipv6Net;
	}
	
	
	
	/**
	 * @access protected
	 * @ignore
	 * @param \SakuraInternet\Saclient\Cloud\Client $client
	 */
	protected function __construct(\SakuraInternet\Saclient\Cloud\Client $client)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($client, "\\SakuraInternet\\Saclient\\Cloud\\Client");
		$this->_client = $client;
		$this->_product = new Product($client);
		$this->_icon = new Model_Icon($client);
		$this->_server = new Model_Server($client);
		$this->_disk = new Model_Disk($client);
		$this->_appliance = new Model_Appliance($client);
		$this->_archive = new Model_Archive($client);
		$this->_isoImage = new Model_IsoImage($client);
		$this->_iface = new Model_Iface($client);
		$this->_swytch = new Model_Swytch($client);
		$this->_router = new Model_Router($client);
		$this->_ipv6Net = new Model_Ipv6Net($client);
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
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($token, "string");
		Util::validateType($secret, "string");
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
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($name, "string");
		$ret = new API($this->_client->cloneInstance());
		$ret->_client->setApiRoot("https://secure.sakura.ad.jp/cloud/");
		$ret->_client->setApiRootSuffix("zone/" . $name);
		return $ret;
	}
	
	/**
	 * @access public
	 * @param int $sec
	 * @return void
	 */
	public function sleep($sec)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($sec, "int");
		Util::sleep($sec);
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
			case "appliance": return $this->get_appliance();
			case "archive": return $this->get_archive();
			case "isoImage": return $this->get_isoImage();
			case "iface": return $this->get_iface();
			case "swytch": return $this->get_swytch();
			case "router": return $this->get_router();
			case "ipv6Net": return $this->get_ipv6Net();
			default: return null;
		}
	}

}

