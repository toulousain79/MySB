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

Plugin::setInfos(array(
    'id'			=> 'redirector',
    'title'			=> 'Redirector', 
    'description'	=> 'Provides an interface to manage redirects.', 
    'version'		=> '0.2.5', 
    'website'		=> 'http://www.github.com/realslacker/Redirector-Plugin',
    'update_url'	=> 'http://www.brooksworks.com/plugin-versions.xml'
));

//	setup observers
Behavior::add('page_not_found', '');
Observer::observe('page_requested', 'redirector_catch_redirect');

//	allow Redirector to observe the "page_not_found" event before the "page_not_found" plugin
if (Plugin::isEnabled('page_not_found')) {
    Observer::stopObserving('page_not_found', 'behavior_page_not_found');
    Observer::observe('page_not_found', 'redirector_log_404');
    Observer::observe('page_not_found', 'behavior_page_not_found');
}
else {
    Observer::observe('page_not_found', 'redirector_log_404');
}

//	load plugin classes into the system
AutoLoader::addFolder(dirname(__FILE__) . '/models');

// add the plugin's tab and controller
Plugin::addController('redirector', __('Redirector'),'redirector_view,redirector_new,redirector_edit,redirector_delete,redirector_settings');

// redirect urls already configured
function redirector_catch_redirect(&$args) {

	if ( $redirect = RedirectorRedirects::findByURL($_SERVER['REQUEST_URI']) ) {
	
		$redirect->hits++;
		$redirect->updated = date('Y-m-d H:i:s');
		$redirect->save();

		header ('HTTP/1.1 301 Moved Permanently', true);
		header ("Location: {$redirect->dest}");
		exit();
	}

	return $args;

}

// watch and log 404 errors
function redirector_log_404() {

	if ( $error404 = Redirector404s::findByURL($_SERVER['REQUEST_URI']) ) {
		
		$error404->hits++;
		$error404->updated = date('Y-m-d H:i:s');
		$error404->save();
	
	}
	else {
	
		$error404 = new Redirector404s(array(
			'url'		=> $_SERVER['REQUEST_URI'],
			'hits'		=> 1,
			'created'	=> date('Y-m-d H:i:s'),
			'updated'	=> date('Y-m-d H:i:s')
		));
		$error404->save();
		
	}

}

// EOF