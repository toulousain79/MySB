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

#### VARs
Modules="tun,iptable_filter,iptable_nat,iptable_mangle,ip_gre,ip_tables,ip_nat_ftp,ip_nat_irc,ip_conntrack,ip_conntrack_ftp,ip_conntrack_irc,ipt_REJECT,ipt_tos,ipt_TOS,ipt_limit,ipt_multiport,ipt_TCPMSS,ipt_tcpmss,ipt_ttl,ipt_length,ipt_LOG,ipt_conntrack,ipt_helper,ipt_state,ipt_recent,ipt_owner,ipt_mark,ipt_REDIRECT,ipt_MASQUERADE,ipt_MARK,xt_connlimit,xt_limit,xt_multiport,xt_state,xt_owner,xt_NFQUEUE"

#### Begin
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
		# Seedbox users IPs
		log_daemon_msg "Creating IP white lists"
		LISTUSERS=`ls /etc/MySB/users/ | grep '.info' | sed 's/.\{5\}$//'`	
		for seedUser in $LISTUSERS; do
			USERIP=$(cat /etc/MySB/users/$seedUser.info | grep "IP Address=" | awk '{ print $3 }')
			
			IFS=$','
			for ip in $USERIP; do 
				IfExist=`echo $Fail2banWhiteList | grep $ip`
				if [ -z $IfExist ] && [ $ip != "blank" ]; then	
					Fail2banWhiteList="${Fail2banWhiteList} ${ip}/32"
				fi
				IfExist=`echo $SeedboxUsersIPs | grep $ip`
				if [ -z $IfExist ] && [ $ip != "blank" ]; then	
					SeedboxUsersIPs="${SeedboxUsersIPs} ${ip}"
				fi				
			done
			unset IFS ip
		done
		if [ "$INSTALLOPENVPN" == "YES" ]; then
			for ip in $VpnIPs; do 
				IfExist=`echo $Fail2banWhiteList | grep $ip`
				if [ -z $IfExist ] && [ $ip != "blank" ]; then	
					Fail2banWhiteList="${Fail2banWhiteList} ${ip}"
				fi			
			done
			unset ip
		fi
		Fail2banWhiteList=`echo $Fail2banWhiteList | sed -e "s/^//g;"`
		SeedboxUsersIPs=`echo $SeedboxUsersIPs | sed -e "s/^//g;"`
echo "VpnIPs" $VpnIPs
echo "Fail2banWhiteList" $Fail2banWhiteList
echo "SeedboxUsersIPs" $SeedboxUsersIPs
		StatusLSB
	
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
		IFS=$','
			for item in $Modules; do
				IfExist=`lsmod | grep "$item"`
				if [ $? -eq 0 ] ; then
					modprobe $item
				fi
			done
		unset IFS
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
		log_daemon_msg "Allow incoming ping for seedbox users only"
		for ip in $SeedboxUsersIPs; do 
			iptables -t filter -A INPUT -p icmp -s $SeedboxUsersIPs/32 -j ACCEPT -m comment --comment "ICMP"
		done
		for ip in $VpnIPs; do 		
			iptables -t filter -A INPUT -p icmp -s "$VpnIPs" -j ACCEPT -m comment --comment "ICMP"
		done		
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
			OVPNPORT1=$OPENVPNPORT
			(( OPENVPNPORT++ ))
			OVPNPORT2=$OPENVPNPORT	
		
			#### For network
			echo 1 > /proc/sys/net/ipv4/ip_forward
			perl -pi -e "s/#net.ipv4.ip_forward=1/net.ipv4.ip_forward=1/g" /etc/sysctl.conf			
		
			log_daemon_msg "Allow use of OpenVPN TUN With Redirect Gateway"
			iptables -t filter -A INPUT -i tun0 -j ACCEPT
			iptables -t filter -A INPUT -p $OPENVPNPROTO --dport $OVPNPORT1 -j ACCEPT -m comment --comment "OpenVPN"
			iptables -t filter -A FORWARD -i tun0 -o $PRIMARYINET -s 10.0.0.0/24 -m conntrack --ctstate NEW -j ACCEPT -m comment --comment "OpenVPN"
			iptables -t filter -A FORWARD -m conntrack --ctstate RELATED,ESTABLISHED -j ACCEPT -m comment --comment "OpenVPN"
			iptables -t nat -A POSTROUTING -s 10.0.0.0/24 -j MASQUERADE -m comment --comment "OpenVPN"	
			StatusLSB
			
			log_daemon_msg "Allow use of OpenVPN TUN Without Redirect Gateway"
			iptables -t filter -A INPUT -i tun1 -j ACCEPT
			iptables -t filter -A INPUT -p $OPENVPNPROTO --dport $OVPNPORT2 -j ACCEPT -m comment --comment "OpenVPN"
			StatusLSB
		fi

		# PlexMedia Server
		if [ "$INSTALLPLEXMEDIA" == "YES" ] && [ -f "/usr/lib/plexmediaserver" ]; then
			log_daemon_msg "Allow use of Plex Media Server on TCP"
			for TCP_PORT in $PLEXMEDIA_TCP_PORTS; do 
				iptables -t filter -A INPUT -p tcp --dport $TCP_PORT -j ACCEPT -m comment --comment "Plex Media Server TCP"
			done
			unset TCP_PORT
			StatusLSB

			if [ "$INSTALLOPENVPN" == "YES" ]; then
				log_daemon_msg "Allow use of Plex Media Server on UDP (OpenVPN)"
				for UDP_PORT in $PLEXMEDIA_UDP_PORTS; do 
					iptables -t filter -A INPUT -p tcp --dport $UDP_PORT -j ACCEPT -m comment --comment "Plex Media Server UDP"
				done
				unset UDP_PORT
				StatusLSB
			fi
		fi
	
		#### rTorrent
		for seedUser in $LISTUSERS; do
			log_daemon_msg "Allow use of rTorrent for $seedUser"
			PORT_START=$(cat /etc/MySB/users/$seedUser.info | grep "SCGI port=" | awk '{ print $3 }')
			PORT_END=$(cat /etc/MySB/users/$seedUser.info | grep "rTorrent port=" | awk '{ print $3 }')
			iptables -t filter -A INPUT -p tcp --dport $PORT_START:$PORT_END -j ACCEPT -m comment --comment "rTorrent $seedUser"	
			StatusLSB
		done

		#### NginX
		if [ -f /etc/nginx/locations/MySB.conf ]; then
			# Delete IP restriction for NginX
			log_daemon_msg "Delete IP restriction for NginX"
			for ip in $SeedboxUsersIPs; do 
				sed -i '/'$ip'/d' /etc/nginx/locations/MySB.conf 
			done
			unset ip
			StatusLSB
			
			for seedUser in $LISTUSERS; do
				log_daemon_msg "Allow access to web server for $seedUser"
				for ip in $SeedboxUsersIPs; do 
					awk '{ print } /allow 127.0.1.1;/ { print "                allow <ip>;" }' /etc/nginx/locations/MySB.conf > /etc/MySB/files/MySB_location.conf
					perl -pi -e "s/<ip>/$ip/g" /etc/MySB/files/MySB_location.conf
					mv /etc/MySB/files/MySB_location.conf /etc/nginx/locations/MySB.conf
				done
				unset ip					
				StatusLSB
			done
			
			# Delete IP restriction for OpenVPN users
			log_daemon_msg "Delete IP restriction for OpenVPN users"
			for ip in $VpnIPs; do
				ip=`echo $ip | sed s,/,\\\\\\\\\\/,g`
				sed -i '/'$ip'/d' /etc/nginx/locations/MySB.conf		
			done
			unset ip
			StatusLSB			
			
			if [ "$INSTALLOPENVPN" == "YES" ]; then
				log_daemon_msg "Allow access to web server for OpenVPN users"
				for ip in $VpnIPs; do
					awk '{ print } /allow 127.0.1.1;/ { print "                allow <ip>;" }' /etc/nginx/locations/MySB.conf > /etc/MySB/files/MySB_location.conf
					perl -pi -e "s/<ip>/$ip/g" /etc/MySB/files/MySB_location.conf
					mv /etc/MySB/files/MySB_location.conf /etc/nginx/locations/MySB.conf	
				done
				unset ip
				StatusLSB				
			fi		
		fi
		
		#### Fail2Ban
		if [ -f /etc/fail2ban/jail.local ]; then
			log_daemon_msg "Add whitelist to Fail2Ban"
			Fail2banWhiteList=`echo $Fail2banWhiteList | sed s,/,\\\\\\\\\\/,g`			
			SEARCH=$(cat /etc/fail2ban/jail.local | grep "ignoreip =" | cut -d "=" -f 2)
			SEARCH=`echo $SEARCH | sed s,/,\\\\\\\\\\/,g`
			perl -pi -e "s/$SEARCH/$Fail2banWhiteList/g" /etc/fail2ban/jail.local
			unset SEARCH
			StatusLSB
		fi
		
		#### PeerGuardian
		if [ -f /etc/pgl/pglcmd.conf ]; then
			log_daemon_msg "Add whitelist to PeerGuardian"
			SeedboxUsersIPs=`echo $SeedboxUsersIPs | sed s,/,\\\\\\\\\\/,g`	
			SEARCH=$(cat /etc/pgl/pglcmd.conf | grep "WHITE_IP_IN=")
			SEARCH=`echo $SEARCH | sed s,/,\\\\\\\\\\/,g`
			perl -pi -e "s/$SEARCH/WHITE_IP_IN=\"$SeedboxUsersIPs\"/g" /etc/pgl/pglcmd.conf
			unset SEARCH

			SEARCH=$(cat /etc/pgl/pglcmd.conf | grep "WHITE_IP_OUT=")
			SEARCH=`echo $SEARCH | sed s,/,\\\\\\\\\\/,g`			
			if [ "$INSTALLOPENVPN" == "YES" ]; then
				perl -pi -e "s/$SEARCH/WHITE_IP_OUT=\"10.0.0.0\/24\"/g" /etc/pgl/pglcmd.conf
			else
				perl -pi -e "s/$SEARCH/WHITE_IP_OUT=\"\"/g" /etc/pgl/pglcmd.conf
			fi
			unset SEARCH
			
			SEARCH=$(cat /etc/pgl/pglcmd.conf | grep "WHITE_IP_FWD=")
			SEARCH=`echo $SEARCH | sed s,/,\\\\\\\\\\/,g`			
			if [ "$INSTALLOPENVPN" == "YES" ]; then
				perl -pi -e "s/$SEARCH/WHITE_IP_FWD=\"10.0.0.0\/24\"/g" /etc/pgl/pglcmd.conf
			else
				perl -pi -e "s/$SEARCH/WHITE_IP_FWD=\"\"/g" /etc/pgl/pglcmd.conf
			fi
			unset SEARCH
			
			if [ "$INSTALLCAKEBOX" == "YES" ]; then
				TCP_PORTS_LIST="${TCP_PORTS_LIST} ${CAKEBOXPORT}"
			fi
			if [ "$INSTALLPLEXMEDIA" == "YES" ] && [ -f "/usr/lib/plexmediaserver" ]; then
				TCP_PORTS_LIST="${TCP_PORTS_LIST} ${PLEXMEDIA_TCP_PORTS}"
			fi
			if [ "$INSTALLWEBMIN" == "YES" ]; then
				TCP_PORTS_LIST="${TCP_PORTS_LIST} ${WEBMINPORT}"
			fi
			if [ "$INSTALLOPENVPN" == "YES" ]; then
				OVPNPORT1=$OPENVPNPORT
				(( OPENVPNPORT++ ))
				OVPNPORT2=$OPENVPNPORT

				case "$OPENVPNPROTO" in
					"udp")
						UDP_PORTS_LIST="${UDP_PORTS_LIST} ${OVPNPORT1} ${OVPNPORT2}"
					;;
					"tcp")
						TCP_PORTS_LIST="${TCP_PORTS_LIST} ${OVPNPORT1} ${OVPNPORT2}"
					;;
				esac

				# PlexMedia UDP ports opened only with OpenVPN installed
				if [ "$INSTALLPLEXMEDIA" == "YES" ] && [ -f "/usr/lib/plexmediaserver" ]; then
					UDP_PORTS_LIST="${UDP_PORTS_LIST} ${PLEXMEDIA_UDP_PORTS}"
				fi
			fi			

			SEARCH=$(cat /etc/pgl/pglcmd.conf | grep "WHITE_TCP_IN=")
			perl -pi -e "s/$SEARCH/WHITE_TCP_IN=\"${TCP_PORTS_LIST}\"/g" /etc/pgl/pglcmd.conf
			SEARCH=$(cat /etc/pgl/pglcmd.conf | grep "WHITE_UDP_IN=")
			perl -pi -e "s/$SEARCH/WHITE_UDP_IN=\"${UDP_PORTS_LIST}\"/g" /etc/pgl/pglcmd.conf
			SEARCH=$(cat /etc/pgl/pglcmd.conf | grep "WHITE_TCP_OUT=")
			perl -pi -e "s/$SEARCH/WHITE_TCP_OUT=\"80 443 ${TCP_PORTS_LIST}\"/g" /etc/pgl/pglcmd.conf
			SEARCH=$(cat /etc/pgl/pglcmd.conf | grep "WHITE_UDP_OUT=")
			perl -pi -e "s/$SEARCH/WHITE_UDP_OUT=\"80 443 ${UDP_PORTS_LIST}\"/g" /etc/pgl/pglcmd.conf			
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