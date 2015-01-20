	Version v2.0 (main branch)
		2014/12/24
			- Used of SQLite instead of flat file (more convenient)
			- Add Wolf CMS as portal (more convenient), manage blocklists, trackers, users...
			- NginX, add PageSpeed functionnality
			- DNScrypt-proxy v1.4.3, add use of multi provider instead of one. By default, all provider that accept DNSsec and No Logs are activated.
			- BIND, block all inactivated trackers, add DNSsec
			- OpenVPN, change clients pushed DNS
			- Strengthening IP access policy, all access to the server are fully subject to the restriction by IP 
			- Possibility for all users to allowing access by dynamic IP addresses
			- Renew all certificates using SHA256 2048bits instead of SHA1 1024bits
			- Add ruTorrent Plugins (Mobile and Pause WebUI)
			- Allow monitoring (ping) from some providers
			- Change Cakebox access by 'alias' instead of 'vhost'
			- Add LoadAvg, free server analytics and monitoring
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