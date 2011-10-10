<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>
<aside class="sidebar">

  <section class="widget message">
		<header>
			<h3>Latest Message</h3>
		</header>
		<div>
		  
      <?php 
          $args = array( 'numberposts' => 1, 'post_type' => 'nh_message' );
          $lastposts = get_posts( $args );
          foreach($lastposts as $post) : setup_postdata($post); ?>           
          <article class="audio">
            <p class="meta"><strong>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong><br><a href="#">Todd Stewart</a> | <time pubdate datetime=""><abbr title="August">Aug</abbr> 7, 2011</time></p>
	    <div class="audio-player"><?php the_excerpt(); ?></div>
          <?php
              $args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID ); 
              $attachments = get_posts($args);
              if ($attachments) {
                  foreach ( $attachments as $attachment ) {
                      apply_filters( 'the_title' , $attachment->post_title );?>
                      <p class="slides-link"><?php echo wp_get_attachment_link( $attachment->ID, '' , false, false, 'Download Slides'); ?></p>
                      <?php
                  }
              }
          ?>
          </article>
      <?php endforeach; ?>
      		<footer class="clearfix">
					  <p class="all"><a href="/messages/">Browse all messages</a></p>
						<p class="subscribe">Subscribe on <a href="itpc://<?php echo $_SERVER["HTTP_HOST"]?>/messages/feed/podcast">iTunes</a></p>
					</footer>
				</div>
			</section>
			
<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'secondary-widget-area' ) ) : ?>

			<section class="widget meta">
				<header><h3><?php _e( 'Meta', 'twentyten' ); ?></h3></header>
				<div><ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul></div>
			</section>

		<?php endif; // end secondary widget area ?>

</aside>