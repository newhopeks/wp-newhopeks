<?php
/**
 * The Template for displaying all single posts.
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
  			<header><h1><?php the_title(); ?></h1></header>
            <?php twentyten_posted_on(); ?>

			<?php the_content(); ?>
		
            <?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
						
            <footer>
                <div>
                    <?php twentyten_posted_in(); ?>
			        <?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?></div>
                <div>
                    <?php previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'twentyten' ) . ' %title' ); ?>
                    <?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '' ); ?></div>
            </footer>
        </div>
        <div class="comments">
			<?php comments_template( '', true ); ?>
        </div>
    </div>
<?php endwhile; // end of the loop. ?>
      
    <nav class="secondary">
        <ol>
            <li><a href="/blog">All posts</a></li>
            <li><a href="/blog/rss">Subscribe</a></li>
        </ol>
    </nav>
    
  </section>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>