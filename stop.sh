#!/bin/bash
#kill all wssh process
for pid in $(ps -aux | grep wssh | awk '{print $2}'); do
	kill $pid 2> /dev/null
done

systemctl stop apache2
systemctl stop mariadb
