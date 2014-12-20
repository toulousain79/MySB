<?php

/*
 * Redirector - Wolf CMS URL redirection plugin
 *
 * Copyright (c) 2010 Design Spike
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *   http://themes.designspike.ca/redirector/help/
 *
 */

Plugin::setInfos(array(
    'id'          => 'redirector',
    'title'       => 'Redirector', 
    'description' => 'Provides an interface to manage redirects.', 
    'version'     => '0.2.1', 
    'website'     => 'http://themes.designspike.ca/redirector/',
	'update_url'  => 'http://themes.designspike.ca/redirector/redirector-versions.xml'
));

Behavior::add('page_not_found', '');
Observer::observe('page_requested', 'redirector_catch_redirect');

// allow Redirector to observe the "page_not_found" event before the "page_not_found" plugin
if (Plugin::isEnabled('page_not_found')) {
    Observer::stopObserving('page_not_found', 'behavior_page_not_found');
    Observer::observe('page_not_found', 'redirector_log_404');
    Observer::observe('page_not_found', 'behavior_page_not_found');
}
else {
    Observer::observe('page_not_found', 'redirector_log_404');
}

AutoLoader::addFolder(dirname(__FILE__) . '/models');
Plugin::addController('redirector', 'Redirector');
Plugin::addJavascript('redirector', 'js/jquery.scrollTo-min.js');

// determine the plugin URL for linking to images and css
if(strstr(CORE_ROOT, 'wolf')) {
	if (!defined('REDIRECTOR_BASE_URL')) define('REDIRECTOR_BASE_URL', URL_PUBLIC.'wolf/plugins/redirector/');
} else {
	if (!defined('REDIRECTOR_BASE_URL')) define('REDIRECTOR_BASE_URL', URL_PUBLIC.'frog/plugins/redirector/');
}

// redirect urls already set up
function redirector_catch_redirect(&$args)
{
	$redirect = Record::findAllFrom('RedirectorRedirects', 'url = \''.$_SERVER['REQUEST_URI'].'\'');
	if(sizeof($redirect) > 0) {
		Record::update('RedirectorRedirects', array('hits' => ($redirect[0]->hits + 1)), 'id = '.$redirect[0]->id);

		header ('HTTP/1.1 301 Moved Permanently', true);
		header ('Location: '.$redirect[0]->destination);
		exit();
	}

	return $args;
}

// watch and log 404 errors
function redirector_log_404()
{
	$redirect = Record::findAllFrom('Redirector404s', 'url = \''.$_SERVER['REQUEST_URI'].'\'');
	if(sizeof($redirect) > 0) {
		Record::update('Redirector404s', array('hits' => ($redirect[0]->hits + 1)), 'id = '.$redirect[0]->id);
	} else {
		Record::insert('Redirector404s', array('url' => $_SERVER['REQUEST_URI']));
	}
}
