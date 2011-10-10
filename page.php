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

<div id="main" role="main">
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
	
	<footer>
		<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
		<?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>
	</footer>
	
      </div>
	  </div>
<?php endwhile; ?>

      <nav class="secondary">

        <ol>

      		<li><a href="#">Child Page 1</a></li>
      		<li><a href="#">Child Page 2</a></li>
      		<li><a href="#">Child Page 3</a></li>
      		<li><a href="#">Child Page 4</a></li>
      		<li><a href="#">Child Page 5</a></li>
      	</ol>
<?php
	// left sidebar holds page nav
	if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
    		
			  <?php dynamic_sidebar( 'primary-widget-area' ); ?>

<?php endif; ?>

    	</nav>
    </section>

<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>