[Japanese version](README.ja.md)

# DEPRECATED

**[PLEASE USE THE ALTERNATIVE LIBRARIES](https://developer.sakura.ad.jp/)**

# SAKURA Internet API Client Library for PHP

This library gives you an easy interface to control your resources on
[SAKURA Cloud](https://secure.sakura.ad.jp/cloud/).


## Table of Contents

* [Requirements](#requirements)
* [How to use this library in your project](#how-to-use-this-library-in-your-project)
* [A notice about ArrayObject](#a-notice-about-arrayobject)
* [Examples](#examples)
* [Copyright and license](#copyright-and-license)


## Requirements

- PHP 5.4+
- [Composer](https://getcomposer.org/)


## How to use this library in your project

```bash
cd YOUR/PROJECT/ROOT

# Install Composer (if not yet)
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# Create composer.json
# (Edit existing one when using some kind of framework such as FuelPHP)
cat > composer.json << EOT
{
    "require": {
        "sakura-internet/saklient": "dev-master"
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
$api = \Saklient\Cloud\API::authorize(YOUR_API_TOKEN, YOUR_API_SECRET, ZONE);
// ZONE: "is1a" (Ishikari 1st zone), "is1b" (Ishikari 2nd zone), "tk1v" (Sandbox)
// "tk1v" is recommended for tests

// ...
```


## A notice about ArrayObject

Some methods such as $api->server->find() return an array.
This array is made of [ArrayObject](http://www.php.net/manual/en/class.arrayobject.php)
instead of PHP standard [array](http://www.php.net/manual/en/book.array.php).

Therefore, you have to cast each array (returned by any methods in this library)
from ArrayObject to standard array before you use it as an argument for the functions
of PHP standard array API such as [array_shift()](http://www.php.net/manual/en/function.array-shift.php).

Also, be aware that **an ArrayObject will not be copied in an assignment or as an argument to a function**
since it is an object but not an array. 
By the same token, a boolean-casted empty ArrayObject will not be evaluated as false.

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
    
    foreach ($server->tags as $tag) {
        //...
    }
}

// This works well too because ArrayObject implements ArrayAccess and Countable
for ($i=0; $i < count($servers); $i++) {
    $server = $servers[$i];
    //...
    
    for ($j=0; $j < count($server->tags); $j++) {
        $tag = $server->tags[$j];
        //...
    }
}

```


## Examples

Code examples are available [here](http://sakura-internet.github.io/saklient.doc/).


## Copyright and license

Copyright (C) 2014 SAKURA Internet, Inc.

This library is freely redistributable under [MIT license](http://www.opensource.org/licenses/mit-license.php).

