#!/bin/bash

certif="/etc/ssl/certs/webserver.crt"
key="/etc/ssl/private/webserver.key"
port="4443"
logfile=/var/log/wssh

#color
red="\e[31m"
default="\e[39m"

echo -e "$red \c"

systemctl start apache2 2>&1

if [[ $? -ne 0 ]]; then
	echo "Error : Unable to start apache"
	exit -1
fi


for pid in $(ps -aux | grep wssh | awk '{print $2}'); do
	kill $pid 2> /dev/null
done

if [[ $(du -k $logfile | cut -f1) -ge 3000 ]]; then
	line=$(wc -l $logfile | cut -d ' ' -f 1)
	middle=$(expr $line / 2)
	echo "The wssh log file becomes too large."
	echo "Deleting the first half of the log file...."
	echo "$middle lines will be removed"
	sed "1,$middle d" -i $logfile
fi

echo -e "$default \c"

wssh --certfile=$certif --keyfile=$key --sslport=$port &> $logfile &

echo "If the console is not accessible in the dashboard, check the log file $logfile"
