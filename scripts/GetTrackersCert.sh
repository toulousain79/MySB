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

GetCertificate() {
	TRACKER=$1
	cd /etc/MySB/ssl/trackers/
		
	openssl s_client -connect $TRACKER:443 </dev/null 2>/dev/null | sed -n '/BEGIN CERTIFICATE/,/END CERTIFICATE/p' >> ./$TRACKER.crt 
	if [ -s ./$TRACKER.crt ]; then
		openssl x509 -in ./$TRACKER.crt -out ./$TRACKER.der -outform DER 
		openssl x509 -in ./$TRACKER.der -inform DER -out ./$TRACKER.pem -outform PEM
		if [ -e ./$TRACKER.pem ]; then
			if [ -f /etc/ssl/certs/$TRACKER.pem ]; then
				rm /etc/ssl/certs/$TRACKER.pem
			fi	
			ln -s /etc/MySB/ssl/trackers/$TRACKER.pem /etc/ssl/certs/$TRACKER.pem
		fi
		
		rm ./$TRACKER.der
	fi
	
	rm ./$TRACKER.crt
	
	unset TRACKER
}

if [ ! -d /etc/MySB/ssl/trackers/ ]; then
	mkdir /etc/MySB/ssl/trackers/
fi

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

TrackersListing

while read TRACKER; do
	log_daemon_msg "Get certificate for $TRACKER"
	GetCertificate $TRACKER
	StatusLSB
done < /etc/MySB/infos/trackers.list

log_daemon_msg "Certificates Rehash"
c_rehash &> /dev/null
StatusLSB

#### Create PeerGuardian P2P file
if [ -f /etc/pgl/allow.p2p ] && [ -f /etc/MySB/infos/allow.p2p ]; then
	mv /etc/MySB/infos/allow.p2p /etc/pgl/allow.p2p
fi

# -----------------------------------------
source /etc/MySB/inc/includes_after
# -----------------------------------------
##################### LAST LINE ######################################