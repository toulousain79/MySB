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
log_daemon_msg "Clean certificates with bad links"
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
StatusLSB

#### Create trackers listing
# 1 - Add ruTorrent trackers in db
GetRutorrentTrackers

# 2 - Add users trackers in db
GetUsersTrackers

#### Clean global trackers list
sqlite3 $SQLiteDB "SELECT tracker FROM trackers_list WHERE 1" | while read Tracker; do
	TrackerDomain="`echo $Tracker | sed 's/tracker.//g;'`"

	ExistInRutorrent="`sqlite3 $SQLiteDB \"SELECT tracker_rutorrent FROM trackers_rutorrent WHERE tracker_rutorrent = '$TrackerDomain'\"`"
	
	if [ ! -z "$ExistInRutorrent" ]; then
		IsActive="`sqlite3 $SQLiteDB \"SELECT is_active FROM trackers_rutorrent WHERE tracker_rutorrent = '$TrackerDomain'\"`"
		case "$IsActive" in
			"0")
				Message="Disable tracker: $Tracker"
			;;
			"1")
				Message="Enable tracker: $Tracker"				
			;;
		esac		
		
		log_daemon_msg "$Message"
		sqlite3 $SQLiteDB "UPDATE or IGNORE trackers_list SET is_active = '$IsActive' WHERE tracker = '$Tracker';"
		StatusLSB
	else
		ExistInUsers="`sqlite3 $SQLiteDB \"SELECT tracker_users FROM trackers_users WHERE tracker_users = '$TrackerDomain'\"`"
		
		if [ ! -z "$ExistInUsers" ]; then
			IsActive="`sqlite3 $SQLiteDB \"SELECT is_active FROM trackers_users WHERE tracker_users = '$TrackerDomain'\"`"
			case "$IsActive" in
				"0")
					Message="Disable tracker: $Tracker"
				;;
				"1")
					Message="Enable tracker: $Tracker"				
				;;
			esac
			
			log_daemon_msg "$Message"			
			sqlite3 $SQLiteDB "UPDATE or IGNORE trackers_list SET is_active = '$IsActive' WHERE tracker = '$TrackerDomain';"
			StatusLSB
		else
			log_daemon_msg "Delete old tracker: $Tracker"
			sqlite3 $SQLiteDB "DELETE FROM trackers_list WHERE tracker = '$Tracker';"
			StatusLSB
		fi
	fi
done

#### Create new PeerGuardian P2P file
if [ "$MySB_PeerBlock" == "PeerGuardian" ]; then	
	(
	cat <<'EOF'
# allow.p2p - allow list for pglcmd
#
# This file contains IP ranges that shall not be checked.
# They must be in the PeerGuardian .p2p text format like this:
#   Some organization:1.0.0.0-1.255.255.255
# This is also true if your blocklists are in another format.
# Lines beginning with a hash (#) are comments and will be ignored.
#
# Do a "pglcmd restart" when you have edited this file.
EOF
	) > /etc/MySB/temp/allow.p2p
fi

sqlite3 $SQLiteDB "SELECT tracker,ipv4 FROM trackers_list WHERE is_active = '1'" | while read ROW; do
	TrackerName=`echo $ROW | awk '{split($0,a,"|"); print a[1]}'`
	TrackerIPv4=`echo $ROW | awk '{split($0,a,"|"); print a[2]}'`
	
	echo "$TrackerName:$TrackerIPv4-255.255.255.255" >> /etc/MySB/temp/allow.p2p
done

if [ -f /etc/MySB/temp/allow.p2p ]; then
	mv /etc/MySB/temp/allow.p2p /etc/pgl/allow.p2p
fi

#### Get certificates
sqlite3 $SQLiteDB "SELECT tracker FROM trackers_list WHERE is_active = '1'" | while read Tracker; do
	log_daemon_msg "Get certificate for $Tracker"
	cd /etc/MySB/ssl/trackers/
	openssl s_client -connect $Tracker:443 </dev/null 2>/dev/null | sed -n '/BEGIN CERTIFICATE/,/END CERTIFICATE/p' >> ./$Tracker.crt
	if [ -s ./$Tracker.crt ]; then
		openssl x509 -in ./$Tracker.crt -out ./$Tracker.der -outform DER 
		openssl x509 -in ./$Tracker.der -inform DER -out ./$Tracker.pem -outform PEM
		if [ -e ./$Tracker.pem ]; then
			if [ -f /etc/ssl/certs/$Tracker.pem ]; then
				rm /etc/ssl/certs/$Tracker.pem
			fi	
			ln -s /etc/MySB/ssl/trackers/$Tracker.pem /etc/ssl/certs/$Tracker.pem
			sqlite3 $SQLiteDB "UPDATE or IGNORE trackers_list SET is_ssl = '1' WHERE tracker = '$Tracker';"
		else
			sqlite3 $SQLiteDB "UPDATE or IGNORE trackers_list SET is_ssl = '0' WHERE tracker = '$Tracker';"
		fi
		
		rm ./$Tracker.der
	fi
	
	rm ./$Tracker.crt	
	StatusLSB
done

#### Create again certificates listing in system
log_daemon_msg "Certificates Rehash"
c_rehash &> /dev/null
StatusLSB

#ScriptInvoke 'source' '/etc/MySB/scripts/FirewallAndSecurity.sh' 'new'

# -----------------------------------------
source /etc/MySB/inc/includes_after
# -----------------------------------------
##################### LAST LINE ######################################