#!/bin/bash

cd `dirname $0`
source config.sh

mode=$1
if [ "$mode" != "" ]; then
	php "examples/$mode.php" "$SACLOUD_TOKEN" "$SACLOUD_SECRET" "$SACLOUD_ZONE"
	exit $?
fi


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


# Show message

r=$(tput setaf 1)
b=$(tput sgr0)
echo "${r}********** WARNING!!! **********${b}"
echo "${r}Some resources may be created owned by your SAKURA Cloud account.${b}"
echo "${r}This means that running an example with your API key makes your expenses.${b}"
read -p "Type 'ok': " ok
[ "$ok" = "ok" ] || exit 1
echo


# Select and run an example file

PS3="Select mode > "
select mode in $( ls -1 examples | sed 's/\.php$//' ) "quit"; do
	( [ -z "$mode" ] || [ "$mode" = "quit" ] ) && exit 1
	php "examples/$mode.php" "$SACLOUD_TOKEN" "$SACLOUD_SECRET" "$SACLOUD_ZONE"
	exit $?
done

