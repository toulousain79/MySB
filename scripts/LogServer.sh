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

#### access
log_daemon_msg "HTML Convert of access.log"
if [ -e /var/log/nginx/access.log.1 ]; then
	cat /var/log/nginx/access.log.1 /var/log/nginx/access.log > /tmp/access.log
else
	if [ -e /var/log/nginx/access.log ]; then
		cp /var/log/nginx/access.log /tmp/access.log
	fi
fi
if [ -e /tmp/access.log ]; then
	sed -i '/favicon.ico/d' /tmp/access.log
	ccze -h < /tmp/access.log > /etc/MySB/web/logs/NginX-access.html
	rm -f /tmp/access.log
fi
StatusLSB

#### error
log_daemon_msg "HTML Convert of error.log"
if [ -e /var/log/nginx/error.log.1 ]; then
	cat /var/log/nginx/error.log.1 /var/log/nginx/error.log > /tmp/error.log
else
	if [ -e /var/log/nginx/error.log ]; then
		cp /var/log/nginx/error.log /tmp/error.log
	fi
fi
if [ -e /tmp/error.log ]; then
	ccze -h < /tmp/error.log > /etc/MySB/web/logs/NginX-error.html
	rm -f /tmp/error.log
fi
StatusLSB

#### MySB-access
log_daemon_msg "HTML Convert of MySB-access.log"
if [ -e /var/log/nginx/MySB-access.log.1 ]; then
	cat /var/log/nginx/MySB-access.log.1 /var/log/nginx/MySB-access.log > /tmp/MySB-access.log
else
	if [ -e /var/log/nginx/MySB-access.log ]; then
		cp /var/log/nginx/MySB-access.log /tmp/MySB-access.log
	fi
fi
if [ -e /tmp/MySB-access.log ]; then
	sed -i '/favicon.ico/d' /tmp/MySB-access.log
	ccze -h < /tmp/MySB-access.log > /etc/MySB/web/logs/NginX-MySB-access.html
	rm -f /tmp/MySB-access.log
fi
StatusLSB

#### MySB-error
log_daemon_msg "HTML Convert of MySB-error.log"
if [ -e /var/log/nginx/MySB-error.log.1 ]; then
	cat /var/log/nginx/MySB-error.log.1 /var/log/nginx/MySB-error.log > /tmp/MySB-error.log
else
	if [ -e /var/log/nginx/MySB-error.log ]; then
		cp /var/log/nginx/MySB-error.log /tmp/MySB-error.log
	fi
fi
if [ -e /tmp/MySB-error.log ]; then
	ccze -h < /tmp/MySB-error.log > /etc/MySB/web/logs/NginX-MySB-error.html
	rm -f /tmp/MySB-error.log
fi
StatusLSB

#### cakebox-access
log_daemon_msg "HTML Convert of cakebox-access.log"
if [ -e /var/log/nginx/cakebox-access.log.1 ]; then
	cat /var/log/nginx/cakebox-access.log.1 /var/log/nginx/cakebox-access.log > /tmp/cakebox-access.log
else
	if [ -e /var/log/nginx/cakebox-access.log ]; then
		cp /var/log/nginx/cakebox-access.log /tmp/cakebox-access.log
	fi
fi
if [ -e /tmp/cakebox-access.log ]; then
	ccze -h < /tmp/cakebox-access.log > /etc/MySB/web/logs/NginX-cakebox-access.html
	rm -f /tmp/cakebox-access.log
fi
StatusLSB

#### cakebox-error
log_daemon_msg "HTML Convert of cakebox-error.log"
if [ -e /var/log/nginx/cakebox-error.log.1 ]; then
	cat /var/log/nginx/cakebox-error.log.1 /var/log/nginx/cakebox-error.log > /tmp/cakebox-error.log
else
	if [ -e /var/log/nginx/cakebox-error.log ]; then
		cp /var/log/nginx/cakebox-error.log /tmp/cakebox-error.log
	fi
fi
if [ -e /tmp/cakebox-error.log ]; then
	ccze -h < /tmp/cakebox-error.log > /etc/MySB/web/logs/NginX-cakebox-error.html
	rm -f /tmp/cakebox-error.log
fi
StatusLSB

#### seedbox-manager-access
log_daemon_msg "HTML Convert of seedbox-manager-access.log"
if [ -e /var/log/nginx/seedbox-manager-access.log.1 ]; then
	cat /var/log/nginx/seedbox-manager-access.log.1 /var/log/nginx/seedbox-manager-access.log > /tmp/seedbox-manager-access.log
else
	if [ -e /var/log/nginx/seedbox-manager-access.log ]; then
		cp /var/log/nginx/seedbox-manager-access.log /tmp/seedbox-manager-access.log
	fi
fi
if [ -e /tmp/seedbox-manager-access.log ]; then
	ccze -h < /tmp/seedbox-manager-access.log > /etc/MySB/web/logs/NginX-seedbox-manager-access.html
	rm -f /tmp/seedbox-manager-access.log
fi
StatusLSB

#### seedbox-manager-error
log_daemon_msg "HTML Convert of seedbox-manager-error.log"
if [ -e /var/log/nginx/seedbox-manager-error.log.1 ]; then
	cat /var/log/nginx/seedbox-manager-error.log.1 /var/log/nginx/seedbox-manager-error.log > /tmp/seedbox-manager-error.log
else
	if [ -e /var/log/nginx/seedbox-manager-error.log ]; then
		cp /var/log/nginx/seedbox-manager-error.log /tmp/seedbox-manager-error.log
	fi
fi
if [ -e /tmp/seedbox-manager-error.log ]; then
	ccze -h < /tmp/seedbox-manager-error.log > /etc/MySB/web/logs/NginX-seedbox-manager-error.html
	rm -f /tmp/seedbox-manager-error.log
fi
StatusLSB

#### rutorrent-access
log_daemon_msg "HTML Convert of rutorrent-access.log"
if [ -e /var/log/nginx/rutorrent-access.log.1 ]; then
	cat /var/log/nginx/rutorrent-access.log.1 /var/log/nginx/rutorrent-access.log > /tmp/rutorrent-access.log
else
	if [ -e /var/log/nginx/rutorrent-access.log ]; then
		cp /var/log/nginx/rutorrent-access.log /tmp/rutorrent-access.log
	fi
fi
if [ -e /tmp/rutorrent-access.log ]; then
	sed -i '/plugins/d' /tmp/rutorrent-access.log
	sed -i '/getsettings.php/d' /tmp/rutorrent-access.log
	sed -i '/setsettings.php/d' /tmp/rutorrent-access.log
	ccze -h < /tmp/rutorrent-access.log > /etc/MySB/web/logs/NginX-rutorrent-access.html
	rm -f /tmp/rutorrent-access.log
fi
StatusLSB

#### rutorrent-error
log_daemon_msg "HTML Convert of rutorrent-error.log"
if [ -e /var/log/nginx/rutorrent-error.log.1 ]; then
	cat /var/log/nginx/rutorrent-error.log.1 /var/log/nginx/rutorrent-error.log > /tmp/rutorrent-error.log
else
	if [ -e /var/log/nginx/rutorrent-error.log ]; then
		cp /var/log/nginx/rutorrent-error.log /tmp/rutorrent-error.log
	fi
fi
if [ -e /tmp/rutorrent-error.log ]; then
	ccze -h < /tmp/rutorrent-error.log > /etc/MySB/web/logs/NginX-rutorrent-error.html
	rm -f /tmp/rutorrent-error.log
fi
StatusLSB

#### PeerGuardian
if [ "$MYBLOCKLIST" == "PeerGuardian" ]; then
	log_daemon_msg "HTML Convert of PeerGuardian pglcmd log"
	if [ -e /var/log/pgl/pglcmd.log.1 ]; then
		cat /var/log/pgl/pglcmd.log.1 /var/log/pgl/pglcmd.log > /tmp/pglcmd.log
	else
		if [ -e /var/log/pgl/pglcmd.log ]; then
			cp /var/log/pgl/pglcmd.log /tmp/pglcmd.log
		fi
	fi
	if [ -e /tmp/pglcmd.log ]; then
		ccze -h < /tmp/pglcmd.log > /etc/MySB/web/logs/PeerGuardian-pglcmd.html
		rm -f /tmp/pglcmd.log
	fi
	StatusLSB
	
	log_daemon_msg "HTML Convert of PeerGuardian pgld log"
	if [ -e /var/log/pgl/pgld.log.1 ]; then
		cat /var/log/pgl/pgld.log.1 /var/log/pgl/pgld.log > /tmp/pgld.log
	else
		if [ -e /var/log/pgl/pgld.log ]; then
			cp /var/log/pgl/pgld.log /tmp/pgld.log
		fi
	fi
	if [ -e /tmp/pgld.log ]; then
		ccze -h < /tmp/pgld.log > /etc/MySB/web/logs/PeerGuardian-pgld.html
		rm -f /tmp/pgld.log
	fi
	StatusLSB	
fi

# -----------------------------------------
source /etc/MySB/inc/includes_after
# -----------------------------------------
##################### LAST LINE ######################################