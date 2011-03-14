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
?><!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ --> 
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	
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
	
	<!-- Not in use
	<meta name="description" content="">
  <meta name="author" content="">
  -->
		
	<!--  Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Place favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  -->
  
  <!-- HTML5 Boilerplate CSS : implied media="all" -->
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>?v=2" />
  
  <!-- blueprint CSS -->
  <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/blueprint/screen.css" type="text/css" media="screen, projection">
  <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/blueprint/print.css" type="text/css" media="print">
  <!--[if lt IE 8]>
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/blueprint/ie.css" type="text/css" media="screen, projection">
  <![endif]-->
  
  <!-- nivo slider CSS -->
  <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/nivo-slider.css" type="text/css" media="screen, projection">
  <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/nivo-slider-custom.css" type="text/css" media="screen, projection">
  
  <!-- site CSS -->
  <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/site.css" type="text/css" media="screen, projection">
    

  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/libs/modernizr-1.6.min.js"></script>
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
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
	
	<div id="fixed_nav">
      <div class="container">
          <div class="first span-4"><a href="/">NewHopeKs.org</a></div>
          <div class="last prepend-6 span-14 align_right">
              <a href="/when">Sunday at <strong>10:15am</strong></a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="/directions">Get <strong>Directions</strong></a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="/LIFE/join"><strong>Join</strong> a LIFE Group</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="/central-gathering/latest"><strong>Listen</strong> to Sunday's Message</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="/give"><strong>Give</strong></a>
          </div>
      </div>
  </div>

	<div id="container" class="container">
		<header>
			<hgroup class="span-8">
				<h1 class="logo">
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>
			</hgroup>
			<nav role="main" class="span-16 last align-right">
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
        <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
        <a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a>
			</nav>
		</header>
  <div class="clear"></div>

	