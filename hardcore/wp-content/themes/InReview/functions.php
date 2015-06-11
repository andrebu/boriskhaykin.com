<?php 
add_action( 'after_setup_theme', 'et_setup_theme' );
if ( ! function_exists( 'et_setup_theme' ) ){
	function et_setup_theme(){
		global $themename, $shortname;
		$themename = "InReview";
		$shortname = "inreview";
	
		require_once(TEMPLATEPATH . '/epanel/custom_functions.php'); 

		require_once(TEMPLATEPATH . '/includes/functions/comments.php'); 

		require_once(TEMPLATEPATH . '/includes/functions/sidebars.php'); 

		load_theme_textdomain('InReview',get_template_directory().'/lang');

		require_once(TEMPLATEPATH . '/epanel/options_inreview.php');

		require_once(TEMPLATEPATH . '/epanel/core_functions.php'); 

		require_once(TEMPLATEPATH . '/epanel/post_thumbnails_inreview.php');
		
		include(TEMPLATEPATH . '/includes/widgets.php');
		
		require_once(TEMPLATEPATH . '/includes/additional_functions.php');
	}
}

function register_main_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu' ),
			'secondary-menu' => __( 'Secondary Menu' ),
			'footer-menu' => __( 'Footer Menu' )
		)
	);
}
if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );

// add Home link to the custom menu WP-Admin page
function et_add_home_link( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'et_add_home_link' );

add_action('wp_head','et_add_meta_javascript');
function et_add_meta_javascript(){
	global $shortname;
	echo '<!-- used in scripts -->';
	echo '<meta name="et_featured_auto_speed" content="'.get_option($shortname.'_slider_autospeed').'" />';
			
	$disable_toptier = get_option($shortname.'_disable_toptier') == 'on' ? 1 : 0;
	echo '<meta name="et_disable_toptier" content="'.$disable_toptier.'" />';
	
	$featured_slider_pause = get_option($shortname.'_slider_pause') == 'on' ? 1 : 0;
	echo '<meta name="et_featured_slider_pause" content="'.$featured_slider_pause.'" />';
	
	$featured_slider_auto = get_option($shortname.'_slider_auto') == 'on' ? 1 : 0;
	echo '<meta name="et_featured_slider_auto" content="'.$featured_slider_auto.'" />';
}

if ( ! function_exists( 'et_list_pings' ) ){
	function et_list_pings($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
		<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?>
	<?php }
}
	
add_filter('comment_form_field_comment','et_inreview_comment_form_add_rating');
function et_inreview_comment_form_add_rating( $comment_field ){
	if ( is_page() ) return $comment_field;
	
	$rating_field = '<div id="et-rating" class="clearfix">
						<span id="choose_rating">' . esc_html__('Choose a Rating','InReview') . '</span>
						<div class="rating-container">
							<div class="rating-inner clearfix">';
	
	for ( $increment = 0.5; $increment <= 5; $increment = $increment+0.5  ) {
		$rating_field .= '<input name="et_star" type="radio" class="star {half:true}" value="' . $increment . '" />';
	}
	
	$rating_field .= '		</div> <!-- end .rating-inner -->
						</div> <!-- end .rating-container -->
					</div> <!-- end #et-rating -->';
	
	return $rating_field . $comment_field;
} ?>