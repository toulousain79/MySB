<?php
// ---------------------------
//  __/\\\\____________/\\\\___________________/\\\\\\\\\\\____/\\\\\\\\\\\\\___
//   _\/\\\\\\________/\\\\\\_________________/\\\/////////\\\_\/\\\/////////\\\_
//    _\/\\\//\\\____/\\\//\\\____/\\\__/\\\__\//\\\______\///__\/\\\_______\/\\\_
//     _\/\\\\///\\\/\\\/_\/\\\___\//\\\/\\\____\////\\\_________\/\\\\\\\\\\\\\\__
//      _\/\\\__\///\\\/___\/\\\____\//\\\\\________\////\\\______\/\\\/////////\\\_
//       _\/\\\____\///_____\/\\\_____\//\\\____________\////\\\___\/\\\_______\/\\\_
//        _\/\\\_____________\/\\\__/\\_/\\\______/\\\______\//\\\__\/\\\_______\/\\\_
//         _\/\\\_____________\/\\\_\//\\\\/______\///\\\\\\\\\\\/___\/\\\\\\\\\\\\\/__
//          _\///______________\///___\////__________\///////////_____\/////////////_____
//			By toulousain79 ---> https://github.com/toulousain79/
//
//#####################################################################
//
//	Copyright (c) 2013 toulousain79 (https://github.com/toulousain79/)
//	Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
//	The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
//	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
//	IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
//	--> Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php
//
//#################### FIRST LINE #####################################

define('Home_Welcome', 'Hi %s, welcome to MySB portal !');
define('Home_MainUser', '
	<p></p>
	<p>As the main user you have additional features, such as:</p>
	<ul style="margin-left: 100px">
		<li>Activating trackers</li>
		<li>Adding new trackers</li>
		<li>Activating black lists for rTorrent and/or PeerGuardian <span class="Comments">(if installed)</span></li>
		<li>Access to <b>PlexPy</b> to view Plexmedia Server statistics <span class="Comments">(if installed)</span></li>
		<li>Access to <b>Shell</b> In a Box, an SSH console via a web page</li>
		<li><a href="?main-user/renting-infos.html">Rental management</a> <span class="Comments">(description, tax and cost of the server)</span>, and input of your users\' payments <span class="Comments">(It is advisable to set BEFORE adding new users)</span></li>
		<li>SMTP management</li>
		<li>User management</li>
		<li>Visualization of logs</li>
		<li>Manage <b>DNScrypt-proxy</b> <span class="Comments">(if installed)</span></li>
	</ul>
	<p>As well as the basic functions :</p>
	<ul style="margin-left: 100px">
		<li>Access to <b>ruTorrent</b>, <b>Cakebox</b>, <b>Seedbox Manager</b>, <b>Nextcloud</b> and <b>LoadAvg</b></li>
		<li>View your account information</li>
		<li>Change your password</li>
		<li>Restart or change the version of your rTorrent session</li>
		<li>Manage your authorized connection addresses <span class="Comments">(IP or dynamic DNS)</span></li>
		<li>Download your configuration files for OpenVPN <span class="Comments">(if installed)</span></li>
		<li>Manage categories and synchronization of your downloads <span class="Comments">(direct synchronization and/or scheduled to a NAS for example)</span></li>
	</ul>
');
define('Home_NormalUser', '
	<p></p>
	<p>As a normal user, you have the following possibilities :</p>
	<ul style="margin-left: 100px">
		<li>Access to <b>ruTorrent</b>, <b>Cakebox</b>, <b>Seedbox Manager</b>, <b>Nextcloud</b> and <b>LoadAvg</b></li>
		<li>View your account information</li>
		<li>Change your password</li>
		<li>Restart or change the version of your rTorrent session</li>
		<li>Manage your authorized connection addresses <span class="Comments">(IP or dynamic DNS)</span></li>
		<li>Download your configuration files for OpenVPN <span class="Comments">(if installed)</span></li>
		<li>Manage categories and synchronization of your downloads <span class="Comments">(direct synchronization and/or scheduled to a NAS for example)</span></li>
	</ul>
');
define('Home_PlexlUser', '
	<p></p>
	<p>As a normal user, you have the following possibilities :</p>
	<ul style="margin-left: 100px">
		<li>View your account information</li>
		<li>Change your password</li>
		<li>Manage your authorized connection addresses <span class="Comments">(IP or dynamic DNS)</span></li>
	</ul>
');
define('Home_NextCloudAfterUpgrade', '
	<p></p>
	<h2>NextCloud</h2>
	<p>To use NextCloud, thank you to reset your password on <a href="?user/change-password.html">this page</a>. <span class="Comments">(You can reuse the same password)</span></p>
	<p></p>
');

//#################### LAST LINE ######################################
