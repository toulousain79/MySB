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

$lang = array();

// Global
$lang['Global_Yes'] = 'Yes';
$lang['Global_No'] = 'No';
$lang['Global_SaveChanges'] = 'Save Changes';
$lang['Global_IsDefault'] = 'Default ?';
$lang['Global_IsActive'] = 'Active ?';
$lang['Global_Comment'] = 'Comments';
$lang['Global_LastUpdate'] = 'Last Update';
$lang['Global_FailedUpdateMysbDB'] = 'Failed !<br /><br />It was not possible to update the MySB database.';

// BlockLists_PGL.php
$lang['BlockLists_PGL_Success'] = 'Success!<br /><br />The blocklists have been apply for PeerGuardian AND rTorrent.';
$lang['BlockLists_PGL_Failed'] = 'Failed ! It was not possible to update the MySB database.';
$lang['BlockLists_PGL_Table_Name'] = 'Name';
$lang['BlockLists_PGL_Table_Blocklist'] = 'Blocklist';

// BlockLists_rTorrent.php
$lang['BlockLists_rTorrent_Success'] = 'Success!<br /><br />The blocklists have been apply for PeerGuardian AND rTorrent.';
$lang['BlockLists_rTorrent_Failed'] = 'Failed ! It was not possible to update tracker in the MySB database.';
$lang['BlockLists_rTorrent_Table_Name'] = 'Name';
$lang['BlockLists_rTorrent_Table_Blocklist'] = 'Blocklist';

// User > ChangeEmail.php
$lang['User_ChangeEmail_CurrentAddress'] = 'Current e-mail :';
$lang['User_ChangeEmail_NewAddress'] = 'New e-mail :';
$lang['User_ChangeEmail_ConfirmAddress'] = 'New e-mail :';
$lang['User_ChangeEmail_FailedUpdate'] = 'Failed !<br /><br />It was not possible to update the MySB database.';
$lang['User_ChangeEmail_ErrorConfirm'] = 'Error between the new typed email and verification.';
$lang['User_ChangeEmail_ErrorNotValid'] = 'The given e-mail address is not valid!';
$lang['User_ChangeEmail_CompleteAll'] = 'Please, complete all fields.';

// User > ChangePassword.php
$lang['User_ChangePassword_CurrentPassword'] = 'Current password :';
$lang['User_ChangePassword_NewPassword'] = 'New password :';
$lang['User_ChangePassword_ConfirmPassword'] = 'Confirm :';
$lang['User_ChangePassword_Success'] = 'Success !<br /><br />Wait a few seconds and you will be able to log in with your new password.<br /><br />You will be redirect in 30 seconds.<br /><br />Please, wait for automatic redirection !';
$lang['User_ChangePassword_Failded'] = 'Failed !<br /><br />It was not possible to apply the new password.';
$lang['User_ChangePassword_FailedUpdateMysbDB'] = 'Failed !<br /><br />It was not possible to update the MySB database.';
$lang['User_ChangePassword_FailedUpdateWolfDB'] = 'Failed !<br /><br />It was not possible to update the Wolf database.';
$lang['User_ChangePassword_ErrorConfirm'] = 'Error between the new typed password and verification.';
$lang['User_ChangePassword_ErrorNotValid'] = 'The current password is not valid.';
$lang['User_ChangePassword_CompleteAll'] = 'Please, complete all fields.';

// Main user > DNScrypt.php
$lang['MainUser_DNScrypt_FailedUpdateMysbDB'] = 'Failed !<br /><br />It was not possible to update the MySB database.';
$lang['MainUser_DNScrypt_CompleteAll'] = 'Please, complete all fields.';
$lang['MainUser_DNScrypt_Table_Name'] = 'Name';
$lang['MainUser_DNScrypt_Table_FullName'] = 'Full name';
$lang['MainUser_DNScrypt_Table_Location'] = 'Location';
$lang['MainUser_DNScrypt_Table_Version'] = 'Version';
$lang['MainUser_DNScrypt_Table_DNSsec'] = 'DNSSEC<br />validation';
$lang['MainUser_DNScrypt_Table_NoLog'] = 'No logs';
$lang['MainUser_DNScrypt_Table_NameCoin'] = 'Namecoin';

// Help > Help_Blocklists.php
$lang['Help_Blocklists'] = '
	<p>
		It is possible to use a blocklist with rTorrent.<br />
		Similarly, if you have decided to use PeerGuardian, a second blocklist will also be available.
		</p>
		<p>
		Although PeerGuardian is installed, it\'s still a good idea to also select the lists for rTorrent.<br />
		For if PeerGuardian has a problem and can not be launched, the blocklist of rTorrent will take over.
		<ul>
			<li><a href="?blocklists/rtorrent-blocklists.html">rTorrent blocklists</a></li>
			<li><a href="?blocklists/peerguardian-blocklists.html">PeerGuardian blocklists</a></li>
		</ul>
	</p>';

// Help > Help_IPrestriction.php
$lang['Help_IPrestriction'] = '
	<p>
		IP restriction is applied for access to the MySB portal.<br />
		In case you do not have a fixed IP address, you can use a service such as \'No-IP\' or \'DynDNS\'.<br />
		You can add a host name instead of an IP address <a href="?user/manage-addresses.html">here</a>.

		<ul>
			<li><a target="_blank" href="http://www.noip.com/">No-IP.com</a></li>
			<li><a target="_blank" href="http://www.dyndns.fr/">DynDNS.fr</a></li>
			<li><a target="_blank" href="https://account.dyn.com/entrance/">DynDNS.com</a></li>
			<li>...</li>
		</ul>
	</p>';

// Help > Help_PlexMedia.php
$lang['Help_PlexMedia'] = '';

// Help > Help_Trackers.php
$lang['Help_Trackers_MainUser'] = '
	<p>
		You have an existing list of trackers generated from ruTorrent.<br />
		Trackers in this list are not deletable. It is only possible to enable or disable it.
	</p>
	<p>
		You also have the option to add your own trackers <a href="?trackers/add-new-trackers.html">here</a>.<br />
		Your trackers will also be displayed in the global list available <a href="?trackers/trackers-list.html">here</a>.
	</p>';
$lang['Help_Trackers_NormalUser'] = '
	<p>
		Maybe do you need to add a new tracker?<br />
		As a normal user, you must submit a request to the primary user.<br />
		Only the primary user can add / remove a new tracker.
	</p>
	<p>
		You can submit your request by e-mail or using the ruTorrent chat.
	</p>
';

//#################### LAST LINE ######################################
?>