#!/bin/bash
# ----------------------------------
#  __/\\\\____________/\\\\___________________/\\\\\\\\\\\____/\\\\\\\\\\\\\___
#   _\/\\\\\\________/\\\\\\_________________/\\\/////////\\\_\/\\\/////////\\\_
#    _\/\\\//\\\____/\\\//\\\____/\\\__/\\\__\//\\\______\///__\/\\\_______\/\\\_
#     _\/\\\\///\\\/\\\/_\/\\\___\//\\\/\\\____\////\\\_________\/\\\\\\\\\\\\\\__
#      _\/\\\__\///\\\/___\/\\\____\//\\\\\________\////\\\______\/\\\/////////\\\_
#       _\/\\\____\///_____\/\\\_____\//\\\____________\////\\\___\/\\\_______\/\\\_
#        _\/\\\_____________\/\\\__/\\_/\\\______/\\\______\//\\\__\/\\\_______\/\\\_
#         _\/\\\_____________\/\\\_\//\\\\/______\///\\\\\\\\\\\/___\/\\\\\\\\\\\\\/__
#          _\///______________\///___\////__________\///////////_____\/////////////_____
#			By toulousain79 ---> https://github.com/toulousain79/
#
######################################################################
#
#	Copyright (c) 2013 toulousain79 (https://github.com/toulousain79/)
#	Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
#	The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
#	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
#	IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
#	--> Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php
#
##################### FIRST LINE #####################################

MySB_MustStartWith="${CRED}You must start installation with the script$CEND ${CGREEN}MySB_Install.bsh$CEND${CRED}, aborting!$CEND"

MySB_LoseConnection="${CRED}If you lose connection during installation, restart a SSH session and run the following command:$CEND
${CGREEN}	screen -r MySB$CEND
${CRED}Beware, during installation, the SSH port will be changed. If a session on port 22 does not work, try with the new port that you have selected (maybe is it 8892).$CEND"

MySB_UserAdded="${CBLUE}When a user is added, it will receive a confirmation email.
It must change their password.
Its IP address will also be added automatically.$CEND"

MySB_AllIsOk="${CYELLOW}All is ok to start MySB installation.$CEND"
MySB_InstallingConfiguring="Installing and configuring of"

MySB_Title_Preparing="${CYELLOW}#### Preparing the installation ####$CEND"
MySB_Title_SecurityRules="${CYELLOW}#### Applying security rules ####$CEND"
MySB_Title_InstallServices="${CYELLOW}#### Installing all services ####$CEND"

MySB_PressEnter="Press [Enter] key to continue..."

MySB_Error_Download="${CRED}Important files could not be downloaded, aborting !$CEND"
MySB_Error_Bind="${CRED}Bind is not running, aborting !$CEND"
MySB_Error_DNScrypt="${CRED}DNScrypt-proxy is not running, aborting !$CEND"

MySB_Step_ProviderInfos="Searching informations about the provider monitoring servers"
MySB_Step_CreateSecurityRules="Creating basic security rules"
MySB_Step_Optimiszation="Optimizations the system"
MySB_Step_SourcesDebian="Generating of Debian 'source.lists' file"
MySB_Step_NeededPackages="Installing all needed packages"
MySB_Step_DownloadAll="Downloading all files at once (GIT, SVN, TAR.GZ, WBM)"
MySB_Step_Certificates="Generating the Certificate Authority (CA)"
MySB_Step_PeerGuardian="$MySB_InstallingConfiguring PeerGuardian, and updating all blocklists (this may take a while, please wait)"
MySB_Step_rTorrentBlocklist="Compiling the blocklist for rTorrent"
MySB_Step_NoBlocklist="Using off block list"
MySB_Step_ruTorrent="$MySB_InstallingConfiguring ruTorrent with plugins, and check of all the included trackers (this may take a while, please wait)"
MySB_Step_MainUser="Creating the main user named:"

MySB_Message_Last="${CGREEN}Looks like everything is done.$CEND

${CYELLOW}Remember that your SSH port is now ======>$CEND ${CBLUE}$Port_SSH$CEND

${CRED}System will reboot in 30 seconds.$CEND

${CBLUE}Available commands for your seedbox:$CEND
${CYELLOW}	User Management:$CEND
${CGREEN}			MySB_ChangeUserPassword$CEND
${CGREEN}			MySB_CreateUser$CEND
${CGREEN}			MySB_DeleteUser$CEND
${CYELLOW}	SeedBox Management:$CEND
${CGREEN}			MySB_RefreshMe (refresh the installation of rTorrent, ruTorrent, Seedbox-Manager and of Cakebox)$CEND
${CGREEN}			MySB_UpgradeSystem$CEND (like 'aptitude update + aptitude upgrade' or 'apt-get update + apt-get upgrade')
${CYELLOW}	MySB Management:$CEND
${CGREEN}			MySB_GitHubRepoUpdate$CEND (updates the current repository of MySB)
${CGREEN}			MySB_UpgradeMe$CEND (if a new version is available)
${CGREEN}			MySB_SecurityRules$CEND (to create/clean/refresh all security rules)
${CYELLOW}	Main scripts:$CEND
${CGREEN}			BlocklistsRTorrent.bsh$CEND (generates the blocklist for rTorrent) (scheduled every day)
${CGREEN}			DynamicAddressResolver.bsh$CEND (scheduled every 5 minutes, this checks all hostnames (dynamic IP) for all users)
${CGREEN}			GetTrackersCert.bsh$CEND (checks all the trackers that use an SSL certificate and download it)


${CBLUE}As main user, you can manage the bloclists, the trackers and more via MySB portal available here:$CEND
	-->	${CYELLOW}https://$HostNameFQDN:$Port_HTTPS/$CEND"

##################### LAST LINE ######################################