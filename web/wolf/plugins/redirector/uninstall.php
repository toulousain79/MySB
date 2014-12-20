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

if ( ! Installer::removeTable(TABLE_PREFIX.'redirector_redirects') ) Installer::failUninstall( 'redirector', __('Could not remove table 1 of 2.') );
if ( ! Installer::removeTable(TABLE_PREFIX.'redirector_404s') ) Installer::failUninstall( 'redirector', __('Could not remove table 2 of 2.') );

if ( ! Installer::removePermissions('redirector_view,redirector_new,redirector_edit,redirector_delete,redirector_settings') ) Installer::failUninstall( 'redirector' );

if ( ! Installer::removeRoles('redirector admin,redirector editor,redirector user') ) Installer::failUninstall( 'redirector' );

if ( ! Plugin::deleteAllSettings('redirector') ) Installer::failUninstall( 'redirector', __('Could not remove plugin settings.') );

Flash::set('success', __('Successfully uninstalled plugin.'));
redirect(get_url('setting'));

// EOF