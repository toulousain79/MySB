#### Under development, thank you not to use this script for now.

====
#### This script is not intended to solicit illegal actions! I can not be held responsible for the use that you could doing it! Thank you to reconsider the installation and use of MySB. I developed this script only for pleasure and passion for my job.
====

My Perfect SeedBox
====

This script is a fork of Notos' Script (base v2.1.9) avaible at https://github.com/Notos/seedbox-from-scratch/, combined with tuto of Mondedie.fr avaible at "http://mondedie.fr/viewtopic.php?id=5302".

MySB is a seedbox platform for multi-users.

#### Current version = v1.0
#### Last stable version = v1.0

## Installed software

* xmlrpc-c (SVN)
* rTorrent (Git) with SSL
* libTorrrent (Git)
* ruTorrent (SVN) + official plugins (SVN)
* NginX (SSL, specific port and some customizations)
* PHP5-FPM (php5-apcu, FastCGI, SSL)
* SFTP with Chroot
* vsftpd (TLS)
* Postfix with SMTP authentication (Gmail, Free, Ovh and Yahoo)

## Services available
* Fail2ban (optionnal but recommended)
* Seedbox-Manager (optionnal but recommended)
* OpenVPN (optionnal); Multi TUN and TAP configuration, with or without redirection of traffic.
* Webmin (optionnal)
* BlockList usage (optionnal) (PeerGuardian or rTorrent)
* CakeBoxLight (optionnal)
* PlexMedia Server (optionnal)
* Samba share for each users (VPN access)
* NFS share for each users (VPN access)

## Additional ruTorrent plugins

* Chat
* Logoff
* tAdd-Labels
* Filemanager
* Mediastream
* Fileshare
* NFO
* RatioColor
* Theme: Oblivion
* FileUpload
* Stream
* Favicons trackers

## Before installation

You need to have a "blank" server installation.
After that access your box using a SSH client, like PuTTY.

#################
#	Warnings	#
#################

#### OpenVZ Containers
--> PeerGuardian, it's not possible to install it in your OpenVZ Container.
```
Module 'xt_mark' is mandatory for PeerGuardian. Currently, I have not found solution. The subject is pending.
```
--> OpenVPN, you must follow this link BEFORE install 'MySB'.
```
https://openvpn.net/index.php/access-server/docs/admin-guides/186-how-to-run-access-server-on-a-vps-container.html
```

#### You must have a swap partition for systems with less than 2GB of RAM!

	--> Your swap partition should be at least equal to your RAM.

#### If you don't know Linux ENOUGH:

	--> DO NOT use capital letters, all your usernames should be written in lowercase.
	--> DO NOT upgrade anything in your box, ask in the thread before even thinking about it.
	--> DO NOT try to reconfigure packages using other tutorials.
	
#################
	
## How to install
Just copy and paste those commands on your terminal:
```
wget --no-check-certificate -N https://raw.githubusercontent.com/toulousain79/MySB/v1.0/MySB_Install.sh
bash MySB_Install.sh
```

If you lose connection during installation, restart the SSH session and run the following command:
```
screen -r MySB
```
Beware, during installation, the SSH port will be changed. If a port session 22 does not work, try with the new port that you have selected.

#### You must be logged as root to run this installation or use sudo.

## Commands

After installing you will have access to the following commands to be used directly in terminal.
	* MySB_ChangeUserPassword
	* MySB_CreateUser
	* MySB_DeleteUser
	* MySB_UpdateGitHubRepo (update actual repository)
	* MySB_RefreshMe (refresh some parts of MySB)
	* MySB_UpgradeMe (to migrate to a new version of MySB)
	* MySB_UpgradeSystem (simply upgrade your system APT upgrade)

#### While executing them, if sudo is needed, they will ask for a password.

## Services

To access services installed on your new server, point your browser to the following address:
```
https://<Server IP or Server Name>:<https NginX port>/MySB/seedboxInfo.php
```

## Seedbox-Manager

The seedbox web-manager application is an interface to restart an rtorrent user session. 
It is also not currently: 

	* links to rutorrent and in Cakebox configurable navbar. 
	* a reminder of ids ftp and sftp user. 
	* a support module with deactivatable ticket. 
	* server statistics (load average, uptime). 
	* user information (disk space, visitor IP address). 
	* a tool to generate configuration files filezilla and Transdroid. 
	* a space administrator to easily manage the configuration of your users 
	* A page parameter to disable the blocks you do not use. 

Author: backtoback (c) & Magicalex (php) & hydrog3n (php).
```
https://github.com/Magicalex/seedbox-manager/
```

## BlockList
BlockList usage (optionnal), PeerGuardian or directly via rTorrent.
Depending on your system, it is possible to use: 
* PeerGuardian

	--> By default, some list are activated. Check "/etc/pgl/blocklists.list".
	--> Many tracker sites are allowed, but only private trackers. Check "/etc/pgl/allow.p2p".

OR

* rTorrent with ipv4_filter.load

	--> By default, some list are activated. Check "/etc/MySB/inc/blocklist".
	--> All list are avaible in "/etc/MySB/scripts/in/blocklist".
	--> Comment the line with '#' if you want to exclude a list OR comment out the line with deleting '#' if you want to activate it.
	--> Example: #BLUETACK_ADS="http://....." to exclude ADS Bluetack list.	
	--> And do "bash /etc/MySB/scripts/BlockList.sh" for generate the new list for each users.
	NB: The script compile one file with all list, and make cleaning rules.
	NB: Beware, if you have not enough memory, choising too many list will make you system very slow!


## OpenVPN

To use your VPN you will need a VPN client compatible with [OpenVPN](http://openvpn.net/index.php?option=com_content&id=357), necessary files to configure your connection are in this link in your box:
```
http://<Server IP or Server Name>:<https NginX port>/MySB/OpenVPN.php` and use it in any OpenVPN client.
```
#### For OpenVZ, you must validate the prerequisites on this page first. Otherwise, OpenVPN will not be functional.
```
https://openvpn.net/index.php/access-server/docs/admin-guides/186-how-to-run-access-server-on-a-vps-container.html
```

## Supported and tested servers

* Debian 7 - x86_64 (Wheezy)
  --> Tested on Online.net with "DEDIBOX® SC GEN2"
  --> Tested on OpenVZ Container with ProxMox, work fine ! (read comment in top of this page)
* Ubuntu or older Debian may worked, but not tested...


## Changelog

Take a look at 'Changelog.md', it's all there.


## Support

There is no real support for this script.


## License

Copyright (c) 2013 Notos (https://github.com/toulousain79/) 

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions: 

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. 

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

--> Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php

## Sources, inspiration and tools

* Notos' script:		https://github.com/Notos/seedbox-from-scratch/
* Mondedie.fr script:		https://bitbucket.org/exrat/install-rutorrent		
* rTorrent config info:		http://libtorrent.rakshasa.no/rtorrent/rtorrent.1.html
* rTorrent tweaks:		https://calomel.org/rtorrent_mods.html
* rTorrent SSL:	https://forums.gentoo.org/viewtopic-t-710876-start-0.html
* OpenSSL configuration file:	http://www.eclectica.ca/howto/ssl-cert-howto.php
* Text ASCII Art Generator:	http://patorjk.com/software/taag/
* Why nginx-extras + infos:	https://wiki.debian.org/fr/Nginx
* NginX config:	http://wiki.nginx.org/CoreModule#worker_rlimit_nofile
* NginX config:	http://trac.evolix.net/infogerance/wiki/HowtoNginx
* NginX config:	https://library.linode.com/web-servers/nginx/configuration/basic
* NginX with SSL:	http://nginx.org/en/docs/http/configuring_https_servers.html
* OpenSSL CAconfig:	http://www.ulduzsoft.com/2012/01/creating-a-certificate-authority-and-signing-the-ssl-certificates-using-openssl/
* VSFTDs TLS:	http://www.howtoforge.com/setting-up-vsftpd-tls-on-debian-squeeze
* VSFTPd Debian: https://howto.biapy.com/fr/debian-gnu-linux/serveurs/autres/installer-le-serveur-ftp-vsftpd-sur-debian
* VSFTPd ManPage: https://security.appspot.com/vsftpd/vsftpd_conf.html

## TODO

* DLNA functionality (with OpenVPN)
* Make some thing for users with dynamic ip for update whitelist in PeerGuardian and Fail2ban.
* Gmail SMTP https://www.google.com/accounts/DisplayUnlockCaptcha
* Maybe add OwnCloud possiblity