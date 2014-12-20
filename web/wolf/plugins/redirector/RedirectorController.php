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

class RedirectorController extends PluginController {
    function __construct() {
        AuthUser::load();
        if ( ! AuthUser::isLoggedIn()) {
            redirect(get_url('login'));
        }
 
        $this->setLayout('backend');
        $this->assignToLayout('sidebar', new View('../../plugins/redirector/views/sidebar'));
    }
 
    function index() {
		// load redirects and logged 404 errors. findFromAll doesn't allow ordering, so this is a bit of a hack.
		$data['current_redirects'] = Record::findAllFrom('RedirectorRedirects', 'id LIKE \'%\' ORDER BY destination, url');
		$data['current_404s'] = Record::findAllFrom('Redirector404s', 'id LIKE \'%\' ORDER BY hits DESC');
		
        $this->display('redirector/views/index', $data);
    }

	function save() {

        $data = $_POST['redirect'];

        if (empty($data['url']))
        {
            Flash::set('error', __('You have to specify a url!'));
            redirect(get_url('plugin/redirector/'));
        }

        if (empty($data['destination']))
        {
            Flash::set('error', __('You have to specify a destination url!'));
            redirect(get_url('plugin/redirector/'));
        }
		
		if ($existing_redirect = Record::findOneFrom('RedirectorRedirects', 'url = \''.($data['url'].'\''))) {
			Record::update('RedirectorRedirects', array('url' => $data['url'], 'destination' => $data['destination']), 'url = \''.($data['url'].'\''));
		} else {
			$entry = new RedirectorRedirects($data);
			
			if ( ! $entry->save())
	        {
	            Flash::set('error', __('There was a problem adding your redirect.'));
	        }
	        else
	        {
		        if ($error = Record::findOneFrom('Redirector404s', 'url = \''.($data['url'].'\'')))
		        {
		            $error->delete();
		        }

	            Flash::set('success', __('Redirect has been added!'));
	        }
		}

		
        redirect(get_url('plugin/redirector/'));
	}
	
	function remove($id) {
        // find the user to delete
        if ($redirect = Record::findByIdFrom('RedirectorRedirects', $id))
        {
            if ($redirect->delete())
            {
                Flash::set('success', __('Redirect has been deleted!'));
            }
            else
                Flash::set('error', __('There was a problem deleting this redirect!'));
        }
        else Flash::set('error', __('Redirect not found!'));
        
        redirect(get_url('plugin/redirector/'));		
	}

	function remove_404($id) {
        // find the user to delete
        if ($error = Record::findByIdFrom('Redirector404s', $id))
        {
            if ($error->delete())
            {
                Flash::set('success', __('404 Error has been deleted!'));
            }
            else
                Flash::set('error', __('There was a problem deleting this 404 error!'));
        }
        else Flash::set('error', __('404 Error not found!'));
        
        redirect(get_url('plugin/redirector/'));		
	}

}