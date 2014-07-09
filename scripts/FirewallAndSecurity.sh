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
#
# Usage:	FirewallAndSecurity {clean|new}
#
##################### FIRST LINE #####################################

case $1 in
	clean)
		# Vidage et suppression des règles existantes :
		log_daemon_msg "Emptying and removal of existing rules"
		for TABLE in filter nat mangle; do
			iptables -t $TABLE -F
			iptables -t $TABLE -X
		done
		StatusLSB
		
		log_daemon_msg "Authorize any incoming connection any outgoing connection"
		iptables -t filter -P INPUT ACCEPT
		iptables -t filter -P FORWARD ACCEPT
		iptables -t filter -P OUTPUT ACCEPT	
		StatusLSB
		
		if [ -f /etc/fail2ban/jail.local ]; then
			service fail2ban stop
		fi		
		
		if [ -f /etc/pgl/pglcmd.conf ]; then
			pglcmd stop
		fi		
	;;
	new)
		# NO spoofing
		if [ -e /proc/sys/net/ipv4/conf/all/rp_filter ]; then
			log_daemon_msg "No spoofing"
			for filtre in /proc/sys/net/ipv4/conf/*/rp_filter; do
				echo 1 > $filtre
			done
			StatusLSB
		fi
		
		# Modules
		log_daemon_msg "Loading modules"
		MODULES="	tun
					iptable_filter
					iptable_nat
					iptable_mangle
					ip_gre
					ip_tables
					ip_nat_ftp
					ip_nat_irc
					ip_conntrack
					ip_conntrack_ftp
					ip_conntrack_irc
					ipt_REJECT
					ipt_tos
					ipt_TOS
					ipt_limit
					ipt_multiport
					ipt_TCPMSS
					ipt_tcpmss
					ipt_ttl
					ipt_length
					ipt_LOG
					ipt_conntrack
					ipt_helper
					ipt_state
					ipt_recent
					ipt_owner
					ipt_mark
					ipt_REDIRECT
					ipt_MASQUERADE
					ipt_MARK
					xt_connlimit
					xt_limit
					xt_multiport
					xt_state
					xt_owner
					xt_NFQUEUE"
					
		for item in $MODULES; do
			IfExist=`lsmod | grep "$item"`
			if [ $? -eq 0 ] ; then
				modprobe $item
			fi
		done
		StatusLSB

		# Vidage et suppression des règles existantes :
		log_daemon_msg "Emptying and removal of existing rules"
		for TABLE in filter nat mangle; do
			iptables -t $TABLE -F
			iptables -t $TABLE -X
		done
		StatusLSB

		# Interdire toute connexion entrante et autoriser toute connexion sortante
		log_daemon_msg "Prohibit any incoming connection and authorize any outgoing connection"
		iptables -t filter -P INPUT DROP
		iptables -t filter -P FORWARD DROP
		iptables -t filter -P OUTPUT ACCEPT	
		StatusLSB
		
		# Ne pas casser les connexions etablies
		log_daemon_msg "Do not break established connections"
		iptables -A INPUT -m state --state RELATED,ESTABLISHED -j ACCEPT
		iptables -A OUTPUT -m state --state RELATED,ESTABLISHED -j ACCEPT	
		StatusLSB
		
		# Autoriser loopback
		log_daemon_msg "Allow loopback interface"
		iptables -t filter -A INPUT -i lo -j ACCEPT
		StatusLSB	

		# ICMP
		log_daemon_msg "Allow incoming ping"
		iptables -t filter -A INPUT -p icmp -j ACCEPT -m comment --comment "ICMP"
		StatusLSB

		# CakeBox
		if [ "$INSTALLCAKEBOX" == "YES" ]; then
			log_daemon_msg "Allow access to CakeBox"
			iptables -t filter -A INPUT -p tcp --dport $CAKEBOXPORT -j ACCEPT -m comment --comment "CakeBox"
			StatusLSB
		fi
		
		# HTTP
		log_daemon_msg "Allow access to HTTP"
		iptables -t filter -A INPUT -p tcp --dport $NGINXHTTPPORT -j ACCEPT -m comment --comment "HTTP"
		StatusLSB

		# HTTPS
		log_daemon_msg "Allow access to HTTPs"
		iptables -t filter -A INPUT -p tcp --dport $NGINXHTTPSPORT -j ACCEPT -m comment --comment "HTTPs"
		StatusLSB

		# Webmin
		if [ "$INSTALLWEBMIN" == "YES" ]; then
			log_daemon_msg "Allow access to Webmin"
			iptables -t filter -A INPUT -p tcp --dport $WEBMINPORT -j ACCEPT -m comment --comment "Webmin"
			StatusLSB
		fi		

		# FTP
		log_daemon_msg "Allow use of FTP"
		iptables -t filter -A INPUT -p tcp --dport $NEWFTPPORT -j ACCEPT -m comment --comment "FTP"
		iptables -t filter -A INPUT -p tcp --dport $NEWFTPDATAPORT -j ACCEPT -m comment --comment "FTP Data"
		iptables -t filter -A INPUT -p tcp --dport 65000:65535 -j ACCEPT -m comment --comment "FTP Passive"
		StatusLSB		

		# SSH
		log_daemon_msg "Allow access to SSH"
		iptables -t filter -A INPUT -p tcp --dport $NEWSSHPORT -j ACCEPT -m comment --comment "SSH"
		StatusLSB
		
		# OpenVPN
		if [ "$INSTALLOPENVPN" == "YES" ]; then
			#### For network
			echo 1 > /proc/sys/net/ipv4/ip_forward
			perl -pi -e "s/#net.ipv4.ip_forward=1/net.ipv4.ip_forward=1/g" /etc/sysctl.conf			
		
			log_daemon_msg "Allow use of OpenVPN TUN With Redirect Gateway"
			iptables -t filter -A INPUT -i tun0 -j ACCEPT
			iptables -t filter -A INPUT -p $OPENVPNPROTO --dport $OPENVPNPORT -j ACCEPT -m comment --comment "OpenVPN"
			iptables -t filter -A FORWARD -i tun0 -o $PRIMARYINET -s 10.0.0.0/24 -m conntrack --ctstate NEW -j ACCEPT -m comment --comment "OpenVPN"
			iptables -t filter -A FORWARD -m conntrack --ctstate RELATED,ESTABLISHED -j ACCEPT -m comment --comment "OpenVPN"
			iptables -t nat -A POSTROUTING -s 10.0.0.0/24 -j MASQUERADE -m comment --comment "OpenVPN"	
			StatusLSB
			
			log_daemon_msg "Allow use of OpenVPN TUN Without Redirect Gateway"
			(( OPENVPNPORT++ ))
			iptables -t filter -A INPUT -i tun1 -j ACCEPT
			iptables -t filter -A INPUT -p $OPENVPNPROTO --dport $OPENVPNPORT -j ACCEPT -m comment --comment "OpenVPN"
			StatusLSB				

			log_daemon_msg "Allow use of OpenVPN TAP Without Redirect Gateway"
			(( OPENVPNPORT++ ))
			iptables -t filter -A INPUT -p $OPENVPNPROTO --dport $OPENVPNPORT -j ACCEPT -m comment --comment "OpenVPN"
			iptables -t filter -A INPUT -i tap0 -j ACCEPT
			iptables -t filter -A INPUT -i br0 -j ACCEPT
			iptables -t filter -A FORWARD -i br0 -j ACCEPT			
			StatusLSB				

			# iptables -t filter -A INPUT -s 10.0.3.0/24 -d 10.0.3.1 -p tcp -m tcp --dport 8200 -j ACCEPT
			# iptables -t filter -A INPUT -s 10.0.3.0/24 -d 239.255.255.250 -p udp -m udp --dport 1900 -j ACCEPT	
			# Samba access but only in the LAN
			#iptables -A INPUT -i tun0 -m tcp -p tcp -s 10.0.1.0/24 --dport 139 -j ACCEPT
			#iptables -A INPUT -i tun0 -m tcp -p tcp -s 10.0.1.0/24 --dport 445 -j ACCEPT
			#iptables -A INPUT -i tun0 -s 10.0.1.0/24 -p udp -m udp --dport 137 -j ACCEPT
			#iptables -A INPUT -i tun0 -s 10.0.1.0/24 -p udp -m udp --dport 138 -j ACCEPT	
			# iptables -A INPUT -i br0 -m tcp -p tcp -s 192.168.0.0/24 --dport 139 -j ACCEPT
			# iptables -A INPUT -i br0 -m tcp -p tcp -s 192.168.0.0/24 --dport 445 -j ACCEPT
			# iptables -A INPUT -i br0 -s 192.168.0.0/24 -p udp -m udp --dport 137 -j ACCEPT
			# iptables -A INPUT -i br0 -s 192.168.0.0/24 -p udp -m udp --dport 138 -j ACCEPT	

			#Ouverture des ports des services LAM
			#iptables -A INPUT -p tcp --dport 21 -j ACCEPT
			#iptables -A INPUT -p tcp --dport 20 -j ACCEPT
			#iptables -A INPUT -p udp --dport 500 -j ACCEPT
			#iptables -A INPUT -p tcp --dport 500 -j ACCEPT
			#iptables -A INPUT -p tcp --dport 80 -j ACCEPT
			#iptables -A INPUT -p tcp --dport 4500:4600 -j ACCEPT
			#iptables -A INPUT -p icmp -m limit --limit 30/minute -j ACCEPT
			#iptables -A INPUT -p icmp -j DROP
		fi

		# Mail SMTP:25
	#	log_daemon_msg "Allow use of SMTP"
	#	iptables -t filter -A INPUT -p tcp --dport 25 -j ACCEPT -m comment --comment "SMTP In"
	#	StatusLSB

		# PlexMedia Server
		if [ "$INSTALLPLEXMEDIA" == "YES" ] && [ -f "/usr/lib/plexmediaserver" ]; then
			iptables -t filter -A INPUT -p tcp --dport 32400 -j ACCEPT -m comment --comment "PlexMediaServer"
		fi
	
		#### rTorrent
		IGNOREIP="127.0.0.1/8 10.0.0.0/24 10.0.1.0/24 10.0.2.0/24 192.168.0.0/24"
		WHITELIST="10.0.0.0/24 10.0.1.0/24 192.168.0.0/24"
		LISTUSERS=`ls /etc/MySB/users/ | grep '.info' | sed 's/.\{5\}$//'`
		for seedUser in $LISTUSERS; do
			log_daemon_msg "Allow use of rTorrent for $seedUser"
			
			USERIP=$(cat /etc/MySB/users/$seedUser.info | grep "IP Address=" | awk '{ print $3 }')
			PORT_START=$(cat /etc/MySB/users/$seedUser.info | grep "SCGI port=" | awk '{ print $3 }')
			PORT_END=$(cat /etc/MySB/users/$seedUser.info | grep "rTorrent port=" | awk '{ print $3 }')
			iptables -t filter -A INPUT -p tcp --dport $PORT_START:$PORT_END -j ACCEPT -m comment --comment "rTorrent $seedUser"

			IFS=$','
				for ip in $USERIP; do 
					IfExist=`echo $TEMP | grep $ip`
					if [ -z $IfExist ]; then	
						TEMP="$TEMP $ip/32"
					fi
					
					IfExist=`echo $TEMP2 | grep $ip`
					if [ -z $IfExist ]; then	
						TEMP2="$TEMP2 $ip"
					fi					
				done
			unset IFS
	
			StatusLSB
		done
		IGNOREIP="$IGNOREIP `echo $TEMP | sed -e "s/^//g;"`"
		WHITELIST="$WHITELIST `echo $TEMP2 | sed -e "s/^//g;"`"

		#### NginX
		if [ -f /etc/nginx/locations/MySB.conf ]; then
			for seedUser in $LISTUSERS; do
				log_daemon_msg "Allow access to web server for $seedUser"
				
				USERIP=$(cat /etc/MySB/users/$seedUser.info | grep "IP Address=" | awk '{ print $3 }')

				IFS=$','
				for ip in $USERIP; do 
					SEARCH=$(cat /etc/nginx/locations/MySB.conf | grep $ip)
					if [ -z $SEARCH ]; then
						awk '{ print } /allow 127.0.1.1;/ { print "                allow <ip>;" }' /etc/nginx/locations/MySB.conf > /etc/MySB/files/MySB_location.conf
						perl -pi -e "s/<ip>/$ip/g" /etc/MySB/files/MySB_location.conf
						mv /etc/MySB/files/MySB_location.conf /etc/nginx/locations/MySB.conf
					fi
				done
				unset IFS
				
				StatusLSB
			done
		fi
		
		#### Fail2Ban
		if [ -f /etc/fail2ban/jail.local ]; then
			log_daemon_msg "Add whitelist to Fail2Ban"
		
			SEARCH=$(cat /etc/fail2ban/jail.local | grep "ignoreip =" | cut -d "=" -f 2)
			SEARCH=`echo $SEARCH | sed s,/,\\\\\\\\\\/,g`
			IGNOREIP=`echo $IGNOREIP | sed s,/,\\\\\\\\\\/,g`
			perl -pi -e "s/$SEARCH/$IGNOREIP/g" /etc/fail2ban/jail.local
			unset SEARCH IGNOREIP
			
			StatusLSB
		fi
		
		#### PeerGuardian
		#if [ "$MYBLOCKLIST" == "PeerGuardian" ]; then
		if [ -f /etc/pgl/pglcmd.conf ]; then
			log_daemon_msg "Add whitelist to PeerGuardian"
			
			WHITELIST=`echo $WHITELIST | sed s,/,\\\\\\\\\\/,g`
			
			SEARCH=$(cat /etc/pgl/pglcmd.conf | grep "WHITE_IP_IN=" | cut -d "=" -f 2)
			SEARCH=`echo $SEARCH | sed s,/,\\\\\\\\\\/,g`
			perl -pi -e "s/$SEARCH/\"$WHITELIST\"/g" /etc/pgl/pglcmd.conf
			unset SEARCH
			
			SEARCH=$(cat /etc/pgl/pglcmd.conf | grep "WHITE_IP_OUT=" | cut -d "=" -f 2)
			SEARCH=`echo $SEARCH | sed s,/,\\\\\\\\\\/,g`
			perl -pi -e "s/$SEARCH/\"$WHITELIST\"/g" /etc/pgl/pglcmd.conf	
			unset SEARCH WHITELIST			

			OVPNPORT1=$OPENVPNPORT
			(( OPENVPNPORT++ ))
			OVPNPORT2=$OPENVPNPORT
			(( OPENVPNPORT++ ))
			OVPNPORT3=$OPENVPNPORT
			
			case "$OPENVPNPROTO" in
				"udp")
					SEARCH=$(cat /etc/pgl/pglcmd.conf | grep "WHITE_TCP_IN=" | cut -d "=" -f 2)
					perl -pi -e "s/$SEARCH/\"${CAKEBOXPORT} ${NGINXHTTPPORT} ${NGINXHTTPSPORT} ${WEBMINPORT} ${NEWFTPPORT} ${NEWSSHPORT} ${NEWFTPDATAPORT} ${FTP_PASSIVE}\"/g" /etc/pgl/pglcmd.conf	
				
					SEARCH=$(cat /etc/pgl/pglcmd.conf | grep "WHITE_UDP_IN=" | cut -d "=" -f 2)
					perl -pi -e "s/$SEARCH/\"${OVPNPORT1} ${OVPNPORT2} ${OVPNPORT3}\"/g" /etc/pgl/pglcmd.conf	
					
					SEARCH=$(cat /etc/pgl/pglcmd.conf | grep "WHITE_TCP_OUT=" | cut -d "=" -f 2)
					perl -pi -e "s/$SEARCH/\"80 443 ${CAKEBOXPORT} ${NGINXHTTPPORT} ${NGINXHTTPSPORT} ${WEBMINPORT} ${NEWFTPPORT} ${NEWSSHPORT} ${NEWFTPDATAPORT} ${FTP_PASSIVE}\"/g" /etc/pgl/pglcmd.conf	
					
					SEARCH=$(cat /etc/pgl/pglcmd.conf | grep "WHITE_UDP_OUT=" | cut -d "=" -f 2)
					perl -pi -e "s/$SEARCH/\"${OVPNPORT1} ${OVPNPORT2} ${OVPNPORT3}\"/g" /etc/pgl/pglcmd.conf
				;;
				"tcp")
					SEARCH=$(cat /etc/pgl/pglcmd.conf | grep "WHITE_TCP_IN=" | cut -d "=" -f 2)
					perl -pi -e "s/$SEARCH/\"${CAKEBOXPORT} ${NGINXHTTPPORT} ${NGINXHTTPSPORT} ${WEBMINPORT} ${NEWFTPPORT} ${NEWSSHPORT} ${OVPNPORT1} ${OVPNPORT2} ${OVPNPORT3} ${NEWFTPDATAPORT} ${FTP_PASSIVE}\"/g" /etc/pgl/pglcmd.conf
				
					SEARCH=$(cat /etc/pgl/pglcmd.conf | grep "WHITE_UDP_IN=" | cut -d "=" -f 2)
					perl -pi -e "s/$SEARCH/\"\"/g" /etc/pgl/pglcmd.conf
					
					SEARCH=$(cat /etc/pgl/pglcmd.conf | grep "WHITE_TCP_OUT=" | cut -d "=" -f 2)
					perl -pi -e "s/$SEARCH/\"80 443 ${CAKEBOXPORT} ${NGINXHTTPPORT} ${NGINXHTTPSPORT} ${WEBMINPORT} ${NEWFTPPORT} ${NEWSSHPORT} ${OVPNPORT1} ${OVPNPORT2} ${OVPNPORT3} ${NEWFTPDATAPORT} ${FTP_PASSIVE}\"/g" /etc/pgl/pglcmd.conf					
				
					SEARCH=$(cat /etc/pgl/pglcmd.conf | grep "WHITE_UDP_OUT=" | cut -d "=" -f 2)
					perl -pi -e "s/$SEARCH/\"\"/g" /etc/pgl/pglcmd.conf
				;;
			esac
			
			StatusLSB
		fi
	;;
	
	*)
		echo -e "${CBLUE}Usage:$CEND	${CYELLOW}bash /etc/MySB/scripts/FirewallAndSecurity.sh$CEND ${CGREEN}{clean|new}$CEND"
		exit	
	;;
esac

# -----------------------------------------
source /etc/MySB/inc/includes_after
# -----------------------------------------
##################### LAST LINE ######################################