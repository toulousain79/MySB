#### WORK IN PROGRESS !
#### DO NOT USE THIS VERSION !

#### This script is not intended to solicit illegal actions! I can not be held responsible for the use that you could doing it! Thank you to reconsider the installation and use of MySB. I developed this script only for pleasure and passion for my job.

====
# MySB

MySB is a multi-user seedbox for dedicated server under Debian 7 (Wheezy) and could be renamed MySSB, My Secured SeedBox.

====
##### Current version : v2.0
###### Last stable version : v2.0

====
## All prerequisites listed below are MANDATORY!
	* You must have a standard Debian kernel ! If you can not install a Debian kernel, then MySB is not for you ...
	* Virtual Private Server (VPS) are not compatible ! (refer to the previous point)
	* You must have a clean dedicated server.
	* Your primary inet must be configured staticly, not DHCP (eg: Online servers)
	* Encourage me by following my project ;-)

====
## Installed software
	* rTorrent (rakshasa) v0.9.2 & v0.9.4 with SSL
	* libTorrrent (rakshasa) v0.13.2 & v0.13.4
	* ruTorrent (SVN) + official plugins (SVN)
	* NginX (SSL, specific port and some customizations)
	* PHP5-FPM (php5-apcu, FastCGI, SSL)
	* SFTP with Chroot
	* VSFTPd (FTP over TLS)
	* Postfix with (or without) SMTP authentication (Gmail, Free, Ovh and Yahoo)

====
## Services available
	* PeerGuardian (optionnal but recommended)
	* DNScrypt-proxy with Bind9 as DNS caching (optionnal but recommended)
	* Fail2ban (optionnal but recommended)
	* Seedbox-Manager (optionnal, you are able to restart rTorrent session via MySB portal)
	* OpenVPN (optionnal); Multi TUN/TAP configuration, with or without redirection of traffic. Add AES-NI support.
	* Webmin (optionnal)
	* BlockList usage (optionnal) (PeerGuardian or rTorrent, if PeerGuardian failed to start, rTorrent will use its own blocklists)
	* CakeBox-Light (optionnal)
	* PlexMedia Server (optionnal, VPN bridged access, requires additional setup) (WiP)
	* Samba share for each users (VPN access)
	* NFS share for each users (VPN access)
	* Auto retrieve SSL certificates for all trackers (if available)
	* MySB portal, ability to manage trackers, blocklists, logs, users, restart rTorrent, switch of rTorrent version, and more
	* Block all possibilities to use any listed trackers that was not activated in MySB portal
	* LoadAvg, free server analytics and monitoring
	* Monitoring service available for some providers
	* Access restricted by IP for all server access (can be disabled)
	* Dynamic IP Management for IP restriction (DynDNS, No-IP, ...)

====
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

====
## Coming soon
	* Possibility to add more blocklists
	* Possibility to delete/inactivate a user

====
## Bugs
	--> Please, tell me.
	--> Maybe some missing IPtables rules for some services. Can be corrected quickly if you do a feedback...

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
	
###### NOTE: For OVH servers (OVH, KimSufi, SoYouStart):

	--> Use the default distribution kernel.
		In your OVH manager interface, when you start the installation process, choose "Custom install", and "Use of kernel distribution".

	--> You can monitor your server, simply specify it during MySB installation.
		BUT I still advice to disable this service in the OVH interface.
		If you allow monitoring with MySB, the IPs of your provider will be added to the whitelist globally (PeerGuardian, Fail2Ban, IPTables), and those addresses will not be filtered.
		The system works on SoYouStart servers. But has not been verified on others OVH servers like KimSufi !

	--> If you leave the monitoring enable in the OVH interface AND you do not activated it during installation of MySB, your server may be rebooted in rescue mode by the OVH staff...
	--> If you want use the monitoring, you must first disable it BEFORE start the MySB installation. You can reactivate it AFTER the END of installation.
	--> You can also disable the Real Time Monitoring (RTM), read this page. [Real Time Monitoring (RTM)](http://www.torrent-invites.com/showthread.php?t=39022)

#################

## [WiKi](https://github.com/toulousain79/MySB/wiki)
### Installation / Upgrade / Uninstall
* [Installation](https://github.com/toulousain79/MySB/wiki/Installation)
* [Upgrade](https://github.com/toulousain79/MySB/wiki/Upgrade)
* [Uninstall](https://github.com/toulousain79/MySB/wiki/Uninstall)

### Commands and scripts
* [Commands](https://github.com/toulousain79/MySB/wiki/Commands)

### Portal
* [Presentation](https://github.com/toulousain79/MySB/wiki/%5BPortal%5D-Presentation)
* [Users rights](https://github.com/toulousain79/MySB/wiki/%5BPortal%5D-Users-rights)






## Seedbox-Manager

The seedbox manager is an interface to restart a rtorrent user session.

Author: backtoback (c) & Magicalex (php) & hydrog3n (php).
```
[https://github.com/Magicalex/seedbox-manager/](https://github.com/Magicalex/seedbox-manager/)
```

## Cakebox-Light

Cakebox is a small web app written with AngularJS and Silex, in order to list directories and watch video files for a specified directory.

Author: MardamBeyK & Tuxity.
```
[https://github.com/Cakebox/Cakebox-light](https://github.com/Cakebox/Cakebox-light)
[https://github.com/Cakebox/Cakebox-light/wiki/Choisir-son-lecteur-vid%C3%A9o](https://github.com/Cakebox/Cakebox-light/wiki/Choisir-son-lecteur-vid%C3%A9o)
```

## LoadAvg

LoadAvg is a powerful way to manage load, memory, and resource usage on linux servers, cloud computers and virtual machines.
```
[http://www.loadavg.com/](http://www.loadavg.com/)
```

## Plex Media

Additional steps to add your server to your Plex account.
```
[https://www.kassianoff.fr/blog/fr/installation-de-plex-media-server-sur-debian-7](https://www.kassianoff.fr/blog/fr/installation-de-plex-media-server-sur-debian-7)
[https://www.kassianoff.fr/blog/fr/installation-de-plex-media-server-sur-debian-7](https://www.kassianoff.fr/blog/fr/installation-de-plex-media-server-sur-debian-7)
```
###### NOTE
	Work in progress, this service is currently not 100% functional.
	The OpenVPN TAP mode has been added to allow the diffusion of DLNA, but it is still in testing.
	Feedback would be appreciated...

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
	All modifications applied by hand will be erased by MySB_SecurityRules script.
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
For NFS, you can mount the '/home/username/rtorrent' like below. The IP address can be different depending on the OpenVPN configuration that you have selected.
```
mount -t nfs 10.0.x.1:/home/<User>/rtorrent <mount_dir> -o vers=3,nolock
```
For Samba, you can mount the '/home/<User>' like that. The IP address can be different depending on the OpenVPN configuration that you have selected.
```
mount - <mount_dir> -t cifs -o noatime,nodiratime,UNC=//10.0.x.1/<User>,username=<User>,password=<Password>
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
[https://www.google.com/accounts/DisplayUnlockCaptcha](https://www.google.com/accounts/DisplayUnlockCaptcha)
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

## TODO & Ideas

* Use of "Let's Encrypt" (https://letsencrypt.org/) (Summer 2015)
* TIGER: http://www.nongnu.org/tiger/index.html#intro
* NFS over SSH ? https://www.howtoforge.com/nfs_ssh_tunneling
* Add miniDLNA (with OpenVPN) ?
* Add SABnzbd ?
* Add Subsonic ?
* Add OwnCloud ?
* Namebench ?
* PSAD, SNORT ?
* Ability to disable the restriction trackers ?