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
	
<section class="featured">
  <div class="span-7">
    <ul class="left_bar">
        <li>
            <span class="inner">
            what to expect
            </span>
        </li>
        <li>
            <span class="inner">
            get in touch
            </span>
        </li>
        <li>
            <span class="inner">
            what we believe
            </span>
        </li>
    </ul>
  </div>

  <div class="span-17 last">
    <div id="slider-wrapper" class="border1">
      <div id="slider" class="nivoSlider">
      </div>
    </div>
  </div>
  <div class="clear"></div>

  <div class="span-12">
      <div class="latest_event">upcoming event</div>
  </div>
  <div class="span-12 last">
      <div class="latest_audio">
        <?php 
            $args = array( 'numberposts' => 1, 'post_type' => 'nh_message' );
            $lastposts = get_posts( $args );
            foreach($lastposts as $post) : setup_postdata($post); ?>           
            <div class="recent-message-title">Listen to the our most recent message - <em><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></em></div>
		    <div class="audio-player"><?php the_excerpt(); ?></div>
            <?php
                $args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID ); 
                $attachments = get_posts($args);
                if ($attachments) {
                    foreach ( $attachments as $attachment ) {
                        apply_filters( 'the_title' , $attachment->post_title );?>
                        <div class="slides-link">
                            <?php echo wp_get_attachment_link( $attachment->ID, '' , false, false, 'Download Slides'); ?>
                        </div> 
                        <?php
                    }
                }
            ?>
        <?php endforeach; ?>
        <div class="read-all"><a href="/messages/">Browse all messages...</a></div>
        </div>
  </div>
  <div class="clear"></div>


  <div class="span-24 last">
    &nbsp;
  </div>
</section>

<?php get_footer(); ?>

<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.nivo.slider.pack.js"></script>
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