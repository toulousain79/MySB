<?php
if (!defined('IN_CMS')) { exit(); }

/**
 * Form
 *
 * The Form plugin is a third-party plugin that lets you create and display forms on your installation of Wolf CMS.
 */

?>
<h1><?php echo __('Settings'); ?></h1>

<div id="form">

<form method="post" action="<?php echo get_url('plugin/form/settings'); ?>">
    <table cellspacing="5" cellpadding="5" border="0">
        <tr>
            <td><label for="setting_success_message"><?php echo __("'Success' message"); ?></label></td>
            <td><textarea name="setting[success_message]" id="setting_success_message"><?php echo $settings['success_message']; ?></textarea></td>
        </tr>
        <tr>
            <td><label for="setting_invalid_message"><?php echo __("'Submission invalid' message"); ?></label></td>
            <td><textarea name="setting[invalid_message]" id="setting_invalid_message"><?php echo $settings['invalid_message']; ?></textarea></td>
        </tr>
        <tr>
            <td><label for="setting_error_message"><?php echo __("'Error' message"); ?></label></td>
            <td><textarea name="setting[error_message]" id="setting_error_message"><?php echo $settings['error_message']; ?></textarea></td>
        </tr>
        <tr>
            <td><label for="setting_copy_message"><?php echo __("'Copy of submitted data' message"); ?></label></td>
            <td><textarea name="setting[copy_message]" id="setting_copy_message"><?php echo $settings['copy_message']; ?></textarea></td>
        </tr>
        <tr>
            <td colspan="2">
                <br />
                <input type="submit" name="save" value="<?php echo __('Save Settings'); ?>" />
            </td>
        </tr>
    </table>
</form>

</div>
