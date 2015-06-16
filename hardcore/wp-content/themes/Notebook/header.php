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


			var $grid = $('#et_posts'),
				$checkboxes = $('.filters-button-group input');

				$grid.isotope({
					// options
					itemSelector: '.post',
					animationEngine : 'best-available',
					layoutMode:'fitRows',
					resizable: false
				});
				// get Isotope instance
				//var isotope = $grid.data('isotope');

  // add even classes to every other visible item, in current order
/*
  function addEvenClasses() {
    isotope.$filteredAtoms.each( function( i, elem ) {
      $(elem)[ ( i % 2 ? 'addClass' : 'removeClass' ) ]('even')
    });
  }
*/

				$checkboxes.change(function(){
					console.log('CHANGE function is working')
					var filters = [];
					// get checked checkboxes values
					$checkboxes.filter(':checked').each(function(){
						console.log('FILTER function is working')
						filters.push( this.value );
					});
					// ['.red', '.blue'] -> '.red, .blue'
					filters = filters.join('');
					$grid.isotope({ filter: filters });
					//addEvenClasses();
				});


			
/*
			var filters = {};
			// bind filter button click
			$('.filters-button-group').on( 'click', 'button', function() {
				var $this = $(this);
				// store filter value in object
				// i.e. filters.color = 'red'
				var group = $(this).parent('.filters-button-group').attr('data-filter-group');
				filters[ group ] = $this.attr('data-filter-value');
				// convert object into array
				var isoFilters = [];
				for ( var prop in filters ) {
					isoFilters.push( filters[ prop ] )
				}
				var selector = isoFilters.join('');
				$grid.isotope({ filter: selector });

				//var filterValue = $( this ).attr('data-filter-value');
				//$grid.isotope({ filter: filterValue });
			});
*/

			// change is-checked class on buttons
//			$('.button-group').each( function( i, buttonGroup ) {
				// When any of the buttons are clicked...
				$('.button-group').on( 'click', 'button', function() {
					var $buttonGroup = $( '.button-group' );
					var $buttons = $( '.button-group .button' );
					// "Show All" button behavior -- Check if buttons is ".show-all"
					if ($(this).hasClass('show-all')) {
						// If ".show-all" button clicked and has "filter-value" of none, then return...
						if (($(this).attr('data-filter-value') == '') && $(this).hasClass('is-checked')){
							console.log('RETURNING  111111');
							return;
						// Else if this has value of "*" then...
						} else if ($(this).attr('data-filter-value') == $(this).attr('data-original-filter')) {
							$buttons.each(function(){$(this).attr('data-filter-value', $(this).attr('data-original-filter'));});
							$(this).attr('data-filter-value', '');
							$buttonGroup.find('.is-checked').removeClass('is-checked');
							$(this).addClass('is-checked');
						}
							console.log('IF 111111');
//						$buttons.attr('data-filter-value', $(this).attr('data-original-filter'));
					// If NOT the "Show All" button, then...
					} else {
							console.log('ELSE 222222');
						$('.show-all').removeClass('is-checked');
						$('.show-all').attr('data-filter-value', $('.show-all').attr('data-original-filter'));
						$(this).toggleClass('is-checked');
						if ($(this).attr('data-filter-value') == $(this).attr('data-original-filter')) {
							console.log('IF 3333333');
							//$(this).attr('data-filter-value', '');
						} else {
							console.log('ELSE 44444444');
							$(this).attr('data-filter-value', $(this).attr('data-original-filter'))
							if ($buttonGroup.find('.is-checked').length == 0) {
							console.log('IF 555555');
								$('.show-all').click();
								$('.show-all').addClass('is-checked');
								$('.show-all').attr('data-filter-value', '');
							}
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
				<h1 class="main-header">Boris Khaykin</h1>
				<div class="buttons-container">
					<div class="button-group filters-button-group" data-filter-group="roles">
						<p>You can use the buttons below to filter my works based on my contribution.</p>
<!--
						<button class="button show-all is-checked" data-filter-value="" data-original-filter="*">Show All</button>
						<button class="button" data-filter-value=".tag-actor" data-original-filter=".tag-actor">Actor</button>
						<button class="button" data-filter-value=".tag-director" data-original-filter=".tag-director">Director</button>
						<button class="button" data-filter-value=".tag-editor" data-original-filter=".tag-editor">Editor</button>
						<button class="button" data-filter-value=".tag-writer" data-original-filter=".tag-writer">Writer</button>
-->
						<input type="checkbox" name="show-all" value="*" id="show-all" class="show-all"><label for="show-all">Show All</label>
						<input type="checkbox" name="tag-actor" value=".tag-actor" id="tag-actor"><label for="tag-actor">Acted</label>
						<input type="checkbox" name="tag-director" value=".tag-director" id="tag-director"><label for="tag-director">Directed</label>
						<input type="checkbox" name="tag-editor" value=".tag-editor" id="tag-editor"><label for="tag-editor">Edited</label>
						<input type="checkbox" name="tag-writer" value=".tag-writer" id="tag-writer"><label for="tag-writer">Wrote</label>
					</div>
				</div>
			</div>			
			
