# Changelog

## v6.0 - 2019/06/29 _(start at: 2019/01/26)_

- NextCloud v16.0.1
- rTorrent v0.9.8 _(6154d16)_
- LibTorrent v0.13.8 _(6154d16)_
- ruTorrent v3.9 _(ec8d8f1)_
- PHP v7.1 _(Sury)_
- NetData v1.15.0
- Certbot-auto
  - rollback to v0.28.0 _(certbot Debian package)_
  - increase in the number of checks
- GeoIPupdate latest
- Portal
  - page referer bug
  - users: correction of the display of available space
  - users: correction of manual quota capture by user
- [Blocklists](https://mysb.gitbook.io/doc/mysb-en-detail/les-listes-noires#gestion-des-listes-via-le-portail)
  - standardized management _(only one list for PeerGuardian and rTorrent)_
  - update lists _(add & remove some)_
  - add countries
  - #53 PeerGuardian, manual addition of lists
  - Update blocking lists every 6 hours
- Shellcheck code errors correction
- CI check review
- Bugs fix
  - add system alias for all users
  - add quota modules to /etc/modules
  - #68 force public DNS on install
  - #67 locales
  - #62 LetsEncrypt script code review
  - #61 SSH sudo user
  - #59 disable TSO/GSO for Plex
  - #54 Bugs
  - #46 SystemD
  - #63 Portal bugs
- #61 SSH code review
  - possiblity for main user to change some params
  - add main user to sudo group
- MySQL templates conversion to MariaDB
- NextCloud restore export OC_PASS for --password-from-env parameter
- Remove Python packages update from MySB_UpgradeSystem
- remove Git LFS
- OpenVPN, block access to any other DNS
- #78 Cron jobs check
- #37 rTorrent
  - restore UDP connections
  - SSL config review
  - Add [downloads recycling](https://mysb.gitbook.io/doc/configuration/options-systemes#recyclage-des-telechargements) _(simple copy, hard link)_
  - Add [tracker type filtering](https://mysb.gitbook.io/doc/configuration/options-systemes#trackers-autorises) _(private only or public & private)_
  - Add [announcers filtering](https://mysb.gitbook.io/doc/configuration/options-systemes#auto-blocks-annonceurs) _(IPv6, blocklists)_
  - .rtorrent_inserted_new.sh _(before torrent is started)_
    - check of tracker type _(private or public)_
    - downloads recycling
    - add log file
    - disable all IPv6 announcers from torrent files _(IPv6 are banned from MySB)_
    - prioritizes announcers in HTTPs
    - force for HTTPs possibilities for HTTP announcers
    - download recycling
  - .rtorrent_finished.sh
    - rename .rTorrent.bsh to rTorrent_finished.sh
    - deleting file movement
    - add log file
    - remove torrent info from database
  - rTorrent_erased.sh _(when torrent is erased)_
    - remove torrent info from database

## v5.4 - 2019/01/14 _(start at: 2018/09/07)_

- Tautulli latest _(auto)_
- PlexMedia latest _(auto)_
- Docker-Compose latest _(auto)_
- Composer latest _(auto)_
- Shellcheck stable _(auto)_
- Minisign v0.8.3
- NextCloud v14.0.4 _(prepare for v15)_
- GeoIPupdate v3.1.1
- LibSmbClient v1.0.0
- Certbot-auto script v0.29.1
- Webmin, restore install via sources list
- Portal
  - Medoo Framework v1.6.1
- ruTorrent, get all labels from ruTorrent GitHub
- Replace standards DNS from Google to Quad9
- Add continuous integration checks for GitLab
- Add pipeline status badge

## v5.3 - 2018/09/07 _(start at: 2018/03/25)_

- DNScrypt-proxy, review resolvers list
- Let's Encrypt, review renew method
- Systemctl, review services management
- Migration from Jessie to Stretch
- Upgrade PHP5 to PHP7
- Replace MySQL with MariaDB
- Use of MySQL tempo for sending some mails
- NextCloud v13.0.6
- Composer v1.7.2
- Tautulli v2.1.18
- PlexMedia v1.14.1.5488
- Certbot-auto script v0.26.1
- Docker-Compose v1.22.0
- GeoIPupdate v3.1.0
- NextCloud, remove auto cleanup files
- MySB_UpgradeSystem, add cron job every week
- GetTrackersCert.bsh, review certificates check and bug fix
- Fail2Ban, review of actions
- rTorrent, review init script
- rTorrent, review rtorrent.rc config
- ruTorrent, Diskspace plugin, dynamic calculation of remaining space set at 10% _(conf.php)_
- SourcesList, review apt-mirror management
- Tweaks, remove old kernels
- DNScrypt-proxy, review init script
- Quota, add warning check
- Webmin, remove Webmin sources list
- CPAN, add modules
- Adding docker to prepare future MySB's versions
- Add [Dry](https://moncho.github.io/dry/) tool for Docker
- Add new binary MySB_UpdateTools used for update some tools _(Plex, Tautulli, Docker tools, ...)_
- Add function to get and add all actives trackers in DB for main user
- Portal
  - Medoo Framework v1.5.7
  - Add dedicated menu for renting options
  - Add system option for activate renting menu
- Quota
  - Bug fix for calculate available space
  - Add possibility to choice quota per users
  - Add possibility to choice simple management for 'normal' users _(total space / quantity of 'normal' users)_ _('plex' users or not included)_
- Rental
  - Add possibility to add aditional prices for options

## v5.2 - 2018/03/24 _(start at: 2018/01/18)_

- NextCloud v13.0.1
- Minisign v0.8.2
- Composer v1.6.3
- RKHunter v1.4.6
- Certbot-auto script v0.22.2
- PlexMedia v1.13.0.5023
- [Tautulli](https://github.com/Tautulli/Tautulli) v2.1.9, PlexPy is renamed
- PlexMedia, add deb file for x86_64 and increased frequency of update verification
- PlexMedia & Tautulli, daily check for new version and install it if needed
- Use of Git LFS with a second Git repo
- Remove rTorrent incomplete directory
- Remove Debian Wheezy possibilities
- Add statistics question
- Add Plex Media Server link configuration page
- MySB_SecurityRules, simple override protection execution management
- Cron jobs, check services review
- Monitoring, update OVH server's IP
- MySQL config review
- Portal
  - Medoo Framework v1.5.5

## v5.1 - 2018/01/15

- OpenVPN Admin for Webmin v3.1
- Maxmind GeoIP v2.5.0
- Plex Media Server v1.10.1.4602
- Composer v1.6.2
- Minisign v0.7.18
- LibSodium v1.0.16
- Certbot-auto script v0.20.0
- NextCloud v12.0.4
- Pagespeed, increase TMPFS cache to 128Mo
- Let's Encrypt, changing the certificate renewal method
- MySB_SecurityRules, minor changes
- MySB_CreateUser, minor changes
- SourcesList, add Apt tweaks and replace second DotDeb repo
- Backup-Manager, minor changes
- Monitoring, add provider Hetzner
- Monitoring, add a new Digicube network
- funcs_iptables, minor changes
- SeedboxManager, restore rTorrent restart function
- DNScrypt, minor changes
- NextCloud, password policy disabled
- Tweaks, force CPU governor to "performance" _(thx xavier ;-))_
- Removing Wget, not needed...
- ruTorrent, use of ZIP file instead of GIT
- rTorrent method review
  - .rtorrent.rc
    - disabling incomplete folder, files are no longer moved
    - conservation of *.torrent files in "torrents/Label" directories
    - improved management of Watch records to assign a good label
  - .rTorrent.bsh
    - deleting file movement
  - synchro.sh
    - minor changes
  - init script
    - minor changes
- PHP install review _(modules)_
- Portal
  - Medoo Framework v1.5.4
- ruTorrent
  - add theme club-QuickBox
  - add theme Material Design
  - remove plugin DiskLog
- Add Sivel Speedtest-cli script v1.0.7, Command line interface for testing internet bandwidth using speedtest.net

## v5.0 - 2017/10/18

- PlexPy v1.4.25
- NextCloud v12.0.3
- LibSodium v1.0.15
- Composer v1.5.2
- Certbot-auto script v0.19.0
- Minisign v0.7.11
- Migration from Wheezy to Jessie
- Watchdog for Plex Media Server
- Correct user's rTorrent service watchdog

## v4.2 - 2017/08/26

- NextCloud v12.0.2
- Composer v1.5.1
- Plowshare v2.1.7
- PlexPy v1.4.22
- Certbot-auto script v0.17.0
- Downgrade XMLRPC-C to v1.43.6 _(stable)_

## v4.1 - 2017/07/23

- ruTorrent v3.8
- PlexPy v1.4.21
- Libsodium v1.0.13
- Minisign v0.7.8
- RKHunter v1.4.4
- Certbot-auto script v0.16.0
- SourcesList, deletion of the restriction by Country
- PlexPy, minor changes

## v4.0 - 2017/06/30

- Composer v1.4.2
- NodeJS v0.12.18
- XMLRPC-C Advanced v1.49.0
- DNScrypt-proxy v1.9.5
- Wget v1.19.1
- Certbot-auto script v0.15.0
- ruTorrent Plugin InstantSearch v1.0
- Libsodium v1.0.12
- Minisign v0.7.5
- Seedbox-Manager v3.0.1
- Add PlexPy v1.4.20
- Add Shell In a Box
- ruTorrent Plugin Diskspace, add quota check
- DNScrypt-proxy, new init script _(greatly inspired by DNSCrypt-Loader)_
  - new command lines and interactive mode _(**service dnscrypt-proxy help**)_
  - config option, _resolvers select filters_
    - select IP version _(but forced to IPv4)_
    - selection of resolvers that do not keep logs of queries _(No Logs)_
    - selection of resolvers that accept the DNSsec protocol
    - selection of resolvers that accept the NameCoin protocol
  - update option
    - download online 'dnscrypt-resolvers.csv'
    - minisign check of 'dnscrypt-resolvers.csv'
    - verify certificate validity of filtred resolvers
    - speed test of filtred resolvers
  - speed-test option, _allows to start DNScrypt with the fastest resolvers_
- Replacing ownCloud v9.1.3 with NextCloud v12.0.0
- Add Maxmind GeoIP automatic update script v2.4.0
- Let's Encrypt _(certbot)_, certificate checks end date review for scheduled renew
- Use of Backup-Manager for automatics update _(For now only used for MySB upgrades)_
- Remove MySB_RefreshMe bin
- Remove DNScrypt.bsh script
- Remove UpdateGeoIP.bsh script
- Let's Encrypt, schedules the next task following a certificate renewal
- rTorrent synchro script, compare local and remote size before
- Portal
  - Medoo Framework v1.4.5
  - Add DNScrypt-proxy configuration
  - Added the ability to create a designated account for Plex. Thus the disk quota will not be imputed to other users.

## v3.5 - 2017/01/11

- ownCloud v9.1.3
- Plowshare v2.1.6
- Composer v1.2.4
- NodeJS v0.12.17
- Let's Encrypt v0.9.2
- Wget v1.18
- Change some repositories
- ruTorrent Plugin Filemanager v0.09, repository change
- ruTorrent Plugin Fileshare v1.0, repository change
- ruTorrent Plugin Fileupload v0.02, repository change
- ruTorrent Plugin Mediastream v0.01, repository change
- ownCloud, editing the configuration file
- DotDeb, renewing repository GPG key
- Fix NginX upgrade bug
- Fix DNScrypt-proxy bug
- Get/Renew tracker SSL certificate
- Creating a new SSL certificate
- Improvement of the rental system
- MySB_DeleteUser, correcting bugs
- Monitoring OVH, correcting bugs
- Pagespeed, reduce TMPFS cache to 32Mo
- PHP5, limit TMPFS cache to 32Mo
- MySQL, limit TMPFS cache to 32Mo
- Change apps directories
  - Cakebox-Light: **web/apps/cb**
  - LoadAvg: **web/apps/la**
  - ownCloud: **web/apps/oc**
  - ruTorrent: **web/apps/ru**
  - Seedbox-Manager: **web/apps/sm**
- Portal
  - Medoo Framework v1.1.3
  - jQuery v1.12.4

## v3.4 - 2016/09/09

- Update provider monitoring for OVH _(v3.3 and v3.4)_
- MySQL, minor changes _(v3.3 and v3.4)_
- Disable totaly IPv6 with grub _(v3.3 and v3.4)_
- Install, improving the detection of the public IP address
- Monitoring, minor changes
- inc/funcs_sql, minor changes
- Pagespeed, reduce TMPFS cache to 64Mo
- PHP5, limit TMPFS cache to 64Mo
- Detect real IP address during installation
- PlexMediaServer, new APT Key
- User cron jobs, minor changes
- Let's Encrypt, scheduled renew certificate bug fix
- Add survey confirmation before continue installation
- Add a simple quota management
- Change script of synchronization _(use of SQlite DB)_
- Cakebox-Light, bug fix of playback _(Cakebox not streaming #12)__
  - Disable DivX Web Player _(HTTPS not supported)_
  - Tested with Firefox 45 _(32 & 64 bits)_ + HTML 5 Web Player + MP4
  - Tested with Firefox 45 _(32bits)_ + VLC Web Player + MP4,AVI,MKV
  - Tested with Chrome 49 + HTML 5 Web Player + MP4
  - Tested with IE 11 + HTML 5 Web Player + MP4
  - Tested with Opera 36 + HTML 5 Web Player + MP4
  - Tested with Opera 36 + VLC Web Player + MP4,AVI,MKV
- DNScrypt-proxy v1.7.0
- Cakebox-Light v1.8.6
- ownCloud v9.1.0
- Seedbox-Manager v2.5.0
- Libsodium v1.0.11
- NodeJS v0.12.14
- Composer v1.2.0
- Plowshare v2.1.5
- XMLRPC-C Stable v1.43.03
- Let's Encrypt v0.8.1
- Portal
  - Wolf CMS v0.8.3.1
  - Noty v2.3.8
  - Modernizr v2.8.3
  - jQuery v1.12.2
  - Medoo Framework v1.1.2
  - Tracker Add, minor changes
  - Add view of files queue to synchro
  - Add synchronization page _(manage files in queue, manual synchronization, ...)_
  - Possibility LogWatch activation
- ruTorrent Plugins
  - NFO v3.6 _(AceP1983)_
  - Check SFV v3.6 _(AceP1983)_
  - Disk Log v3.6 _(AceP1983)_
  - Speed Graph v3.6 _(AceP1983)_
  - Show IP v3.6 _(AceP1983)_

## v3.3 - 2016/03/03

- DNScrypt-proxy v1.6.1 _(v3.3)_
- RKHunter v1.4.2 _(v3.3)_
- Use of Let's Encrypt _(v3.3)_
- Medoo Framework v1.0.2 _(v3.2)_
- TrackerAdd.php, minor changes for adding new one _(v3.3)_
- OpenVPN.php, minor changes on OpenVPN page _(v3.2 and v3.3)_
- OptionsMySB.php, minor changes _(v3.2 and v3.3)_
- OptionsMySB.php, add categories synchronize mode _(v3.3)_
- Personnal scripts template review _(v3.2 and v3.3)_
- Personnal scripts, add synchronize by FTPs and RSYNC _(v3.3)_
- DownloadAll, correcting little error _(v3.2 and v3.3)_
- ownCloud.bsh, review of the scan process _(v3.2 and v3.3)_
- Disable totaly IPv6 _(v3.2 and v3.3)_
- ownCloud, correcting upgrade process _(v3.2 and v3.3)_
- SourcesList, minor changes _(v3.3)_
- Upgrade OpenSSH Server with Backports _(v3.3)_
- PHP, increase performance with TMPFS _(v3.3)_
- Turning off filesystem access times _(v3.3)_
- Renewing certificates _(v3.3)_

## v3.2 - 2016/01/31

- funcs_iptables, small corrections _(v3.1 and v3.2)_
- funcs, small corrections _(v3.1 and v3.2)_
- LogServer.bsh, rewriting the script & reduce some HTML log files _(iptables.html, pgld.html, pglcmd.html)_ _(v3.1 and v3.2)_
- ownCloud, add ignoreregex for Fail2Ban nginx-badbots filter _(and v3.2)_
- VSFTP, Desactivate logging of uploads & downloads _(v3.1 and v3.2)_
- RKHunter, small corrections _(v3.1 and v3.2)_
- Sources list manage by local mirrors with apt-mirror _(PeerGuardian, Plex, Webmin)_ _(v3.2)_
- Improved functions calls _(loading unused functions)_ _(v3.2)_
- Updating resolvers list for DNScrypt _(v3.2)_
- Add possibility to use personal scripts for each finished download _(ex: rsync to your NAS directly)_ _(v3.2)_
- MySB portal, add possibility to create sub-directories for rTorrent finished files _(v3.2)_
- MySB portal, add possibility to create cronjob for user _(ex: rsync to your NAS on planified hour)_ _(v3.2)_
- NodeJS v0.12.9 _(v3.2)_
- ownCloud v8.2.2 _(v3.2)_
- PHP v5.6 _(v3.2)_
- Medoo Framework v1.0.1 _(v3.2)_

## v3.1 - 2015/11/17

- DNScrypt-proxy, bug fix in init script _(v3.0 and v3.1)_
- Bind, bug fix
- NginX, bug fix
- MySQL, bug fix
- OpenVPN, config files generation bux fixes
- LogWatch, some modifications
- ownCloud, some modifications
- Monitoring, add DigiCube possibility
- Sources list, add a second DotDeb repository
- Cron job, bug fix
- Portal, jQuery v1.11.3
- Portal, Modernizr v1.7
- Portal, Noty v2.3.7
- Portal, OpenVPN config files geneation
- Portal, user informations links
- ruTorrent, upload via GUI
- Seedbox-Manager, bug fix for config files generation
- Fail2Ban, bug fix
- Bug fixes

## v3.0 - 2015/10/24

- MySB portal, correcting Cakebox link in User Infos page _(v2.1 and v3.0)_
- MySB portal, add some new actions _(v3.0)_
  - OpenVPN, possibility to change protocol
  - Translation, language select French and English
  - PeerGuardian, mail report management
  - IP restriction, switch possibility
  - DNScrypt-proxy, switch possibility
- Seedbox-Manager, now keep your config in administration page _(v2.1 and v3.0)_
- Nginx, some fixes _(v3.0)_
- NFS, disabling IPv6 support _(v3.0)_
- Samba, change some settings _(v3.0)_
- MySB_UpgradeSystem, minor change to force update of sources before an upgrade _(v2.1 and v3.0)_
- DynamicAddressResolver.bsh, corrocting bugs _(v2.1 and v3.0)_
- rTorrent v0.9.6 _(v3.0)_
- libTorrent v0.13.6 _(v3.0)_
- DNScrypt-proxy v1.6 _(v3.0)_
- NodeJS v0.12.7 _(v3.0)_
- XMLRPC v1.42.0 _(v3.0)_
- Libsodium v1.04 _(v3.0)_
- ownCloud v8.2.0 _(v3.0)_
- Adding Zoho Mail support _(v3.0, to be confirmed by Zoho users)_
- Disabling ruTorrent Plugin FileUpload
- Replace primary SQLite database by MySQL
- Bug fixes

## v2.1 - 2015/03/14

- Correcting MySB logrotate bugs _(v2.0 and v2.1)_
- Correcting Postfix configuration _(v2.0 and v2.1)_
- MySB_SecurityRules, correcting 'ip_forward' for OpenVPN _(v2.0 and v2.1)_
- Seedbox-Manager, correction of installation errors, generation of configuration files _(FTP & Trandroid)_ and minor changes. _(v2.0 and v2.1)_
- Bind, minor change _(v2.1)_
- ruTorrent v3.7, change location from old SVN to GitHub _(v2.1)_
- ruTorrent Plugins, minor change _(location)_ _(v2.1)_
- PlowShare 4, change install method. _(v2.0 and v2.1)_
- NTPdate, correcting ntpdate process _(v2.0 and v2.1)_
- Create certificates again _(wrong time period and go back to 1024bits unstead 2048bits)_ _(only v2.1)_

## v2.0 - 2015/02/14

- Used of SQLite instead of flat file _(more convenient)_
- Add Wolf CMS as portal _(more convenient)_, manage blocklists, trackers, users...
- NginX, add PageSpeed functionnality
- DNScrypt-proxy v1.4.3, add use of multi provider instead of one. By default, all provider that accept DNSsec and No Logs are activated.
- rTorrent v0.9.4 & libTorrent v0.13.4 _(older versions are still present, it will soon be possible to switch from one version to another via the portal)_
- BIND, block all inactivated trackers, add DNSsec
- OpenVPN, change clients pushed DNS and add TAP mode for DLNA with Plex Media
- Strengthening IP access policy, all access to the server are fully subject to the restriction by IP _(can be disabled)_
- Possibility for all users to allowing access by dynamic IP addresses
- Renew all certificates using SHA256 2048bits instead of SHA1 1024bits
- Add ruTorrent Plugins _(Mobile and Pause WebUI)_, some corrections
- Allow monitoring _(ping)_ from some providers _(OVH and ONLINE, check the warnings section in the README)_
- Change Cakebox access by 'alias' instead of 'vhost'
- Add LoadAvg, free server analytics and monitoring
- Correcting some issues with OVH servers _(OVH kernel, check the warnings section in the README)_
- Some modifications

## v1.1 - 2014/10/26

- "install/PeerGuardian", minor change
- "scripts/FirewallAndSecurity.sh", minor change
- Correcting PlexMedia ports management
- Correcting SSL vulnerability _(poodle)_ for Nginx and Postfix
- Changing the management of Logs _(web)_
- Adding DNScrypt with Bind9 caching
- Webmin, minor change
- Minor change for security _(DDOS SYN flood protect, rkhunter)_
- System tweaks
- Adding simple system monitoring tools _(update-notifier-common, debian-goodies)_
- Minor change in ruTorrent
- Correcting bug about sending confirmation email _(purge of heirloom-mailx)_ and unreachable pages /MySB/* _(Sorry for the mistake)_

## v1.0 - 2014/05/04

- Use of repository list _(SVN, GitHub, files)_
- rTorrent v0.9.4 and libTorrent v0.13.4
- Use of SVN for Xmlrpc-c
- Adapted script specially for Debian Wheezy
- Bug fix
- Remove completly "Deluge"
- Remove completly "Jailkit"
- Replace Apache2 by Nginx
- Add Iptables rules
