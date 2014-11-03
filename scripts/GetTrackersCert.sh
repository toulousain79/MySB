#!/bin/bash 
# ----------------------------------
source /etc/MySB/inc/includes_before
# ----------------------------------
#  __/\\\\____________/\\\\___________________/\\\\\\\\\\\____/\\\\\\\\\\\\\___        
#   _\/\\\\\\________/\\\\\\_________________/\\\/////////\\\_\/\\\/////////\\\_       
#    _\/\\\//\\\____/\\\//\\\____/\\\__/\\\__\//\\\______\///__\/\\\_______\/\\\_      
#     _\/\\\\///\\\/\\\/_\/\\\___\//\\\/\\\____\////\\\_________\/\\\\\\\\\\\\\\__     
#      _\/\\\__\///\\\/___\/\\\____\//\\\\\________\////\\\______\/\\\/////////\\\_    
#       _\/\\\____\///_____\/\\\_____\//\\\____________\////\\\___\/\\\_______\/\\\_   
#        _\/\\\_____________\/\\\__/\\_/\\\______/\\\______\//\\\__\/\\\_______\/\\\_  
#         _\/\\\_____________\/\\\_\//\\\\/______\///\\\\\\\\\\\/___\/\\\\\\\\\\\\\/__ 
#          _\///______________\///___\////__________\///////////_____\/////////////_____
#			By toulousain79 ---> https://github.com/toulousain79/
#
######################################################################
#
#	Copyright (c) 2013 toulousain79 (https://github.com/toulousain79/)
#	Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
#	The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
#	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
#	IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
#	--> Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php
#
##################### FIRST LINE #####################################

if [ ! -d /etc/MySB/ssl/trackers/ ]; then
	mkdir /etc/MySB/ssl/trackers/
fi

#### Clean certificates with bad links
LIST_CERTS=$(ls -la /etc/ssl/certs/ | awk '{ print $9 }')
for Cert in ${LIST_CERTS}; do
	if [ "$Cert" != "" ] && [ "$Cert" != "." ] && [ "$Cert" != ".." ]; then

		TARGET=$(ls -la /etc/ssl/certs/$Cert | awk '{ print $11 }')

		if [ ! -f $TARGET ];then
			rm /etc/ssl/certs/$Cert
		fi
		
		unset Cert TARGET
	fi
done
unset LIST_CERTS

#### Create trackers listing
# Add ruTorrent trackers in db
ENGINES=$(ls -1r /usr/share/nginx/html/rutorrent/plugins/extsearch/engines/)
for engine in ${ENGINES}; do
	TRACKER=`cat /usr/share/nginx/html/rutorrent/plugins/extsearch/engines/$engine | grep "\$url" | grep "\=" | grep "http" | head -1 | sed 's/public//g;' | awk '{ print $3 }' | cut -d "/" -f 3 | cut -d "'" -f 1`
	if [ ! -z "$TRACKER" ]; then
		PART1=`echo ${TRACKER} | cut -d "." -f 1`
		PART2=`echo ${TRACKER} | cut -d "." -f 2`
		PART3=`echo ${TRACKER} | cut -d "." -f 3`

		if [ -z "$PART3" ]; then
			TrackerDomain="`echo $PART1`.`echo $PART2`"
		else
			TrackerDomain="`echo $PART2`.`echo $PART3`"
			TrackerHost="`echo $PART1`"
		fi		

		if [ ! -z "$TrackerDomain" ]; then
			sqlite3 -echo $SQLiteDB "INSERT or IGNORE into trackers_domains (tracker_domain,is_active) VALUES (\"$TrackerDomain\",\"0\");"
		fi

		if [ ! -z "$TrackerHost" ]; then
			sqlite3 -echo $SQLiteDB "INSERT or IGNORE into trakers_host (trakers_host) VALUES (\"$TrackerHost\");"
		fi
		
		unset PART1 PART2 PART3	TrackerDomain TrackerHost
	fi
	
	unset TRACKER
done
unset ENGINES

TrackersGenerateAddress



# -----------------------------------------
source /etc/MySB/inc/includes_after
# -----------------------------------------
##################### LAST LINE ######################################