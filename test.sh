#!/bin/bash

cd `dirname $0`
source config.sh
php Test.php "$SACLOUD_TOKEN" "$SACLOUD_SECRET"
