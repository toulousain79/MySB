<?php
// ---------------------------
//  __/\\\\____________/\\\\___________________/\\\\\\\\\\\____/\\\\\\\\\\\\\___
//   _\/\\\\\\________/\\\\\\_________________/\\\/////////\\\_\/\\\/////////\\\_
//	_\/\\\//\\\____/\\\//\\\____/\\\__/\\\__\//\\\______\///__\/\\\_______\/\\\_
//	 _\/\\\\///\\\/\\\/_\/\\\___\//\\\/\\\____\////\\\_________\/\\\\\\\\\\\\\\__
//	  _\/\\\__\///\\\/___\/\\\____\//\\\\\________\////\\\______\/\\\/////////\\\_
//	   _\/\\\____\///_____\/\\\_____\//\\\____________\////\\\___\/\\\_______\/\\\_
//		_\/\\\_____________\/\\\__/\\_/\\\______/\\\______\//\\\__\/\\\_______\/\\\_
//		 _\/\\\_____________\/\\\_\//\\\\/______\///\\\\\\\\\\\/___\/\\\\\\\\\\\\\/__
//		  _\///______________\///___\////__________\///////////_____\/////////////_____
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

define('MainUser_DNScrypt_Table_Name', 'Name');
define('MainUser_DNScrypt_Table_DNSsec', 'DNSSEC<br />validation');
define('MainUser_DNScrypt_Table_NoLog', 'No<br />logs');
define('MainUser_DNScrypt_Table_Filters', 'No<br />filters');
define('MainUser_DNScrypt_Table_Speed', 'Speed<br />(msec)');
define('MainUser_DNScrypt_Restart', 'Restart DNScrypt-proxy service');
define('MainUser_DNScrypt_Title_Config', 'DNScrypt-proxy configuration');
define('MainUser_DNScrypt_NoLogs', 'No Logs');
define('MainUser_DNScrypt_DNSSec', 'DNSsec');
define('MainUser_DNScrypt_NoFilter', 'No Filter');
define('MainUser_DNScrypt_LoadBalancing', 'Load-balancing');
define('MainUser_DNScrypt_ForceTcp', 'Force TCP');
define('MainUser_DNScrypt_EphemeralKeys', 'Ephemeral Keys');
define('MainUser_DNScrypt_TlsDisableTickets', 'TLS Disable Tickets');
define('MainUser_DNScrypt_DohServer', 'DOH Servers');

define('Main_DNScrypt_TT_NoLogs', 'Server must not log user queries <i>(declarative)</i>');
define('Main_DNScrypt_TT_DNSSec', 'Server must support DNS security extensions <i>(DNSSEC)</i>');
define('Main_DNScrypt_TT_NoFilter', 'Server must not enforce its own blacklist <i>(for parental control, ads blocking...)</i>');
define('Main_DNScrypt_TT_LoadBalancing', 'Load-balancing strategy:<br />
<br />
<li><b>fastest</b> <i>(always pick the fastest server in the list)</i></li>
<li><b>p2</b> (default) <i>(randomly choose between the top 2 fastest servers)</i></li>
<li><b>ph</b> <i>(randomly choose between the top fastest half of all servers)</i></li>
<li><b>random</b> <i>(just pick any random server from the list)</i></li>');
define('Main_DNScrypt_TT_ForceTcp', 'Always use TCP to connect to upstream servers.<br />
This can be useful if you need to route everything through Tor.<br />
Otherwise, leave this to `false`, as it doesn\'t improve security <i>(dnscrypt-proxy will always encrypt everything even using UDP)</i>, and can only increase latency.');
define('Main_DNScrypt_TT_EphemeralKeys', 'Create a new, unique key for every single DNS query.<br />
This may improve privacy but can also have a significant impact on CPU usage.<br />
Only enable if you don\'t have a lot of network load.');
define('Main_DNScrypt_TT_TlsDisableTickets', 'DoH: Disable TLS session tickets <i>(increases privacy but also latency)</i>');
define('Main_DNScrypt_TT_DohServers', 'DoH: Use servers implementing the DNS-over-HTTPS protocol');

//#################### LAST LINE ######################################
