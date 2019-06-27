<?php
// ----------------------------------
//  __/\\\\____________/\\\\___________________/\\\\\\\\\\\____/\\\\\\\\\\\\\___
//   _\/\\\\\\________/\\\\\\_________________/\\\/////////\\\_\/\\\/////////\\\_
//	_\/\\\//\\\____/\\\//\\\____/\\\__/\\\__\//\\\______\///__\/\\\_______\/\\\_
//	 _\/\\\\///\\\/\\\/_\/\\\___\//\\\/\\\____\////\\\_________\/\\\\\\\\\\\\\\__
//	  _\/\\\__\///\\\/___\/\\\____\//\\\\\________\////\\\______\/\\\/////////\\\_
//	   _\/\\\____\///_____\/\\\_____\//\\\____________\////\\\___\/\\\_______\/\\\_
//		_\/\\\_____________\/\\\__/\\_/\\\______/\\\______\//\\\__\/\\\_______\/\\\_
//		 _\/\\\_____________\/\\\_\//\\\\/______\///\\\\\\\\\\\/___\/\\\\\\\\\\\\\/__
//		  _\///______________\///___\////__________\///////////_____\/////////////_____
//			By toulousain79 ---> https://github.com/toulousain79/
//
//#####################################################################
//
//	Copyright (c) 2013 toulousain79 (https://github.com/toulousain79/)
//	Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
//	The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
//	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
//	IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
//	--> Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php
//
//#################### FIRST LINE #####################################

#### VARs
$MySB_Version = GetVersion();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title><?php echo ($_SESSION['Language'] == 'en') ? $this->title() : $this->title_fr(); ?></title>
	<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow">
	<meta name="robots" content="noarchive">
	<meta name="googlebot" content="nosnippet">
	<!-- Template CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo THEMES_PATH; ?>MySB/css/screen.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo THEMES_PATH; ?>MySB/css/mysb.css" />
<?php if ( strstr($_SERVER['REQUEST_URI'], '/?admin/logs.html') ) { ?>
	<link rel="stylesheet" type="text/css" href="<?php echo THEMES_PATH; ?>MySB/css/ccze.css" />
<?php } ?>
	<link rel="stylesheet" type="text/css" href="<?php echo THEMES_PATH; ?>MySB/css/jQ-menu.css" />
	<!-- Messages animated CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo THEMES_PATH; ?>MySB/css/buttons.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo THEMES_PATH; ?>MySB/css/animate.css" />
	<!-- Tooltipster -->
	<link rel="stylesheet" type="text/css" href="<?php echo THEMES_PATH; ?>MySB/css/tooltipster.bundle.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo THEMES_PATH; ?>MySB/css/tooltipster-sideTip-mysb.min.css" />
	<!-- jquery -->
	<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/jquery.min.js"></script>
	<!-- modernizr enables HTML5 elements and feature detects -->
	<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/modernizr-2.8.3.min.js"></script>
	<!-- noty -->
	<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/noty/packaged/jquery.noty.packaged.min.js"></script>
	<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/jquery.create_message.js"></script>
	<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/waiting.js"></script>
	<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/mysb.js"></script>
	<!-- Tooltipster -->
	<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/tooltipster.bundle.min.js"></script>

<?php
	switch ($_SERVER['REQUEST_URI']) {
		case '/?admin/smtp.html':
			echo '	<script type="text/javascript" src="'. THEMES_PATH . 'MySB/js/smtp.js"></script>';
			break;
		case '/?admin/logs.html':
			// jQuery Color Plugin
			echo '	<script type="text/javascript" src="'. THEMES_PATH . 'MySB/js/jquery.color.js"></script>';
			// Import The jQuery Script
			echo '	<script type="text/javascript" src="'. THEMES_PATH . 'MySB/js/jMenu.js"></script>';
			break;
		case '/?user/synchronization.html':
			// Tooltipster
			echo "	<script>$(document).ready(function() { $('.tooltip').tooltipster({theme: 'tooltipster-mysb', side: 'right', interactive: true});});</script>";
			break;
		case '/?admin/system.html':
			// Tooltipster
			echo "	<script>$(document).ready(function() { $('.tooltip').tooltipster({theme: 'tooltipster-mysb', side: 'right', interactive: true});});</script>";
			break;
		// case '/':
		// 	// NetData
		// 	echo "	<!-- NetData -->\n";
		// 	echo "	<script>
		// 		'use strict';
		// 		var netdataServer = '".$_SERVER['SERVER_PROTOCOL'].'://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI']."nd';
		// 		var netdataServerStatic = '".THEMES_PATH. "MySB/netdata';
		// 		var netdataTheme = 'slate';
		// 		</script>\n";
		// 	echo "	<script type='text/javascript' src='".THEMES_PATH. "MySB/netdata/dashboard.js'></script>";
		// 	break;
		default:
			echo "	<script>$(document).ready(function() { $('.tooltip').tooltipster({theme: 'tooltipster-mysb', side: 'bottom'});});</script>";
			break;
	}
?>
</head>

<body>
	<div id="main">
		<header>
			<div id="logo">
				<div id="logo_text">
					<!-- class="LogoFirstLine", allows you to change the colour of the text -->
					<h1>
<?php if ( !isset($_SESSION['page']) ) { ?>
						<a href="<?php echo URL_PUBLIC; ?>">
<?php } ?>
							<span class="LogoFirstLine">MySB</span>
<?php if ( !isset($_SESSION['page']) ) { ?>
						</a>
<?php } ?>
					</h1>
					<h2> <?php echo $MySB_Version; ?></h2>
				</div>
				<div id="logout">
<?php if ( !isset($_SESSION['page']) ) { ?>
					<a href="/Logout"><?php echo Layout_Logout; ?></a>
<?php } ?>
				</div>
			</div>
			<nav>
				<div id="menu_container">
<?php
				$page = $this->find('/');

				if ( !isset($_SESSION['page']) ) {
?>
					<ul class="sf-menu" id="nav">
						<?php MenuDisplayChildren($page, $this, false); ?>
					</ul>
<?php } ?>
					<div id="breadcrumb">
						<?php echo ($_SESSION['Language'] == 'en') ? $this->breadcrumb() : $this->breadcrumb_fr(); ?>
					</div>
				</div>
			</nav>
		</header>

		<div id="site_content">
			<div class="content">
<?php
				switch ($_SESSION['page']) {
					case "ChangePassword":
						require_once WEB_PAGES .'/ChangePassword.php';
						break;

					case "ManageAddresses":
						require_once WEB_PAGES . '/ManageAddresses.php';
						break;

					default:
						echo $this->content();
						if ($this->hasContent('extended')) echo $this->content('extended');
						break;
				}
?>
			</div>
			<div id="sidebar_container">
				<?php echo $this->content('sidebar', true); ?>
			</div>
		</div>

		<div id="scroll">
			<a title="Scroll to the top" class="top" href="#"><img src="<?php echo THEMES_PATH; ?>MySB/images/top.png" alt="top" /></a>
		</div>
		<footer>
<?php
		if ( !isset($_SESSION['page']) ) {
			$IsCurrentPage = url_match('/') ? ' class="current"': '';
			$hidden = (MainUser($CurrentUser)) ? true : false;
			$FooterNavBar = '<a ' . $IsCurrentPage . ' href="' . URL_PUBLIC . '">' . Global_Home . '</a>';
			foreach($this->find('/')->children(null, array(), $hidden) as $menu):
				if ( ($menu->title != "Apply configuration") && ($menu->title != "Services") ) {
					$BottomMenu = ($_SESSION['Language'] == 'en') ? $menu->link($menu->title) : $menu->link($menu->title_fr);
					$FooterNavBar .= ' | ' . $BottomMenu;
				}
			endforeach;
			echo $FooterNavBar . '<br /><br />';
		}
?>
			<a target="_blank" href="https://github.com/toulousain79/MySB/" title="<?php echo Layout_OnGithub; ?>"><?php echo Layout_OnGithub; ?></a> | <a target="_blank" href="https://github.com/toulousain79/MySB/wiki" title="<?php echo Layout_Wiki; ?>"><?php echo Layout_Wiki; ?></a> | <a target="_blank" href="https://github.com/toulousain79/MySB/blob/<?php echo $MySB_Version; ?>/Changelog.md" title="Changelog <?php echo $MySB_Version; ?>">Changelog <?php echo $MySB_Version; ?></a>
			<br />
			<a target="_blank" href="http://www.css3templates.co.uk">Copyright &copy; CSS3_two</a> | <a target="_blank" href="https://github.com/wolfcms/wolfcms" title="<?php echo Layout_Wolf; ?>"><?php echo Layout_Wolf; ?></a> | <a target="_blank" href="http://medoo.in/" title="<?php echo Layout_Medoo; ?>"><?php echo Layout_Medoo; ?></a> | <a target="_blank" href="https://my-netdata.io/" title="NetData">NetData</a>
			<br />

			<div style="padding: 10px 0 0 0;">
			<a target="_blank" href="https://www.blockchain.com/btc/payment_request?address=1HtuGsnSsGoUz7DmRbDLCFnRc41jYEY2FE"><img class="tooltip" title="<?php echo Layout_Bitcoin_Text; ?>" alt="<?php echo Layout_Bitcoin_Text; ?>" width="30px" height="30px" border="0" src="<?php echo THEMES_PATH . 'MySB/images/bitcoin.png'; ?>"></a>
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" style="display:inline;">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="<?php echo Layout_Paypal_ID; ?>">
				<input type="image" src="<?php echo THEMES_PATH . 'MySB/images/paypal.png'; ?>" width="30px" height="30px" border="0" name="submit" alt="<?php echo Layout_Paypal_Text; ?>" class="tooltip" title="<?php echo Layout_Paypal_Text; ?>">
				<img alt="" border="0" src="<?php echo THEMES_PATH . 'MySB/images/pixel.gif'; ?>" width="1" height="1">
			</form>
			</div>

<?php
				switch ($_SESSION['page']) {
					case "ChangePassword":
					case "ManageAddresses":
						break;
					default:
?>
			<div style="position: absolute; width: 100%; padding: 10px 0 0 0; margin-left: auto; margin-right: auto;">
				<img class="netdata-badge" src="https://mysb-00.ddns.net:8189/nd/api/v1/badge.svg?chart=system.cpu&alarm=10min_cpu_usage&refresh=auto">
				<img class="netdata-badge" src="https://mysb-00.ddns.net:8189/nd/api/v1/badge.svg?chart=system.ram&alarm=ram_in_use&refresh=auto">
				<img class="netdata-badge" src="https://mysb-00.ddns.net:8189/nd/api/v1/badge.svg?chart=system.swap&alarm=used_swap&refresh=auto">
				<img class="netdata-badge" src="https://mysb-00.ddns.net:8189/nd/api/v1/badge.svg?chart=system.load&alarm=load_average_1&refresh=auto">
				<img class="netdata-badge" src="https://mysb-00.ddns.net:8189/nd/api/v1/badge.svg?chart=system.load&alarm=load_average_5&refresh=auto">
				<img class="netdata-badge" src="https://mysb-00.ddns.net:8189/nd/api/v1/badge.svg?chart=system.load&alarm=load_average_15&refresh=auto">
			</div>
<?php
						break;
				}
?>
		</footer>
	</div>

	<!-- javascript at the bottom for fast page loading -->
	<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/jquery.easing-sooper.js"></script>
	<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/jquery.sooperfish.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		$('ul.sf-menu').sooperfish();
		$('.top').click(function() {$('html, body').animate({scrollTop:0}, 'fast'); return false;});
		});
	</script>

<?php
	switch ($_SERVER['REQUEST_URI']) {
		case '/?blocklists/usual-blocklists.html':
		case '/?user/synchronization.html':
		case '/?user/manage-addresses.html':
		case '/?user/options.html':
		case '/?renting/renting-options.html':
		case '/?renting/renting-payments.html':
		case '/?trackers/add-new-trackers.html':
			echo '	<script type="text/javascript" src="'. THEMES_PATH . 'MySB/js/jquery-dynamically-adding-form-elements.js"></script>';
			break;
	}
?>
</body>

</html>

<?php
//#################### LAST LINE ######################################
