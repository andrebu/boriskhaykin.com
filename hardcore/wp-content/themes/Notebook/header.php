<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php elegant_titles(); ?></title>
	<?php elegant_description(); ?>
	<?php elegant_keywords(); ?>
	<?php elegant_canonical(); ?>

	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold' rel='stylesheet' type='text/css'/>
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie6style.css" />
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/DD_belatedPNG_0.0.8a-min.js"></script>
		<script type="text/javascript">DD_belatedPNG.fix('img#logo, span.overlay, a.zoom-icon, a.more-icon, #menu, #menu-right, #menu-content, ul#top-menu ul, #menu-bar, .footer-widget ul li, span.post-overlay, #content-area, .avatar-overlay, .comment-arrow, .testimonials-item-bottom, #quote, #bottom-shadow, #quote .container');</script>
	<![endif]-->
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie7style.css" />
	<![endif]-->
	<!--[if IE 8]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie8style.css" />
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->

	<script type="text/javascript">
		document.documentElement.className = 'js';
	</script>

	<?php wp_head(); ?>
	
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<!-- 	Isotope -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.0/isotope.pkgd.min.js"></script>
	<script type="text/javascript">
		jQuery( document ).ready(function( $ ) {
			var $grid = $('#et_posts').isotope({
				// options
				itemSelector: '.post',
				animationEngine : 'best-available',
				layoutMode:'fitRows',
				resizable: false
			});
			// bind filter button click
			$('.filters-button-group').on( 'click', 'button', function() {
				var filterValue = $( this ).attr('data-filter');
				// use filterFn if matches value
				//filterValue = filterFns[ filterValue ] || filterValue;
				$grid.isotope({ filter: filterValue });
			});
			// change is-checked class on buttons
//			$('.button-group').each( function( i, buttonGroup ) {
				$('.button-group').on( 'click', 'button', function() {
					var $buttonGroup = $( '.button-group' );
					var $buttons = $( '.button-group .button' );
					if ($(this).hasClass('show-all')) {
						$buttonGroup.find('.is-checked').removeClass('is-checked');
						$buttons.attr('data-filter', '');
						$('.show-all').addClass('is-checked');
					} else {
						$('.show-all').removeClass('is-checked');
						$('.show-all').attr('data-filter', '');
						$(this).toggleClass('is-checked');
						if ($(this).attr('data-filter') == $(this).attr('data-original-filter')) {
							$(this).attr('data-filter', '');
							if ($buttonGroup.find('.is-checked').length == 0) {
								$('.show-all').addClass('is-checked');
								$('.show-all').attr('data-filter', $('.show-all').attr('data-original-filter'));
							}
						} else {
							$(this).attr('data-filter', $(this).attr('data-original-filter')) 
						}
					}
				});
//			});
		});
	</script>
	<style>
	</style>

</head>
<body <?php body_class(); ?>>
	<div id="left-area">
		<header>
			<?php do_action('et_header_top'); ?>
			<div id="logo">
				<a href="<?php echo home_url(); ?>">
					<?php $logo = ( $logo_url = get_option('notebook_logo') ) && '' != $logo_url ? $logo_url : get_template_directory_uri() . '/images/logo.png'; ?>
					<img src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo('name') ); ?>" />
				</a>
				<p id="tagline"><?php bloginfo('description'); ?></p>
			</div> <!-- end #logo -->		
			<nav id="top-menu">
				<?php
					$menuClass = '';
					if ( get_option('notebook_disable_toptier') == 'on' ) $menuClass .= ' et_disable_top_tier';
					$primaryNav = '';
					if (function_exists('wp_nav_menu')) {
						$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'echo' => false ) );
					}
					if ($primaryNav == '') { ?>
						<ul class="<?php echo esc_attr( $menuClass ); ?>">
							<?php if (get_option('notebook_home_link') == 'on') { ?>
								<li <?php if (is_home()) echo('class="current_page_item"') ?>><a href="<?php echo home_url(); ?>"><?php esc_html_e('Home','Notebook') ?></a></li>
							<?php }; ?>

							<?php show_page_menu($menuClass,false,false); ?>
							<?php show_categories_menu($menuClass,false); ?>
						</ul>
					<?php }
					else echo($primaryNav);
				?>	
			</nav> <!-- end #top-menu -->
		</header>
		<?php get_sidebar(); ?>
	</div> <!-- end #left-area -->		
			
	<div id="content-area" class="clearfix">
		<div id="content_right">
			<div class="filter-container">
				<h1 class="main-header">Boris Khaykin's Work</h1>
				<div class="buttons-container">
					<div class="button-group filters-button-group">
						<p>You can use the buttons below to filter my works based on my contribution.</p>
						<button class="button show-all is-checked" data-filter="*" data-original-filter="*">Show All</button>
						<button class="button" data-filter="" data-original-filter=".tag-writer">Writer</button>
						<button class="button" data-filter="" data-original-filter=".tag-editor">Editor</button>
						<button class="button" data-filter="" data-original-filter=".tag-director">Director</button>
						<button class="button" data-filter="" data-original-filter=".tag-actor">Actor</button>
					</div>
				</div>
			</div>