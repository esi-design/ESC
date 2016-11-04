<?php
/**
 * @package WordPress
 * @subpackage Blank
 */
?>
<footer>
<div class="left">
	<p>© <?php echo date(Y); ?> ESC Game Theater. All Rights Reserved.</p>
</div>
<div class="right">
<?php $the_query = new WP_Query( 'page_id=2' );
	if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
	$the_query->the_post();	if( have_rows('social_media') ):
	while( have_rows('social_media') ): the_row(); 
	$icon = get_sub_field('icon');
	$link = get_sub_field('link'); 
	if( !empty($icon) ):
	echo '<a class="social" href="'.$link.'" target="_blank"><img src="'.$icon['url'].'" alt="'.$icon['alt'].'" /></a>'; 
	endif; endwhile; endif;
	} } ?>
</div>
</footer>
</div><!-- page --> 

<?php wp_footer(); ?>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.transit/0.9.9/jquery.transit.min.js"></script>
</body>
</html>