<?php
/*
 * Redirector Plugin for WolfCMS <http://www.wolfcms.org>
 * Copyright (c) 2011 Shannon Brooks <shannon@brooksworks.com>
 * Adapted from Redirector by Design Spike <http://designspike.ca>
 * Major contributions and original idea by Cody at Design Spike
 *
 * Licensed under the MIT license
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Project home
 * http://www.github.com/realslacker/Redirector-Plugin
 */

//	fix so page shows up correctly in IE 
header('X-UA-Compatible: IE=Edge');
 
?>
<h1><?=__('Redirector')?></h1>

<? if ( AuthUser::hasPermission('redirector_edit') ) : ?>

<h2 id="new"><?=__('Add Redirect')?></h2>
<form action="<?=get_url('plugin/redirector/save')?>" method="post">
<div class="forminput">
	<label for="url"><?=__('Requested URL')?></label><br />
	<input type="text" id="url" name="redirect[url]" maxlength="255" value="" />
</div>
<div class="forminput">
	<label for="dest"><?=__('Redirects To')?></label><br />
	<input type="text" id="dest" name="redirect[dest]" maxlength="255" value="" />
</div>
<div class="formsave">
	<input type="submit" accesskey="s" value="Save" />
</div>
<br style="clear: both;"/>
</form>

<? endif; ?>

<h2 id="redirects"><?=__('Active Redirects')?></h2> 
<? if ( count($redirects) > 0 ) : ?>

<div class="heading">
	<span class="url"><?=__('Requested URL')?></span>
	<span class="dest"><?=__('Redirects To')?></span>
	<span class="hits"><?=__('Hits')?></span>
	<div class="clearfix"></div>
</div>

<? foreach ($redirects as $redirect) : ?>

<div class="entry redirect" id="redirect<?=$redirect->id?>" url="<?=$redirect->url?>" dest="<?=$redirect->dest?>" >
	<span class="url"><?=htmlspecialchars($redirect->url)?></span>
	<span class="dest"><?=htmlspecialchars($redirect->dest)?></span>
	<span class="hits"><?=$redirect->hits?></span>
	<? if ( AuthUser::hasPermission('redirector_delete') ) : ?>
	<span class="actions">
		<a class="remove" href="<?=get_url('plugin/redirector/remove/redirect/'.$redirect->id)?>"><img src="<?=PLUGINS_URI;?>/redirector/images/icon-remove.png" alt="Remove Redirect" title="Remove Redirect" /></a>
	</span>
	<? endif; ?>
	<span class="actions">
	<? if ( $redirect->perm == 1 ) : ?>
		<a class="lock" href="<?=get_url('plugin/redirector/unlock/'.$redirect->id)?>"><img src="<?=PLUGINS_URI;?>/redirector/images/icon-locked.png" alt="Allow Expire" title="Allow Expire" /></a>
	<? else : ?>
		<a class="lock" href="<?=get_url('plugin/redirector/lock/'.$redirect->id)?>"><img src="<?=PLUGINS_URI;?>/redirector/images/icon-unlocked.png" alt="Prevent Expire" title="Prevent Expire" /></a>
	<? endif; ?>
	</span>
	<div class="clearfix"></div>
</div>

<? endforeach; ?>

<? else : ?>

<p><em><?php echo __('There are no redirects set up yet.'); ?></em></p>

<? endif; ?>
	
<h2 id="404s"><?=__('404 Errors')?></h2>
<? if ( count($errors) > 0 ) : ?>

<div class="heading">
	<span class="url404"><?=__('Requested URL')?></span>
	<span class="hits"><?=__('Hits')?></span>
	<span class="actions">
		<? if ( AuthUser::hasPermission('redirector_delete') ) : ?>
		<a class="removeall" href="<?php echo get_url('plugin/redirector/clear404s'); ?>"><img src="<?=PLUGINS_URI;?>/redirector/images/icon-remove-white.png" alt="Remove All 404s" title="Remove All 404s" /></a>
		<? endif; ?>
	</span>
	<div class="clearfix"></div>
</div>

<? foreach ($errors as $error) : ?>

<div class="entry" id="error<?=$error->id?>" url="<?=$error->url?>" dest="" >
	<span class="url404"><?=htmlspecialchars($error->url)?></span>
	<span class="hits"><?=$error->hits?></span>
	<span class="actions">
		<? if ( AuthUser::hasPermission('redirector_delete') ) : ?>
		<a class="remove" href="<?=get_url('plugin/redirector/remove/404/'.$error->id)?>"><img src="<?=PLUGINS_URI;?>/redirector/images/icon-remove.png" alt="Remove 404" title="Remove 404" /></a>
		<? endif; ?>
	</span>
	<div class="clearfix"></div>
</div>

<? endforeach; ?>

<? else : ?>

<p><em><?php echo __('There are no 404 errors yet.'); ?></em></p>

<? endif; ?>

<? if ( AuthUser::hasPermission('redirector_edit') ) : ?>
	
<script type="text/javascript" charset="utf-8">
$(function(){

	$('div.entry').click(function(event){
		var $target = $(event.target);
		if( $target.is('a') ) {
			alert('clicked link');
			return;
		}
		$('html, body').animate({ scrollTop: $("#new").offset().top }, 500);
		$('#url').val($(this).attr('url')).focus();
		$('#dest').val($(this).attr('dest'));
	});
	
	$('.remove').click(function(event){
		event.stopPropagation();
		return confirm('Are you sure you want to remove this redirect?');
	});

	$('.lock').click(function(event){
		event.stopPropagation();
	});


});
</script>

<? endif; ?>
