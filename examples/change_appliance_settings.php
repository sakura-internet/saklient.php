<?php

require_once 'vendor/autoload.php';
use \Saklient\Cloud\API;
use \Saklient\Cloud\Resources\LbServer;
use \Saklient\Cloud\Resources\LbVirtualIp;


$api = API::authorize($argv[1], $argv[2], $argv[3]);

$appliances = $api->appliance->withNameLike("loadbalancer1")->limit(1)->find();
if (!count($appliances)) die("appliance not found");

/** @var LoadBalancer $lb */
$lb = $appliances[0];
//print_r($lb->rawSettings);
printf("appliance %s [%s] %s\n", $lb->clazz, $lb->id, $lb->name);

$lb->getVirtualIpByAddress("133.242.255.214")->addServer([
	"ip" => "133.242.255.218",
	"port" => 80,
	"protocol" => "ping"
]);
$lb->addVirtualIp([
	"vip" => "133.242.255.219",
	"port" => 80,
	"delay" => 15,
	"servers" => [
		[ "ip"=>"133.242.255.220", "port"=>80, "protocol"=>"http", "path"=>"/index.html", "status"=>200 ],
		[ "ip"=>"133.242.255.221", "port"=>80, "protocol"=>"tcp" ]
	]
]);

foreach ($lb->virtualIps as $vip) {
	printf("  vip %s:%s every %ssec(s)\n", $vip->virtualIpAddress, $vip->port, $vip->delayLoop);
	foreach ($vip->servers as $server) {
		printf("    server %s://%s", $server->protocol, $server->ipAddress);
		if ($server->port) printf(":%d", $server->port);
		if ($server->pathToCheck) echo $server->pathToCheck;
		echo " answers";
		if ($server->expectedStatus) printf(" %d", $server->expectedStatus);
		echo "\n";
	}
}

print_r($lb->dump());
$lb->save();
//echo $lb->rawSettingsHash, "\n";
