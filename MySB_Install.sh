#!/bin/bash 
# -----------------------------------------
MYSBCURRENTVERSION=v1.1
# -----------------------------------------
if [ -f /etc/MySB/inc/includes_before ]; then source /etc/MySB/inc/includes_before; fi
# -----------------------------------------
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

#### Start Log
clear
if [ -d /etc/MySB/logs ]; then
	echo "--------------------" >> /etc/MySB/logs/`basename $0`.log
	echo "START Err: "`date` >> /etc/MySB/logs/`basename $0`.log
	echo "--------------------" >> /etc/MySB/logs/`basename $0`.log
	exec 2>> /etc/MySB/logs/`basename $0`.log
else
	echo "--------------------" >> /tmp/`basename $0`.log
	echo "START Err: "`date` >> /tmp/`basename $0`.log
	echo "--------------------" >> /tmp/`basename $0`.log
	exec 2>> /tmp/`basename $0`.log
fi

#### Colors
CSI="\033["
CEND="${CSI}0m"
CBLACK="${CSI}0;30m"
CRED="${CSI}1;31m"
CGREEN="${CSI}1;32m"
CYELLOW="${CSI}1;33m"
CBLUE="${CSI}1;34m"

#### Must be root
if [[ $EUID -ne 0 ]]; then
	echo -e "${CRED}This script must be run as root.$CEND"
	exit 1
fi

#### Must be Debian 7 (Wheezy) x86_64
if [ `cut -c -1 /etc/debian_version` -ne "7" ] || [ `getconf LONG_BIT` = "32" ]; then
	echo -e "${CRED}MySB script is designed only for Debian 7 (Wheezy) x86_64, aborting !$CEND"
	exit 1
fi

#### Test Internet
ping -c1 -w2 github.com >> /tmp/`basename $0`.log
if [ $? -gt 0 ]; then
	echo -e "${CRED}This script must have an Internet access, aborting !$CEND"
	exit 1
fi

if ! hash screen 2>/dev/null; then
	COMMAND=""
else
	COMMAND="`screen -ls | grep MySB 2>/dev/null`"
fi

#### Advertising
echo
echo -e "${CRED}############################################################$CEND"
echo -e "${CRED}#$CEND ${CYELLOW}At the end of the installation, you will receive an email.$CEND"
echo -e "${CRED}#$CEND ${CYELLOW}It lists information about your account.$CEND"
#echo -e "${CRED}#$CEND ${CYELLOW}A temporary password will be assigned to your account.$CEND"
#echo -e "${CRED}#$CEND ${CYELLOW}You will need to change it when receiving email.$CEND"
echo -e "${CRED}# IMPORTANT:$CEND ${CYELLOW}Remember to also check the SPAM folder...$CEND"
echo -e "${CRED}############################################################$CEND"
echo

if [ "$COMMAND" == "" ]; then
	if [ -f /etc/MySB/infos/version.info ]; then # Upgrade ?
		echo -e -n "${CRED}MySB is already installed, aborting!$CEND"
		echo -e -n "${CBLUE}To upgrade MySB, thank you use the following command.'$CEND"
		echo -e -n "${CGREEN}	MySB_UpgradeMe'$CEND"
		source /etc/MySB/inc/includes_after
		exit 1
	else # Install ?
		#### Banner
		echo -e "${CGREEN}############################################################$CEND"
		echo -e "${CGREEN}#$CEND"
		echo -e "${CGREEN}#$CEND ${CYELLOW}MySB$CEND ${CRED}$MYSBCURRENTVERSION$CEND"
		echo -e "${CGREEN}#$CEND ${CYELLOW}by toulousain79$CEND ---> ${CBLUE}https://github.com/toulousain79/$CEND"
		echo -e "${CGREEN}#$CEND"
		echo -e "${CGREEN}############################################################$CEND"
		echo	
	
		echo -e -n "${CBLUE}Install some tools...$CEND"
		
		if [ "`dpkg --status aptitude | grep Status:`" == "Status: install ok installed" ]; then
			packetg="aptitude -q"
		else
			packetg="apt-get"
		fi

		TOOLS="sudo git-core dos2unix lsb-release screen ccze gnupg figlet mlocate"
		
		$packetg -y install $TOOLS >> /tmp/`basename $0`.log

		if [ $? -gt 0 ]; then
			echo -e -n "${CRED}Failed !$CEND"
			echo ""
			echo ""
			echo -e "${CRED}Looks like something for installing some tools, aborting !$CEND"
			exit 1
		else
			
			echo -e "${CGREEN}Done !$CEND"
		fi
		
		#### download files from Git
		echo -e -n "${CBLUE}Download files from GitHub$CEND..."

		git clone -b $MYSBCURRENTVERSION https://github.com/toulousain79/MySB.git /etc/MySB >> /tmp/`basename $0`.log
		
		if [ $? -gt 0 ]; then
			echo -e -n "${CRED}Failed !$CEND"
			echo ""
			echo ""
			echo -e "${CRED}Looks like somethig is wrong with git clone, aborting !$CEND"
			if [ -f /etc/MySB/inc/includes_after ]; then source /etc/MySB/inc/includes_after; fi
			exit 0
		else
			echo -e "${CGREEN}Done !$CEND"
		
			if [ ! -d /etc/MySB/sources ]; then
				mkdir /etc/MySB/sources
			fi		
			if [ ! -d /etc/MySB/users ]; then
				mkdir /etc/MySB/users
			fi
			if [ ! -d /etc/MySB/infos ]; then
				mkdir /etc/MySB/infos
			fi
			if [ ! -d /etc/MySB/logs ]; then
				mkdir /etc/MySB/logs
			fi		
			if [ ! -d /etc/MySB/files ]; then
				mkdir /etc/MySB/files
			fi
			if [ ! -d /etc/MySB/temp ]; then
				mkdir /etc/MySB/temp
			fi	
			if [ ! -d /etc/MySB/web/logs/install ]; then
				mkdir -p /etc/MySB/web/logs/install
			fi
			if [ ! -d /etc/MySB/web/logs/scripts ]; then
				mkdir -p /etc/MySB/web/logs/scripts
			fi
			if [ ! -d /etc/MySB/web/logs/bin ]; then
				mkdir -p /etc/MySB/web/logs/bin
			fi
			if [ ! -d /etc/MySB/web/logs/nginx ]; then
				mkdir -p /etc/MySB/web/logs/nginx
			fi
			if [ ! -d /etc/MySB/web/logs/security ]; then
				mkdir -p /etc/MySB/web/logs/security
			fi			
						
			chmod +x /etc/MySB/MySB_Install.sh
			chmod +x /etc/MySB/MySB_CleanAll.sh
			chmod +x /etc/MySB/bin/*
			chmod +x /etc/MySB/scripts/*
			chmod +x /etc/MySB/install/*
						
			dos2unix /etc/MySB/*
			dos2unix /etc/MySB/inc/*
			dos2unix /etc/MySB/bin/*
			dos2unix /etc/MySB/files/*
			dos2unix /etc/MySB/scripts/*
			dos2unix /etc/MySB/install/*
			dos2unix /etc/MySB/templates/*
			
			echo "$MYSBCURRENTVERSION" > /etc/MySB/infos/version.info
			
			#### Some questions
			/bin/bash /etc/MySB/install/Questions			
			echo
			echo
			echo -e "${CBLUE}Starting SCREEN session...$CEND"
			screen -wipe >> /tmp/`basename $0`.log
			screen -dmS MySB /bin/bash /etc/MySB/MySB.sh;
			sleep 5
			screen -r MySB
		fi
	fi
fi

# -----------------------------------------
if [ -f /etc/MySB/inc/includes_after ]; then source /etc/MySB/inc/includes_after; fi
# -----------------------------------------
##################### LAST LINE ######################################