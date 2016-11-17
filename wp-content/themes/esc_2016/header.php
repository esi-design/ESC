<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Theme
 * @since 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<meta property="og:type" content="website" />       
	<meta property="og:image" content="<?php the_field('logo',30); ?>" />      
	<meta property="og:url" content="<?php echo get_site_url(); ?>" />
	<meta property="og:title" content="<?php echo bloginfo('title'); ?>" />
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
<!-- 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1"> -->
</head>

<body <?php body_class(); ?>>
	<?php include('analytics.php'); ?>
<!--
Start of DoubleClick Floodlight Tag: Please do not remove
Activity name of this tag: Site Visit
URL of the webpage where the tag is expected to be placed: http://eddiessocial.com
This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
Creation Date: 09/30/2016
-->
<script type="text/javascript">
var axel = Math.random() + "";
var a = axel * 10000000000000;
document.write('<iframe src="https://6101814.fls.doubleclick.net/activityi;src=6101814;type=sitev0;cat=sitev0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=1;num=' + a + '?" width="1" height="1" frameborder="0" style="display:none"></iframe>');
</script>
<noscript>
<iframe src="https://6101814.fls.doubleclick.net/activityi;src=6101814;type=sitev0;cat=sitev0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=1;num=1?" width="1" height="1" frameborder="0" style="display:none"></iframe>
</noscript>
<!-- End of DoubleClick Floodlight Tag: Please do not remove -->

<div id="wrapper" class="hfeed site">
<header class="nav">
	<nav class="nav--menu" role="navigation">
<?php if(!is_home()) { ?>
		<a class="nav--logo" href="<?php echo get_site_url(); ?>" >ESC</a>
<?php } ?>
			<div id="nav-icon">
				  <span></span>
				  <span></span>
				  <span></span>
				  <span></span>
			</div>
	</nav>
	<?php wp_nav_menu( array('menu' => 'Navigation' )); ?>
</header>
<?php function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
} ?>