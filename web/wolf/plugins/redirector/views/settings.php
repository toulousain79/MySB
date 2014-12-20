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

//	security measure
if (!defined('IN_CMS')) { exit(); }

?>
<h1><?php echo __('Redirector Plugin Settings');?></h1>
<form action="<?php echo get_url('plugin/redirector/settings/save'); ?>" method="post">
	<fieldset style="padding: 0.5em;">
		<legend style="padding: 0em 0.5em 0em 0.5em; font-weight: bold;"><?php echo __('General Configuration'); ?></legend>
		<table class="fieldset" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td class="label"><label for="threshold"><?php echo __('Threshold:');?> </label></td>
				<td class="field"><input name="threshold" id="threshold" type="text" size="35" maxsize="255" value="<?php echo $threshold;?>"/></td>
				<td class="help"><?php echo __('Number of times a page has to 404 to show up in redirector.'); ?></td>
			</tr>
			<tr>
				<td class="label"><label for="expireafter"><?php echo __('Expire After:');?> </label></td>
				<td class="field"><input name="expireafter" id="expireafter" type="text" size="35" maxsize="255" value="<?php echo $expireafter;?>"/></td>
				<td class="help"><?php echo __('Days after last click before redirect automatically expires. Enter 0 to disable.'); ?></td>
			</tr>
		</table>
	</fieldset>
	<p class="buttons">
		<input class="button" name="commit" type="submit" accesskey="s" value="<?php echo __('Save');?>" />
	</p>
</form>

<script type="text/javascript">
// <![CDATA[
    function setConfirmUnload(on, msg) {
        window.onbeforeunload = (on) ? unloadMessage : null;
        return true;
    }

    function unloadMessage() {
        return '<?php echo __('You have modified this page.  If you navigate away from this page without first saving your data, the changes will be lost.'); ?>';
    }

    $(document).ready(function() {
        // Prevent accidentally navigating away
        $(':input').bind('change', function() { setConfirmUnload(true); });
        $('form').submit(function() { setConfirmUnload(false); return true; });
    });
// ]]>
</script>