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
<h1><?php echo __('Redirector'); ?></h1>
<p id="jquery_notice"><img align="top" alt="layout-icon" src="<?php echo REDIRECTOR_BASE_URL ?>images/error_16.png" title="" class="node_image" />&nbsp;<strong>Note</strong>: It appears jQuery is not available. Please install and activate the <a href="http://github.com/tuupola/frog_jquery">jQuery plugin</a>.</p>
<p id="redirect_form_anchor"><strong><?php echo __('Add Redirect'); ?></strong></p> 
<div id="redirect_form">
	<form action="<?php echo get_url('plugin/redirector/save'); ?>" method="post">
		<table cellpadding="5" cellspacing="5" border="0" id="redirect_form_table"> 
	      <tr> 
		        <td>
					<label for="redirect_url"><?php echo __('Requested URL'); ?></label><br />
		        	<input class="textbox" id="redirect_url" maxlength="255" name="redirect[url]" type="text" value="" />
				</td> 
		        <td>
					<label for="redirect_destination"><?php echo __('Redirects to'); ?></label><br />
		        	<input class="textbox" id="redirect_destination" maxlength="255" name="redirect[destination]" type="text" value="" />
				</td> 
	      </tr> 
	    </table>	
		  <p> 
				<input class="button" name="commit" type="submit" accesskey="s" value="Save" /> 
		  </p> 
	</form>
</div>
<div class="section">
	<h4 class="section_heading"><?php echo __('Redirects'); ?></h4> 
	<?php if(sizeof($current_redirects) > 0) { ?>
	<ul id="redirects" class="index"> 
		  <li id="redirects" class="node_heading"> 
			<div><?php echo __('Requested URL'); ?> &rarr; <?php echo __('Redirects to'); ?></div> 
			<div class="hits"><?php echo __('Hits'); ?></div>
		</li>
		<?php foreach ($current_redirects as $redirect): ?>
		  <li id="redirects_<?php echo $redirect->id; ?>" class="node"> 
		    <a href="#" class="url_link" title="<?php echo $redirect->url; ?>" ref="<?php echo $redirect->url; ?>"><?php echo strlen($redirect->url) > 50 ? substr($redirect->url, 0, 50)."..." : $redirect->url; ?></a> <span class="arrow">&rarr;</span> 
		    <a class="destination"><?php echo strlen($redirect->destination) > 50 ? substr($redirect->destination, 0, 50)."..." : $redirect->destination; ?></a>
			<div class="hits"><?php echo $redirect->hits; ?></div>
		    <div class="remove"><a href="<?php echo get_url('plugin/redirector/remove/'.$redirect->id); ?>" onclick="return confirm('Are you sure you wish to delete this redirect?');"><img alt="Remove Redirect" src="<?php echo REDIRECTOR_BASE_URL ?>images/icon-remove.gif" /></a></div> 
		</li>
		<?php endforeach ?>
	</ul>
	<?php } else { ?>
		<p><em><?php echo __('There are no redirects set up yet.'); ?></em></p>
	<?php } ?>
	
</div>
<div class="section">
	<h4 class="section_heading"><?php echo __('404 Errors'); ?></h4> 
	<?php if(sizeof($current_404s) > 0) { ?>
	<ul id="redirects" class="index"> 
		  <li id="redirects" class="node_heading"> 
			<div><?php echo __('Requested URL'); ?></div>
			<div class="hits"><?php echo __('Hits'); ?></div>
		</li>
		<?php foreach ($current_404s as $error): ?>
		  <li id="redirects_<?php echo $error->id; ?>" class="node"> 
		    <a href="#" class="url_link" title="<?php echo $error->url; ?>" ref="<?php echo $error->url; ?>"><?php echo strlen($error->url) > 80 ? substr($error->url, 0, 80)."..." : $error->url; ?></a>
			<div class="hits"><?php echo $error->hits; ?></div>
		    <div class="remove"><a href="<?php echo get_url('plugin/redirector/remove_404/'.$error->id); ?>" onclick="return confirm('Are you sure you wish to delete this redirect?');"><img alt="Remove Redirect" src="<?php echo REDIRECTOR_BASE_URL ?>images/icon-remove.gif" /></a></div> 
		  </li> 
		<?php endforeach ?>
	</ul>
	<?php } else { ?>
		<p><em><?php echo __('There are no 404 errors collected yet.'); ?></em></p>
	<?php } ?>	
</div>

<script type="text/javascript" charset="utf-8">
	jQuery(document).ready(function($) {
		$('#jquery_notice').hide();
		$('#redirect_url').focus();
		$('.url_link').click(function(){
			$('#redirect_url').val($(this).attr('ref'));
			$('#redirect_destination').val($(this).siblings('.destination').html());
			$.scrollTo('#redirect_form_anchor', 400);
			$('#redirect_destination').focus();
			return false;
		});
		$('.destination').click(function(){
			$('#redirect_url').val($(this).siblings('.url_link').attr('ref'));
			$('#redirect_destination').val($(this).html());
			$.scrollTo('#redirect_form_anchor', 400);
			$('#redirect_destination').focus();
			return false;
		});
	});
</script>
<style type="text/css" media="screen">
	@import url(<?php echo REDIRECTOR_BASE_URL ?>style.css);
</style>