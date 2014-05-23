#!/bin/bash

cd `dirname $0`
source config.sh
[ -e vendor/autoload.php ] || composer.phar install
php Test.php "$SACLOUD_TOKEN" "$SACLOUD_SECRET"
