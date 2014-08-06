<?php

require_once 'vendor/autoload.php';

$api = \SakuraInternet\Saclient\Cloud\API::authorize($argv[1], $argv[2]);

$archives = $api->archive
	->withNameLike('CentOS 6.5 64bit')
	->withSizeGib(20)
	->withSharedScope()
	->limit(1)
	->find();
$archive = $archives[0];

$disk = $api->disk->create();
$disk->name = "!saclient.php-" . date("Ymd_His") . "-" . uniqid();
$disk->description = "This instance was created by saclient.php example";
$disk->tags = ["saclient-test"];
$disk->source = $archive;
$disk->save();

print_r($disk->apiSerialize(true));

if (!$disk->sleepWhileCopying()) die("failed");

print_r($disk->apiSerialize(true));

$diskconf = $disk->createConfig();
$diskconf->hostName = "saclient-test";
$diskconf->password = uniqid();
$diskconf->scripts[] = $api->script->getById(112600599509);
$diskconf->write();

