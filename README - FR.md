#### Ce script ne vise pas à solliciter des actions illégales! Je ne peux pas être tenu pour responsable de l'utilisation que vous pourriez le faire! Merci de reconsidérer l'installation et l'utilisation de MySB. J'ai développé cet outil uniquement pour le plaisir et la passion pour mon travail.
#### Vous n'êtes pas autorisé à utiliser MySB pour la revente en tant que service!!!

====
# MySB
MySB (My SeedBox) est une seedbox multi-utilisateurs pour un serveur dédié sous Debian 7 (Wheezy) et pourrait être renommée MySSB, My Secured SeedBox.
Tout l'intérêt de MySB réside dans la sécurité via la gestion de liste de blocage avec PeerGuardian (ou rTorrent) pour les requêtes entrantes, ainsi que le cryptage des requêtes DNS grâce à DNScrypt-proxy pour les requêtes sortantes.

* **Version actuelle** _(stable)_: **v4.0**
* Prochaine version _(dev)_: _----_

## Toutes les conditions préalables énumérées ci-dessous sont OBLIGATOIRES!

* **Conçu** pour **serveur dédié** uniquement avec **Debian Wheezy** _(Ubuntu **N**'est **PAS** pris en charge)_
* Vous **devez** avoir un **noyau Debian standard**! Si vous ne pouvez pas installer un noyau **standard**, MySB **N**'est **PAS** pour vous... _(**noyau PVE** **ne** sont **pas** pris en charge)_
* Virtual Private Server (VPS) sont **non compatibles**! _(Voir le point précédent)_
* Vous devez avoir un serveur dédié **vierge** de toutes installation.
* Votre interface réseau principale doit être configurée de manière **statique**, et non en DHCP _(Ex.: Serveurs Online)_
* Encouragez-moi en **suivant** mon projet ;-)

## Caractéristiques et services
* **rTorrent** _(Rakshasa) v0.9.2 & v0.9.6 avec SSL_
* **libTorrrent** _(Rakshasa) v0.13.2 & v0.13.6_
* **ruTorrent + plugins officiels**
* **NginX** _(SSL, port spécifique et certaines personnalisations)_
* **PHP5-FPM** _(php5-apcu, FastCGI, SSL)_
* **SFTP** _avec Chroot_
* **VSFTPd** _(FTP via TLS)_
* **Postfix** avec _(ou sans)_ authentication SMTP _(Gmail, Free, Ovh, Yahoo and Zoho)_
* **Seedbox-Manager** _(optionnel)_
* **LoadAvg** _(analyse et surveillance du serveur)_
* **NextCloud** _(optionnel mais **recommandé**)_
* **OpenVPN** _(optionnel); multi configuration TUN/TAP, avec ou sans redirection du traffic. Support de AES-NI._
* **CakeBox-Light** _(optionnel)_
* **PlexMedia Server** _(optionnel, nécessite une configuration manuelle supplémentaire)_
* **PlexPy** _(si Plexmedia est installé)_
* **Shell In A Box**
* **Webmin** _(optionnel)_
* **Partages Samba** pour chaque utilisateur _(via l'accès VPN)_
* **Partages NFS** pour chaque utilisateur _(via l'accès VPN)_
* **PeerGuardian** _(optionnel mais **recommandé**)_
* **DNScrypt-proxy** avec Bind9 en tant que cache DNS _(optionnel mais **recommandé**)_
* **Let's Encrypt** _(obtention d'un certificat signé gratuit  pour l'accès au portail MySB)_
* **Fail2ban** _(optionnel mais **recommandé**)_
* **RKHunter**
* **Portail MySB** (_possibilité de gérer les trackers, les listes de blocages, les utilisateurs, rTorrent et plus encore)_
* **Fonctions spéciales de MySB**
  + Récupération automatique des certificats SSL pour tous les trakeurs _(si un certificat est disponible)_
  + Bloquer toutes les possibilités d'utiliser les trackers listés qui n'ont pas été activés dans le portail MySB
  + Utilisation de listes de blocage _(optionnel) (PeerGuardian ou rTorrent, si PeerGuardian n'a pas réussi à démarrer, rTorrent utilisera ses propres listes de blocage)_
  + Service de surveillance disponible pour certains hébergeurs _(OVH, Online et Digicube)_
  + Accès restreint par IP pour tout accès au serveur _(peut être désactivé)_
  + Gestion dynamique de l'IP pour la restriction IP _(DynDNS, No-IP, ...)_
  + Sélection de la langue _(anglais ou français)_
  + Utilisation de scripts après un téléchargement terminé _(Synchronisation directe ou programmée, via FTP ou rsync)_
  + Prioriser les connexions sécurisées via SSL pour rTorrent _(dépend des trackers)_
  + Création automatique de plusieurs dossiers 'Watch' pour rTorrent _(Gestion via le portail MySB)_
  + Accès aux dossiers 'Watch' via FTPs, sFTP, Samba (via OpenVPN) ou NextCloud (interface web ou application cliente)
  + Cryptage des requêtes DNS sortantes grâce à DNScrypt-proxy

## Autres plugins ruTorrent

* Mobile
* Pause WebUI
* Chat
* Logoff
* tAdd-Labels
* Filemanager
* Mediastream
* Fileshare
* NFO
* RatioColor
* FileUpload
* Stream
* Favicons trackers

## Bugs

* Prévenez-moi...

====
# Avertissements
## Connaissance de Linux
* **TOUS** vos noms d'utilisateur et votre mot de passe doivent être écrits **sans** espace.
* **NE PAS** modifier n'importe quoi dans votre serveur, si vous avez un doute posez votre question avant.
* **NE PAS** essayer de reconfigurer les paquets en utilisant d'autres tutoriels ou vous-même. Cela pourrait poser des problèmes quand vous mettrez à jour MySB.
* **POUR METTRE A JOUR** votre système, utilisez la commande **MySB_UpgradeSystem**. _(Cette commande est comparable à apt-get update + apt-get upgrade)_

## Serveurs OVH _(OVH, KimSufi, SoYouStart)_
* Utilisez le noyau de distribution **par défaut**. Dans votre interface de gestionnaire OVH, lorsque vous démarrez le processus d'installation, choisissez **Installation personnalisée** et **Utilisation du noyau de la distribution**.

* Vous pouvez monitorer votre serveur, il faut simplement le spécifier lors de l'installation de MySB. **MAIS** il faut **désactiver** ce service dans l'interface OVH **avant** de l'installation de MySB. Si vous autorisez la surveillance avec MySB, les adresses IP de votre fournisseur seront **ajoutées** à la liste blanche globale (PeerGuardian, Fail2Ban, IPTables) et ces adresses **ne seront pas filtrées**.

* Si vous laissez active la surveillance de votre serveur dans l'interface OVH **ET** que vous ne l'avez pas activé pendant l'installation de MySB, votre serveur pourra être **redémarré en mode de secours** par le personnel OVH... Si vous souhaitez utiliser le service de monitoring , alors vous **devez** d'abord le désactiver **AVANT** de démarrer l'installation de MySB. Vous pourrez le réactiver **APRÈS** la FIN de l'installation. Vous pouvez également désactiver le Real Time Monitoring (RTM), lire cette page. [Real Time Monitoring (RTM)](http://www.torrent-invites.com/showthread.php?t=39022)

====
## Changelog

Jeter un coup d'œil à [Changelog.md](https://github.com/toulousain79/MySB/blob/v4.0/Changelog.md), tout est là.

## License

Copyright (c) 2013 toulousain79
--> Licence sous licence MIT: http://choosealicense.com/licenses/mit/

====
## [WiKi](https://github.com/toulousain79/MySB/wiki)
### Installation / Mise à jour / Désinstallation
* [Installation](https://github.com/toulousain79/MySB/wiki/%5BInstall%5D-Installation)
* [Mise à jour](https://github.com/toulousain79/MySB/wiki/%5BInstall%5D-Upgrade)
* [Désinstallation](https://github.com/toulousain79/MySB/wiki/%5BInstall%5D-Uninstall)
* [Captures d'écran](https://github.com/toulousain79/MySB/wiki/%5BInstall%5D-Screenshots)

### Commandes et scripts
* [Commandes](https://github.com/toulousain79/MySB/wiki/%5BCommands%5D-Commands-&-scripts)

### Portail MySB
* [Captures d'écran](https://github.com/toulousain79/MySB/wiki/%5BPortal%5D-Screenshots)
* [Droits des utilisateurs](https://github.com/toulousain79/MySB/wiki/%5BPortal%5D-Users-rights)

### Aide
* [Liste de blocage](https://github.com/toulousain79/MySB/wiki/%5BHelp%5D-Blocklists)
* [Cakebox Light](https://github.com/toulousain79/MySB/wiki/%5BHelp%5D-Cakebox-Light)
* [OpenVPN](https://github.com/toulousain79/MySB/wiki/%5BHelp%5D-OpenVPN)
* [NextCloud](https://github.com/toulousain79/MySB/wiki/%5BHelp%5D-NextCloud)
* [Plex Media Server](https://github.com/toulousain79/MySB/wiki/%5BHelp%5D-Plex-Media-Server)
* [DNScrypt-proxy](https://github.com/toulousain79/MySB/wiki/%5BHelp%5D-Renew-DNScrypt-Resolvers)

### Plus
* [A faire & Idées](https://github.com/toulousain79/MySB/wiki/%5BMore%5D-ToDo-&-Ideas)
* [Outils, Sources & Tutos](https://github.com/toulousain79/MySB/wiki/%5BMore%5D-Tools,-Sources-and-HowTo)
