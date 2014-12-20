<?php
/*
 * Redirector Plugin for WolfCMS <http://www.wolfcms.org>
 * Copyright (c) 2011 Shannon Brooks <shannon@brooksworks.com>
 * Adapted from Redirector by Design Spike <http://designspike.ca>
 * Major contributions and original idea by Cody at Design Spike
 *
 * Licensed under the MIT license
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Project home
 * http://www.github.com/realslacker/Redirector-Plugin
 */

//	security measure
if (!defined('IN_CMS')) { exit(); }

//	include the Installer helper
use_helper('Installer');

//	only support MySQL
$driver = Installer::getDriver();
if ( $driver != 'mysql' && $driver != 'sqlite' ) Installer::failInstall( 'redirector', __('Only MySQL and SQLite are supported!') );

//	get plugin version
$version = Plugin::getSetting('version', 'redirector');

switch ($version) {

	//	no version found so we do a clean install
	default:
	
		//	sanity check to make sure we are really dealing with a clean install
		if ($version !== false) Installer::failInstall( 'redirector', __('Unknown Version!') );
		
		
		//	make sure we aren't upgrading from a legacy version, if we are store legacy version for upgrade and fail install
		if ( Installer::$__CONN__->query('SELECT COUNT(*) FROM ' . TABLE_PREFIX . 'redirector_redirects') ) {
			
			$settings = array( 'version' => '0.2.1' );
			if ( ! Plugin::setAllSettings($settings, 'redirector') ) Installer::failInstall( 'redirector', __('Unable to store legacy version!') );
			
			Installer::failInstall( 'redirector', __('Legacy version set. Please re-enable plugin.') );
		
		}

		//	create tables
		
		$redirects_table = TABLE_PREFIX . 'redirector_redirects';
		$redirects_table_mysql =<<<SQL
			CREATE TABLE IF NOT EXISTS `{$redirects_table}`  (
				`id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
				`url` VARCHAR( 255 ) NULL DEFAULT NULL ,
				`dest` VARCHAR( 255 ) NULL DEFAULT NULL ,
				`hits` INT( 11 ) DEFAULT 0 NOT NULL ,
				`created` DATETIME NULL DEFAULT NULL ,
				`updated` DATETIME NULL DEFAULT NULL ,
				`perm` TINYINT( 1 ) DEFAULT 0 NOT NULL ,
				PRIMARY KEY ( `id` )
			) ENGINE=MYISAM DEFAULT CHARSET=utf8
SQL;
		$redirects_table_sqlite =<<<SQL
			CREATE TABLE IF NOT EXISTS `{$redirects_table}` (
				`id` INTEGER PRIMARY KEY AUTOINCREMENT ,
				`url` VARCHAR( 255 ) ,
				`dest` VARCHAR( 255 ) ,
				`hits` INT( 11 ) DEFAULT 0 NOT NULL ,
				`created` DATETIME DEFAULT NULL ,
				`updated` DATETIME DEFAULT NULL ,
				`perm` TINYINT( 1 ) DEFAULT 0 NOT NULL
			)
SQL;
		if ( ! Installer::createTable($redirects_table,( $driver == 'mysql' ? $redirects_table_mysql : $redirects_table_sqlite )) ) Installer::failInstall( 'redirector', __('Could not create table 1 of 2.') );

		$errors_table = TABLE_PREFIX . 'redirector_404s';
		$errors_table_mysql =<<<SQL
			CREATE TABLE IF NOT EXISTS `{$errors_table}`  (
				`id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
				`url` VARCHAR( 255 ) NULL DEFAULT NULL ,
				`hits` INT( 11 ) DEFAULT 0 NOT NULL ,
				`created` DATETIME NULL DEFAULT NULL ,
				`updated` DATETIME NULL DEFAULT NULL ,
				PRIMARY KEY ( `id` )
			) ENGINE=MYISAM DEFAULT CHARSET=utf8
SQL;
		$errors_table_sqlite =<<<SQL
			CREATE TABLE IF NOT EXISTS `{$errors_table}` (
				`id` INTEGER PRIMARY KEY AUTOINCREMENT ,
				`url` VARCHAR( 255 ) ,
				`hits` INT( 11 ) DEFAULT 0 NOT NULL ,
				`created` DATETIME DEFAULT NULL ,
				`updated` DATETIME DEFAULT NULL
			)
SQL;
		if ( ! Installer::createTable($errors_table,( $driver == 'mysql' ? $errors_table_mysql : $errors_table_sqlite )) ) Installer::failInstall( 'redirector', __('Could not create table 2 of 2.') );
		
		//	create new permissions
		if ( ! Installer::createPermissions('redirector_view,redirector_new,redirector_edit,redirector_delete,redirector_settings') ) Installer::failInstall( 'redirector' );

		//	create new roles
		if ( ! Installer::createRoles('redirector admin,redirector editor,redirector user') ) Installer::failInstall( 'redirector' );
			
		//	assign permissions
		//	note: admin_view is needed in case they don't have any other permissions, otherwise they won't be able to log in to admin interface
		if ( ! Installer::assignPermissions('administrator','redirector_view,redirector_new,redirector_edit,redirector_delete,redirector_settings') ) Installer::failInstall( 'redirector' );
		if ( ! Installer::assignPermissions('editor','redirector_view') ) Installer::failInstall( 'redirector' );
		if ( ! Installer::assignPermissions('redirector admin','admin_view,redirector_view,redirector_new,redirector_edit,redirector_delete,redirector_settings') ) Installer::failInstall( 'redirector' );
		if ( ! Installer::assignPermissions('redirector editor','admin_view,redirector_view,redirector_new,redirector_edit,redirector_delete') ) Installer::failInstall( 'redirector' );
		if ( ! Installer::assignPermissions('redirector user','admin_view,redirector_view') ) Installer::failInstall( 'redirector' );
		
		//	setup plugin settings
		$settings = array(
			'version'		=>	'0.2.5',
			'threshold'		=>	'10',
			'expireafter'	=>	'365'
		);
		if ( ! Plugin::setAllSettings($settings, 'redirector') ) Installer::failInstall( 'redirector', __('Unable to store plugin settings!') );
			
		Flash::set('success', __('Successfully installed Redirector plugin.'));
		
		//	we must exit the switch so upgrades are not applied to new installation (they should already be integrated for new installs)
		break;
		

	//	upgrade legacy to 0.2.5
	case '0.2.1':
	
		//	fix redirects table
		$redirects_table = TABLE_PREFIX . 'redirector_redirects';
		$redirects_table_mysql =<<<SQL
			ALTER TABLE `{$redirects_table}`
				CHANGE `destination` `dest` VARCHAR( 255 ) NULL DEFAULT NULL ,
				CHANGE `created_on` `created` DATETIME NULL DEFAULT NULL ,
				ADD `updated` DATETIME NULL DEFAULT NULL ,
				ADD `perm` TINYINT( 1 ) NOT NULL DEFAULT '0';
			UPDATE `{$redirects_table}` SET `updated`=`created`;
SQL;
		$redirects_table_sqlite =<<<SQL
			ALTER TABLE `{$redirects_table}` RENAME TO `{$redirects_table}_old`;
			CREATE TABLE `{$redirects_table}` (
				`id` INTEGER PRIMARY KEY AUTOINCREMENT ,
				`url` VARCHAR( 255 ) ,
				`dest` VARCHAR( 255 ) ,
				`hits` INT( 11 ) DEFAULT 0 NOT NULL ,
				`created` DATETIME DEFAULT NULL ,
				`updated` DATETIME DEFAULT NULL ,
				`perm` TINYINT( 1 ) DEFAULT 0 NOT NULL
			);
			INSERT INTO `{$redirects_table}` ( `url`, `dest`, `hits`, `created`, `updated` )
				SELECT `url`, `destination`, `hits`, `created_on`, `created_on`
				FROM `{$redirects_table}_old`;
			DROP TABLE `{$redirects_table}_old`;
SQL;
		$sql = $driver == 'mysql' ? $redirects_table_mysql : $redirects_table_sqlite ;
		if ( ! Installer::query($sql) ) Installer::failInstall( 'redirector', __('Could not alter table 1 of 2.') );
		
		//	fix 404s table
		$errors_table = TABLE_PREFIX . 'redirector_404s';
		$errors_table_mysql =<<<SQL
			ALTER TABLE `{$errors_table}`
				CHANGE `created_on` `created` DATETIME NULL DEFAULT NULL ,
				ADD `updated` DATETIME NULL DEFAULT NULL;
			UPDATE `{$errors_table}` SET `updated`=`created`;
SQL;
		$errors_table_sqlite =<<<SQL
			ALTER TABLE `{$errors_table}` RENAME TO `{$errors_table}_old`;
			CREATE TABLE `{$errors_table}` (
				`id` INTEGER PRIMARY KEY AUTOINCREMENT ,
				`url` VARCHAR( 255 ) ,
				`hits` INT( 11 ) DEFAULT 0 NOT NULL ,
				`created` DATETIME DEFAULT NULL ,
				`updated` DATETIME DEFAULT NULL
			);
			INSERT INTO `{$errors_table}` ( `url`, `hits`, `created`, `updated` )
				SELECT `url`, `hits`, `created_on`, `created_on`
				FROM `{$errors_table}_old`;
			DROP TABLE `{$errors_table}_old`;
SQL;
		$sql = $driver == 'mysql' ? $errors_table_mysql : $errors_table_sqlite ;
		if ( ! Installer::query($sql) ) Installer::failInstall( 'redirector', __('Could not alter table 2 of 2.') );

		//	create new permissions
		if ( ! Installer::createPermissions('redirector_view,redirector_new,redirector_edit,redirector_delete,redirector_settings') ) Installer::failInstall( 'redirector' );

		//	create new roles
		if ( ! Installer::createRoles('redirector admin,redirector editor,redirector user') ) Installer::failInstall( 'redirector' );
			
		//	assign permissions
		//	note: admin_view is needed in case they don't have any other permissions, otherwise they won't be able to log in to admin interface
		if ( ! Installer::assignPermissions('administrator','redirector_view,redirector_new,redirector_edit,redirector_delete,redirector_settings') ) Installer::failInstall( 'redirector' );
		if ( ! Installer::assignPermissions('editor','redirector_view') ) Installer::failInstall( 'redirector' );
		if ( ! Installer::assignPermissions('redirector admin','admin_view,redirector_view,redirector_new,redirector_edit,redirector_delete,redirector_settings') ) Installer::failInstall( 'redirector' );
		if ( ! Installer::assignPermissions('redirector editor','admin_view,redirector_view,redirector_new,redirector_edit,redirector_delete') ) Installer::failInstall( 'redirector' );
		if ( ! Installer::assignPermissions('redirector user','admin_view,redirector_view') ) Installer::failInstall( 'redirector' );
		
		//	setup plugin settings
		$settings = array(
			'version'		=>	'0.2.5',
			'threshold'		=>	'10',
			'expireafter'	=>	'365'
		);
		if ( ! Plugin::setAllSettings($settings, 'redirector') ) Installer::failInstall( 'redirector', __('Unable to store plugin settings!') );

		Flash::set( 'success', __('Successfully upgraded Redirector plugin.') );
		break;

}
// EOF