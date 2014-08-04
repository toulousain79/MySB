#!/bin/bash 
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

if [ "`screen -ls | grep MySB`" == "" ]; then
	echo ""
	echo -e "${CRED}I am sorry, but you must start installation with MySB_Install.sh, aborting!$CEND"
	exit 1
fi

echo
echo -e "${CRED}If you lose connection during installation, restart the SSH session and run the following command:$CEND"
echo -e "${CGREEN}	screen -r MySB$CEND"
echo -e "${CRED}Beware, during installation, the SSH port will be changed. If a port session 22 does not work, try with the new port that you have selected.$CEND"
echo
		
echo -e "${CYELLOW}All is ok for start the install of MySB.$CEND"
GetString NO  "Do you want to continue, type 'yes' ?" CONTINUE NO
if [ "$CONTINUE" == "NO" ]; then
	echo -e "${CYELLOW}OK, see you later...$CEND"
	echo
	echo
	exit 0
else
	#### 4 - Create MySB banner
	if [ "$BANNER" == "ON" ]; then
		BannerGenerator
	fi	
	
	REBOOT=NO
fi	

#### 1 - sources.list
echo -e -n "${CBLUE}Prepare Sources$CEND..."
screen -dmS SourcesList /bin/bash /etc/MySB/install/SourcesList;
WaitingScreen SourcesList
StatusSTD

#### 2 - install all needed packages
echo -e -n "${CBLUE}Install all needed packages$CEND..."
screen -dmS Packages /bin/bash /etc/MySB/install/Packages;
WaitingScreen Packages
StatusSTD	

#### 3 - download all files now in one time (GIT, SVN, TAR.GZ, WBM)
echo -e -n "${CBLUE}Download all files now in one time (GIT, SVN, TAR.GZ, WBM)$CEND..."
screen -dmS DownloadAll /bin/bash /etc/MySB/install/DownloadAll;
WaitingScreen DownloadAll
StatusSTD

if [ -f /etc/MySB/temp/continue ]; then
	echo ""
	echo -e "${CRED}Important files could not be downloaded, aborting !$CEND"
	echo
	cat /etc/MySB/temp/continue
	exit 1
fi

#### 3 - Sytem tweaks
echo -e -n "${CBLUE}Sytem optimization$CEND..."
screen -dmS Tweaks /bin/bash /etc/MySB/install/Tweaks;
WaitingScreen Tweaks
StatusSTD

#### certificates
echo -e -n "${CBLUE}Create certificates$CEND..."
screen -dmS Certificates /bin/bash /etc/MySB/install/Certificates 'CreateCACertificate';
WaitingScreen Certificates
StatusSTD

#### SSH
echo -e -n "${CBLUE}Configure SSHd$CEND..."
screen -dmS SSH /bin/bash /etc/MySB/install/SSH;
WaitingScreen SSH
StatusSTD

#### configure php5-fpm
echo -e -n "${CBLUE}Install and configure PHP5-FPM$CEND..."
screen -dmS PHP /bin/bash /etc/MySB/install/PHP;
WaitingScreen PHP
StatusSTD	

#### configure nginx
echo -e -n "${CBLUE}Install and configure NginX$CEND..."
screen -dmS Nginx /bin/bash /etc/MySB/install/Nginx;
WaitingScreen Nginx
StatusSTD			

#### vSFTPd
echo -e -n "${CBLUE}Install and configure VSFTPd$CEND..."
screen -dmS VSFTP /bin/bash /etc/MySB/install/VSFTP;
WaitingScreen VSFTP
StatusSTD			

#### install rTorrent and depends
echo -e -n "${CBLUE}Install and configure rTorrent$CEND..."
screen -dmS rTorrent /bin/bash /etc/MySB/install/rTorrent;
WaitingScreen rTorrent
StatusSTD	

#### install ruTorrent and plugins
echo -e -n "${CBLUE}Install and configure ruTorrent & Plugins$CEND..."
screen -dmS ruTorrent /bin/bash /etc/MySB/install/ruTorrent;
WaitingScreen ruTorrent
StatusSTD	

#### Tools for CakeBox and Seedbox-Manager
if [ "$INSTALLCAKEBOX" == "YES" ] || [ "$INSTALLMANAGER" == "YES" ]; then
	echo -e -n "${CBLUE}Install and configure Composer, Bower and NodeJS$CEND..."
	screen -dmS Tools /bin/bash /etc/MySB/install/Tools;
	WaitingScreen Tools
	StatusSTD		
fi

#### Seedbox-Manager
if [ "$INSTALLMANAGER" == "YES" ]; then
	echo -e -n "${CBLUE}Install and configure Seedbox-Manager$CEND..."
	screen -dmS SeedboxManager /bin/bash /etc/MySB/install/SeedboxManager;
	WaitingScreen SeedboxManager
	StatusSTD			
fi

#### CakeBox Light
if [ "$INSTALLCAKEBOX" == "YES" ]; then
	echo -e -n "${CBLUE}Install and configure CakeBox Light$CEND..."
	screen -dmS CakeboxLight /bin/bash /etc/MySB/install/CakeboxLight;
	WaitingScreen CakeboxLight
	StatusSTD		
fi

if [ "$INSTALLOPENVPN" == "YES" ]; then
	echo -e -n "${CBLUE}Install and configure OpenVPN$CEND..."
	screen -dmS OpenVPN /bin/bash /etc/MySB/install/OpenVPN "server";	
	WaitingScreen OpenVPN
	StatusSTD	

	echo -e -n "${CBLUE}Install and configure Samba$CEND..."
	screen -dmS Samba /bin/bash /etc/MySB/install/Samba;	
	WaitingScreen Samba
	StatusSTD

	echo -e -n "${CBLUE}Install and configure NFS$CEND..."
	screen -dmS NFS /bin/bash /etc/MySB/install/NFS;	
	WaitingScreen NFS
	StatusSTD	
fi

#### fail2ban
if [ "$INSTALLFAIL2BAN" == "YES" ]; then
	echo -e -n "${CBLUE}Install and configure Fail2Ban$CEND..."
	screen -dmS Fail2Ban /bin/bash /etc/MySB/install/Fail2Ban;
	WaitingScreen Fail2Ban
	StatusSTD		
fi

#### postfix
echo -e -n "${CBLUE}Install and configure Postfix$CEND..."
screen -dmS Postfix /bin/bash /etc/MySB/install/Postfix;
WaitingScreen Postfix
StatusSTD

#### webmin
if [ "$INSTALLWEBMIN" == "YES" ]; then
	echo -e -n "${CBLUE}Install and configure Webmin$CEND..."
	screen -dmS Webmin /bin/bash /etc/MySB/install/Webmin;
	WaitingScreen Webmin
	StatusSTD				
fi

### install PlexMedia
if [ "$INSTALLPLEXMEDIA" == "YES" ]; then
	echo -e -n "${CBLUE}Install and configure PlexMedia$CEND..."
	screen -dmS PlexMedia /bin/bash /etc/MySB/install/PlexMedia;
	WaitingScreen PlexMedia
	StatusSTD		
fi


#### BlockList
case $MYBLOCKLIST in
	PeerGuardian)
		echo -e -n "${CBLUE}Install and configure PeerGuardian$CEND..."
		screen -dmS PeerGuardian /bin/bash /etc/MySB/install/PeerGuardian;		
		WaitingScreen PeerGuardian
		StatusSTD	

		echo -e -n "${CBLUE}Compile the BlockList for rTorrent$CEND..."
		screen -dmS Blocklist /bin/bash /etc/MySB/install/Blocklist;
		WaitingScreen Blocklist
		StatusSTD		
	;;
	rTorrent)
		echo -e -n "${CBLUE}Compile the BlockList for rTorrent$CEND..."
		screen -dmS Blocklist /bin/bash /etc/MySB/install/Blocklist;
		WaitingScreen Blocklist
		StatusSTD			
	;;	
	*)
		echo -e -n "${CBLUE}Don't use any blocklist$CEND..."
		StatusSTD
	;;
esac

#### MySB_CreateUser
echo  -e -n "${CBLUE}Add the main user$CEND..."
screen -dmS MySB_CreateUser /bin/bash /etc/MySB/bin/MySB_CreateUser "$NEWUSER" "$PASSWORD" "YES" "YES";
WaitingScreen MySB_CreateUser
StatusSTD		

echo
echo -e "${CGREEN}Looks like everything is set.$CEND"
echo
echo -e "${CYELLOW}Remember that your SSH port is now ======>$CEND ${CBLUE}$NEWSSHPORT$CEND"
echo
echo -e "${CRED}System will reboot now, but don't close this window until you take note of the port number:$CEND ${CBLUE}$NEWSSHPORT$CEND"
echo
echo -e "${CBLUE}Available commands for your seedbox:$CEND"
echo -e "${CYELLOW}	User Management:$CEND"
echo -e "${CGREEN}			MySB_ChangeUserPassword$CEND"
echo -e "${CGREEN}			MySB_CreateUser$CEND"
echo -e "${CGREEN}			MySB_DeleteUser$CEND"
echo -e "${CYELLOW}	SeedBox Management:$CEND"
echo -e "${CGREEN}			MySB_RefreshMe$CEND"
echo -e "${CYELLOW}	MySB script Management:$CEND"
echo -e "${CGREEN}			MySB_UpdateGitHubRepo$CEND (update actual repository)"
echo -e "${CGREEN}			MySB_UpgradeMe$CEND (if new versions)"
echo
echo
echo -e "${CBLUE}You can check all informations for use your SeedBox here:$CEND"
echo -e "	-->	${CYELLOW}https://$HOSTFQDN:$NGINXHTTPSPORT/MySB/SeedboxInfo.php$CEND"

#GetString NO  "Are you ready for reboot now? " REBOOT YES
echo ""
echo -e -n "${CRED}The server will restart in $CEND"
for ((i = 10; i >= 0; i -= 1)); do
	echo -n " $i"
	sleep 1
done

REBOOT=YES

# -----------------------------------------
if [ -f /etc/MySB/inc/includes_after ]; then source /etc/MySB/inc/includes_after; fi
# -----------------------------------------
##################### LAST LINE ######################################