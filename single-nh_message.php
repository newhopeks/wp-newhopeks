<?php get_header(); ?>
<div id="main" role="main">
  <section id="page">
    
<?php // Let's get the data we need
	$series_list = get_the_term_list( $post->ID, 'series', '', ', ', '' );
?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div class="widget" id="post">
  		<div>
  			<header><h1><?php the_title(); ?></h1>
            <?php twentyten_posted_on(); ?>
            <div class="entry-meta">
				<span>Series: <?php echo $series_list ?></span>
			</div>

			<?php the_content(); ?>
		
            <?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>				

            <footer>			
                <div>
			        <?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?></div>
                <div>
                    <?php previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'twentyten' ) . ' %title' ); ?>
                    <?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '' ); ?></div>
            </footer>

		</div>
    </div>
	<?php endwhile; ?>
    
  </section>
  <nav class="secondary">
      <ol>
          <li><a href="/messages">All messages</a></li>
          <li><a href="#">Series list</a></li>
      </ol>
  </nav>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>