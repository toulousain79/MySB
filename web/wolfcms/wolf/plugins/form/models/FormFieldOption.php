<?php
if (!defined('IN_CMS')) { exit(); }

/**
 * Form
 *
 * The Form plugin is a third-party plugin that lets you create and display forms on your installation of Wolf CMS.
 */

class FormFieldOption extends Record
{
    const TABLE_NAME = 'form_field_option';
    
    public $id;
    public $label;
    public $slug;
    public $field_id;
    public $position;
    
    public function beforeSave()
    {
        $this->slug = Node::toSlug($this->label);
        
        return true;
    }

    public function beforeInsert()
    {
        $this->slug = $this->uniqueSlug();

        return true;
    }

    public function uniqueSlug($i = 1)
    {
        $slug = $this->slug;
        if ($i > 1) {
            $slug .= '-' . $i;
        }

        if ($duplicate = self::findOneFrom('FormFieldOption', 'slug = ? AND field_id = ?', array($slug, $this->field_id))) {
            $i++;
            $slug = $this->uniqueSlug($i);
        }
        return $slug;
    }
    
    public static function deleteByFieldId($field_id)
    {
        $field_id = (int) $field_id;
        
        $form_field_options = self::findByFieldId($field_id);
        
        if (is_array($form_field_options)) {
            foreach ($form_field_options as $form_field_option) {
                if (!$form_field_option->delete()) {
                    return false;
                }
            }
        } elseif ($form_field_options instanceof FormFieldOption) {
            if (!$form_field_options->delete()) {
                return false;
            }
        }
        
        return true;
    }
    
    public static function deleteByFormId($form_id)
    {
        $form_id = (int) $form_id;
        
        $fields = FormField::findByFormId($form_id);
        
        foreach ($fields as $field) {
            FormFieldOption::deleteByFieldId($field->id);
        }
    }
    
    public static function findByFieldId($id)
    {
        $id = (int) $id;
        
        return Record::findAllFrom('FormFieldOption', 'field_id = ' . $id . ' ORDER BY position ASC, id ASC');
    }
}
