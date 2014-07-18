<?php

require_once 'vendor/autoload.php';

$api = \SakuraInternet\Saclient\Cloud\API::authorize($argv[1], $argv[2]);

$server = $api->server->create();
$server->name = "!saclient.php-" . date("Ymd_His") . "-" . uniqid();
$server->description = "This instance was created by saclient.php example";
$server->tags = ["saclient-test"];
$server->plan = $api->product->server->getBySpec(1, 1);
$server->save();

$iface = $server->addIface();
$iface->connectToSharedSegment();

print_r($server->apiSerialize(true));
