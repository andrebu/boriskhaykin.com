<?php 
/*
Template Name: Videos Page
*/
?>

<?php get_header(); ?>

<div id="filters-container">
	<p>You can use the buttons below to filter Boris Khaykin's works based on his contribution.</p>
	<div id="filters-group" data-filter-group="roles">
		<div class="one-filter show-all">
			<input type="checkbox" name="show-all" value="*" class="show-all" id="show-all" checked="checked">
			<label for="show-all">
				<i class="fa fa-asterisk"></i> All
			</label>
		</div>
		<div class="one-filter actor">
			<input type="checkbox" name="tag-actor" value=".tag-actor" id="tag-actor">
			<label for="tag-actor">
				<i class="fa fa-star"></i> Actor
			</label>
		</div>
		<div class="one-filter director">
			<input type="checkbox" name="tag-director" value=".tag-director" id="tag-director">
			<label for="tag-director">
				<i class="fa fa-video-camera"></i> Director
			</label>
		</div>
		<div class="one-filter editor">
			<input type="checkbox" name="tag-editor" value=".tag-editor" id="tag-editor">
			<label for="tag-editor">
				<i class="fa fa-pencil-square-o"></i> Editor
			</label>
		</div>
		<div class="one-filter writer">
			<input type="checkbox" name="tag-writer" value=".tag-writer" id="tag-writer">
			<label for="tag-writer">
				<i class="fa fa-pencil-square"></i> Writer
			</label>
		</div>
	</div>
</div>
<hr>



<?php
	global $post;
	$latest_posts = get_posts("numberposts=27&category=Video");
	$the_newer = get_posts("numberposts=3&offset=1");
	$the_new = get_posts("numberposts=5&offset=4&order=DESC&orderby=post_date"); 
?>
<?php
	if ( 'on' == $notebook_blog_style ) echo '<div id="regular_content">';
	else echo '<div id="et_posts">';
?>
<?php foreach($latest_posts as $post) : setup_postdata($post); ?>

<?php get_template_part( 'content', get_post_format() ); ?>

<?php endforeach; ?>
<?php if ( 'on' == $notebook_blog_style ) echo '</div>';?>



<?php get_footer(); ?>