<?php

require_once 'vendor/autoload.php';

$api = \SakuraInternet\Saclient\Cloud\API::authorize($argv[1], $argv[2]);
 
foreach ($api->server->limit(5)->find() as $server) {
    echo $server->name, "\n";
    $server->boot();
}

