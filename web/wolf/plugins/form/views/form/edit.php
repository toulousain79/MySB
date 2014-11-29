<?php
if (!defined('IN_CMS')) { exit(); }

/**
 * Form
 *
 * The Form plugin is a third-party plugin that lets you create and display forms on your installation of Wolf CMS.
 */

?>
<h1><?php echo __(ucfirst($action).' form'); ?></h1>

<div id="form">

<form id="form_edit" method="post" action="<?php if ($action == 'add') echo get_url('plugin/form/add'); else echo get_url('plugin/form/edit/'.$form->id); ?>">
<p><table class="form">
    <tr>
        <td class="label"><label for="form_name"><?php echo __('Form name'); ?></label></td>
        <td class="field"><input class="textbox" type="text" name="form[name]" id="form_name" value="<?php echo $form->name; ?>" /></td>
    </tr>
    <tr>
        <td class="label"><label for="form_mail_to"><?php echo __('Email results to'); ?></label></td>
        <td class="field"><input class="textbox" type="text" name="form[mail_to]" id="form_mail_to" value="<?php echo $form->mail_to; ?>" /></td>
    </tr>
</table></p>

<p><?php echo __('You can seperate multiple e-mail addresses with a semicolon.'); ?></p>

<p><table class="fields">
    <tr>
        <th><?php echo __('Label'); ?></th>
        <th><?php echo __('Type'); ?></th>
        <th><?php echo __('Options'); ?> *</th>
        <th class="set_required"><?php echo __('Required'); ?></th>
        <th class="delete"><?php echo __('Delete'); ?></th>
    </tr>
<?php

$current_id = 1;

foreach ($form->fields as $field) {
    echo new View('../../plugins/form/views/form/field_row', array(
        'field' => (object) $field,
        'current_id' => $current_id,
        'types' => form_field_types()
    ));
    
    $current_id++;
}
?>
</table></p>

<p><a href="javascript:appendField();"><?php echo __('Add form field'); ?></a></p>

<script language="javascript">  
var current_id = <?php echo $current_id; ?>;

function appendField() {
    var append = '<?php echo new View('../../plugins/form/views/form/field_row', array(
        'current_id' => ':current_id',
        'types' => form_field_types()
    )); ?>';
    
    append = append.replace(/:current_id/g, current_id);
    
    
    $('.fields').append(append);
    
    $('#field-' + current_id + ' input[type="text"]').focus();
    
    current_id++;
}

function removeField(id) {
    var tr_id = '#field-' + id;
    
    $(tr_id).remove();
}
</script>

<p>* <?php echo __('Under options you can specify the different options in case of a dropdown list, checkboxes or radio buttons. Seperate with a semicolon.'); ?></p>

<p class="buttons">
    <input class="button" name="commit" type="submit" accesskey="s" value="<?php echo __('Save and Close'); ?>" />
    <input class="button" name="continue" type="submit" accesskey="e" value="<?php echo __('Save and Continue Editing'); ?>" />
    <?php echo __('or'); ?> <a href="<?php echo get_url('plugin/form/forms'); ?>"><?php echo __('Cancel'); ?></a>
</p>
</form>

</div>
