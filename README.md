====
#### WORK IN PROGRESS, DON'T USE THIS VERSION !!!
====

====
#### This script is not intended to solicit illegal actions! I can not be held responsible for the use that you could doing it! Thank you to reconsider the installation and use of MySB. I developed this script only for pleasure and passion for my job.
====
MySB
====

MySB is a multi-user seedbox for dedicated server under Debian 7 (Wheezy).  

##### Current version = v2.0
###### Last stable version = v2.0

## Installed software

	* rTorrent (rakshasa) v0.9.2 & v0.9.4 with SSL
	* libTorrrent (rakshasa) v0.13.2 & v0.13.4
	* ruTorrent (SVN) + official plugins (SVN)
	* NginX (SSL, specific port and some customizations)
	* PHP5-FPM (php5-apcu, FastCGI, SSL)
	* SFTP with Chroot
	* VSFTPd (FTP over TLS)
	* Postfix with (or without) SMTP authentication (Gmail, Free, Ovh and Yahoo)

## Services available

	* PeerGuardian (optionnal but recommended)
	* DNScrypt-proxy with Bind9 as DNS caching (optionnal but recommended)	
	* Fail2ban (optionnal but recommended)
	* Seedbox-Manager (optionnal, you are able to restart rTorrent session via MySB portal)
	* OpenVPN (optionnal); Multi TUN configuration, with or without redirection of traffic. Add AES-NI support.
	* Webmin (optionnal)
	* BlockList usage (optionnal) (PeerGuardian or rTorrent, if PeerGuardian failed to start, rTorrent will use its own blocklists)
	* CakeBox-Light (optionnal)
	* PlexMedia Server (optionnal) (requires additional setup)
	* Samba share for each users (VPN access)
	* NFS share for each users (VPN access)
	* Auto retrieve SSL certificates for all trackers (if available)
	* MySB portal, ability to manage trackers, blocklists, logs, users, restart rTorrent, switch of rTorrent version, and more
	* Block all possibilities to use any listed trackers that was not activated in MySB portal
	* LoadAvg, free server analytics and monitoring
	* Monitoring service available for some providers
	* Access restricted by IP for all server access (can be disabled)
	* Dynamic IP Management for IP restriction (DynDNS, No-IP, ...)

## Additional ruTorrent plugins

	* Mobile
	* Pause WebUI
	* Chat
	* Logoff
	* tAdd-Labels
	* Filemanager
	* Mediastream
	* Fileshare
	* NFO
	* RatioColor
	* FileUpload
	* Stream
	* Favicons trackers

## Coming soon

	* Possibility to add more blocklists
	* Possibility to delete/inactivate a user

## Bugs

	--> Please, tell me.

## Before installation

	--> You need to have a "blank" server installation.

#################
#	Warnings	#
#################

###### NOTE: You must have a swap partition for systems with less than 2GB of RAM!

	--> Your swap partition should be at least equal to your RAM.

###### NOTE: If you don't know Linux ENOUGH:

	--> DO NOT use capital letters, all your usernames should be written in lowercase without space.
	--> DO NOT upgrade anything in your box, ask in the thread before even thinking about it.
	--> DO NOT try to reconfigure packages using other tutorials or yourself.
	--> TO UPGRADE your system, please use 'MySB_UpgradeSystem' command.
	
###### NOTE: For OVH servers:

	--> Use the default distribution kernel.
		When you start the installation process, choose "Custom install", and "Use of kernel distribution".
	
	--> You can monitor your server, simply specify it during MySB installation.
		BUT I still advice to disable this service in the OVH interface.
		If you allow monitoring with MySB, the IPs of your provider will be added to the whitelist globally (PeerGuardian, Fail2Ban, IPTables), and those addresses will not be filtered.
	
	--> If you leave the monitoring enable in the OVH interface AND you do not activated it during installation of MySB, your server may be rebooted in rescue mode by the OVH staff...
	--> If you want use the monitoring, you must first disable it BEFORE start the MySB installation. You can reactivate it AFTER the END of installation.

#################

## How to install
Just copy and paste those commands on your terminal:
```
wget --no-check-certificate -N https://raw.githubusercontent.com/toulousain79/MySB/dev/install/MySB_Install.bsh
bash MySB_Install.bsh
```

If you lose connection during installation, restart the SSH session and run the following command:
```
screen -r MySB
```

Beware, during installation, the SSH port will be changed. If a port session 22 does not work, try with the new port that you have selected.

###### NOTE 1
	You must be logged as root to run this installation.
###### NOTE 2
	At the end of the installation, the server will restart automatically and you will receive an e-mail summarizing.
###### NOTE 3
	Each time a user is added, it will also receive a confirmation email with a temporary password.
###### NOTE 4
	The installation may take 20 to 45 minutes depending on the services to install and server configuration.
###### NOTE 5
	The installation runs completely silently (screen). However, all of the installation logs will be available in the portal for the main user.


## How to upgrade from v1.1
Use this command on your terminal:
```
MySB_UpgradeMe
```

## Complete uninstall of MySB
Use this command on your terminal:
```
bash <MySB_directory>/install/MySB_CleanAll.bsh
```

###### BEWARE: The MySB installation directory will be completely removed, and ALL installed packages will be purged.

## Commands

After installation, you can access the following commands to be used directly in the terminal (can used in the portal too).

	* MySB_ChangeUserPassword
	* MySB_CreateUser
	* MySB_DeleteUser
	* MySB_SecurityRules (use this for generate all security options Nginx IP restricted access, IPtables, Fail2BanPeerGuardian, ...)
	* MySB_GitHubRepoUpdate (update actual repository) (added to cron)
	* MySB_RefreshMe (refresh ruTorrent, Seedbox-Manager, Cakebox-Light, LoadAvg)
	* MySB_UpgradeMe (to migrate to a new version of MySB) (added to cron to check if a new version is available, you will receive a mail)
	* MySB_UpgradeSystem (simply upgrade your system with APT command)

Additional scripts:

	* '<MySB_directory>/scripts/BlocklistsRTorrent.bsh', use this for generate blocklist for rTorrent with 'ipv4_filter.load' command. (CRON every day at 23:00)	
	* '<MySB_directory>/scripts/DynamicAddressResolver.bsh', used for auto update users dynamics addresses IP. (CRON every 5 minutes)
	* '<MySB_directory>/scripts/GetTrackersCert.bsh', use this for get all SSL certificates for all tracker. You can add more trackers in MySB portal. This script is start every time you add/edit trackers list.	
	* '<MySB_directory>/scripts/LogServer.bsh', used for generate HTML log files (Nginx, PeerGuardian, Fail2Ban,...) avalaible in MySB Portal. (CRON every 30 minutes)	

## MySB Portal

To access services installed on your new server, point your browser to the following address (MySB portal):
```
https://<Server_Name>:<HTTPS_Port>/
```

###### Main and normal users
	* Can change their password.
	* Can change their IP addresses for authorized connection (dynamic DNS included).
	* Can download OpenVPN config files.
	* Direct access to the various services installed (ruTorrent, Cabox-Light, Seedbox-Manager, LoadAvg).

###### Normal users only
	* Display activated blocklists (read only)
	* Display activated trackers (read only)
	
###### Main user only
	* Direct access to the various services installed, like normal users plus others services (Webmin, Logs, Renting Infos, SMTP).
	* Manage trackers list.
	* Manage blocklists (rTorrent and PeerGuardian).

## Seedbox-Manager

The seedbox manager is an interface to restart a rtorrent user session.

Author: backtoback (c) & Magicalex (php) & hydrog3n (php).
```
https://github.com/Magicalex/seedbox-manager/
```

## Cakebox-Light

Cakebox is a small web app written with AngularJS and Silex, in order to list directories and watch video files for a specified directory.

Author: MardamBeyK & Tuxity.
```
https://github.com/Cakebox/Cakebox-light
https://github.com/Cakebox/Cakebox-light/wiki/Choisir-son-lecteur-vid%C3%A9o
```

## LoadAvg

LoadAvg is a powerful way to manage load, memory, and resource usage on linux servers, cloud computers and virtual machines.
```
http://www.loadavg.com/
```

## BlockLists
BlockList usage (optionnal), PeerGuardian or directly via rTorrent.
Depending on your system, it is possible to use: 

#### PeerGuardian

	* By default, some list are activated. Check this list in MySB portal.
	* All listed trackers in ruTorrent are available but disabled. You can add more or activate it via MySB portal.

###### NOTE 1
	Do not try to add your rtorrents ports in the list of incoming ports allowed in PeerGuardian (pglcmd.conf) !!! Using PeerGuardian will not have much sense...
###### NOTE 2
	If PeerGuardian failed to start, rTorrent blocklists are used instead.
###### NOTE 3
	All modifications applied by hand will be erased by MySB SecurityRules script.
###### NOTE 4
	Do not activate all trackers, but only these needed.

OR

#### rTorrent (with ipv4_filter.load)

	* By default, some list are activated. Check this list in MySB portal.
	* Once the lists are selected, a common file containing all the lists will be generated and copied for each user.

###### NOTE:	Beware, if you do not have enough memory, too much list enabled will make your system slower, especially if you have multiple users!

## OpenVPN

To use your VPN you will need a VPN client compatible with [OpenVPN](http://openvpn.net/index.php?option=com_content&id=357).
Necessary files to configure your connection are available here:
```
http://<Server_Name>:<HTTPs_Port>/?user/openvpn-config-file.html
```
##### NFS and Samba share with OpenVPN
For NFS, you can mount the '/home/<User>/rtorrent' like below. The IP address can be different depending on the OpenVPN configuration that you have selected.
```
mount -t nfs [10.0.0.1|10.0.1.1]:/home/<User>/rtorrent <mount_dir> -o  -o vers=3
```
For Samba, you can mount the '/home/<User>' like that. The IP address can be different depending on the OpenVPN configuration that you have selected.
```
mount - <mount_dir> -t cifs -o noatime,nodiratime,UNC=//[10.0.0.1|10.0.1.1]/<User>,username=<User>,password=<Password>
```

## DNScrypt-proxy
By default, all provider that accept 'DNSsec' and 'No Logs' are activated.
The full list of DNScrypt resolvers is available at: https://github.com/jedisct1/dnscrypt-proxy/blob/master/dnscrypt-resolvers.csv 

It is possible to change the provider list by command line:
```
service dnscrypt-proxy {stop|status} [{start|restart} [--all] [[--nologs=yes|no] [--dnnsec=yes|no] [--resolver=resolver1,resolver2,...]]]
```

To clean Bind cache, just restart BIND service.
BIND will restart every DNScrypt-proxy restarts.
```
service bind9 restart
```

## SMTP authentification
If you want to use GMAIL provider, maybe should you read this for authorize connexion to your account by your server JUST BEFORE installation.
```
https://www.google.com/accounts/DisplayUnlockCaptcha
```
 
## Designed for dedicated server with Debian 7 (Wheezy)

	--> Ubuntu is not supported.
	--> PVE kernel are not supported.
 
## Changelog

Take a look at 'Changelog.md', it's all there.

## License

Created by toulousain79

--> Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php

## Sources, inspiration and tools

* rTorrent Community:	http://community.rutorrent.org/	
* rTorrent config info:		http://libtorrent.rakshasa.no/rtorrent/rtorrent.1.html
* rTorrent SSL:	https://forums.gentoo.org/viewtopic-t-710876-start-0.html
* OpenSSL configuration file:	http://www.eclectica.ca/howto/ssl-cert-howto.php
* OpenSSL AES-NI support:	http://openssl.6102.n7.nabble.com/having-a-lot-of-troubles-trying-to-get-AES-NI-working-td44285.html
* Text ASCII Art Generator:	http://patorjk.com/software/taag/
* Why nginx-extras + infos:	https://wiki.debian.org/fr/Nginx
* Nginx / PageSpeed: https://developers.google.com/speed/pagespeed/
* DNS Server:	http://en.m.wikipedia.org/wiki/Comparison_of_DNS_server_software#Feature_matrix
* DNScrypt:	http://dnscrypt.org/
* PHPBench:		http://www.phpbench.com/
* WolfCMS:		http://www.wolfcms.org/
* Medoo:		http://medoo.in/
* LoadAvg:	http://www.loadavg.com/

## TODO

* Use of "Let's Encrypt" (https://letsencrypt.org/) (Summer 2015)
* Use of DNScrypt-wrapper instead of DNScrypt-proxy
* TIGER: http://www.nongnu.org/tiger/index.html#intro
* NFS over sTunnel ? (https://w3.physics.illinois.edu/physwiki/doku.php?id=pcs:unix:nfs_over_stunnel)
* Add miniDLNA (with OpenVPN) ?
* Add SABnzbd ?
* Add Subsonic ?
* Add OwnCloud ?
* Namebench ?
* PSAD, SNORT ?
