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
			// Initialize isotope and setup variables
			var $grid = $('#et_posts'),
				$checkboxes = $('#filters-group input'),
				$showAll = $('#show-all');
				//$filterGroup = $( '#filters-group' ),
				//$filters = $( '#filters-group input' );
			$grid.isotope({
				// options
				itemSelector: '.post',
				animationEngine : 'best-available',
				layoutMode:'fitRows',
				resizable: false
			});
			// On button clicked, gather all input values and filter posts
			$checkboxes.change(function(){
				var filters = [];
				// get checked checkboxes values
				$checkboxes.filter(':checked').each(function(){
					filters.push( this.value );
				});
				// ['.red', '.blue'] -> '.red, .blue'
				filters = filters.join('');
				$grid.isotope({ filter: filters });
			});

			// Input click behavior
			// When any of the buttons are clicked...
			$checkboxes.on('click', 'input', function() {
				// "Show All" button behavior -- Check if buttons is ".show-all"
				if ($showAll) {
					// If ".show-all" button clicked and has "filter-value" of none, then return...
					if ($(this).is(':checked')){
						//e.stopPropagation()
						console.log('this is CHECKED SHOW ALL');
						return;
					// Else, if not checked then set as :checked and remove :checked from other inputs.
					} else {
						console.log('this is Show All but NOTTTTT checked so we will set it to CHECKED');
						$checkboxes.filter(':checked').prop('checked', false);
						$(this).prop('checked', true);
					}
				// If NOT the "Show All" button, then...
				} else {
					console.log('it is NOT show all so we will go into else');
					if ($checkboxes.filter(':checked').length == 0) {
						console.log(':checke items are 0 so we will "click" and "check" show all');
						$showAll.prop('checked', true).click();
					} else {
						console.log('this is an un-checked input so we will remove check from show all and put a check here');
						$showAll.prop('checked', false);
					}
				}
			});
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
			<h1 class="main-header">Boris Khaykin</h1>
			<div id="filters-container">
				<p>You can use the buttons below to filter Boris Khaykin's works based on his contribution.</p>
				<div id="filters-group" data-filter-group="roles">
					<div class="one-filter">
						<input type="checkbox" name="show-all" value="*" id="show-all" class="show-all"><label for="show-all">Show All</label>
					</div>
					<div class="one-filter">
						<input type="checkbox" name="tag-actor" value=".tag-actor" id="tag-actor"><label for="tag-actor">Acted</label>
					</div>
					<div class="one-filter">
						<input type="checkbox" name="tag-director" value=".tag-director" id="tag-director"><label for="tag-director">Directed</label>
					</div>
					<div class="one-filter">
						<input type="checkbox" name="tag-editor" value=".tag-editor" id="tag-editor"><label for="tag-editor">Edited</label>
					</div>
					<div class="one-filter">
						<input type="checkbox" name="tag-writer" value=".tag-writer" id="tag-writer"><label for="tag-writer">Wrote</label>
					</div>
				</div>
			</div>
			<hr>
			
