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

define('Help_Trackers_MainUser', '
	<p>
		Une liste de trackers a &eacute;t&eacute; g&eacute;n&eacute;r&eacute;e en utilisant ruTorrent.<br />
		Les trackers pr&eacute;sents dans cette liste ne sont pas modifiables. Il est seulement possible de les activer ou de les d&eacute;sactiver.
	</p>
	<p>
		Vous avez &eacute;galement la possibilit&eacute; d\'ajouter vos propres trackers sur <a href="?trackers/add-new-trackers.html">cette page</a>.<br />
		Vos trackers seront &eacute;galement affich&eacute;s dans la liste globale disponible sur <a href="?trackers/trackers-list.html">cette page</a>.
	</p>
	<p>
		Techniquement, tous les trackers fonctionnent sans avoir besoin de les ajouter.<br />
		L\'int&ecirc;ret d\'en ajouter r&eacute;side dans la possibilit&eacute; de les bloquer.<br />
		Si vous voulez bloquer l\'utilisation d\'un tracker en particulier, il suffit de l\'ajouter ET de le d&eacute;sactiver.
		Les connexions vers ce tracker seront bloqu&eacute;es.
	</p>
');
define('Help_Trackers_NormalUser', '
	<p>
		Peut-&ecirc;tre avez-vous besoin d\'ajouter un nouveau tracker?<br />
		En tant qu\'utilisateur normal, vous devez soumettre une demande &agrave; l\'utilisateur principal.<br />
		Seul l\'utilisateur principal peut ajouter ou supprimer un nouveau tracker.
	</p>
');
define('Help_MessageAddTracker', '<p>Vous pouvez lui soumettre votre demande <a href="mailto:%s?subject=MySB - Demande d\'ajout d\'un nouveau tracker">par mail</a> ou en utilisant le chat ruTorrent en vous adressant &agrave; %s.</p>');

//#################### LAST LINE ######################################
