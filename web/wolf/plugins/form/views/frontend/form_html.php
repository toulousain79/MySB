<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
<dl>
    <?php foreach($form->fields as $field): ?>
    <dt><label for="<?php echo $field->slug; ?>" class="<?php if ($field->required > 0): ?>required<?php endif; ?> <?php if (isset($form->errors[$field->slug])): ?>invalid<?php endif; ?>"><?php echo $field->label; ?></label></dt>
    <dd>
        <?php if ($field->type == 'text'): ?>
        <input type="text" name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>"<?php if (isset($form->values[$field->slug])): ?> value="<?php echo $form->values[$field->slug]; ?>"<?php endif; ?> />
        <?php endif; ?>
        
        <?php if ($field->type == 'long_text'): ?>
        <textarea name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>"><?php if (isset($form->values[$field->slug])) {echo $form->values[$field->slug];} ?></textarea>
        <?php endif; ?>
        
        <?php if ($field->type == 'number'): ?>
        <input type="text" name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>"<?php if (isset($form->values[$field->slug])): ?> value="<?php echo $form->values[$field->slug]; ?>"<?php endif; ?> />
        <?php endif; ?>
        
        <?php if ($field->type == 'postcode'): ?>
        <input type="text" name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>"<?php if (isset($form->values[$field->slug])): ?> value="<?php echo $form->values[$field->slug]; ?>"<?php endif; ?> />
        <?php endif; ?>
        
        <?php if ($field->type == 'email_address'): ?>
        <input type="text" name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>"<?php if (isset($form->values[$field->slug])): ?> value="<?php echo $form->values[$field->slug]; ?>"<?php endif; ?> />
        <?php endif; ?>
        
        <?php if ($field->type == 'phone_number'): ?>
        <input type="text" name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>"<?php if (isset($form->values[$field->slug])): ?> value="<?php echo $form->values[$field->slug]; ?>"<?php endif; ?> />
        <?php endif; ?>
        
        <?php if ($field->type == 'url'): ?>
        <input type="text" name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>"<?php if (isset($form->values[$field->slug])): ?> value="<?php echo $form->values[$field->slug]; ?>"<?php endif; ?> />
        <?php endif; ?>
        
        <?php if ($field->type == 'dropdown'): ?>
        <select name="form[<?php echo $field->slug; ?>]">
        <?php foreach ($field->options as $option): ?>
        <option value="<?php echo $option->label; ?>"<?php if (isset($form->values[$field->slug]) && $form->values[$field->slug] == $option->label): ?> selected="selected"<?php endif; ?>><?php echo $option->label; ?></option>
        <?php endforeach; ?>
        </select>
        <?php endif; ?>
        
        <?php if ($field->type == 'checkboxes'): ?>
        <?php foreach ($field->options as $option): ?>
        <input type="checkbox" name="form[<?php echo $field->slug; ?>][<?php echo $option->slug; ?>]" id="<?php echo $field->slug; ?>_<?php echo $option->slug; ?>" value="<?php echo $option->label; ?>"<?php if (isset($form->values[$field->slug][$option->slug])): ?> checked="checked"<?php endif; ?> /> <label for="<?php echo $field->slug; ?>_<?php echo $option->slug; ?>"><?php echo $option->label; ?></label>
        <?php endforeach; ?>
        <?php endif; ?>
        
        <?php if ($field->type == 'radio_buttons'): ?>
        <?php foreach ($field->options as $option): ?>
        <input type="radio" name="form[<?php echo $field->slug; ?>]" id="<?php echo $field->slug; ?>_<?php echo $option->slug; ?>" value="<?php echo $option->label; ?>"<?php if (isset($form->values[$field->slug]) && $form->values[$field->slug] == $option->label): ?> checked="checked"<?php endif; ?> /> <label for="<?php echo $field->slug; ?>_<?php echo $option->slug; ?>"><?php echo $option->label; ?></label>
        <?php endforeach; ?>
        <?php endif; ?>
    </dd>
    <?php endforeach; ?>

    <dt class="mellis"><label for="mellis"><?php echo __('Humans should leave this field empty'); ?></label></dt>
    <dd class="mellis"><input type="text" class="mellis" name="mellis" id="mellis" /></dd>
</dl>

<button type="submit"><?php echo __('Submit'); ?></button>

</form>
