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

echo
echo -e "${CRED}All packages installed by MySB will be deleted within config files !$CEND"
echo -e "${CRED}All files created after MySB install, will be erase too (users, ports,...) !$CEND"
GetString NO  "Are you absolutely sure you want to continue? Type 'yes' to confirm it." CONTINUE NO
if [ "$CONTINUE" == "NO" ]; then
	echo -e "${CYELLOW}OK, see you later...$CEND"
	echo
	echo
	EndingScript 0
fi	

TOREMOVE=""
TOKEEP=""

PCKTOREMOVE=`grep -rni --exclude="MySB_CleanAll.sh" 'PackagesManage install' /etc/MySB | cut -d '"' -f 2`
PCKTOKEEP=`grep -rni --exclude="MySB_CleanAll.sh" 'TOOLS=' /etc/MySB/MySB_Install.sh | cut -d '"' -f 2`

#### To keep
for Package in $PCKTOKEEP; do 
	TOKEEP="$TOKEEP $Package"
done

#### To remove
for Package in $PCKTOREMOVE; do 
	if [ "`dpkg -l | grep $Package`" != "" ];then
		TOREMOVE="$TOREMOVE $Package"
	fi
done

crontab -l > /tmp/crontab.tmp

LISTUSERS=`ls /etc/MySB/users/ | grep '.info' | sed 's/.\{5\}$//'`
for seedUser in $LISTUSERS; do
	sed -i '/'$seedUser'/d' /tmp/crontab.tmp
done

rm -f /etc/init.d/rtorrent-*

sed -i '/MySB/d' /tmp/crontab.tmp
crontab /tmp/crontab.tmp
rm /tmp/crontab.tmp

PackagesManage purge "$TOREMOVE"

if [ -d /etc/MySB/sources ]; then
	rm -f /etc/MySB/sources/*
fi		
if [ -d /etc/MySB/users ]; then
	rm -f /etc/MySB/users/*
fi
if [ -d /etc/MySB/infos ]; then
	rm -f /etc/MySB/infos/*
fi		
if [ -d /etc/MySB/files ]; then
	rm -f /etc/MySB/files/*
fi		
if [ -d /etc/MySB/web/logs ]; then
	rm -f /etc/MySB/web/logs/*
fi

PackagesManage install "$TOKEEP"

# -----------------------------------------
source /etc/MySB/inc/includes_after
# -----------------------------------------
##################### LAST LINE ######################################