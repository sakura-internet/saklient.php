<?php

require_once 'vendor/autoload.php';

$api = \SakuraInternet\Saklient\Cloud\API::authorize($argv[1], $argv[2]);

function dumpInALine($type, $obj)
{
	echo $type;
	echo " [", $obj->id, "]";
	if (@$obj->sizeGib) echo " ", $obj->sizeGib, "GiB";
	if (@$obj->bandWidthMbps) echo " ", $obj->bandWidthMbps, "Mbps";
	if (@$obj->scope) echo " (", $obj->scope, ")";
	if (@$obj->macAddress) echo " ", $obj->macAddress;
	echo " ", $obj->name;
	if (@$obj->serverId) echo " (of server ", @$obj->serverId, ")";
	if (@$obj->ipv4Nets) {
		foreach ($obj->ipv4Nets as $net) {
			echo " S:", $net->address, "/", $net->maskLen;
		}
	}
	else {
		if (@$obj->userDefaultRoute) echo " U:", $obj->userDefaultRoute, "/", $obj->userMaskLen;
	}
	if (@$obj->ipv6Nets) {
		foreach ($obj->ipv6Nets as $net) {
			echo " ", $net->prefix, "/", $net->prefixLen;
		}
	}
	if (@$obj->router) echo " -> ", @$obj->router->bandWidthMbps, "Mbps";
	if (@$obj->tags && 0 < count($obj->tags)) echo " :", join(" :", (array)$obj->tags);
	if (@$obj->icon) echo " <", $obj->icon->name, ">";
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
	//
	print_r($obj->annotation);
//	print_r($obj->dump());
}

$scripts = $api->script->find();
foreach ($scripts as $script) dumpInALine("script", $script);
exit(0);

$servers = $api->server->find();
foreach ($servers as $server) dumpInALine("server", $server);

$disks = $api->disk->find();
foreach ($disks as $disk) dumpInALine("disk", $disk);

$appliances = $api->appliance->find();
foreach ($appliances as $appliance) dumpInALine("appliance", $appliance);

$archives = $api->archive->find();
foreach ($archives as $archive) dumpInALine("archive", $archive);

$isoImages = $api->isoImage->find();
foreach ($isoImages as $isoImage) dumpInALine("isoImage", $isoImage);

$appliances = $api->appliance->find();
foreach ($appliances as $appliance) {
    printf("\n");
    printf("appliance [%s] %s at %s\n", $appliance->id, $appliance->clazz, $appliance->name);
    printf("    tags: %s\n", implode(", ", (array)$appliance->tags));
    foreach ($appliance->ifaces as $iface) {
        printf("    iface [%s] %s %s\n", $iface->id, $iface->mac_address, $iface->ipAddress ? $iface->ipAddress : $iface->userIpAddress);
    }
}

$ifaces = $api->iface->find();
foreach ($ifaces as $iface) dumpInALine("iface", $iface);

$swytches = $api->swytch->find();
foreach ($swytches as $swytch) dumpInALine("swytch", $swytch);

$routers = $api->router->find();
foreach ($routers as $router) dumpInALine("router", $router);

