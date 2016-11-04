<?php
/**
 * @package WordPress
 * @subpackage: Theme
 * Template Name: Investors
 */
?>

<?php get_header(); ?>

<div class="investors gray">
<?php
$the_query = new WP_Query( 'page_id=658' );
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();	
		echo '<div class="text">';
		echo '<h2>' . get_the_title() . '</h2>';
		echo '<p>' .the_content() . '</p>';
		echo '</div>';
	}
}
wp_reset_postdata(); ?>
</div>

<div class="investors--photo gray">
<?php
$the_query = new WP_Query( 'page_id=658' );
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'poster_sm');
		echo '<img src="'.$feat_img[0].'" alt="'.get_the_title().'" />';
	}
}
wp_reset_postdata(); ?>
</div>

<div class="investors--features gray">
<?php
$the_query = new WP_Query( 'page_id=658' );
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		$header = get_field('header');
		$text = get_field('text');
		echo '<div class="features text">';
		echo '<h2>' . $header . '</h2>';
		// 		echo '<p>' .$text. '</p>';
		echo '</div>';
		if( have_rows('features') ):
		while( have_rows('features') ): the_row(); 
		$featHeader = get_sub_field('header');
		$featText = get_sub_field('text');
		if( !empty($featHeader) ):
		echo '<div class="fourcol"><h3>'.$featHeader.'</h3><p>'.$featText.'</p></div>'; 
		endif; endwhile; endif;
	}
}
wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>