<?php
/**
 * @package WordPress
 * @subpackage Theme
 */
?>
<?php get_header(); ?>

<div class="intro black">
	<canvas id="testCanvas"></canvas>
	<div class="growing-circle red-bg"></div><div class="growing-circle blue-bg"></div>
	<div class="logo"></div>
     <div id="animation">
		<video id="video" style="display:none" autoplay>
			<source src="img/logo-animation2.mp4" type='video/mp4; codecs="avc1.42E01E"' />
		</video>
		<canvas width="502" height="970" id="buffer"></canvas>
		<canvas width="502" height="335" id="output"></canvas>
	</div>

	<div class="text">
	<?php $the_query = new WP_Query( 'page_id=2' );
		if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
		$the_query->the_post();	
		if( have_rows('headers') ):
		$count = 1;
		while( have_rows('headers') ): the_row(); 
		$header = get_sub_field('header'); 
		if($count == 1) {
			echo '<div><h4 class="westfield">';
		} else if($count == 3) {
			echo '<div><h4 class="blue">';	
		} else {
			echo '<div><h4>';
		}
		echo $header.'</h4></div>';
		if($count == 1) {
			//echo '<div><a href="'.get_field('tickets_link', 2).'" class="tickets" target="_blank">Tickets</a></div>';
		}
		$count++;
		endwhile; endif; } } ?>
	</div>
</div>

<div class="reel gray">
<?php
$the_query = new WP_Query( 'page_id=6' );
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<div class="video">';
		$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
		echo '<iframe src="https://player.vimeo.com/video/189053278" width="768" height="432" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
		echo '</div><div class="text">';
		echo '<h2>' . get_the_title() . '</h2>';
		echo the_content();
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
$text = array();
$args = array(
    'post_type' =>'games',
    'orderby' => 'rand',
    'order' => 'DESC',
    'posts_per_page' => 10
);   
$new_query = new WP_Query( $args );
if ( $new_query->have_posts() ) {
	echo '<div class="carousel">';
	while ( $new_query->have_posts() ) {
		$new_query->the_post();
// 		echo get_post_thumbnail_id();
		$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'poster_sm');
		echo '<div class="item"><img src="'.$feat_img[0].'" alt="'.get_the_title().'" />';
		if(get_field('promo_mp4') != '') {
			$promo_mp4 = get_field('promo_mp4');
			$promo_mp4 = $promo_mp4['url'];
			echo '<video preload="auto" class="trailer">
				<source src="'.$promo_mp4.'" type="video/mp4; codecs="avc1.42E01E" />
			</video>';
		}
		$content = get_the_content();
		array_push($text,$content);
		echo '</div>';
	}
	echo '</div>';
}
wp_reset_postdata(); ?>
<div class="carousel-text">
		<?php foreach($text as $key => $value) {
			echo '<div class="item">';
			echo '<p>'.$value.'</p>';
			echo '</div>';
		} ?>
</div>
</div>

<div class="who black">
	<a name="about" class="anchor"></a>
<?php
$the_query = new WP_Query( 'page_id=644' );
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();	
		echo '<div class="text">';
		echo '<h2>' . get_the_title() . '</h2>';
		echo the_content();
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

<div class="news gray">
	<a name="news" class="anchor"></a>
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

<div class="join black">
	<a name="contact" class="anchor"></a>
<?php
$the_query = new WP_Query( 'page_id=646' );
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<div class="text contact">';
		echo '<h2>' . get_the_title() . '</h2>';
		echo the_content();
		echo '</div>';
	}
}
wp_reset_postdata(); ?>
<?php
$the_query = new WP_Query( 'page_id=603' );
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<div class="text">';
		echo '<h2>' . get_the_title() . '</h2>';
		echo the_content();
// 		echo '<a href="https://esc.ticketleap.com/" class="email" target="_blank">Email Address*</a>';
// 		echo '<a href="'.get_site_url().'/about" class="about-us">About Us</a>';
		echo '</div>';
// 		echo '<div class="growing-circle red-bg"></div><div class="growing-circle blue-bg"></div>';
	}
}
wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>