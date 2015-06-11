<?php 
	if ( is_home() ){
		$args = array(
			'showposts'=> (int) get_option('notebook_homepage_posts'),
			'paged'=>$paged,
			'category__not_in' => (array) get_option('notebook_exlcats_recent'),
		);
		if ( 'false' == get_option('notebook_duplicate') ){
			$args['post__not_in'] = $ids;
		}
		query_posts( apply_filters( 'notebook_homepage_args', $args ) );
	}
	
	$notebook_blog_style = get_option('notebook_blog_style');
?>

<?php
	if ( 'on' == $notebook_blog_style ) echo '<div id="regular_content">';
	else echo '<div id="et_posts">';
?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php 
			if ( 'false' == $notebook_blog_style ) get_template_part( 'content', get_post_format() );
			else et_display_single_post();
		?>
	<?php endwhile; ?>
<?php if ( 'false' == $notebook_blog_style ) echo '</div>';?>
	<?php if ( function_exists('wp_pagenavi') ) { wp_pagenavi(); }
		else { ?>
			 <?php get_template_part('includes/navigation'); ?>
		<?php } ?>
	<?php else : ?>
		<?php get_template_part('includes/no-results'); ?>
	<?php endif; if ( is_home() ) wp_reset_query(); ?>
<?php if ( 'on' == $notebook_blog_style ) echo '</div>';?>