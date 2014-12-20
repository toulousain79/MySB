<?php
/*
 * Redirector Plugin for WolfCMS <http://www.wolfcms.org>
 * Copyright (c) 2011 Shannon Brooks <http://www.brooksworks.com>
 * Adapted from Redirector by Design Spike <http://designspike.ca>
 * Major contributions and original idea by Cody at Design Spike
 *
 * Licensed under the MIT license
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Project home
 * http://www.github.com/realslacker/Redirector-Plugin
 */
 
class RedirectorController extends PluginController {

    public $settings;
    
    function __construct() {

		self::__checkPermission();
		
		$this->setLayout('backend');
		$this->assignToLayout( 'sidebar', new View('../../plugins/redirector/views/sidebar') );

		$this->__settings();

    }
 
    //	redirects to redirects page
    function index() {
		
		self::__checkPermission('redirector_view');
		
		//	cleanup old redirects
		$expireafter = Plugin::getSetting('expireafter', 'redirector');
		if ( $expireafter > 0 ) {
			Record::deleteWhere('RedirectorRedirects',"updated < DATE_SUB(NOW(), INTERVAL {$expireafter} DAY) AND perm='0'");
			Record::deleteWhere('Redirector404s',"updated < DATE_SUB(NOW(), INTERVAL {$expireafter} DAY)");
		}
		
		$data['redirects'] = RedirectorRedirects::findAll( array(
			'order'=>'redirects.dest, redirects.url'
		) );
		
		$threshold = Plugin::getSetting('threshold', 'redirector');
		$data['errors'] = Redirector404s::findAll( array(
			'where'=>'error404s.hits >= ' . $threshold,
			'order'=>'error404s.hits DESC'
		) );
		
		$this->display( 'redirector/views/index', $data );
    
    }
    
	//	displays settings of plugin
	public function settings($save=false) {
		
		self::__checkPermission('redirector_settings');
		
		if ( $save ) {
			
			$settings['threshold'] = (int)$_POST['threshold'];
			$settings['expireafter'] = (int)$_POST['expireafter'];
			
			if ( ! Plugin::setAllSettings($settings, 'redirector') )
				Flash::set('error',__('Could not save settings!'));
			
			redirect( get_url('plugin/redirector/settings') );
		
		}
		
		$this->display('redirector/views/settings', $this->settings);
	
	}
	
	//	saves a redirect and removes a 404 (if it exists)
	function save() {

        self::__checkPermission('redirector_edit');
		
		$data = $_POST['redirect'];

        if ( empty($data['url']) ) {
            Flash::set( 'error', __('You must specify a url!') );
            redirect( get_url('plugin/redirector/') );
        }

        if ( empty($data['dest']) ) {
            Flash::set( 'error', __('You must specify a destination url!') );
            redirect( get_url('plugin/redirector/') );
        }
		
		if ( ! $redirect = RedirectorRedirects::findByURL($data['url']) ) {
		
			$redirect = new RedirectorRedirects;
			$redirect->created = date('Y-m-d H:i:s');
		
		}

		$redirect->url = $data['url'];
		$redirect->dest = $data['dest'];
		$redirect->updated = date('Y-m-d H:i:s');
		
		if ( ! $redirect->save() )
			Flash::set('error', __('There was a problem adding your redirect.'));

		if ( $error = Redirector404s::findByURL($data['url']) )
			$error->delete();
		
		Flash::set('success', __('Redirect has been added!'));
		redirect(get_url('plugin/redirector/'));
	}
	
	//	makes a redirect permanent
	function lock($id,$locked=1) {
		
		self::__checkPermission('redirector_edit');
		
		if ( ! $redirect = RedirectorRedirects::findById($id) ) {
			Flash::set( 'error', __('Could not find redirect!') );
			redirect(get_url('plugin/redirector/'));
		}
		
		$redirect->perm = (int)$locked;
		
		if ( ! $redirect->save() ) {
			Flash::set('error', __('There was a problem :action your redirect.', array( ':action'=> ( $locked ? __('locking') : __('unlocking') ) ) ) );
			redirect(get_url('plugin/redirector/'));
		}
		
		Flash::set('success', __('Redirect has been :action!', array( ':action'=> ( $locked ? __('locked') : __('unlocked') ) ) ) );
		redirect(get_url('plugin/redirector/'));
	}
	
	// makes a redirect expire
	function unlock($id) {
		
		$this->lock($id,0);
	
	}
	
	//	removes a 404 or redirect
	function remove($type,$id) {

		self::__checkPermission('redirector_delete');
		
		switch ($type) {
			
			case 'redirect':
				$record = RedirectorRedirects::findById($id);
				break;
			
			case '404':
				$record = Redirector404s::findById($id);
				break;
			
			default:
				$record = false;
				break;
		
		}

		if ( $record === false ) {
			
			Flash::set( 'error', __('Could not find :type record!', array( ':type' => $type ) ) );
			
			redirect( get_url('plugin/redirector/') );
		
		}
		
		if ( ! $record->delete() ) {
			
			Flash::set( 'error', __('Could not delete :type record!', array( ':type' => $type ) ) );
			
			redirect( get_url('plugin/redirector/') );
		
		}
		
		Flash::set( 'success', __('Redirect has been deleted!') );

		redirect( get_url('plugin/redirector/') );

	}

	//	removes all 404 errors
	function clear404s() {
	
		self::__checkPermission('redirector_delete');
		
		if ( ! Record::deleteWhere('Redirector404s','1') )
			Flash::set('error', __('There was a problem clearing the 404 errors!'));
			
		else
			Flash::set('success', __('404 Errors have been cleared!'));
		
		redirect(get_url('plugin/redirector/'));
	
	}

//*/
// UTILITY FUNCTIONS ******************************************************************************
// ************************************************************************************************

	//	Check a users permission against the role they have been assigned.
	//
	//	@param string $permission - possible values redirector_view, redirector_new, redirector_edit, redirector_delete, redirector_settings
	//	@return redirects the user if they do not have permission
	private static function __checkPermission($permission='redirector_view') {
		AuthUser::load();
		if ( ! AuthUser::isLoggedIn() ) {
			redirect(get_url('login'));
		}
		if ( ! AuthUser::hasPermission($permission) ) {
			Flash::set('error', __('You do not have permission to access the requested page!'));
			if (! AuthUser::hasPermission('redirector_view') ) redirect(get_url());
			else redirect(get_url(''));
		}
	}

	//	Puts all settings into $this->settings
	private function __settings() {
		if (!$this->settings = Plugin::getAllSettings('redirector')) {
			Flash::set('error', __('Unable to retrieve plugin settings.'));
			redirect(get_url('setting'));
			return;
		}
	}

	
}
// EOF