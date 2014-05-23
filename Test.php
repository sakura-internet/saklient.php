<?php

require 'vendor/autoload.php';

$api = \Saclient\Cloud\API::authorize($argv[1], $argv[2]);

$planFrom = $api->product->server->getBySpec(2, 4);
printf("plan from: [%s] %dcore %dGB\n", $planFrom->id, $planFrom->cpu, $planFrom->memoryGib);
$planTo   = $api->product->server->getBySpec(4, 8);
printf("plan to:   [%s] %dcore %dGB\n", $planTo->id, $planTo->cpu, $planTo->memoryGib);
printf("\n");

$servers = $api->server->withPlan($planFrom)->find();
foreach ($servers as $server) {
    printf("server [%s] %dcore %dGB '%s'\n", $server->id, $server->plan->cpu, $server->plan->memoryGib, $server->name);
    $server->changePlan($planTo);
    printf("    -> [%s] %dcore %dGB\n\n", $server->id, $server->plan->cpu, $server->plan->memoryGib);
}


//$icons = $api->icon->with_name_like("cent")->limit(1)->find();
//if (!$icons) die("icon not found");
//$icon = $icons[0];
//printf("icon [%s] %s\n\n", $icon->id, $icon->name);
//
//$servers = $api->server->with_name_like("cent")->find();
//foreach ($servers as $server) {
//    printf("server [%s] %s\n", $server->id, $server->name);
//    $server->icon = $icon;
//    $server->save();
//    printf("  changed icon to: [%s] %s\n\n", $server->icon->id, $server->icon->name);
//}




//$now = date("c");
//$servers = $api->server->with_tag("abc")->find();
//foreach ($servers as $server) {
//    printf("server [%s] %s\n", $server->id, $server->name);
//    $server->description .= "\n" . $now;
//	$server->save();
//    printf("%s\n\n", $server->description);
//}



//// 停止中のサーバに接続されているディスクを一覧
//$servers = $api->get_server()->with_instance_status("down")->find();
//foreach ($servers as $server) {
//	//if (!$server->tags) continue;
//	printf("\n");
//	$at = $server->instance->status_changed_at;
//	printf("server [%s] %s at %s\n", $server->id, $server->instance->status, $at ? $at->format("c") : "unknown");
//	printf("    tags: %s\n", implode(", ", (array)$server->tags));
//	//print_r($server);
//	foreach ($server->ifaces as $iface) {
//		printf("    iface [%s] %s %s\n", $iface->id, $iface->mac_address, $iface->ip_address ? $iface->ip_address : $iface->user_ip_address);
//		//print_r($disk->dump());
//	}
//	$disks = $server->find_disks(); // same as: $disks = $api->disk->withServerId($server->id)->find();
//	foreach ($disks as $disk) {
//		printf("    disk [%s] %s\n", $disk->id, $disk->name);
//		//print_r($disk->dump());
//	}
//}


//$disks = $api->disk->limit(5)->find();
//foreach ($disks as $disk) {
//	echo $disk->name, "\n";
//}

//print_r($api->server->get("112500105581")->dump());

//$servers = $api->zone(31001)->server->limit(5)->find();
//foreach ($servers as $server) {
//	print_r($server->dump());
//}

//$servers = $api->server->limit(5)->find();
//foreach ($servers as $server) {
//	print_r($server->dump());
//}

//$plans = $api->product->internet->find();
//foreach ($plans as $plan) {
//	print_r($plan->dump());
//}
