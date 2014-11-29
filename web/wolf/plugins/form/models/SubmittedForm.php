<?php
if (!defined('IN_CMS')) { exit(); }

/**
 * Form
 *
 * The Form plugin is a third-party plugin that lets you create and display forms on your installation of Wolf CMS.
 */

class SubmittedForm
{
    public $form;
    public $submitted_fields;
    
    public function __construct($form, $data)
    {
        $this->form = $form;
        $this->data = $data;
        $this->submitted_fields = $data;
    }
    
    public function save()
    {
        use_helper('Email');
                
        $email_body = '';

        $email_body .= "<table style=\"font: 12px/18px 'Arial','Helvetica',sans-serif;\">";
        foreach($this->form->fields as $field) {
            $value = $this->data[$field->slug];

            if (is_array($value)) {
                $value = implode(', ', $value);
            }

            $email_body .= '<tr><th style="text-align: left; vertical-align: top; white-space:nowrap;">'. $field->label .':</th><td style="text-align: left; vertical-align: top;">'.nl2br($value)."</td></tr>";
            
            if ($field->type == 'email_address') {
                $sender = $this->data[$field->slug];
            }
        }
        $email_body .= '</table>';

        $email = new Email(array('mailtype' => 'html'));

        $errors = 0;

        $receivers = explode(';', $this->form->mail_to);
        foreach ($receivers as $receiver) {
            $email->from(Setting::get('admin_email'), Setting::get('admin_title'));
            if (isset($sender) && !empty($sender)) {
                $email->replyTo($sender);
            }
            $email->to(trim($receiver));
            $email->subject($this->form->name);
            $email->message($email_body);

            if(!$email->send()) {
                $errors++;
            }
        }
        
        $copy_message = Plugin::getSetting('copy_message', 'form');
        
        if (isset($sender) && !empty($sender)) {
            $email = new Email(array('mailtype' => 'html'));
            $email->from(Setting::get('admin_email'), Setting::get('admin_title'));
            $email->to($sender);
            $email->subject($this->form->name);
            $email->message($copy_message . $email_body);
            $email->send();
        }
        
        if ($errors > 0) {
            return false;
        }
        else {
            return true;
        }
    }
    
    public function validate()
    {
        if ($this->form instanceof Form and is_array($submitted_fields)) {
            return $this->form->validate($submitted_fields);
        }
    }
}
