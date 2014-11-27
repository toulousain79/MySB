<?php
if (!defined('IN_CMS')) { exit(); }

/**
 * Form
 *
 * The Form plugin is a third-party plugin that lets you create and display forms on your installation of Wolf CMS.
 */

class FormController extends PluginController
{
    const PLUGIN_NAME = 'form';
    
    public function __construct()
    {
        $this->setLayout('backend');
        $this->assignToLayout('sidebar', new View('../../plugins/form/views/sidebar'));
    }
    
    public function add()
    {
        if (get_request_method() == 'POST') {
            return $this->_save('add');
        }
        
        $data = Flash::get('post_data');
        $form = new Form($data);
        
        $this->display('form/views/form/edit', array(
            'action' => 'add',
            'form' => $form
        ));
    }
    
    public function delete($id)
    {
        if (!is_numeric($id)) {
            redirect(get_url('plugin/form/forms'));
        }
        
        if ($form = Form::findById($id)) {
            if ($form->delete()) {
                Observer::notify('form_delete', $form);
                Flash::set('success', __("The form ':name' has been deleted!", array(':name' => $form->name)));
            } else {
                Flash::set('error', __("An error has occured, therefore form ':name' could not be deleted!", array(':name' => $form->name)));
            }
        } else {
            Flash::set('error', __('The form could not be found!'));
        }
        
        redirect(get_url('plugin/form/forms'));
    }

    public function documentation()
    {
        $this->display('form/views/documentation/index');
    }
    
    public function edit($id)
    {
        if (is_numeric($id)) {
            if (get_request_method() == 'POST') {
                return $this->_save('edit', $id);
            }
            
            if ($form = Form::findById($id)) {
                $this->display('form/views/form/edit', array(
                    'action' => 'edit',
                    'form' => $form
                ));
            } else {
                Flash::set('error', __('The form could not be found!'));
                redirect(get_url('plugin/form/forms'));
            }
        } else {
            Flash::set('error', __('The form could not be found!'));
            redirect(get_url('plugin/form/forms'));
        }
    }
    
    public function forms()
    {
        $this->display('form/views/form/index', array(
            'forms' => Form::findAll()
        ));
    }
    
    public function index()
    {
        $this->forms();
    }
    
    public function settings()
    {
        if (isset($_POST['save']) && $_POST['save'] == __('Save Settings')) {
            Plugin::setAllSettings($_POST['setting'], self::PLUGIN_NAME);
            Flash::setNow('success', __('Settings have been saved!'));
        }
        
        $this->display('form/views/settings/index', array(
            'settings' => Plugin::getAllSettings(self::PLUGIN_NAME)
        ));
    }
    
    private function _save($action, $id=false)
    {
        if ($action == 'edit' && !$id) {
            throw new Exception('Trying to edit form when $id is false.');
        }
        
        $data = $_POST['form'];
        Flash::set('post_data', (object) $data);
        
        $errors = false;
        
        use_helper('Validate');
        use_helper('Kses');
        
        $data['name'] = kses(trim($data['name']), array());
        $data['mail_to'] = kses(trim($data['mail_to']), array());
        
        if (empty($data['name'])) {
            $errors[] = __('You have to specify a form name!');
        }
        
        $emails = explode(';', $data['mail_to']);
        foreach ($emails as $email) {
            if (empty($email)) {
                $errors[] = ('You have to specify one or more valid email addresses!');
            } elseif (!Validate::email($email)) {
                $errors[] = ('You have to specify one or more valid email addresses!');
            }
        }
        
        if ($action == 'add') {
            $form = new Form();
            $form->setFromData($data);
        } else {
            $form = Form::findById($id);
            $form->setFromData($data);
        }
        
        if ($errors !== false) {
            Flash::setNow('error', implode('<br />', $errors));
            
            $this->display('form/views/form/edit', array(
                'action' => $action,
                'form' => (object) $form
            ));
        }
        
        if ($action == 'add') {
            Observer::notify('form_add_before_save', $form);
        } else {
            Observer::notify('form_edit_before_save', $form);
        }
        
        if ($form->save()) {
            Flash::set('success', __('Form has been saved!'));
        } else {
            Flash::set('error', __('Form has not been saved!'));
            
            echo '<pre>';
            print_r($form);
            echo '</pre>';
            die;
            
            
            $url = 'plugin/form/';
            $url .= ($action == 'edit') ? 'edit/'.$id : 'add';
            redirect(get_url($url));
        }
        
        if ($action == 'add') {
            Observer::notify('form_add_after_save', $form);
        } else {
            Observer::notify('form_edit_after_save', $form);
        }
        
        // save and quit or save and continue editing ?
        if (isset($_POST['commit'])) {
            redirect(get_url('plugin/form/forms'));
        } else {
            redirect(get_url('plugin/form/edit/'.$form->id));
        }
    }
}
