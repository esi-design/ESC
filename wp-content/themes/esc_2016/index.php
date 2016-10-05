<?php
/**
 * @package WordPress
 * @subpackage Theme
 */
?>
<?php get_header(); ?>

<div class="intro black">
	<canvas id="canvas" width="700" height="300"></canvas>
	<div class="logo"></div>
	<h4>Your favorite 30 person gaming experience.</h4>
	<h4 class="blue">Welcome to a brand new way to play.</h4>
	<a href="http://greenghoulie.ticketleap.com/testing-esc/" class="tickets" target="_blank">Tickets</a>
</div>

<div class="reel gray">
<?php
$the_query = new WP_Query( 'page_id=6' );
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<div class="video">';
		$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
		echo '<iframe src="https://player.vimeo.com/video/135098448" width="768" height="432" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
		echo '</div><div class="text">';
		echo '<h2>' . get_the_title() . '</h2>';
		echo '<p>' .the_content() . '</p>';
		echo '</div>';
	}
}
wp_reset_postdata(); ?>
</div>

<div class="experience black">
<?php
$the_query = new WP_Query( 'page_id=10' );
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<div class="left">';
		$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
		echo '<img src="'.$feat_img[0].'" alt="'.get_the_title().'" />';
		echo '</div><div class="right">';
		echo '<h2>' . get_the_title() . '</h2>';
		echo '<p>' .the_content() . '</p>';
		echo '</div>';
	}
}
wp_reset_postdata(); ?>
</div>

<div class="games gray">
<?php
$the_query = new WP_Query( 'page_id=13' );
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<div class="text">';
		echo '<h2>' . get_the_title() . '</h2>';
		echo '<p>' .the_content() . '</p>';
		echo '</div>';
	}
}
wp_reset_postdata(); 
$args = array(
    'post_type' =>'games',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 10
);   
$new_query = new WP_Query( $args );
if ( $new_query->have_posts() ) {
	echo '<div class="carousel">';
	while ( $new_query->have_posts() ) {
		$new_query->the_post();
// 		echo get_post_thumbnail_id();
		$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'form_thumb');
		echo '<div class="item"><img src="'.$feat_img[0].'" alt="'.get_the_title().'" />';
		if(get_field('promo_mp4') != '') {
			$promo_mp4 = get_field('promo_mp4');
			$promo_mp4 = $promo_mp4['url'];
			echo '<video preload="auto" class="trailer">
				<source src="'.$promo_mp4.'" type="video/mp4; codecs="avc1.42E01E" />
			</video>';
		}
		echo '</div>';
	}
	echo '</div>';
}
wp_reset_postdata(); 
?>
</div>

<div class="locations black">
<?php
$the_query = new WP_Query( 'page_id=601' );
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<div class="left">';
		echo '<h2>' . get_the_title() . '</h2>';
		echo '<p>' .the_content() . '</p>';
		echo '<a href="http://greenghoulie.ticketleap.com/testing-esc/" class="buy-tickets">Tickets</a>';
		echo '</div><div class="right">';
// 		$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
		echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3014.908564117844!2d-74.0788281845887!3d40.91775067931003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2fbad32436c2b%3A0xe7ce50551f9fec50!2sGarden+State+Plaza%2C+Paramus%2C+NJ+07652!5e0!3m2!1sen!2sus!4v1474915374587" width="530" height="290" frameborder="0" style="border:0" allowfullscreen></iframe>';
		echo '</div>';
	}
}
wp_reset_postdata(); ?>
</div>

<div class="join gray">
<?php
$the_query = new WP_Query( 'page_id=603' );
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<div class="text">';
		echo '<h2>' . get_the_title() . '</h2>';
// 		echo '<p>' .the_content() . '</p>';
		echo '<a href="http://greenghoulie.ticketleap.com/testing-esc/" class="email" target="_blank">Email Address*</a>';
		echo '<a href="http://greenghoulie.ticketleap.com/testing-esc/" class="about-us" target="_blank">About Us</a>';
		echo '</div>';
		echo '<div class="growing-circle red-bg"></div><div class="growing-circle blue-bg"></div>';
	}
}
wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>