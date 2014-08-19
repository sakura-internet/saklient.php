[English version](README.md)

# さくらインターネット APIクライアントライブラリ for PHP

本ライブラリは [さくらのクラウド](https://secure.sakura.ad.jp/cloud/)
上のリソースを操作するための簡単なインタフェースを提供します。


## 目次

* [必須環境](#requirements)
* [サンプルコードの実行方法](#how-to-run-the-example-code)
* [あなたのプロジェクトでのこのライブラリの使用方法](#how-to-use-this-library-in-your-project)
* [ArrayObjectに関する注意](#a-notice-about-arrayobject-arrayobject)
* [コピーライトおよびライセンス](#copyright-and-license)


## <a name="requirements"></a> 必須環境

- PHP 5.4+
- [Composer](https://getcomposer.org/)


## <a name="how-to-run-the-example-code"></a> サンプルコードの実行方法

```bash
# Composerをインストール（まだの場合）
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# このリポジトリをクローン
git clone git@github.com:sakura-internet/saklient.php.git
cd saklient.php

# Composerのautoloaderをインストール
composer install

# APIキーを設定
cp config.example.sh config.sh
vi config.sh

# サンプルコードを実行
./test.sh
```

config.shで定義されるAPIキーの値には、コントロールパネルの
[(Account Name) > Settings > API key](https://secure.sakura.ad.jp/cloud/#!/pref/apikey/)
ページで生成されたものを使用してください。


## <a name="how-to-use-this-library-in-your-project"></a> あなたのプロジェクトでのこのライブラリの使用方法

```bash
cd YOUR/PROJECT/ROOT

# composer.json を作成
# （FuelPHPのようなフレームワークを使用する場合は既存の同ファイルを編集してください)
cat > composer.json << EOT
{
    "repositories": [
        {
            "type": "git",
            "url": "git@github.com:sakura-internet/saklient.php.git"
        }
    ],
    "require": {
        "sakura-internet/saklient": "dev-master"
    }
}
EOT

# パッケージをインストール
composer install

# あなたのコードを編集
vi YOUR-CODE.php
```

```php
<?php

require_once 'vendor/autoload.php';
$api = \Saklient\Cloud\API::authorize(YOUR_API_TOKEN, YOUR_API_SECRET);

// 指定したゾーンのAPIにアクセスするには
$api_is1b = $api->inZone("is1b");

// ...
```


## <a name="a-notice-about-arrayobject"></a> ArrayObjectに関する注意

$api->server->find() のようないくつかのメソッドは配列を返します。
この配列はPHP標準の [array](http://www.php.net/manual/ja/book.array.php) の代わりに
[ArrayObject](http://www.php.net/manual/ja/class.arrayobject.php) から成っています。

従って、[array_shift()](http://www.php.net/manual/ja/function.array-shift.php)
のようなPHP標準の配列APIの引数に、（このライブラリのあらゆるメソッドから返される）この配列を渡す場合、
事前にArrayObjectから標準のarrayにキャストしなければなりません。

なお、ArrayObjectは配列ではなくオブジェクトですので、
**代入時や引数として渡す際にコピーされない**ことにご注意ください。
同様に、真偽値にキャストされた空のArrayObjectは、falseとして評価されません。

```php
<?php

$servers = $api->server->find();

// これは正しく動作しません
while ($server = array_shift($servers)) {
    //...
    
    // アクセサについても同様です
    while ($tag = array_shift($server->tags)) {
        //...
    }
}

// これは正しく動作します
$servers_array = (array)$servers;
while ($server = array_shift($servers_array)) {
    //...
    
    $tags_array = (array)$server->tags;
    while ($tag = array_shift($tags_array)) {
        //...
    }
}

// これも正しく動作します（ArrayObjectにはIteratorAggregateが実装されています）
foreach ($servers as $server) {
    //...
    
    foreach ($server->tags as $tag) {
        //...
    }
}

// これも正しく動作します（ArrayObjectにはArrayAccessとCountableが実装されています）
for ($i=0; $i < count($servers); $i++) {
    $server = $servers[$i];
    //...
    
    for ($j=0; $j < count($server->tags); $j++) {
        $tag = $server->tags[$j];
        //...
    }
}

```


## <a name="copyright-and-license"></a> コピーライトおよびライセンス

Copyright (C) 2014 SAKURA Internet, Inc.

このライブラリは [MIT license](http://www.opensource.org/licenses/mit-license.php) に基づき、自由に再配布できます。

