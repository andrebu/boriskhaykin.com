<?php 
	$et_class = 'video';
	if ( 'false' == get_option('notebook_blog_style') ) $et_class .= ' entry';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $et_class ); ?>>
	<?php
		$thumb = '';
		$width = apply_filters( 'et_video_format_image_width', 280 );
		$height = apply_filters( 'et_video_format_image_height', 187 );
		$classtext = 'video-image';
		$titletext = strip_tags( get_the_title() );
		$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext,false,'Photo');
		$thumb = $thumbnail["thumb"];
		$et_videolink = get_post_meta( $post->ID, '_et_notebook_video_url', true );
	?>
	<?php if( '' != $thumb && 'on' == get_option('notebook_thumbnails_index') ) { ?>
		<div class="img">
			<a href="<?php echo esc_url( $et_videolink ); ?>" class="et_video_lightbox" title="<?php echo esc_attr( $titletext ); ?>">
				<span class="video_box">
					<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
				</span>
				<span class="overlay"></span>
				<span class="play"></span>
			</a>
		</div> 	<!-- end .img -->
	<?php } ?>
	
	<div class="content">
		<!-- <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> -->
		<h2 class="title"><a href="<?php echo esc_url( $et_videolink ); ?>" class="et_video_lightbox" title="<?php echo esc_attr( $titletext ); ?>"><?php the_title(); ?></a></h2>
		
		<?php get_template_part('includes/postinfo'); ?>
	</div>
	<div class="tag-strip">
		<div class="strip-piece strip-actor"></div>
		<div class="strip-piece strip-director"></div>
		<div class="strip-piece strip-editor"></div>
		<div class="strip-piece strip-writer"></div>
	</div>
</article> <!-- end .entry-->