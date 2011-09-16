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

	<div id="main" role="main">
		<section id="hero" class="clearfix">
			<div class="image">
			  <div id="slider-wrapper" class="border1">
          <div id="slider" class="nivoSlider">
        </div>
      </div>
			</div>
			<ol class="semanticList">
				<li><a href="#">What to Expect</a></li>
				<li><a href="#">Resources</a></li>
				<li><a href="#">What We Believe</a></li>
			</ol>
		</section>
		
		<div class="widgets clearfix">
			<section class="widget upcoming">
				<header>
					<h3>Upcoming Events</h3>
				</header>
				
        <div>
      <?php if(function_exists('fetch_feed')) {
        
            include_once(ABSPATH . WPINC . '/feed.php');               // include the required file
            $feed = fetch_feed('http://newhope.daptivate.com/calendar/rss/rss2.0.php?cal=https%253A%252F%252Fwww.google.com%252Fcalendar%252Fical%252Fnewhopeks%2540gmail.com%252Fpublic%252Fbasic.ics&cpath=&rssview=week'); // specify the source feed
        
            $limit = $feed->get_item_quantity(6); // specify number of items
            $items = $feed->get_items(0, $limit); // create an array of items
        
        }
        if ($limit == 0) echo '<div>Oops.  There was a problem.</div>';
        else foreach ($items as $item) : ?>
        
                <?php 
                    list($dtString, $titleText) = split(':', $item->get_title());
                    list($day, $month, $dayNum, $year) = split(' ', $dtString);
                ?>
        <article class="event">
          <time datetime=""><?php echo "<abbr title=$month >$month</abbr>$dayNum</time>"; ?>
          <h3><a href="<?php echo $item->get_permalink(); ?>" 
            title="<?php echo "$dayNum $month $year"; ?>">
                <?php echo "$titleText"; ?>
            </a></h3>
        </article>
        
        <?php endforeach; ?>
        <footer class="clearfix">
				  <p class="all"><a href="/calendar">View all events</a></p>
  			  <p class="subscribe">Subscribe to our <a href="#">events feed</a></p>
  			</footer>
  		</div>
  	</section>
		<section class="widget message">
			<header>
				<h3>Latest Message</h3>
			</header>
			<div>
			  
        <?php 
            $args = array( 'numberposts' => 1, 'post_type' => 'nh_message' );
            $lastposts = get_posts( $args );
            foreach($lastposts as $post) : setup_postdata($post); ?>           
            <article class="audio">
              <p class="meta"><strong>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong><br><a href="#">Todd Stewart</a> | <time pubdate datetime=""><abbr title="August">Aug</abbr> 7, 2011</time></p>
		    <div class="audio-player"><?php the_excerpt(); ?></div>
            <?php
                $args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID ); 
                $attachments = get_posts($args);
                if ($attachments) {
                    foreach ( $attachments as $attachment ) {
                        apply_filters( 'the_title' , $attachment->post_title );?>
                        <p class="slides-link"><?php echo wp_get_attachment_link( $attachment->ID, '' , false, false, 'Download Slides'); ?></p>
                        <?php
                    }
                }
            ?>
            </article>
        <?php endforeach; ?>
        		<footer class="clearfix">
						  <p class="all"><a href="/messages/">Browse all messages</a></p>
							<p class="subscribe">Subscribe on <a href="itpc://<?php echo $_SERVER["HTTP_HOST"]?>/messages/feed/podcast">iTunes</a></p>
						</footer>
					</div>
				</section>
				<section class="widget twitter">
    			<header>
    				<h3>Recent Tweets</h3>
    			</header>
    			<div>
    			  <article class="tweet">
    			    <script src="http://widgets.twimg.com/j/2/widget.js"></script>
              <script>
              new TWTR.Widget({
                version: 2,
                type: 'profile',
                rpp: 1,
                interval: 30000,
                width: 'auto',
                height: 74,
                theme: {
                  shell: {
                    background: '#fffcff',
                    color: '#6e6b6e'
                  },
                  tweets: {
                    background: '#ffffff',
                    color: '#787878',
                    links: '#62a644'
                  }
                },
                features: {
                  scrollbar: false,
                  loop: false,
                  live: true,
                  hashtags: true,
                  timestamp: true,
                  avatars: false,
                  behavior: 'default'
                }
              }).render().setUser('newhopeks').start();
              </script>
    			  </article>
    			</div>
			</div>
	  </div>

<?php get_footer(); ?>

<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.nivo.slider.pack.js"></script>
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/slideshow.js"></script>
<script>
var apiKey = 'a618d5006f9544eb47212249d1c1323f';
var photosetID = '72157626575479725';
var maxPhotos = 10;
var pauseTime = 5; <!-- in seconds -->
</script>