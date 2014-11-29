<?php
if (!defined('IN_CMS')) { exit(); }

/**
 * Form
 *
 * The Form plugin is a third-party plugin that lets you create and display forms on your installation of Wolf CMS.
 */

?>
<p class="button">
    <a href="<?php echo get_url("plugin/form"); ?>">
        <img width="32" height="32" src="<?php echo FORM_IMAGES; ?>form-32.png" align="middle" alt="<?php echo __('Forms'); ?>" />
        <?php echo __('Forms'); ?>
    </a>
</p>
<p class="button">
    <a href="<?php echo get_url("plugin/form/add"); ?>">
        <img width="32" height="32" src="<?php echo FORM_IMAGES; ?>action-add-32.png" align="middle" alt="<?php echo __('Add form'); ?>" />
        <?php echo __('Add form'); ?>
    </a>
</p>
<p class="button">
    <a href="<?php echo get_url("plugin/form/settings"); ?>">
        <img width="32" height="32" src="<?php echo FORM_IMAGES; ?>settings-32.png" align="middle" alt="<?php echo __('Settings'); ?>" />
        <?php echo __('Settings'); ?>
    </a>
</p>
<p class="button">
    <a href="<?php echo get_url("plugin/form/documentation"); ?>">
        <img width="32" height="32" src="<?php echo FORM_IMAGES; ?>documentation-32.png" align="middle" alt="<?php echo __('Documentation'); ?>" />
        <?php echo __('Documentation'); ?>
    </a>
</p>
<div class="box">
    <h2><?php echo __('Form plugin'); ?></h2>
    <p><?php echo __('The Form plugin is a third-party plugin that lets you create and display forms on your installation of Wolf CMS.'); ?></p>
</div>
<div class="box">
    <h2><?php echo __('How to use'); ?></h2>
    <p>1. <?php echo __('After enabling the Form plugin, you can click the Settings button to change the messages that are shown after submitting the form.'); ?></p>
    <p>2. <?php echo __('To create a new form, click on the Add form button.'); ?></p>
    <p>3. <?php echo __("Fill in the 'Form name' and 'Mail results to' fields, and create one or more form fields. Save the form."); ?></p>
    <p>4. <?php echo __('Use the following piece of PHP code in the page were you want to include the form:'); ?></p>
    <p><code>&lt;?php display_form(id); ?&gt;</code></p>
    <p><?php echo __("Don't forget to replace id with the id of your form!"); ?></p>
    <p><?php echo __("By default, the plugin uses the new HTML5 form elements. If you don't want to use them, pass a second parameter to the function:"); ?></p>
    <p><code>&lt;?php display_form(id, false); ?&gt;</code></p>
</div>
