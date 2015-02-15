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