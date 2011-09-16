<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?> <!doctype html>
 <!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
 <!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
 <!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
 <!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
 <!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
 <!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
 <head>
   <meta charset="utf-8">
	
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
	     Remove this if you use the .htaccess -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 * We filter the output of wp_title() a bit -- see
		 * twentyten_filter_wp_title() in functions.php.
		 */
		wp_title( '|', true, 'right' );
	
		?></title>
		
	<!--  Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

  <!-- CSS: implied media=all -->
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/style.css?v=2.1" />
  
  <!-- nivo slider CSS -->
  <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/nivo-slider.css" type="text/css" media="screen, projection">
  <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/nivo-slider-custom.css" type="text/css" media="screen, projection">

  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/libs/modernizr-2.06.min.js"></script>
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
</head>

<body <?php body_class(); ?>>
	
  <div id="container">
    <header role="banner">
			<nav class="secondary">
				<ol class="clearfix">
					<li><a href="/about/central-gathering">Sunday at 10am</a></li>
					<li><a href="/about/central-gathering#where">Get Directions</a></li>
					<li><a href="/life-groups#join">Join a LIFE group</a></li>
					<li><a href="/messages#latest">Listen to Sunday's message</a></li>
					<li><a href="/contribute">Give</a></li>
				</ol>
			</nav>
			<h1>
					<a class="ir" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">New Hope Church</a>
			</h1>
				
			<nav role="navigation" class="clearfix">
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
        <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
			</nav>
		</header>
	