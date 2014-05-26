[English version](README.md)

# さくらインターネット APIクライアントライブラリ for PHP

本ライブラリは [さくらのクラウド](https://secure.sakura.ad.jp/cloud/)
上のリソースを操作するための簡単なインタフェースを提供します。


# 必須環境

- PHP 5.4+
- [Composer](https://getcomposer.org/)


# サンプルコードの実行方法

```bash
# Composerをインストール（まだの場合）
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# このリポジトリをクローン
git clone git@github.com:sakura-internet/saclient.php.git
cd saclient.php

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


# あなたのプロジェクトでのこのライブラリの使用方法

```bash
cd YOUR/PROJECT/ROOT

# composer.json を作成
# （FuelPHPのようなフレームワークを使用する場合は既存の同ファイルを編集してください)
cat > composer.json << EOT
{
    "repositories": [
        {
            "type": "git",
            "url": "git@github.com:sakura-internet/saclient.php.git"
        }
    ],
    "require": {
        "sakura-internet/saclient": "dev-master"
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
$api = \Saclient\Cloud\API::authorize(YOUR_API_TOKEN, YOUR_API_SECRET);

// 指定したゾーンのAPIにアクセスするには
$api_is1b = $api->inZone("is1b");

// ...
```


# ArrayObjectに関する注意

$api->server->find() のようないくつかのメソッドは配列を返します。
この配列はPHP標準の [array](http://www.php.net/manual/en/book.array.php) の代わりに
[ArrayObject](http://www.php.net/manual/en/class.arrayobject.php) から成っています。
従って、[array_shift()](http://www.php.net/manual/en/function.array-shift.php)
のようなPHP標準の配列APIの引数に、この（このライブラリのあらゆるメソッドから返される）配列を渡す場合、
事前にArrayObjectから標準のarrayにキャストしなければなりません。

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
}

// これも正しく動作します（ArrayObjectにはArrayAccessとCountableが実装されています）
for ($i=0; $i < count($servers); $i++) {
    $server = $servers[$i];
    //...
}

```


# コピーライトおよびライセンス

Copyright (C) 2014 SAKURA Internet, Inc.

このライブラリは [MIT license](http://www.opensource.org/licenses/mit-license.php) に基づき、自由に再配布できます。

