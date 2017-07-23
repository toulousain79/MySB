	Version v4.1
		2016/07/23
			- ruTorrent v3.8
			- PlexPy v1.4.21
			- Libsodium v1.0.13
			- Minisign v0.7.8
			- RKHunter v1.4.4
			- Certbot-auto script v0.16.0
			- SourcesList, deletion of the restriction by Country
			- PlexPy, minor changes
	
	Version v4.0
		2016/06/30
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
			- DNScrypt-proxy, new init script (greatly inspired by DNSCrypt-Loader)
				* new command lines and interactive mode (**service dnscrypt-proxy help**)
				* config option, _resolvers select filters_
					+ select IP version (but forced to IPv4)
					+ selection of resolvers that do not keep logs of queries (No Logs)
					+ selection of resolvers that accept the DNSsec protocol
					+ selection of resolvers that accept the NameCoin protocol
				* update option
					+ download online 'dnscrypt-resolvers.csv'
					+ minisign check of 'dnscrypt-resolvers.csv'
					+ verify certificate validity of filtred resolvers
					+ speed test of filtred resolvers
				* speed-test option, _allows to start DNScrypt with the fastest resolvers_
			- Replacing ownCloud v9.1.3 with NextCloud v12.0.0
			- Add Maxmind GeoIP automatic update script v2.4.0
			- Let's Encrypt (certbot), certificate checks end date review for scheduled renew
			- Use of Backup-Manager for automatics update (For now only used for MySB upgrades)
			- Remove MySB_RefreshMe bin
			- Remove DNScrypt.bsh script
			- Remove UpdateGeoIP.bsh script
			- Let's Encrypt, schedules the next task following a certificate renewal
			- rTorrent synchro script, compare local and remote size before
			- Portal
				* Medoo Framework v1.4.5
				* Add DNScrypt-proxy configuration
				* Added the ability to create a designated account for Plex. Thus the disk quota will not be imputed to other users.

	Version v3.5
		2016/01/11
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
				* Cakebox-Light:	web/apps/cb
				* LoadAvg:			web/apps/la
				* ownCloud:			web/apps/oc
				* ruTorrent:		web/apps/ru
				* Seedbox-Manager:	web/apps/sm
			- Portal
				* Medoo Framework v1.1.3
				* jQuery v1.12.4

	Version v3.4
		2016/09/09
			- Update provider monitoring for OVH (v3.3 and v3.4)
			- MySQL, minor changes (v3.3 and v3.4)
			- Disable totaly IPv6 with grub (v3.3 and v3.4)
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
			- Change script of synchronization (use of SQlite DB)
			- Cakebox-Light, bug fix of playback _(Cakebox not streaming #12)_
				* Disable DivX Web Player (HTTPS not supported)
				* Tested with Firefox 45 (32 & 64 bits) + HTML 5 Web Player + MP4
				* Tested with Firefox 45 (32bits) + VLC Web Player + MP4,AVI,MKV
				* Tested with Chrome 49 + HTML 5 Web Player + MP4
				* Tested with IE 11 + HTML 5 Web Player + MP4
				* Tested with Opera 36 + HTML 5 Web Player + MP4
				* Tested with Opera 36 + VLC Web Player + MP4,AVI,MKV
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
				* Wolf CMS v0.8.3.1
				* Noty v2.3.8
				* Modernizr v2.8.3
				* jQuery v1.12.2
				* Medoo Framework v1.1.2
				* Tracker Add, minor changes
				* Add view of files queue to synchro
				* Add synchronization page (manage files in queue, manual synchronization, ...)
				* Possibility LogWatch activation
			- ruTorrent Plugins
				* NFO v3.6 (AceP1983)
				* Check SFV v3.6 (AceP1983)
				* Disk Log v3.6 (AceP1983)
				* Speed Graph v3.6 (AceP1983)
				* Show IP v3.6 (AceP1983)

	Version v3.3
		2016/03/03
			- DNScrypt-proxy v1.6.1 (v3.3)
			- RKHunter v1.4.2 (v3.3)
			- Use of Let's Encrypt (v3.3)
			- Medoo Framework v1.0.2 (v3.2)
			- TrackerAdd.php, minor changes for adding new one (v3.3)
			- OpenVPN.php, minor changes on OpenVPN page (v3.2 and v3.3)
			- OptionsMySB.php, minor changes (v3.2 and v3.3)
			- OptionsMySB.php, add categories synchronize mode (v3.3)
			- Personnal scripts template review (v3.2 and v3.3)
			- Personnal scripts, add synchronize by FTPs and RSYNC (v3.3)
			- DownloadAll, correcting little error (v3.2 and v3.3)
			- ownCloud.bsh, review of the scan process (v3.2 and v3.3)
			- Disable totaly IPv6 (v3.2 and v3.3)
			- ownCloud, correcting upgrade process (v3.2 and v3.3)
			- SourcesList, minor changes (v3.3)
			- Upgrade OpenSSH Server with Backports (v3.3)
			- PHP, increase performance with TMPFS (v3.3)
			- Turning off filesystem access times (v3.3)
			- Renewing certificates (v3.3)

	Version v3.2
		2016/01/31
			- funcs_iptables, small corrections (v3.1 and v3.2)
			- funcs, small corrections (v3.1 and v3.2)
			- LogServer.bsh, rewriting the script & reduce some HTML log files (iptables.html, pgld.html, pglcmd.html) (v3.1 and v3.2)
			- ownCloud, add ignoreregex for Fail2Ban nginx-badbots filter (and v3.2)
			- VSFTP, Desactivate logging of uploads & downloads (v3.1 and v3.2)
			- RKHunter, small corrections (v3.1 and v3.2)
			- Sources list manage by local mirrors with apt-mirror (PeerGuardian, Plex, Webmin) (v3.2)
			- Improved functions calls (loading unused functions) (v3.2)
			- Updating resolvers list for DNScrypt (v3.2)
			- Add possibility to use personal scripts for each finished download (ex: rsync to your NAS directly) (v3.2)
			- MySB portal, add possibility to create sub-directories for rTorrent finished files (v3.2)
			- MySB portal, add possibility to create cronjob for user (ex: rsync to your NAS on planified hour) (v3.2)
			- NodeJS v0.12.9 (v3.2)
			- ownCloud v8.2.2 (v3.2)
			- PHP v5.6 (v3.2)
			- Medoo Framework v1.0.1 (v3.2)

	Version v3.1
		2015/11/17
			- DNScrypt-proxy, bug fix in init script (v3.0 and v3.1)
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

	Version v3.0
		2015/10/24
			- MySB portal, correcting Cakebox link in User Infos page (v2.1 and v3.0)
			- MySB portal, add some new actions (v3.0)
				* OpenVPN, possibility to change protocol
				* Translation, language select French and English
				* PeerGuardian, mail report management
				* IP restriction, switch possibility
				* DNScrypt-proxy, switch possibility
			- Seedbox-Manager, now keep your config in administration page (v2.1 and v3.0)
			- Nginx, some fixes (v3.0)
			- NFS, disabling IPv6 support (v3.0)
			- Samba, change some settings (v3.0)
			- MySB_UpgradeSystem, minor change to force update of sources before an upgrade (v2.1 and v3.0)
			- DynamicAddressResolver.bsh, corrocting bugs (v2.1 and v3.0)
			- rTorrent v0.9.6 (v3.0)
			- libTorrent v0.13.6 (v3.0)
			- DNScrypt-proxy v1.6 (v3.0)
			- NodeJS v0.12.7 (v3.0)
			- XMLRPC v1.42.0 (v3.0)
			- Libsodium v1.04 (v3.0)
			- ownCloud v8.2.0 (v3.0)
			- Adding Zoho Mail support (v3.0, to be confirmed by Zoho users)
			- Disabling ruTorrent Plugin FileUpload
			- Replace primary SQLite database by MySQL
			- Bug fixes

	Version v2.1
		2015/03/14
			- Correcting MySB logrotate bugs (v2.0 and v2.1)
			- Correcting Postfix configuration (v2.0 and v2.1)
			- MySB_SecurityRules, correcting 'ip_forward' for OpenVPN (v2.0 and v2.1)
			- Seedbox-Manager, correction of installation errors, generation of configuration files (FTP & Trandroid) and minor changes. (v2.0 and v2.1)
			- Bind, minor change (v2.1)
			- ruTorrent v3.7, change location from old SVN to GitHub (v2.1)
			- ruTorrent Plugins, minor change (location) (v2.1)
			- PlowShare 4, change install method. (v2.0 and v2.1)
			- NTPdate, correcting ntpdate process (v2.0 and v2.1)
			- Create certificates again (wrong time period and go back to 1024bits unstead 2048bits) (only v2.1)

	Version v2.0 (main branch)
		2015/02/14
			- Used of SQLite instead of flat file (more convenient)
			- Add Wolf CMS as portal (more convenient), manage blocklists, trackers, users...
			- NginX, add PageSpeed functionnality
			- DNScrypt-proxy v1.4.3, add use of multi provider instead of one. By default, all provider that accept DNSsec and No Logs are activated.
			- rTorrent v0.9.4 & libTorrent v0.13.4 (older versions are still present, it will soon be possible to switch from one version to another via the portal)
			- BIND, block all inactivated trackers, add DNSsec
			- OpenVPN, change clients pushed DNS and add TAP mode for DLNA with Plex Media
			- Strengthening IP access policy, all access to the server are fully subject to the restriction by IP (can be disabled)
			- Possibility for all users to allowing access by dynamic IP addresses
			- Renew all certificates using SHA256 2048bits instead of SHA1 1024bits
			- Add ruTorrent Plugins (Mobile and Pause WebUI), some corrections
			- Allow monitoring (ping) from some providers (OVH and ONLINE, check the warnings section in the README)
			- Change Cakebox access by 'alias' instead of 'vhost'
			- Add LoadAvg, free server analytics and monitoring
			- Correcting some issues with OVH servers (OVH kernel, check the warnings section in the README)
			- Some modifications

	Version v1.1
		2014/10/26
			- "install/PeerGuardian", minor change
			- "scripts/FirewallAndSecurity.sh", minor change
			- Correcting PlexMedia ports management
			- Correcting SSL vulnerability (poodle) for Nginx and Postfix
			- Changing the management of Logs (web)
			- Adding DNScrypt with Bind9 caching
			- Webmin, minor change
			- Minor change for security (DDOS SYN flood protect, rkhunter)
			- System tweaks
			- Adding simple system monitoring tools (update-notifier-common, debian-goodies)
			- Minor change in ruTorrent
			- Correcting bug about sending confirmation email (purge of heirloom-mailx) and unreachable pages /MySB/* (Sorry for the mistake)

	Version v1.0
		2014/05/04
			- Use of repository list (SVN, GitHub, files)
			- rTorrent v0.9.4 and libTorrent v0.13.4
			- Use of SVN for Xmlrpc-c
			- Adapted script specially for Debian Wheezy
			- Bug fix
			- Remove completly "Deluge"
			- Remove completly "Jailkit"
			- Replace Apache2 by Nginx
			- Add Iptables rules
