#### This script is not intended to solicit illegal actions! I can not be held responsible for the use that you could doing it! Thank you to reconsider the installation and use of MySB. I developed this tool only for pleasure and passion for my job.
#### You are not allowed to use MySB for resale as a service!!!
===

# MySB
MySB is a multi-user seedbox for dedicated server under Debian 7 (Wheezy) and could be renamed MySSB, My Secured SeedBox.
All of MySB's interest lies in security through block list management with PeerGuardian (or rTorrent) for incoming requests, as well as encrypting DNS queries with DNScrypt-proxy for outbound requests.
Tout l'intérêt de MySB réside dans la sécurité via la gestion de liste de blocage avec PeerGuardian (ou rTorrent) pour les requêtes entrantes, ainsi que le cryptage des requêtes DNS grâce à DNScrypt-proxy pour les requêtes sortantes.

* **Current version** _(stable)_: **v4.1**
* Next version _(dev)_: _----_

## All prerequisites listed below are MANDATORY!

* **Designed** for **dedicated server** only with **Debian Wheezy** _(**Ubuntu** is **not supported**)_
* You **must** have a **standard Debian kernel** ! If you can not install a **Debian kernel**, then MySB is **not for you**... _(**PVE kernel** are not **supported**)_
* Virtual Private Server (VPS) are **not compatible** ! _(refer to the previous point)_
* You must have a **clean dedicated server**.
* Your main network interface must be configured **staticly**, not DHCP _(eg: Online servers)_
* Encourage me by **following my project** ;-)

## Features & Services
* **rTorrent** _(Rakshasa) v0.9.2 & v0.9.6 with SSL_
* **libTorrrent** _(Rakshasa) v0.13.2 & v0.13.6_
* **ruTorrent + official plugins**
* **NginX** _(SSL, specific port and some customizations)_
* **PHP5-FPM** _(php5-apcu, FastCGI, SSL)_
* **SFTP** _with Chroot_
* **VSFTPd** _(FTP over TLS)_
* **Postfix** with _(or without)_ SMTP authentication _(Gmail, Free, Ovh, Yahoo and Zoho)_
* **Seedbox-Manager** _(optionnal)_
* **LoadAvg** _(server analytics and monitoring)_
* **NextCloud** _(optionnal but **recommended**)_
* **OpenVPN** _(optionnal); Multi TUN/TAP configuration, with or without redirection of traffic. Add AES-NI support._
* **CakeBox-Light** _(optionnal)_
* **PlexMedia Server** _(optionnal, requires additional manual configuration)_
* **PlexPy** _(if Plexmedia is installed)_
* **Shell In A Box**
* **Webmin** _(optionnal)_
* **Samba share** for each users _(VPN access)_
* **NFS share** for each users _(VPN access)_
* **PeerGuardian** _(optionnal but **recommended**)_
* **DNScrypt-proxy** with Bind9 as DNS caching _(optionnal but **recommended**)_
* **Let's Encrypt** _(obtaining a free signed certificate for MySB portal access)_
* **Fail2ban** _(optionnal but **recommended**)_
* **RKHunter**
* **MySB portal** (_ability to manage trackers, block lists, users, rTorrent and more)_
* **Special features of MySB**
  + Auto retrieve SSL certificates for all trackers _(if certificate is available)_
  + Block all possibilities to use any listed trackers that was not activated in MySB portal
  + BlockList usage _(optionnal) (PeerGuardian or rTorrent, if PeerGuardian failed to start, rTorrent will use its own blocklists)_
  + Monitoring service available for some providers _(OVH, Online and Digicube)_
  + Access restricted by IP for all server access _(can be disabled)_
  + Dynamic IP Management for IP restriction _(DynDNS, No-IP, ...)_
  + Language select _(english or french)_
  + Using scripts after a download is complete _(direct or scheduled synchronization, via FTP or rsync)_
  + Prioritize secure connections via SSL for rTorrent _(depends on trackers)_
  + Automatic creation of several 'Watch' directory _(management via the MySB portal)_
  + Access to 'Watch' folders via FTP, Samba (OpenVPN) or NextCloud (web interface or client application)
  + Encrypting outbound DNS queries with DNScrypt-proxy

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

====
# Warnings
## Knowledge of Linux
* **ALL** your usernames and password should be written **without** space.
* **DO NOT** change anything in your server, if you have a doubt ask your question before.
* **DO NOT** try to reconfigure packages using other tutorials or yourself. This could cause problems when you update MySB.
* **TO UPGRADE** your system, please use **MySB_UpgradeSystem** command. _(This command is comparable to apt-get update + apt-get upgrade)_

## OVH servers	_(OVH, KimSufi, SoYouStart)_
* Use the **default distribution kernel**. In your OVH manager interface, when you start the installation process, choose **Custom install**, and **Use of kernel distribution**.

* You can monitor your server, just specify it when installing MySB. **BUT** you must **disable** service in the OVH interface **before** the MySB installation. If you enable monitoring with MySB, the IP addresses of your provider will be **added** to the global whitelist (PeerGuardian, Fail2Ban, IPTables) and those addresses **will not be filtered **.

* If you leave the monitoring enable in the OVH interface **AND** you do not activated it during installation of MySB, your server may be **rebooted in rescue mode** by the OVH staff... If you want use the monitoring, you **must** first disable it **BEFORE** start the MySB installation. You can reactivate it **AFTER** the END of installation. You can also disable the Real Time Monitoring (RTM), read this page. [Real Time Monitoring (RTM)](http://www.torrent-invites.com/showthread.php?t=39022)

====
## Changelog

Take a look at [Changelog.md](https://github.com/toulousain79/MySB/blob/v4.1/Changelog.md), it's all there.

## License

Copyright (c) 2013 toulousain79
--> Licensed under the MIT License: http://choosealicense.com/licenses/mit/

====
## [WiKi](https://github.com/toulousain79/MySB/wiki)
### Installation / Upgrade / Uninstall
* [Installation](https://github.com/toulousain79/MySB/wiki/%5BInstall%5D-Installation)
* [Upgrade](https://github.com/toulousain79/MySB/wiki/%5BInstall%5D-Upgrade)
* [Uninstall](https://github.com/toulousain79/MySB/wiki/%5BInstall%5D-Uninstall)
* [Screenshots](https://github.com/toulousain79/MySB/wiki/%5BInstall%5D-Screenshots)

### Commands and scripts
* [Commands](https://github.com/toulousain79/MySB/wiki/%5BCommands%5D-Commands-&-scripts)

### MySB Portal
* [Screenshots](https://github.com/toulousain79/MySB/wiki/%5BPortal%5D-Screenshots)
* [Users rights](https://github.com/toulousain79/MySB/wiki/%5BPortal%5D-Users-rights)

### Help
* [Blocklists](https://github.com/toulousain79/MySB/wiki/%5BHelp%5D-Blocklists)
* [Cakebox Light](https://github.com/toulousain79/MySB/wiki/%5BHelp%5D-Cakebox-Light)
* [OpenVPN](https://github.com/toulousain79/MySB/wiki/%5BHelp%5D-OpenVPN)
* [NextCloud](https://github.com/toulousain79/MySB/wiki/%5BHelp%5D-NextCloud)
* [Plex Media Server](https://github.com/toulousain79/MySB/wiki/%5BHelp%5D-Plex-Media-Server)
* [DNScrypt-proxy](https://github.com/toulousain79/MySB/wiki/%5BHelp%5D-Renew-DNScrypt-Resolvers)

### More
* [ToDo & Ideas](https://github.com/toulousain79/MySB/wiki/%5BMore%5D-ToDo-&-Ideas)
* [Tools, Sources & HowTo](https://github.com/toulousain79/MySB/wiki/%5BMore%5D-Tools,-Sources-and-HowTo)
