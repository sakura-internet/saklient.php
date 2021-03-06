<?php

namespace Saklient\Cloud;

require_once __DIR__ . "/../../Saklient/Util.php";
use \Saklient\Util;
require_once __DIR__ . "/../../Saklient/Cloud/Client.php";
use \Saklient\Cloud\Client;
require_once __DIR__ . "/../../Saklient/Cloud/Product.php";
use \Saklient\Cloud\Product;
require_once __DIR__ . "/../../Saklient/Cloud/Facility.php";
use \Saklient\Cloud\Facility;
require_once __DIR__ . "/../../Saklient/Cloud/Models/Model_Icon.php";
use \Saklient\Cloud\Models\Model_Icon;
require_once __DIR__ . "/../../Saklient/Cloud/Models/Model_Server.php";
use \Saklient\Cloud\Models\Model_Server;
require_once __DIR__ . "/../../Saklient/Cloud/Models/Model_Disk.php";
use \Saklient\Cloud\Models\Model_Disk;
require_once __DIR__ . "/../../Saklient/Cloud/Models/Model_Appliance.php";
use \Saklient\Cloud\Models\Model_Appliance;
require_once __DIR__ . "/../../Saklient/Cloud/Models/Model_Archive.php";
use \Saklient\Cloud\Models\Model_Archive;
require_once __DIR__ . "/../../Saklient/Cloud/Models/Model_CommonServiceItem.php";
use \Saklient\Cloud\Models\Model_CommonServiceItem;
require_once __DIR__ . "/../../Saklient/Cloud/Models/Model_IsoImage.php";
use \Saklient\Cloud\Models\Model_IsoImage;
require_once __DIR__ . "/../../Saklient/Cloud/Models/Model_Iface.php";
use \Saklient\Cloud\Models\Model_Iface;
require_once __DIR__ . "/../../Saklient/Cloud/Models/Model_Swytch.php";
use \Saklient\Cloud\Models\Model_Swytch;
require_once __DIR__ . "/../../Saklient/Cloud/Models/Model_Router.php";
use \Saklient\Cloud\Models\Model_Router;
require_once __DIR__ . "/../../Saklient/Cloud/Models/Model_Bridge.php";
use \Saklient\Cloud\Models\Model_Bridge;
require_once __DIR__ . "/../../Saklient/Cloud/Models/Model_Ipv6Net.php";
use \Saklient\Cloud\Models\Model_Ipv6Net;
require_once __DIR__ . "/../../Saklient/Cloud/Models/Model_Script.php";
use \Saklient\Cloud\Models\Model_Script;
require_once __DIR__ . "/../../Saklient/Cloud/Models/Model_License.php";
use \Saklient\Cloud\Models\Model_License;
require_once __DIR__ . "/../../Saklient/Errors/SaklientException.php";
use \Saklient\Errors\SaklientException;

/**
 * さくらのクラウドAPIクライアントを利用する際、最初にアクセスすべきルートとなるクラス。
 * 
 * @see API.authorize
 * @property-read \Saklient\Cloud\Product $product 商品情報にアクセスするためのモデルを集めたオブジェクト。 
 * @property-read \Saklient\Cloud\Facility $facility 設備情報にアクセスするためのモデルを集めたオブジェクト。 
 * @property-read \Saklient\Cloud\Models\Model_Icon $icon アイコンにアクセスするためのモデル。 
 * @property-read \Saklient\Cloud\Models\Model_Server $server サーバにアクセスするためのモデル。 
 * @property-read \Saklient\Cloud\Models\Model_Disk $disk ディスクにアクセスするためのモデル。 
 * @property-read \Saklient\Cloud\Models\Model_Appliance $appliance アプライアンスにアクセスするためのモデル。 
 * @property-read \Saklient\Cloud\Models\Model_Archive $archive アーカイブにアクセスするためのモデル。 
 * @property-read \Saklient\Cloud\Models\Model_IsoImage $isoImage ISOイメージにアクセスするためのモデル。 
 * @property-read \Saklient\Cloud\Models\Model_Iface $iface インタフェースにアクセスするためのモデル。 
 * @property-read \Saklient\Cloud\Models\Model_Swytch $swytch スイッチにアクセスするためのモデル。 
 * @property-read \Saklient\Cloud\Models\Model_Router $router ルータにアクセスするためのモデル。 
 * @property-read \Saklient\Cloud\Models\Model_Bridge $bridge ブリッジにアクセスするためのモデル。 
 * @property-read \Saklient\Cloud\Models\Model_Ipv6Net $ipv6Net IPv6ネットワークにアクセスするためのモデル。 
 * @property-read \Saklient\Cloud\Models\Model_Script $script スクリプトにアクセスするためのモデル。 
 * @property-read \Saklient\Cloud\Models\Model_CommonServiceItem $commonServiceItem 共通サービス契約にアクセスするためのモデル。 
 * @property-read \Saklient\Cloud\Models\Model_License $license ライセンスにアクセスするためのモデル。 
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
	 * @return \Saklient\Cloud\Client
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
	 * @return \Saklient\Cloud\Product
	 */
	protected function get_product()
	{
		return $this->_product;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Facility
	 */
	protected $_facility;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \Saklient\Cloud\Facility
	 */
	protected function get_facility()
	{
		return $this->_facility;
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
	 * @return \Saklient\Cloud\Models\Model_Icon
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
	 * @return \Saklient\Cloud\Models\Model_Server
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
	 * @return \Saklient\Cloud\Models\Model_Disk
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
	 * @return \Saklient\Cloud\Models\Model_Appliance
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
	 * @return \Saklient\Cloud\Models\Model_Archive
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
	 * @return \Saklient\Cloud\Models\Model_IsoImage
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
	 * @return \Saklient\Cloud\Models\Model_Iface
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
	 * @return \Saklient\Cloud\Models\Model_Swytch
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
	 * @return \Saklient\Cloud\Models\Model_Router
	 */
	protected function get_router()
	{
		return $this->_router;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Model_Bridge
	 */
	protected $_bridge;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \Saklient\Cloud\Models\Model_Bridge
	 */
	protected function get_bridge()
	{
		return $this->_bridge;
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
	 * @return \Saklient\Cloud\Models\Model_Ipv6Net
	 */
	protected function get_ipv6Net()
	{
		return $this->_ipv6Net;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Model_Script
	 */
	protected $_script;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \Saklient\Cloud\Models\Model_Script
	 */
	protected function get_script()
	{
		return $this->_script;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Model_CommonServiceItem
	 */
	protected $_commonServiceItem;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \Saklient\Cloud\Models\Model_CommonServiceItem
	 */
	protected function get_commonServiceItem()
	{
		return $this->_commonServiceItem;
	}
	
	
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @var Model_License
	 */
	protected $_license;
	
	/**
	 * @access protected
	 * @ignore
	 * @return \Saklient\Cloud\Models\Model_License
	 */
	protected function get_license()
	{
		return $this->_license;
	}
	
	
	
	/**
	 * @ignore
	 * @access protected
	 * @param \Saklient\Cloud\Client $client
	 */
	protected function __construct(\Saklient\Cloud\Client $client)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($client, "\\Saklient\\Cloud\\Client");
		$this->_client = $client;
		$this->_product = new Product($client);
		$this->_facility = new Facility($client);
		$this->_icon = new Model_Icon($client);
		$this->_server = new Model_Server($client);
		$this->_disk = new Model_Disk($client);
		$this->_appliance = new Model_Appliance($client);
		$this->_archive = new Model_Archive($client);
		$this->_isoImage = new Model_IsoImage($client);
		$this->_iface = new Model_Iface($client);
		$this->_swytch = new Model_Swytch($client);
		$this->_router = new Model_Router($client);
		$this->_bridge = new Model_Bridge($client);
		$this->_ipv6Net = new Model_Ipv6Net($client);
		$this->_script = new Model_Script($client);
		$this->_commonServiceItem = new Model_CommonServiceItem($client);
		$this->_license = new Model_License($client);
	}
	
	/**
	 * 指定した認証情報を用いてアクセスを行うAPIクライアントを作成します。
	 * 
	 * 必要な認証情報は、コントロールパネル右上にあるアカウントのプルダウンから
	 * 「設定」を選択し、「APIキー」のページにて作成できます。
	 * 
	 * @access public
	 * @param string $token ACCESS TOKEN
	 * @param string $secret ACCESS TOKEN SECRET
	 * @param string $zone=null ゾーン名
	 * @return \Saklient\Cloud\API APIクライアント
	 */
	static public function authorize($token, $secret, $zone=null)
	{
		Util::validateArgCount(func_num_args(), 2);
		Util::validateType($token, "string");
		Util::validateType($secret, "string");
		Util::validateType($zone, "string");
		$c = new Client($token, $secret);
		$ret = new API($c);
		return $zone != null ? $ret->inZone($zone) : $ret;
	}
	
	/**
	 * 認証情報を引き継ぎ、指定したゾーンへのアクセスを行うAPIクライアントを作成します。
	 * 
	 * @access public
	 * @param string $name ゾーン名
	 * @return \Saklient\Cloud\API APIクライアント
	 */
	public function inZone($name)
	{
		Util::validateArgCount(func_num_args(), 1);
		Util::validateType($name, "string");
		$ret = new API($this->_client->cloneInstance());
		$suffix = "";
		if ($name == "is1x" || $name == "is1y") {
			$suffix = "-test";
		}
		$ret->_client->setApiRoot("https://secure.sakura.ad.jp/cloud" . $suffix . "/");
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
			case "facility": return $this->get_facility();
			case "icon": return $this->get_icon();
			case "server": return $this->get_server();
			case "disk": return $this->get_disk();
			case "appliance": return $this->get_appliance();
			case "archive": return $this->get_archive();
			case "isoImage": return $this->get_isoImage();
			case "iface": return $this->get_iface();
			case "swytch": return $this->get_swytch();
			case "router": return $this->get_router();
			case "bridge": return $this->get_bridge();
			case "ipv6Net": return $this->get_ipv6Net();
			case "script": return $this->get_script();
			case "commonServiceItem": return $this->get_commonServiceItem();
			case "license": return $this->get_license();
			default: return null;
		}
	}

}

