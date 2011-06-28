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
            resources
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

  <div class="span-12 module">
      <div class="latest_event">
        <h4>New Hope Events this week.</h4>
        <ul class="event_list">
      <?php if(function_exists('fetch_feed')) {
        
            include_once(ABSPATH . WPINC . '/feed.php');               // include the required file
            $feed = fetch_feed('http://newhope.daptivate.com/calendar/rss/rss2.0.php?cal=https%253A%252F%252Fwww.google.com%252Fcalendar%252Fical%252Fnewhopeks%2540gmail.com%252Fpublic%252Fbasic.ics&cpath=&rssview=week'); // specify the source feed
        
            $limit = $feed->get_item_quantity(7); // specify number of items
            $items = $feed->get_items(0, $limit); // create an array of items
        
        }
        if ($limit == 0) echo '<div>Oops.  There was a problem.</div>';
        else foreach ($items as $item) : ?>
        
                <?php 
                    list($dtString, $titleText) = split(':', $item->get_title());
                    list($day, $month, $dayNum, $year) = split(' ', $dtString);
                ?>
        <li class="event_wrapper">
            <?php echo "<span class=day>$day</span>"; ?>
            <a href="<?php echo $item->get_permalink(); ?>" 
            title="<?php echo $item->get_date('j F Y @ g:i a'); ?>">
                <?php echo "$titleText"; ?>
            </a>
        </li>
        
        <?php endforeach; ?>
        </ul>
        <div class="clear"></div>
        <div class="subscribe_section"><em><a href="https://www.google.com/calendar/ical/newhopeks%40gmail.com/public/basic.ics">Subscribe</a> or browse <a href="/calendar">all events</a>.</em></div>
      </div>
  </div>
  <div class="span-12 last module">
      <div class="latest_audio">
        <?php 
            $args = array( 'numberposts' => 1, 'post_type' => 'nh_message' );
            $lastposts = get_posts( $args );
            foreach($lastposts as $post) : setup_postdata($post); ?>           
            <h4 class="recent-message-header">Listen to the our most recent audio below or <a href="/messages/">browse all messages.</a></h4>
            <div class="recent-message-title"><em><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></em></div>
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
        <div class="subscribe_section"><em><a href=itpc://<?php echo $_SERVER["HTTP_HOST"]?>/messages/feed/podcast>Subcribe</a> to New Hope audio on <a href=itpc://<?php echo $_SERVER["HTTP_HOST"]?>/messages/feed/podcast>iTunes</a> or via <a href=/messages/feed/rss>rss</a>.</em></div>
        </div>
  </div>
  <div class="clear"></div>


  <div class="span-24 last">
    &nbsp;
  </div>
</section>

<?php get_footer(); ?>

<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.nivo.slider.pack.js"></script>
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/slideshow.js"></script>
<script>
var apiKey = 'a618d5006f9544eb47212249d1c1323f';
var photosetID = '72157626575479725';
var maxPhotos = 10;
var pauseTime = 5; <!-- in seconds -->
</script>