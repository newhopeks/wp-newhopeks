<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<?php
// hide secondary nav and add class to main dif if no children
$children = get_pages('child_of='.$post->ID);
?>

<div id="main" role="main" <?php if( count( $children ) == 0 ) { ?>class="no_children"<?php } ?> >
  <section id="page">
  	  
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div class="widget" id="post">
  		<div>
  			<header>
	<?php if ( is_front_page() ) { ?>
		<h2><?php the_title(); ?></h2>
	<?php } else { ?>	
		<h1><?php the_title(); ?></h1>
	<?php } ?>	
	    </header>		

	<?php the_content(); ?>
	 
	<?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>
	
      </div>
	  </div>
<?php endwhile; ?>

      
    </section>

<?php
// left sidebar holds page nav
if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
  		
		  <?php dynamic_sidebar( 'primary-widget-area' ); ?>

<?php endif; ?>

<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>