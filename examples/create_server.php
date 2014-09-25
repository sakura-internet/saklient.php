<?php

require_once 'vendor/autoload.php';

$api = \Saklient\Cloud\API::authorize($argv[1], $argv[2], $argv[3]);

$server = $api->server->create();
$server->name = "!saklient.php-" . date("Ymd_His") . "-" . uniqid();
$server->description = "This instance was created by saklient.php example";
$server->tags = ["saklient-test"];
$server->plan = $api->product->server->getBySpec(1, 1);
$server->save();

$iface = $server->addIface();
$iface->connectToSharedSegment();

print_r($server->reload()->dump());
