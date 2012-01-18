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
 $show_nav = false;
 $post_ancestors = ( isset($post->ancestors) ) ? $post->ancestors : get_post_ancestors($post);
 $top_page = $post_ancestors ? end($post_ancestors) : $post->ID; //get the top page id
 $childrenOfParent = get_pages('child_of='.$top_page);
 $childrenOfMe = get_pages('child_of='.$post->ID);
 // show nav if this page is parent and has children
 if( count( $post_ancestors ) == 0 ){
   $show_nav = ( count($childrenOfMe) == 0 ); 
 }else{
   if( $post->ID != $top_page){
     // OR if child page has siblings
     $show_nav = ( count($childrenOfParent) == 0 );
   }
 }
 
 echo "<div style='display: none'>post ancestor count " . count( $post_ancestors );
 echo " children of parent count " . count( $childrenOfParent );
 echo " children of me count " . count( $childrenOfMe );
 echo " post is top page? " . ($post->ID == $top_page);
 echo " top page id" .$top_page;
 echo "</div>"
 ?>

<div id="main" role="main" <?php if( $show_nav ) { ?>class="no_children"<?php } ?> >
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