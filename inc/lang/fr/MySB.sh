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

MySB_MustStartWith="${CRED}Vous devez exécuter l'installation avec le script$CEND ${CGREEN}MySB_Install.bsh$CEND${CRED}, abandon !$CEND"

MySB_LoseConnection="${CRED}Si vous perdez la connexion lors de l'installation, redémarrer une session SSH et exécutez la commande suivante:$CEND
${CGREEN}	screen -r MySB$CEND
${CRED}Méfiez-vous, lors de l'installation, le port SSH sera changé. Si une session sur le port 22 ne fonctionne pas, essayez avec le nouveau port que vous avez sélectionné (peut-être est-ce 8892).$CEND"

MySB_UserAdded="${CBLUE}Lorsqu'un utilisateur est ajouté, il recevra un mail de confirmation.
Il doit changer son mot de passe.
Son adresse IP sera également ajoutée automatiquement.$CEND"

MySB_AllIsOk="${CYELLOW}Tout est ok pour démarrer l'installation MySB.$CEND"
MySB_InstallingConfiguring="Installation et configuration de"

MySB_Title_Preparing="${CYELLOW}#### Préparation de l'installation ####$CEND"
MySB_Title_SecurityRules="${CYELLOW}#### Application des règles de sécurité ####$CEND"
MySB_Title_InstallServices="${CYELLOW}#### Installation de tous les services ####$CEND"

MySB_PressEnter="Appuyez sur [Entrée] pour continuer ..."

MySB_Error_Download="${CRED}Des fichiers importants n'ont pas pu être téléchargés, abandon !$CEND"
MySB_Error_Bind="${CRED}Bind ne fonctionne pas, abandon !$CEND"
MySB_Error_DNScrypt="${CRED}DNScrypt-proxy ne fonctionne pas, abandon !$CEND"

MySB_Step_ProviderInfos="Recherche d'informations sur les serveurs de surveillance du fournisseur"
MySB_Step_CreateSecurityRules="Création des règles de base de sécurité"
MySB_Step_Optimiszation="Optimisations du système"
MySB_Step_SourcesDebian="Génération du fichier 'sources.list' pour Debian"
MySB_Step_NeededPackages="Installation de tous les paquets nécessaires"
MySB_Step_DownloadAll="Téléchargement de tous les fichiers en une fois (GIT, SVN, TAR.GZ, WBM)"
MySB_Step_Certificates="Génération de l'Autorité de Certification (CA)"
MySB_Step_PeerGuardian="$MySB_InstallingConfiguring PeerGuardian, and updating all blocklists (this may take a while, please wait)"
MySB_Step_rTorrentBlocklist="Compilation de la liste de blocage pour rTorrent"
MySB_Step_NoBlocklist="Utilisation de liste de blocage désactivée"
MySB_Step_ruTorrent="$MySB_InstallingConfiguring ruTorrent avec les plugins, et contrôle de tous les trackers inclus (cela peut prendre un certain temps, merci patienter)"
MySB_Step_MainUser="Création de l'utilisateur principal nommé:"

MySB_Message_Last="${CGREEN}On dirait que tout est fait.$CEND

${CYELLOW}Rappelez-vous que votre port SSH est maintenant ======>$CEND ${CBLUE}$Port_SSH$CEND

${CRED}Le système va redémarrer en 30 secondes.$CEND

${CBLUE}Les commandes disponibles pour votre seedbox:$CEND
${CYELLOW}	Gestion des utilisateurs:$CEND
${CGREEN}			MySB_ChangeUserPassword$CEND
${CGREEN}			MySB_CreateUser$CEND
${CGREEN}			MySB_DeleteUser$CEND
${CYELLOW}	Gestion de votre seedbox:$CEND
${CGREEN}			MySB_RefreshMe (rafraîchi l'installation de rTorrent, ruTorrent, Seedbox-Manager et de Cakebox)$CEND
${CGREEN}			MySB_UpgradeSystem$CEND (comme 'aptitude update + aptitude upgrade' ou 'apt-get update + apt-get upgrade')
${CYELLOW}	Gestion de MySB:$CEND
${CGREEN}			MySB_GitHubRepoUpdate$CEND (met à jour le dépôt actuel de MySB)
${CGREEN}			MySB_UpgradeMe$CEND (si une nouvelle version est disponible)
${CGREEN}			MySB_SecurityRules$CEND (pour créer/effacer/rafraîchir toutes les règles de sécurité)
${CYELLOW}	Scripts principaux:$CEND
${CGREEN}			BlocklistsRTorrent.bsh$CEND (génére la liste de blocage pour rTorrent) (planifié chaque jour)
${CGREEN}			DynamicAddressResolver.bsh$CEND (planifié toutes les 5 minutes, cela vérifie tous les noms d'hôtes (IP dynamique) pour tous les utilisateurs)
${CGREEN}			GetTrackersCert.bsh$CEND (vérifie tous les trackers qui utilisent un certificat SSL et le télécharge)


${CBLUE}En tant qu'utilisateur principal, vous pouvez gérer les bloclists, les trackers et plus via portail disponibles ici:$CEND
	-->	${CYELLOW}https://$HostNameFQDN:$Port_HTTPS/$CEND"

##################### LAST LINE ######################################