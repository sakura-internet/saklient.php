<?php

require_once 'vendor/autoload.php';

$api = \SakuraInternet\Saklient\Cloud\API::authorize($argv[1], $argv[2]);

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

