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

# Select and run an example file
PS3="Select mode > "
select mode in $( ls -1 examples | sed 's/\.php$//' ) "quit"; do
	( [ -z "$mode" ] || [ "$mode" = "quit" ] ) && exit 1
	php "examples/$mode.php" "$SACLOUD_TOKEN" "$SACLOUD_SECRET"
	exit 0
done
