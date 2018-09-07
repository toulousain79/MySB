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
Les listes noires ou listes de blocage sont des listes d\'adresses IP class&eacute;es par cat&eacute;gories.
<br />
Ces listes sont exploit&eacute;es par l\'outil PeerGuardian et/ou rTorrent dans le but de bloquer l\'acc&egrave;s &agrave; votre serveur aux cat&eacute;gories d\'adresses IP s&eacute;lectionn&eacute;es (organismes gouvernementaux, organisations maveillantes, organisations anti P2P, ...).
</p>
<p>
Certaines cat&eacute;gories ont &eacute;t&eacute; s&eacute;lectionn&eacute;es par d&eacute;faut pour obtenir un compromis entre s&eacute;curit&eacute; et partage des donn&eacute;es.
<br />
Les listes de blocage de PeerGuardian et rTorrent sont exploit&eacute;es distinctement.<br />
</p>
<p>
Si vous avez choisi d\'installer PeerGuardian, alors votre serveur sera compl&egrave;tement prot&eacute;g&eacute;.<br />
Les listes pour rTorrent ne seront pas utilis&eacute;es SAUF dans 2 situations:
</p>
<ul>
	<li><b>SI</b> PeerGuardian n\'est pas install&eacute;</li>
	<li><b>SI</b> PeerGuardian a plant&eacute; ou si le service ne d&eacute;marre pas</li>
</ul>
<p>
Même si rTorrent peut exploiter des listes de blocage, seules vos connexions rTorrent seront prot&eacute;g&eacute;es. Le reste de votre serveur ne le sera pas.
	<ul>
		<li><a href="?blocklists/rtorrent-blocklists.html">Liste de blocage rTorrent</a></li>
		<li><a href="?blocklists/peerguardian-blocklists.html">Liste de blocage PeerGuardian</a></li>
	</ul>
</p>
');

//#################### LAST LINE ######################################
