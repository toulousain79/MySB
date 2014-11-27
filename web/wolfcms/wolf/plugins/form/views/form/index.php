<?php
if (!defined('IN_CMS')) { exit(); }

/**
 * Form
 *
 * The Form plugin is a third-party plugin that lets you create and display forms on your installation of Wolf CMS.
 */

?>
<h1><?php echo __('Forms'); ?></h1>

<div id="form">
    <table id="forms" class="forms list">
        <tr>
            <th class="number"><?php echo __('ID'); ?></th>
            <th class="fill"><?php echo __('Form name'); ?></th>
            <th class="delete"><?php echo __('Delete'); ?></th>
        </tr>
    <?php foreach($forms as $form): ?>
        <tr>
            <td class="number"><?php echo $form->id; ?></td>
            <td class="fill"><a href="<?php echo get_url('plugin/form/edit', $form->id); ?>"><?php echo $form->name; ?></a></td>
            <td class="delete">
                <?php if (AuthUser::hasPermission('form_delete')): ?>
                    <a href="<?php echo get_url('plugin/form/delete', $form->id); ?>" onclick="return confirm('<?php echo __('Are you sure you wish to delete the form :name?', array(':name' => $form->name)); ?>');">
                        <img width="16" height="16" src="<?php echo FORM_IMAGES; ?>action-delete-16.png" alt="<?php echo __('Delete'); ?>" title="<?php echo __('Delete'); ?>" />
                    </a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</div>
