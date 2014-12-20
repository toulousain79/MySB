# REDIRECTOR PLUGIN

## About Redirector Plugin

Redirector Plugin is a plugin for WolfCMS. It provides an provides an interface
to manage redirects for URLs served by WolfCMS.

Adapted from Redirector by Design Spike <http://designspike.ca>.
Major contributions and original idea by Cody at Design Spike.

Licensed under the MIT license
http://www.opensource.org/licenses/mit-license.php
 
The official Wolf CMS website can be found at www.wolfcms.org - visit it for
more information and resources.

## Installation

Redirector Plugin can be installed into your WolfCMS installation by simply
uploading it to <install location>/wolf/plugins/redirector and enabling it
in your Administration section.

*Please Note:
This plugin requires that you install Installer Helper to install or remove
the plugin.*

*SQLite Users:
This plugin has SQLite enabled, however it has not been tested. If you are
running WolfCMS with SQLite and find an issue (or not) please let me know.*

## Upgrading

If you are upgrading from a previous version of WolfCMS, please first make sure
you have installed version 0.2.1 of this plugin before installing version 0.2.5.

[Download Redirector v0.2.1](https://github.com/downloads/realslacker/Redirector-Plugin/wolfcms-redirector-0.2.1.zip)

### Upgrading From v0.2.1

1. Disable the redirector plugin
2. Backup your database!
3. Backup the original redirector files and remove them from your server
4. Upload the new Redirector Plugin files
5. Enable the plugin, you will get an error message telling you to enable the
plugin again. This is normal, the plugin has to set a version in the database
so that it can perform the upgrade automatically.
6. Enable the plugin the second time
7. Done!

## Required

- WolfCMS 0.7.x (www.wolfcms.org)
- Installer Helper (https://github.com/realslacker/Installer-Helper)
- PHP 5
- PDO support
- MySQL 4.1.x or SQLite (experimental, please report issues)
