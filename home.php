<?php
/**
 * Home Template
 *
 * This is the home template.  Technically, it is the "posts page" template.  It is used when a visitor is on the 
 * page assigned to show a site's latest blog posts.
 *
 * @package Prototype
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

	<?php do_atomic( 'before_content' ); // prototype_before_content ?>

<div id="wrapper">
    <section id="content">
        <div id="slider1" class="nivoSlider">
        </div>
    </section>
</div>
	
	<div id="content">

		<?php do_atomic( 'open_content' ); // prototype_open_content ?>

		<div class="hfeed">

			<?php get_template_part( 'loop-meta' ); // Loads the loop-meta.php template. ?>

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php do_atomic( 'before_entry' ); // prototype_before_entry ?>

					<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

						<?php do_atomic( 'open_entry' ); // prototype_open_entry ?>

						<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'thumbnail' ) ); ?>

						<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>

						<?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( 'By [entry-author] on [entry-published] [entry-edit-link before=" | "]', hybrid_get_textdomain() ) . '</div>' ); ?>

						<div class="entry-summary">
							<?php the_excerpt(); ?>
							<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', hybrid_get_textdomain() ), 'after' => '</p>' ) ); ?>
						</div><!-- .entry-summary -->

						<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms taxonomy="category" before="Posted in "] [entry-terms before="| Tagged "] [entry-comments-link before=" | "]', hybrid_get_textdomain() ) . '</div>' ); ?>

						<?php do_atomic( 'close_entry' ); // prototype_close_entry ?>

					</div><!-- .hentry -->

					<?php do_atomic( 'after_entry' ); // prototype_after_entry ?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>

			<?php endif; ?>

		</div><!-- .hfeed -->

		<?php do_atomic( 'close_content' ); // prototype_close_content ?>

		<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>

	</div><!-- #content -->

	<?php do_atomic( 'after_content' ); // prototype_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>


<script>
// setup variables
var apiKey = 'a618d5006f9544eb47212249d1c1323f';
var photosetID = '72157625228479167';

var maxPhotos = 5;
var sizeCode = 'z';// see suffixes: http://www.flickr.com/services/api/misc.urls.html
var containerSelector = '#slider1';

var apiUrlFormat = 'http://api.flickr.com/services/rest/?&method=flickr.photosets.getPhotos&api_key={0}&photoset_id={1}&per_page={2}&format=json&jsoncallback=?';

// make request to flickr api 
$.getJSON(String.format(apiUrlFormat, apiKey, photosetID, maxPhotos), function(data) {

    //loop through the results with the following function
    $.each(data.photoset.photo, function(i, item) {

        //build the url of the photo in order to link to it
        var photoURL = 'http://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '_' + sizeCode + '.jpg';

        var photoID = item.id;
        var photoTitle = item.title;

        var imgCont = '<img src="' + photoURL + '" alt="' + photoTitle + '"/>';

        //append the 'imgCont' variable to the document
        $(imgCont).appendTo(containerSelector);


        if ((i + 1) == data.photoset.photo.length) {
            // setup slider after last image
            $(containerSelector).nivoSlider({
                effect: 'fade',
                pauseTime: 5000,
                pauseOnHover: false
            });
        }
    });
});
</script>