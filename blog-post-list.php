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

<h2>Most Recent Posts</h2>
<ul>
<?php
	$args = array( 'numberposts' => '5' );
	$recent_posts = wp_get_recent_posts( $args );
	foreach( $recent_posts as $post ){
		echo '<li><a href="' . get_permalink($post["ID"]) . '" title="Look '.$post["post_title"].'" >' .   $post["post_title"].'</a> </li> ';
	}
?>
</ul>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>