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

define('Help_Blocklists', '<p>
Blacklists or blocklists are IP address lists categorized.
<br />
These lists are used by PeerGuardian tool and/or rTorrent in order to block access to your server to selected IP categories (government agencies, organizations maveillantes, anti P2P organizations, ...).
</p>
<p>
Some categories were selected by default to achieve a compromise between security and data sharing.
<br />
The PeerGuardian rTorrent and block lists are operated separately.<br />
</p>
<p>
If you chose to install PeerGuardian, then your server will be fully protected.<br />
Lists for rTorrent will not be used except in two situations:
</p>
<ul>
	<li><b>IF</b> PeerGuardian if not installed</li>
	<li><b>IF</b> PeerGuardian planted or if the service does not start</li>
</ul>
<p>
Although rTorrent can use block lists, only your rTorrent connections will be protected. The rest of your server will not be.
	<ul>
		<li><a href="?blocklists/rtorrent-blocklists.html">Liste de blocage rTorrent</a></li>
		<li><a href="?blocklists/peerguardian-blocklists.html">Liste de blocage PeerGuardian</a></li>
	</ul>
</p>
');

//#################### LAST LINE ######################################
