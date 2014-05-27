<?php

require_once 'vendor/autoload.php';

$api = \SakuraInternet\Saclient\Cloud\API::authorize($argv[1], $argv[2]);

$icons = $api->icon->withNameLike("cent")->limit(1)->find();
if (!$icons) die("icon not found");
$icon = $icons[0];
printf("icon [%s] %s\n\n", $icon->id, $icon->name);

$servers = $api->server->withNameLike("cent")->find();
foreach ($servers as $server) {
    printf("server [%s] %s\n", $server->id, $server->name);
	$server->icon = null;
	$server->save();
	printf("  changed icon to nothing: %s\n", $server->icon ? "NG" : "OK");
	$server->icon = $icon;
	$server->save();
	printf("  changed icon to: [%s] %s\n\n", $server->icon->id, $server->icon->name);
}

