<?php

namespace SakuraInternet\Saclient\Cloud\Model;

require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Model/Model.php";
use \SakuraInternet\Saclient\Cloud\Model\Model;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Resource/IsoImage.php";
use \SakuraInternet\Saclient\Cloud\Resource\IsoImage;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Enums/EScope.php";
use \SakuraInternet\Saclient\Cloud\Enums\EScope;
require_once dirname(__FILE__) . "/../../../Saclient/Cloud/Util.php";
use \SakuraInternet\Saclient\Cloud\Util;

/**
 * ISOイメージを検索するための機能を備えたクラス。
 */
class Model_IsoImage extends Model {
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _apiPath()
	{
		return "/cdrom";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKey()
	{
		return "CDROM";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _rootKeyM()
	{
		return "CDROMs";
	}
	
	/**
	 * @private
	 * @access protected
	 * @ignore
	 * @return string
	 */
	protected function _className()
	{
		return "IsoImage";
	}
	
	/**
	 * 次に取得するリストの開始オフセットを指定します。
	 * 
	 * @access public
	 * @param int $offset オフセット
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_IsoImage this
	 */
	public function offset($offset)
	{
		return $this->_offset($offset);
	}
	
	/**
	 * 次に取得するリストの上限レコード数を指定します。
	 * 
	 * @access public
	 * @param int $count 上限レコード数
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_IsoImage this
	 */
	public function limit($count)
	{
		return $this->_limit($count);
	}
	
	/**
	 * APIのフィルタリング設定を直接指定します。
	 * 
	 * @access public
	 * @param mixed $value
	 * @param boolean $multiple = false
	 * @param string $key
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_IsoImage
	 */
	public function filterBy($key, $value, $multiple=false)
	{
		return $this->_filterBy($key, $value, $multiple);
	}
	
	/**
	 * 次のリクエストのために設定されているステートをすべて破棄します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_IsoImage this
	 */
	public function reset()
	{
		return $this->_reset();
	}
	
	/**
	 * 指定したIDを持つ唯一のリソースを取得します。
	 * 
	 * @access public
	 * @param string $id
	 * @return \SakuraInternet\Saclient\Cloud\Resource\IsoImage リソースオブジェクト
	 */
	public function getById($id)
	{
		return $this->_getById($id);
	}
	
	/**
	 * リソースの検索リクエストを実行し、結果をリストで取得します。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Resource\IsoImage[] リソースオブジェクトの配列
	 */
	public function find()
	{
		return Util::castArray($this->_find(), null);
	}
	
	/**
	 * 指定した文字列を名前に含むISOイメージに絞り込みます。
	 * 
	 * @access public
	 * @param string $name
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_IsoImage
	 */
	public function withNameLike($name)
	{
		$this->_filterBy("Name", $name);
		return $this;
	}
	
	/**
	 * 指定したタグを持つISOイメージに絞り込みます。
	 * 
	 * @access public
	 * @param string $tag
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_IsoImage
	 */
	public function withTag($tag)
	{
		$this->_filterBy("Tags.Name", $tag, true);
		return $this;
	}
	
	/**
	 * 指定したサイズのISOイメージに絞り込みます。
	 * 
	 * @access public
	 * @param int $sizeGib
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_IsoImage
	 */
	public function withSizeGib($sizeGib)
	{
		$this->_filterBy("SizeMB", $sizeGib * 1024);
		return $this;
	}
	
	/**
	 * パブリックISOイメージに絞り込みます。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_IsoImage
	 */
	public function withSharedScope()
	{
		$this->_filterBy("Scope", EScope::shared);
		return $this;
	}
	
	/**
	 * プライベートISOイメージに絞り込みます。
	 * 
	 * @access public
	 * @return \SakuraInternet\Saclient\Cloud\Model\Model_IsoImage
	 */
	public function withUserScope()
	{
		$this->_filterBy("Scope", EScope::user);
		return $this;
	}
	
	

}

