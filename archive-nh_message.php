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

<div id="content">
 <?php 
 $msgPage = get_page_by_title( 'Messages' );
 ?>
<article>
    <header>
        <h2><?php echo $msgPage->post_title;?></h2>
    </header>
  
    <?php echo apply_filters('the_content', $msgPage->post_content); ?>
    
 </article>

<h2>Most Recent Messages</h2>
<?php $loop = new WP_Query( array( 'post_type' => 'nh_message', 'posts_per_page' => 10 ) ); ?>

<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

	<?php the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
<?php endwhile; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>