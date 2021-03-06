<?php

require_once 'vendor/autoload.php';

$api = \Saklient\Cloud\API::authorize($argv[1], $argv[2], $argv[3]);

$now = date("c");
$servers = $api->server->withTag("abc")->find();
foreach ($servers as $server) {
    printf("server [%s] %s\n", $server->id, $server->name);
    $server->description .= "\n" . $now;
    $server->save();
    printf("%s\n\n", $server->description);
}

