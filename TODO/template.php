<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-GB">

<head>
	<title><?php echo $this->title(); ?></title>
	<meta name="description" content="<?php echo ($this->description() != '') ? $this->description() : 'Default description goes here'; ?>" />
	<meta name="keywords" content="<?php echo ($this->keywords() != '') ? $this->keywords() : 'default, keywords, here'; ?>" />
	<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow">
	<meta name="robots" content="noarchive">
	<meta name="googlebot" content="nosnippet">
	<!-- Template CSS -->
	<link rel="stylesheet" href="<?php echo THEMES_PATH; ?>CSS3_two/css/screen.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="<?php echo THEMES_PATH; ?>CSS3_two/css/print.css" media="print" type="text/css" />
	<!-- Messages animated CSS -->
	<link rel="stylesheet" href="<?php echo THEMES_PATH; ?>CSS3_two/css/buttons.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo THEMES_PATH; ?>CSS3_two/css/animate.css" type="text/css" />	
	<!-- modernizr enables HTML5 elements and feature detects -->
	<script type="text/javascript" src="<?php echo THEMES_PATH; ?>CSS3_two/js/modernizr-1.5.min.js"></script>
	<!-- jquery -->
	<script type="text/javascript" src="<?php echo THEMES_PATH; ?>CSS3_two/js/jquery-1.11.1.min.js"></script>
    <!-- noty -->
    <script type="text/javascript" src="<?php echo THEMES_PATH; ?>CSS3_two/js/noty/packaged/jquery.noty.packaged.min.js"></script>	
	<script type="text/javascript" src="<?php echo THEMES_PATH; ?>CSS3_two/js/create_message.js"></script>		
</head>

<body>
	<div id="main">
		<header>
			<div id="logo">
				<div id="logo_text">
					<!-- class="LogoFirstLine", allows you to change the colour of the text -->
					<h1><a href="<?php echo URL_PUBLIC; ?>"><span class="LogoFirstLine">MySB</span></a></h1>
					<h2> v1.2</h2>
				</div>
			</div>

			<nav>			
				<div id="breadcrumb">
					<?php echo $this->breadcrumb(); ?>
				</div>			
				<div id="menu_container">			
					<ul class="sf-menu" id="nav">
						<li><a<?php echo url_match('/') ? ' class="current"': ''; ?> href="<?php echo URL_PUBLIC; ?>">Home</a></li>
						<?php foreach($this->find('/')->children() as $menu): ?>
						<li><?php echo $menu->link($menu->title, (in_array($menu->slug, explode('/', $this->path())) ? ' class="current"': null)); ?></li>
						<?php endforeach; ?> 
					</ul>
				</div>
			</nav>
		</header>
		
		<div id="site_content">
			<div id="sidebar_container">
				<?php echo $this->content('sidebar', true); ?>			
			</div>
			<div class="content">
				<h1><div align="center"><?php echo $this->title(); ?></div></h1>

				<?php echo $this->content(); ?> 
				<?php if ($this->hasContent('extended')) echo $this->content('extended'); ?> 			
			</div>		
		</div>

		<div id="scroll">
			<a title="Scroll to the top" class="top" href="#"><img src="images/top.png" alt="top" /></a>
		</div>
		<footer>

<?php
$IsCurrentPage = url_match('/') ? ' class="current"': '';
$FooterNavBar = '<p><a ' . $IsCurrentPage . ' href="' . URL_PUBLIC . '">Home</a>';
foreach($this->find('/')->children() as $menu):
	$FooterNavBar .= ' | ' . $menu->link($menu->title, (in_array($menu->slug, explode('/', $this->path())) ? ' class="current"': null));
endforeach;
echo $FooterNavBar . '</p>';
?>
			  <p>Copyright &copy; CSS3_two | <a href="http://www.css3templates.co.uk">design from css3templates.co.uk</a> | <a href="http://www.wolfcms.org/" title="Wolf CMS">Wolf CMS</a> Inside.</p>				
		</footer>
		
	</div>
	
	<!-- javascript at the bottom for fast page loading -->
	<script type="text/javascript" src="<?php echo THEMES_PATH; ?>CSS3_two/js/jquery.easing-sooper.js"></script>
	<script type="text/javascript" src="<?php echo THEMES_PATH; ?>CSS3_two/js/jquery.sooperfish.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		$('ul.sf-menu').sooperfish();
		$('.top').click(function() {$('html, body').animate({scrollTop:0}, 'fast'); return false;});
		});
	</script>
</body>

</html>