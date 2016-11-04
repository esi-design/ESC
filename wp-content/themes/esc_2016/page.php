<?php
/**
 * @package WordPress
 * @subpackage Theme
 */
?>
<?php get_header(); ?>

<div class="who gray">
<?php
$the_query = new WP_Query( 'page_id=644' );
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();	
		echo '<div class="text">';
		echo '<h2>' . get_the_title() . '</h2>';
		echo '<p>' .the_content() . '</p>';
		echo '</div><ul id="og-grid" class="og-grid">';
		if( have_rows('partners') ):
		while( have_rows('partners') ): the_row(); 
		$logo = get_sub_field('logo');
		$name = get_sub_field('name');
		$description = get_sub_field('description');
		$link = get_sub_field('link');
		if( !empty($logo) ):
		echo '<li class="partner"><a href="'.$link.'" data-link="'.$link.'" data-title="'.$name.'" data-description="'.$description.'"><div class="partner--logo"><div class="img"><img src="'.$logo['url'].'" alt="'.$icon['alt'].'" /></div></div><h3>'.$name.'</h3></a></li>'; 
		endif; endwhile; endif;
		echo '</ul>';
	}
}
wp_reset_postdata(); ?>
</div>

<div class="news black">
<?php
	$args = array(
    'post_type' =>'news',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 10
);   
$query = new WP_Query( $args );
if ( $query->have_posts() ) {
	echo '<div class="text">';
	echo '<h2>In the News</h2>';
	while ( $query->have_posts() ) {
		$query->the_post();
		$source = get_field('source');
		$link = get_field('link');
		echo '<p>'.$source.': <a href="'.$link.'" target="_blank">' . get_the_title()  . '</a></p>';
	}
	echo '</div>';
} ?>
</div>

<div class="contact gray">
<?php
$the_query = new WP_Query( 'page_id=646' );
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

<?php get_footer(); ?>