<?php

require_once 'vendor/autoload.php';

$api = \Saklient\Cloud\API::authorize($argv[1], $argv[2], $argv[3]);
 
foreach ($api->server->limit(5)->find() as $server) {
    echo $server->name, "\n";
    $server->boot();
}

