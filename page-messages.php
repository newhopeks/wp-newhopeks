<?php
/*
Template Name: Archives with Content
*/
?>

<?php get_header(); ?>

<div id="content">
 <?php if (have_posts()) : while (have_posts()) : the_post();?>
<article>
    <header>
        <h2 id="post-<?php the_ID(); ?>"><?php the_title();?></h2>
    </header>
  
    <?php the_content(); ?>
    
 </article>
 <?php endwhile; endif; ?>
 <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

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