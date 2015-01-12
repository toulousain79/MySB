<?php
// ----------------------------------
//  __/\\\\____________/\\\\___________________/\\\\\\\\\\\____/\\\\\\\\\\\\\___
//   _\/\\\\\\________/\\\\\\_________________/\\\/////////\\\_\/\\\/////////\\\_
//    _\/\\\//\\\____/\\\//\\\____/\\\__/\\\__\//\\\______\///__\/\\\_______\/\\\_
//     _\/\\\\///\\\/\\\/_\/\\\___\//\\\/\\\____\////\\\_________\/\\\\\\\\\\\\\\__
//      _\/\\\__\///\\\/___\/\\\____\//\\\\\________\////\\\______\/\\\/////////\\\_
//       _\/\\\____\///_____\/\\\_____\//\\\____________\////\\\___\/\\\_______\/\\\_
//        _\/\\\_____________\/\\\__/\\_/\\\______/\\\______\//\\\__\/\\\_______\/\\\_
//         _\/\\\_____________\/\\\_\//\\\\/______\///\\\\\\\\\\\/___\/\\\\\\\\\\\\\/__
//          _\///______________\///___\////__________\///////////_____\/////////////_____
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
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title><?php echo $this->title(); ?></title>
	<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow">
	<meta name="robots" content="noarchive">
	<meta name="googlebot" content="nosnippet">
	<!-- Template CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo THEMES_PATH; ?>MySB/css/screen.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo THEMES_PATH; ?>MySB/css/mysb.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo THEMES_PATH; ?>MySB/css/jQ-menu.css" />
	<!-- Messages animated CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo THEMES_PATH; ?>MySB/css/buttons.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo THEMES_PATH; ?>MySB/css/animate.css" />
	<!-- jquery -->
	<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/jquery-1.11.1.min.js"></script>
	<!-- modernizr enables HTML5 elements and feature detects -->
	<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/modernizr-1.5.min.js"></script>
    <!-- noty -->
    <script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/noty/packaged/jquery.noty.packaged.min.js"></script>
	<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/jquery.create_message.js"></script>
	<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/waiting.js"></script>
	<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/mysb.js"></script>
</head>

<body>
	<div id="main">
		<header>
			<div id="logo">
				<div id="logo_text">
					<!-- class="LogoFirstLine", allows you to change the colour of the text -->
					<h1><a href="<?php echo URL_PUBLIC; ?>"><span class="LogoFirstLine">MySB</span></a></h1>
					<h2> <?php echo GetVersion(); ?></h2>
				</div>
				<div id="logout">
					
				</div>			
			</div>

			<nav>
				<div id="menu_container">
					<?php $page = $this->find('/'); ?>
					<ul class="sf-menu" id="nav">
						<li<?php echo ($this->level() == 0) ? ' class="current"': null; ?>><?php echo $page->link($page->title); ?></li>

						<?php MenuDisplayChildren($page, $this, false); ?>
					</ul>
					<div id="breadcrumb">
						<?php echo $this->breadcrumb(); ?>
					</div>				
				</div>
			</nav>
		</header>

		<div id="site_content">
			<div class="content">
<?php
	if ( isset($_SESSION['user']) && isset($_SESSION['pwd']) && isset($_SESSION['page']) ) {
		switch ($_SESSION['page']) {
			case "ChangePassword":
				require_once '/etc/MySB/web/pages/ChangePassword.php';
				break;
			case "ForceAddress":
				require_once '/etc/MySB/web/pages/ManageAddresses.php';
				break;
		}		
	} else {
		echo $this->content();
		if ($this->hasContent('extended')) echo $this->content('extended');		
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
			$IsCurrentPage = url_match('/') ? ' class="current"': '';
			$hidden = (MainUser()) ? true : false;
			$FooterNavBar = '<a ' . $IsCurrentPage . ' href="' . URL_PUBLIC . '">Home</a>';
			foreach($this->find('/')->children(null, array(), $hidden) as $menu):
				if ( ($menu->title != "Apply configuration") && ($menu->title != "Services") ) {
					$FooterNavBar .= ' | ' . $menu->link($menu->title);
				}
			endforeach;
			echo $FooterNavBar . '<br /><br />';
?>
			<a href="https://github.com/toulousain79/MySB/" title="MySB on GitHub">MySB on GitHub</a><br />
			<a href="http://www.css3templates.co.uk">Copyright &copy; CSS3_two</a> | <a href="http://www.wolfcms.org/" title="Wolf CMS">Wolf CMS</a></p>
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
</body>

</html>

<?php
//#################### LAST LINE ######################################
?>