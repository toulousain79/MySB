<?php

/*
 * Redirector - Wolf CMS URL redirection plugin
 *
 * Copyright (c) 2010 Design Spike
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *   http://themes.designspike.ca/redirector/help/
 *
 */

?>
<? if ( AuthUser::hasPermission('redirector_edit') ) : ?>
<p class="button"><a href="<?=get_url('plugin/redirector'); ?>#new"><img src="<?=PLUGINS_URI;?>/redirector/images/new.png" align="middle" /><?php echo __('Add Redirect'); ?></a></p>
<? endif; ?>
<p class="button"><a href="<?=get_url('plugin/redirector'); ?>#redirects"><img src="<?=PLUGINS_URI;?>/redirector/images/rocket.png" align="middle" /><?php echo __('Active Redirects'); ?></a></p>
<p class="button"><a href="<?=get_url('plugin/redirector'); ?>#404s"><img src="<?=PLUGINS_URI;?>/redirector/images/warning.png" align="middle" /><?php echo __('404 Errors'); ?></a></p>
<div class="box">
<h2><?php echo __('Redirector Plugin');?></h2>
<p>This plugin provides an interface to manage redirects for URLs served by WolfCMS.</p>
<p>
<?php echo __('Plugin Version').': '.Plugin::getSetting('version', 'redirector'); ?>
</p>
</div>
