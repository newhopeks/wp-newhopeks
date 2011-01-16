<?php
/**
 * Home Template
 *
 * This is the home template.  Technically, it is the "posts page" template.  It is used when a visitor is on the 
 * page assigned to show a site's latest blog posts.
 *
 * @package WordPress
 * @subpackage Starkers
 */

get_header(); /* Loads the header.php template. */ ?>
	
	<section class="content">
	
		<div id="slider-wrapper">
        <div id="slider" class="nivoSlider">
        </div>
    </div>

		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<article>
			<header>
			<?php if ( is_front_page() ) { ?>
				<h2><?php the_title(); ?></h2>
			<?php } else { ?>
				<h1><?php the_title(); ?></h1>
			<?php } ?>
			</header>
			<?php the_content(); ?>
			<footer>
				<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>
				<?php comments_template( '', true ); ?>
			</footer>
		</article>
   <?php endwhile; ?>
   </section><?php /* .content */ ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>


<script>
// setup variables
var apiKey = 'a618d5006f9544eb47212249d1c1323f';
var photosetID = '72157625228479167';

var maxPhotos = 5;
var sizeCode = 'z';// see suffixes: http://www.flickr.com/services/api/misc.urls.html
var containerSelector = '#slider';

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