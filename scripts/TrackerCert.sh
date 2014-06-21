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

ENGINES=$(ls -1r /usr/share/nginx/html/rutorrent/plugins/extsearch/engines/)
for engine in ${ENGINES}; do
	TRACKER=`cat /usr/share/nginx/html/rutorrent/plugins/extsearch/engines/$engine | grep "url =" | awk '{ print $3 }' | cut -d "/" -f 3 | cut -d "'" -f 1`
	PART1=`echo ${TRACKER} | cut -d "." -f 1`
	PART2=`echo ${TRACKER} | cut -d "." -f 2`
	PART3=`echo ${TRACKER} | cut -d "." -f 3`
	
	if [ -z $PART3 ]; then
		PART3=$PART2
		PART2=$PART1
		PART1=tracker
	else
		PART1=tracker
	fi
	
	TRACKER="`echo $PART1`.`echo $PART2`.`echo $PART3`"	

	TRACKER_IPV4="$(nslookup ${TRACKER} | grep Address: | awk '{ print $2 }' | sed -n 2p)"
	if [ ! -z $TRACKER_IPV4 ]; then			
		log_daemon_msg "Get certificate for $TRACKER"
		cd /etc/MySB/ssl/trackers/
			
		openssl s_client -connect $TRACKER:443 </dev/null 2>/dev/null | sed -n '/BEGIN CERTIFICATE/,/END CERTIFICATE/p' >> ./$TRACKER.crt 
		if [ ! -e ./$TRACKER.pem ]; then
			openssl x509 -in ./$TRACKER.crt -out ./$TRACKER.der -outform DER 
			openssl x509 -in ./$TRACKER.der -inform DER -out ./$TRACKER.pem -outform PEM
			if [ ! -e ./$TRACKER.pem ]; then
				if [ ! -f /etc/ssl/certs/$TRACKER.pem ]; then
					ln -s ./$TRACKER.pem /etc/ssl/certs/$TRACKER.pem
				fi	
			fi
			
			rm ./$TRACKER.crt
			rm ./$TRACKER.der
		fi
		StatusLSB
	else
		rm ./$TRACKER.crt
	fi

	unset TRACKER
done

log_daemon_msg "Certificates Rehash"
c_rehash
StatusLSB

# -----------------------------------------
source /etc/MySB/inc/includes_after
# -----------------------------------------
##################### LAST LINE ######################################