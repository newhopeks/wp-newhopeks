<?php
/*
Template Name: Archives with Content
*/
?>

<?php get_header(); ?>

<div id="main" role="main">
  <section id="page">
  <?php if (have_posts()) : while (have_posts()) : the_post();?>
  <div class="widget" id="post">
		<div>
			<header><h1><?php the_title();?></h1></header>
      <?php the_content(); ?>
  <?php endwhile; endif; ?>
  <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

<h2>Most Recent Posts</h2>
<?php 
    $args = array( 'numberposts' => 10, 'post_type' => 'post' );
    $lastposts = get_posts( $args );
    foreach($lastposts as $post) : setup_postdata($post); ?>           
<article class="event">
<time datetime="<?php the_time('F jS, Y') ?>"><abbr title="<?php the_time('F') ?>"><?php the_time('M') ?></abbr><?php the_time('j') ?></time>
<h3><a href="<?php the_permalink(); ?>" 
    title="<?php the_title() ?>">
        <?php the_title() ?>
    </a></h3>
<p><?php the_excerpt(); ?></p>
</article>
<?php endforeach; ?>

</div>
</div>
<nav class="secondary">

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