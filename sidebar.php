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

<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
	
			<section class="widget search">
				<?php get_search_form(); ?>
			</section>

			<section class="widget archives">
				<header><h3><?php _e( 'Archives', 'twentyten' ); ?></h3></header>
				<div>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
				</div>
			</section>

			<section class="widget meta">
				<header><h3><?php _e( 'Meta', 'twentyten' ); ?></h3></header>
				<div><ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul></div>
			</section>

		<?php endif; // end primary widget area ?>

<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

			<?php dynamic_sidebar( 'secondary-widget-area' ); ?>

<?php endif; ?>
</aside>