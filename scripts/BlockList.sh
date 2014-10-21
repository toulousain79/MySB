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

# All list are avaible in "/etc/MySB/scripts/in/blocklist"
# Add a '#' behind the line if you want to exclude a list.
# Example: #BLUETACK_ADS="http://....." to exclude ADS Bluetack list.

log_daemon_msg "Delete current global blocklist"
if [ ! -d /etc/MySB/scripts/blocklist ]; then
	mkdir /etc/MySB/scripts/blocklist
fi
if [ -f /etc/MySB/scripts/blocklist/blocklist_rtorrent.tmp ]; then
	rm -f /etc/MySB/scripts/blocklist/blocklist_rtorrent.tmp
fi
rm -f /etc/MySB/scripts/blocklist/*
StatusLSB

while read line; do
	FILE=`echo $line | cut -d '=' -f 1`
	URL=`echo $line | cut -d '"' -f 2`
	
	if [ "`echo ${FILE} | cut -c1`" != "#" ] && [ ! -z "$FILE" ] && [ ! -z "$URL" ]; then
		log_daemon_msg "Download selected list" "$FILE"
		CleanBlockList download "$FILE" "$URL" &> /dev/null

		# complete global list
		cat /etc/MySB/scripts/blocklist/$FILE.txt >> /etc/MySB/scripts/blocklist/blocklist_rtorrent.tmp
		
		# delete unused files
		rm -f /etc/MySB/scripts/blocklist/$FILE.tmp
		rm -f /etc/MySB/scripts/blocklist/$FILE.gz
		StatusLSB
	fi
done < /etc/MySB/inc/blocklist

# Default IP of TMG
log_daemon_msg "Add know TMG's IP to global blocklist"
echo "82.138.70.128/26" >> /etc/MySB/scripts/blocklist/blocklist_rtorrent.tmp
echo "82.138.74.0/25" >> /etc/MySB/scripts/blocklist/blocklist_rtorrent.tmp
echo "82.138.81.0/24" >> /etc/MySB/scripts/blocklist/blocklist_rtorrent.tmp
echo "85.159.232.0/24" >> /etc/MySB/scripts/blocklist/blocklist_rtorrent.tmp
echo "85.159.236.0/24" >> /etc/MySB/scripts/blocklist/blocklist_rtorrent.tmp
echo "91.189.104.0/20" >> /etc/MySB/scripts/blocklist/blocklist_rtorrent.tmp
echo "193.107.240.0/24" >> /etc/MySB/scripts/blocklist/blocklist_rtorrent.tmp
echo "193.107.241.0/24" >> /etc/MySB/scripts/blocklist/blocklist_rtorrent.tmp
echo "193.107.242.0/24" >> /etc/MySB/scripts/blocklist/blocklist_rtorrent.tmp
echo "193.107.243.0/24" >> /etc/MySB/scripts/blocklist/blocklist_rtorrent.tmp
echo "193.107.244.0/24" >> /etc/MySB/scripts/blocklist/blocklist_rtorrent.tmp
echo "193.107.245.0/24" >> /etc/MySB/scripts/blocklist/blocklist_rtorrent.tmp
echo "193.105.197.0/24" >> /etc/MySB/scripts/blocklist/blocklist_rtorrent.tmp
echo "195.191.244.0/24" >> /etc/MySB/scripts/blocklist/blocklist_rtorrent.tmp
StatusLSB

# delete blank line
log_daemon_msg "Delete lines with spaces in global blocklist"
CleanBlockList del_spaces blocklist_rtorrent
StatusLSB

# delete all RC
log_daemon_msg "Delete RC in global list"
CleanBlockList del_RC blocklist_rtorrent
StatusLSB

# delete line not start with numeric
log_daemon_msg "Delete lines not start with numeric in global list"
CleanBlockList not_numeric blocklist_rtorrent
StatusLSB

# delete line without "/" (is not in CIDR format)
log_daemon_msg "Delete lines without IP range in global list"
CleanBlockList not_iprange blocklist_rtorrent
StatusLSB

# sort by alpha and delete double line
log_daemon_msg "Delete double lines & sort global list"
CleanBlockList sort_uniq blocklist_rtorrent
StatusLSB

rm -f /etc/MySB/scripts/blocklist/blocklist_rtorrent.tmp

LISTUSERS=`ls /etc/MySB/users/ | grep '.info' | sed 's/.\{5\}$//'`
for seedUser in $LISTUSERS; do
	log_daemon_msg "Copy new global list for $seedUser"
	if [ -d /home/$seedUser/blocklist ]; then
		rm -f /home/$seedUser/blocklist/*
	else
		mkdir /home/$seedUser/blocklist
	fi	
	cp /etc/MySB/scripts/blocklist/* /home/$seedUser/blocklist/
	ChangingHomeUserRights "$seedUser" "/home/$seedUser"
	
	StatusLSB
done

# -----------------------------------------
source /etc/MySB/inc/includes_after
# -----------------------------------------
##################### LAST LINE ######################################