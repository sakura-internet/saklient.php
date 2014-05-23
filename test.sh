#!/bin/bash

cd `dirname $0`
source config.sh

# Install required packages by composer automatically
if ! [ -e vendor/autoload.php ]; then
	if ( which composer > /dev/null ); then
		composer install
	else
		if ! [ -e composer.phar ]; then
			curl -sS https://getcomposer.org/installer | php
		fi
		php composer.phar install
	fi
fi

php Test.php "$SACLOUD_TOKEN" "$SACLOUD_SECRET"
