<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<div id="main" role="main">
  <section id="page">
 <?php 
 $msgPage = get_page_by_title( 'Messages' );
 ?>
    <div class="widget" id="post">
  		<div>
  			<header><h1><?php echo $msgPage->post_title;?></h1></header>
            <?php echo apply_filters('the_content', $msgPage->post_content); ?>
    
            <h2>Most Recent Messages</h2>
            <?php 
                $args = array( 'numberposts' => 10, 'post_type' => 'nh_message' );
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
            
        </div>
    </div>

        <?php
            // left sidebar holds page nav
            if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
                    
                    <?php dynamic_sidebar( 'primary-widget-area' ); ?>
        
        <?php endif; ?>

</section>
    
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>