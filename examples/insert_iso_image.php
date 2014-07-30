<?php

require_once 'vendor/autoload.php';

$api = \SakuraInternet\Saclient\Cloud\API::authorize($argv[1], $argv[2]);

$isos = $api->isoImage->withNameLike("cent 6.5 64")->withSharedScope()->find();
if (!$isos) die("ISO image not found");
$iso = $isos[0];
printf("iso [%s] %s\n\n", $iso->id, $iso->name);

$servers = $api->server->withNameLike("cent")/*->withInstanceUp()*/->find();
foreach ($servers as $server) {
    printf("server (%s) [%s] %s\n", $server->instance->status, $server->id, $server->name);
	$server->insertIsoImage($iso);
	echo "  inserted iso image\n";
	$server->ejectIsoImage();
	echo "  ejected iso image\n";
}

