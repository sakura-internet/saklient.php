<?php

require_once 'vendor/autoload.php';

$api = \SakuraInternet\Saclient\Cloud\API::authorize($argv[1], $argv[2]);

$servers = $api->server->withInstanceStatus("down")->find();
foreach ($servers as $server) {
    printf("\n");
    $at = $server->instance->statusChangedAt;
    printf("server [%s] %s at %s\n", $server->id, $server->instance->status, $at ? $at->format("c") : "unknown");
    printf("    tags: %s\n", implode(", ", (array)$server->tags));
    foreach ($server->ifaces as $iface) {
        printf("    iface [%s] %s %s\n", $iface->id, $iface->mac_address, $iface->ipAddress ? $iface->ipAddress : $iface->userIpAddress);
    }
    $disks = $server->findDisks(); // same as: $api->disk->withServerId($server->id)->find();
    foreach ($disks as $disk) {
        printf("    disk [%s] %s\n", $disk->id, $disk->name);
    }
}

