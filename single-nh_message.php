<?php get_header(); ?>

<?php // Let's get the data we need
	$series_list = get_the_term_list( $post->ID, 'series', '', ', ', '' );
?>

	<div id="container">
		<div id="content">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<div class="resource">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="entry-meta">
					<span>Series: <?php echo $series_list ?></span>
				</div>
				<div class="entry-content">
					<?php the_content();?>
				</div>
			</div>

		<?php endwhile; ?>
	 	</div>
 	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>