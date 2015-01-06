	Version v1.2 (main branch)
		2014/12/24
			- Used of SQLite instead of flat file (more convenient)
			- Add Wolf CMS as portal (more convenient), manage blocklists, DNScrypt, trackers,...
			- NginX, add PageSpeed functionnality
			- NginX, change url access to short url (ruTorrent, Seedbox-Manager, Cakebox)
			- DNScrypt-proxy v1.4.2
			- Possibility to allow access for dynamic IP addresses
			- Some modifications
			- Renew all certificates using SHA256 instead of SHA1

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