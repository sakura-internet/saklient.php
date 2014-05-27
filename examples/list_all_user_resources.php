<?php

require_once 'vendor/autoload.php';

$api = \SakuraInternet\Saclient\Cloud\API::authorize($argv[1], $argv[2]);

function dumpInALine($type, $obj)
{
	echo $type;
	echo " [", $obj->id, "]";
	if (@$obj->sizeGib) echo " ", $obj->sizeGib, "GiB";
	if (@$obj->scope) echo " (", $obj->scope, ")";
	echo " ", $obj->name;
	if (@$obj->tags && 0 < count($obj->tags)) echo " <", join("> <", (array)$obj->tags), ">";
	echo "\n";
	//
	if (@$obj->ifaces) {
		foreach ($obj->ifaces as $iface) {
			printf("    iface [%s] %s", $iface->id, $iface->macAddress);
			if ($iface->ipAddress) echo " (", $iface->ipAddress, ")";
			elseif ($iface->userIpAddress) echo " (", $iface->userIpAddress, ")";
			echo "\n";
		}
	}
}

$servers = $api->server->find();
foreach ($servers as $server) dumpInALine("server", $server);

$disks = $api->disk->find();
foreach ($disks as $disk) dumpInALine("disk", $disk);

$appliances = $api->appliance->find();
foreach ($appliances as $appliance) dumpInALine("appliance", $appliance);

$archives = $api->archive->find();
foreach ($archives as $archive) dumpInALine("archive", $archive);

//$appliances = $api->appliance->find();
//foreach ($appliances as $appliance) {
//    printf("\n");
//    printf("appliance [%s] %s at %s\n", $appliance->id, $appliance->clazz, $appliance->name);
//    printf("    tags: %s\n", implode(", ", (array)$appliance->tags));
//    foreach ($appliance->ifaces as $iface) {
//        printf("    iface [%s] %s %s\n", $iface->id, $iface->mac_address, $iface->ipAddress ? $iface->ipAddress : $iface->userIpAddress);
//    }
//}

