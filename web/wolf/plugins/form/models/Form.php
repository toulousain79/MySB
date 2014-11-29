<?php
if (!defined('IN_CMS')) { exit(); }

/**
 * Form
 *
 * The Form plugin is a third-party plugin that lets you create and display forms on your installation of Wolf CMS.
 */

class Form extends Record
{
    const TABLE_NAME = 'form';
    
    public $id;
    public $name;
    public $mail_to;
    
    public $created_on;
    public $updated_on;
    public $created_by_id;
    public $updated_by_id;
    
    public $values = array();
    
    public function __construct()
    {
        $this->fields();
    }
    
    public function beforeDelete()
    {
        if (!FormField::deleteByFormId($this->id)) {
            return false;
        } else {
            return true;
        }
    }
    
    public function beforeInsert()
    {
        $this->created_on       = date('Y-m-d H:i:s');
        $this->created_by_id    = AuthUser::getRecord()->id;

        return true;
    }
    
    public function beforeSave()
    {
        $this->updated_on       = date('Y-m-d H:i:s');
        $this->updated_by_id    = AuthUser::getRecord()->id;
        
        return true;
    }
    
    public function afterSave()
    {
        $old_fields = FormField::findByFormId($this->id);
        if (isset($_POST['fields'])) {
            $new_fields = $_POST['fields'];
        } else {
            $new_fields = array();
        }

        foreach ($old_fields as $old_field) {
            $not_in = true;

            if (is_array($new_fields)) {
                foreach ($new_fields as $key => $field) {
                    if ($old_field->id == $field['id']) {
                        $not_in = false;

                        $old_field->setFromData($field);
                        $old_field->save();

                        unset($new_fields[$key]);
                        break;
                    }
                }
            }

            if ($not_in) {
                $old_field->delete();
            }
        }

        foreach ($new_fields as $field) {
            $new_field = new FormField();
            $new_field->setFromData($field);
            $new_field->form_id = $this->id;

            $new_field->save();
        }
        
        return true;
    }
    
    public function emails()
    {
        $emails = explode(';',$this->mail_to);
        
        return $emails;
    }

    public function fields()
    {
        if (!isset($this->fields)) {
            $this->fields = FormField::findByFormId($this->id);
        }

        return $this->fields;
    }
    
    public static function findAll()
    {
        return Record::findAllFrom('Form');
    }

    public function getColumns()
    {
        return array(
            'id', 'name', 'mail_to',
            'created_on', 'updated_on', 'created_by_id', 'updated_by_id'
        );
    }
    
    public function validate($data = false)
    {
        $fields = FormField::findByFormId($this->id);
        $data = (object) $data;
        $this->errors = array();
        
        $empty = true;
        
        foreach ($fields as $field) {
            $field_name = $field->slug;
            if (isset($data->$field_name)) {
                $value = $data->$field_name;
                
                if ((is_string($value) && trim($value != '')) || (is_array($value) && count($value) > 0) ) {
                    $empty = false;
                }
            } else {
                $value = '';
            }
            
            if (!$field->validate($value)) {
                $this->errors[$field->slug] = $field->label;
            }
        }
        
        if (count($this->errors) > 0) {
            return false;
        }
        
        if ($empty) {
            return false;
        }
        
        return true;
    }
}
