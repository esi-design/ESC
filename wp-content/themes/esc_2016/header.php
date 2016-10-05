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
<!--
<script src="//use.typekit.net/jzy0ftu.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<meta property="og:type" content="website" />       
	<meta property="og:image" content="<?php the_field('logo',30); ?>" />      
	<meta property="og:url" content="<?php echo get_site_url(); ?>" />
	<meta property="og:title" content="<?php echo bloginfo('title'); ?>" />
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
<!-- 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1"> -->
<!-- 	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-152x152.png" /> -->
<!--
<?php $favicon = get_field('favicon', 30); ?>
	<link rel="shortcut icon" href="<?php echo $favicon; ?>">
-->
</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed site">

<?php function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
} ?>