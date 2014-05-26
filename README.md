[Japanese version](README.ja.md)

# SAKURA Internet API Client Library for PHP

This library gives you an easy interface to control your resources on
[SAKURA Cloud](https://secure.sakura.ad.jp/cloud/).


# Requirements

- PHP 5.4+
- [Composer](https://getcomposer.org/)


# How to run the example code

```bash
# Install Composer (if not yet)
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# Clone this repository
git clone git@github.com:sakura-internet/saclient.php.git
cd saclient.php

# Install Composer autoloader
composer install

# Set API key
cp config.example.sh config.sh
vi config.sh

# Run the example code
./test.sh
```

The API key values defined in config.sh must be generated by control panel at
[(Account Name) > Settings > API key](https://secure.sakura.ad.jp/cloud/#!/pref/apikey/)
page.


# How to use this library in your project

```bash
cd YOUR/PROJECT/ROOT

# Create composer.json
# (Edit existing one when using some kind of framework such as FuelPHP)
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

# Install packages
composer install

# Edit your code
vi YOUR-CODE.php
```

```php
<?php

require_once 'vendor/autoload.php';
$api = \SakuraInternet\Saclient\Cloud\API::authorize(YOUR_API_TOKEN, YOUR_API_SECRET);

// To access resources in the specified zone
$api_is1b = $api->inZone("is1b");

// ...
```


# Notice about ArrayObject

Some methods such as $api->server->find() return an array.
This array is made of [ArrayObject](http://www.php.net/manual/en/class.arrayobject.php)
instead of PHP standard [array](http://www.php.net/manual/en/book.array.php).
Therefore, you have to cast each array (returned by any methods in this library)
from ArrayObject to standard array before you use it as an argument for the methods
of PHP standard array API such as [array_shift()](http://www.php.net/manual/en/function.array-shift.php).

```php
<?php

$servers = $api->server->find();

// This doesn't work well
while ($server = array_shift($servers)) {
    //...
    
    // The same goes for accessors
    while ($tag = array_shift($server->tags)) {
        //...
    }
}

// This works well
$servers_array = (array)$servers;
while ($server = array_shift($servers_array)) {
    //...
    
    $tags_array = (array)$server->tags;
    while ($tag = array_shift($tags_array)) {
        //...
    }
}

// This works well because ArrayObject implements IteratorAggregate
foreach ($servers as $server) {
    //...
}

// This works well too because ArrayObject implements ArrayAccess and Countable
for ($i=0; $i < count($servers); $i++) {
    $server = $servers[$i];
    //...
}

```


# Copyright and license

Copyright (C) 2014 SAKURA Internet, Inc.

This library is freely redistributable under [MIT license](http://www.opensource.org/licenses/mit-license.php).

