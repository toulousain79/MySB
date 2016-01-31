#### This script is not intended to solicit illegal actions! I can not be held responsible for the use that you could doing it! Thank you to reconsider the installation and use of MySB. I developed this script only for pleasure and passion for my job.
#### You are not allowed to use MySB for resale as a service !!

====
# MySB
MySB is a multi-user seedbox for dedicated server under Debian 7 (Wheezy) and could be renamed MySSB, My Secured SeedBox.

* **Current version** _(stable)_: **v3.2**
* Next version _(dev)_: -----

## All prerequisites listed below are MANDATORY!

* **Designed** for **dedicated server** only with **Debian Wheezy** _(**Ubuntu** is **not supported**)_
* You **must** have a **standard Debian kernel** ! If you can not install a **Debian kernel**, then MySB is **not for you**... _(**PVE kernel** are not **supported**)_
* Virtual Private Server (VPS) are **not compatible** ! (refer to the previous point)
* You must have a **clean dedicated server**.
* Your primary inet must be configured **staticly**, not DHCP (eg: Online servers)
* Encourage me by **following my project** ;-)

## Features & Services
* **rTorrent** _(Rakshasa) v0.9.2 & v0.9.6 with SSL_
* **libTorrrent** _(Rakshasa) v0.13.2 & v0.13.6_
* **ruTorrent + official plugins** _(GIT)_
* **NginX** _(SSL, specific port and some customizations)_
* **PHP5-FPM** _(php5-apcu, FastCGI, SSL)_
* **SFTP** _with Chroot_
* **VSFTPd** _(FTP over TLS)_
* **Postfix** with _(or without)_ SMTP authentication _(Gmail, Free, Ovh and Yahoo)_
* **PeerGuardian** _(optionnal but **recommended**)_
* **DNScrypt-proxy** with Bind9 as DNS caching _(optionnal but **recommended**)_
* **Fail2ban** _(optionnal but **recommended**)_
* **Seedbox-Manager** _(optionnal) (user interface is in french)_
* **LoadAvg** _(free server analytics and monitoring)_
* **ownCloud** _(optionnal)_
* **OpenVPN** _(optionnal); Multi TUN/TAP configuration, with or without redirection of traffic. Add AES-NI support._
* **Webmin** _(optionnal)_
* **CakeBox-Light** _(optionnal)_
* **PlexMedia Server** _(optionnal, VPN bridged access, requires additional setup)_
* **Samba share** for each users _(VPN access)_
* **NFS share** for each users _(VPN access)_
* **MySB portal** (_ability to manage trackers, blocklists, logs, users, restart rTorrent, switch of rTorrent version, and more)_
* **Special features of MySB**
 + Auto retrieve SSL certificates for all trackers _(if available)_
 + Block all possibilities to use any listed trackers that was not activated in MySB portal
 + BlockList usage _(optionnal) (PeerGuardian or rTorrent, if PeerGuardian failed to start, rTorrent will use its own blocklists)_
 + Monitoring service available _(OVH and Online)_
 + Access restricted by IP for all server access _(can be disabled)_
 + Dynamic IP Management for IP restriction _(DynDNS, No-IP, ...)_
 + Language select _(English, French)_
 + Use of scripts after finished download _(Directly OR Cron)_

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

## Bugs

* Please, tell me.
* Maybe some missing IPtables rules for some services. Can be corrected quickly if you do a feedback...

====
# Warnings
## SWAP
* You must have a swap partition for systems with less than 2GB of RAM!
* Your swap partition should be at least equal to your RAM.

## Knowledge of Linux
* **DO NOT** all your usernames and password should be written **without** space.
* **DO NOT** upgrade anything in your box, ask in the thread **before** even thinking about it.
* **DO NOT** try to reconfigure packages using other tutorials or yourself.
* **TO UPGRADE** your system, please use **MySB_UpgradeSystem** command. _(This command is comparable to an APT update + APT upgrade)_
	
## OVH servers	_(OVH, KimSufi, SoYouStart)_
* Use the **default distribution kernel**. In your OVH manager interface, when you start the installation process, choose **Custom install**, and **Use of kernel distribution**.

* You can monitor your server, simply specify it during MySB installation. **BUT** I still advice to **disable** this service in the OVH interface. If you allow monitoring with MySB, the IPs of your provider will be **added** to the whitelist globally (PeerGuardian, Fail2Ban, IPTables), and those addresses will **not be filtered**. The system works on SoYouStart servers. But has **not been verified** on others OVH servers like KimSufi !

* If you leave the monitoring enable in the OVH interface **AND** you do not activated it during installation of MySB, your server may be **rebooted in rescue mode** by the OVH staff... If you want use the monitoring, you **must** first disable it **BEFORE** start the MySB installation. You can reactivate it **AFTER** the END of installation. You can also disable the Real Time Monitoring (RTM), read this page. [Real Time Monitoring (RTM)](http://www.torrent-invites.com/showthread.php?t=39022)

====
## Changelog

Take a look at [Changelog.md](https://github.com/toulousain79/MySB/blob/v3.2/Changelog.md), it's all there.

## License

Copyright (c) 2013 toulousain79
--> Licensed under the MIT License: http://choosealicense.com/licenses/mit/

====
## [WiKi](https://github.com/toulousain79/MySB/wiki)
### Installation / Upgrade / Uninstall
* [Installation](https://github.com/toulousain79/MySB/wiki/Installation)
* [Upgrade](https://github.com/toulousain79/MySB/wiki/Upgrade)
* [Uninstall](https://github.com/toulousain79/MySB/wiki/Uninstall)

### Commands and scripts
* [Commands](https://github.com/toulousain79/MySB/wiki/Commands)

### Portal
* [Screenshots](https://github.com/toulousain79/MySB/wiki/%5BPortal%5D-Screenshots)
* [Users rights](https://github.com/toulousain79/MySB/wiki/%5BPortal%5D-Users-rights)

### Help
* [Cakebox Light](https://github.com/toulousain79/MySB/wiki/%5BHelp%5D-Cakebox-Light)
* [Plex Media Server](https://github.com/toulousain79/MySB/wiki/%5BHelp%5D-Plex-Media-Server)
* [FAQ](https://github.com/toulousain79/MySB/wiki/%5BHelp%5D-FAQ)

### More
* [ToDo & Ideas](https://github.com/toulousain79/MySB/wiki/%5BMore%5D-ToDo-&-Ideas)
* [Sources, inspiration and tools](https://github.com/toulousain79/MySB/wiki/%5BMore%5D-Sources-and-Tools)
