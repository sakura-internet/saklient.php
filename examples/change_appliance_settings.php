<?php

require_once 'vendor/autoload.php';

$api = \Saklient\Cloud\API::authorize($argv[1], $argv[2], $argv[3]);

$appliances = $api->appliance->withNameLike("loadbalancer1")->limit(1)->find();
if (!count($appliances)) die("appliance not found");

$appliance = $appliances[0];
//print_r($appliance->rawSettings);
printf("appliance %s [%s] %s\n", $appliance->clazz, $appliance->id, $appliance->name);

foreach ($appliance->virtualIps as $vip) {
	printf("  vip %s:%s every %ssec(s)\n", $vip->virtualIpAddress, $vip->port, $vip->delayLoop);
	foreach ($vip->servers as $server) {
		printf("    server %s://%s", $server->protocol, $server->ipAddress);
		if ($server->port) printf(":%d", $server->port);
		if ($server->pathToCheck) echo $server->pathToCheck;
		if ($server->expectedStatus) printf(" returns %d", $server->expectedStatus);
		echo "\n";
	}
}
//$lb[] = $lb[0];
//$appliance->save();
//echo $appliance->rawSettingsHash, "\n";
