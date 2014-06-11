<?php

require_once 'vendor/autoload.php';

use SakuraInternet\Saclient\Cloud\Enums\EServerInstanceStatus;

printf("1: %s\n", EServerInstanceStatus::up);
printf("2: %s\n", EServerInstanceStatus::compare("up", "down"));
printf("3: %s\n", EServerInstanceStatus::compare("aaa", "down"));

