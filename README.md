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

	* rTorrent (rakshasa) v0.9.2 with SSL
	* libTorrrent (rakshasa) v13.2
	* ruTorrent (SVN) + official plugins (SVN)
	* NginX (SSL, specific port and some customizations)
	* PHP5-FPM (php5-apcu, FastCGI, SSL)
	* SFTP with Chroot
	* vsftpd (TLS)
	* Postfix with SMTP authentication (Gmail, Free, Ovh and Yahoo)

## Services available

	* Fail2ban (optionnal but recommended)
	* Seedbox-Manager (optionnal but recommended)
	* OpenVPN (optionnal); Multi TUN and TAP configuration, with or without redirection of traffic. Add AES-NI support.
	* Webmin (optionnal)
	* BlockList usage (optionnal) (PeerGuardian or rTorrent)
	* CakeBoxLight (optionnal)
	* PlexMedia Server (optionnal)
	* Samba share for each users (VPN access)
	* NFS share for each users (VPN access)
	* Get SSL certificates for each tracker avaible with ruTorrent

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
	
Next scripts are avaible too.
	
	* /etc/MySB/scripts/BlockList.sh, use this for generate blocklist for rTorrent with 'ipv4_filter.load' command.
	* /etc/MySB/scripts/FirewallAndSecurity.sh [clean|new], use this for generate all security options (PeerGuardian, IPtables, Nginx IP restricted access, ...)
	* /etc/MySB/scripts/GetTrackersCert.sh, use this for get all SSL certificates for all tracker avaibled with ruTorrent. You can add more trackers in '/etc/MySB/inc/trackers'.

You can find others scripts in '/etc/MySB/scripts/'. This others scripts are added in cron job.

#### While executing them, if sudo is needed, they will ask for a password.

## Services

To access services installed on your new server, point your browser to the following address:
```
https://<Server IP or Server Name>:<https NginX port>/MySB/SeedboxInfo.php
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

#### PeerGuardian

	* By default, some list are activated. Check "/etc/pgl/blocklists.list".
	* Many tracker sites are allowed, but only private trackers. Check "/etc/pgl/allow.p2p".

OR

#### rTorrent with ipv4_filter.load

	* By default, some list are activated. Check "/etc/MySB/inc/blocklist".
	* All list are avaible in "/etc/MySB/inc/blocklist".
	* Comment the line with '#' if you want to exclude a list OR comment out the line with deleting '#' if you want to activate it.
	* Example: #BLUETACK_ADS="http://....." to exclude ADS Bluetack list.	
	* And do "bash /etc/MySB/scripts/BlockList.sh" for generate the new list for each users.

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
##### NFS and Samba share with OpenVPN
For NFS, you can mount the /home/<username>/rtorrent like that. The IP address can be different depending on the OpenVPN configuration that you have selected.
```
mount.nfs [10.0.0.1|10.0.1.1]:/home/<username>/rtorrent <mount_dir> -r
```
For Samba, you can mount the /home/<username> like that. The IP address can be different depending on the OpenVPN configuration that you have selected.
```
mount - <mount_dir> -t cifs -o noatime,nodiratime,UNC=//[10.0.0.1|10.0.1.1]/<username>,username=<username>,password=<your_password>
```

NB: I personally use my router Asus RT-N16 (firmware TomatoUSB by Shibby) as OpenVPN client. From there, I mount the NFS share corresponding to my homedir on the MySB box.
Then I add my mount point in the DLNA server on my RT-N16. 
Miracle, I can stream my files with my Freebox Revolution!

## Supported and tested servers

#### Debian 7 - x86_64 (Wheezy)

	--> Tested on Online.net with "DEDIBOX® SC GEN2" and "DEDIBOX® XC"
	--> Tested on OpenVZ Container with ProxMox, work fine ! (read comment in top of this page)
  
#### Ubuntu or older Debian may worked, but not tested...


## Changelog

Take a look at 'Changelog.md', it's all there.


## Support

There is no real support for this script.


## License

Created by toulousain79

--> Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php

## Sources, inspiration and tools

* Notos' script:		https://github.com/Notos/seedbox-from-scratch/
* Mondedie.fr script:		https://bitbucket.org/exrat/install-rutorrent	
* rTorrent Community:	http://community.rutorrent.org/	
* rTorrent config info:		http://libtorrent.rakshasa.no/rtorrent/rtorrent.1.html
* rTorrent tweaks:		https://calomel.org/rtorrent_mods.html
* rTorrent SSL:	https://forums.gentoo.org/viewtopic-t-710876-start-0.html
* OpenSSL configuration file:	http://www.eclectica.ca/howto/ssl-cert-howto.php
* OpenSSL AES-NI support:	http://openssl.6102.n7.nabble.com/having-a-lot-of-troubles-trying-to-get-AES-NI-working-td44285.html
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

* Maybe add DLNA functionality (with OpenVPN)
* Make some thing for users with dynamic ip for update whitelist in PeerGuardian and Fail2ban.
* Gmail SMTP https://www.google.com/accounts/DisplayUnlockCaptcha
* Maybe add OwnCloud possiblity
* Maybe use of SQLight
* NFS over sTunnel ? (https://w3.physics.illinois.edu/physwiki/doku.php?id=pcs:unix:nfs_over_stunnel)
