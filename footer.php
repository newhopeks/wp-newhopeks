<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>

<div class="search">
	<input type="search" placeholder="Search&hellip;">
	<input type="submit" value="Go">
</div>
		<footer id="footer">
		<?php
			/* A sidebar in the footer? Yep. You can can customize
			 * your footer with four columns of widgets.
			 */
			get_sidebar( 'footer' );
		?>
	
        <nav class="clearfix">
  				<ol>
  					<li>
  						<a href="/about">About</a>
  						<ol>
  							<li><a href="/about#mission">Mission</a> / <a href="#">Vision</a> / <a href="/about#vision">Values</a></li>
  							<li><a href="/about/core-beliefs">What We Believe</a></li>
  							<li><a href="/about/central-gathering">Central Gathering</a></li>
  							<li><a href="/about/team">Pastoral Team</a></li>
  						</ol>
  					</li>
  					<li>
  						<a href="/ministries">Ministries</a>
  						<ol>
                <li><a href="/ministries/kidslife/">KidsLIFE (ages 0&thinsp;&mdash;&thinsp;5)</a></li>
                <li><a href="/ministries/fusion/">Fusion (ages...)</a></li>
                <li><a href="/ministries/glocal-affairs/">Glocal Affairs</a></li>
                <li><a href="/ministries#volunteer">Volunteer</a></li>
            </ol>
					</li>
					<li>
						<a href="/life-groups">LIFE groups</a></h3>
						<ol>
                <li><a href="/life-groups#what">What they are</a></li>
                <li><a href="/life-groups#where">Where they meet</a></li>
                <li><a href="/life-groups#why">Why they exist</a></li>
                <li><a href="/life-groups#join">JOIN</a></li>
            </ol>
					</li>
					<li>
						<a href="/contribute">Contribute</a></h3>
						<ol>
                <li><a href="/contribute#ideas">Ideas</a></li>
                <li><a href="/contribute#time">Time</a></li>
                <li><a href="/contribute#money">Money</a></li>
                <li><a href="/contribute#stories">Stories</a></li>
            </ol>
					</li>
					<li><a href="/contact/">CONTACT US</a></li>
          <li><a href="/calendar/">EVENTS</a></li>
          <li><a href="/resources/">RESOURCES</a></li>
        </ol>
        <ol class="map">
          <li>
            <a title="Map to New Hope Central Gathering" href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=3905+Green+Valley+Rd,+Manhattan,+KS&amp;ie=UTF8&amp;z=15&amp;om=1&amp;iwloc=addr" target="_blank">
            <img alt="Map to New Hope Central Gathering" src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/map.png" style="border: solid 3px #ccc;" />
            </a>
          </li>
        </ol>
      </nav>
      
			<a href="<?php echo home_url( '/' ) ?>" title="New Hope Church" rel="home">NewHopeKs.org</a> | <a href="/privacy-policy">Privacy</a> | <?php wp_loginout(); ?>
		</footer>
	</div><?php /* .container */ ?>

	<!-- Javascript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
  <script>!window.jQuery && document.write(unescape('%3Cscript src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/libs/jquery-1.4.4.js"%3E%3C/script%3E'))</script>
  
  <!-- scripts concatenated and minified via ant build script-->
  <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/plugins.js"></script>
  <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/script.js?v=2"></script>
  <!-- end concatenated and minified scripts-->

	<!-- mathiasbynens.be/notes/async-analytics-snippet Change UA-XXXXX-X to be your site's ID -->
  <script>
    var _gaq= [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>

  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
        chromium.org/developers/how-tos/chrome-frame-getting-started -->
   <!--[if lt IE 7 ]>
     <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
     <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
   <![endif]-->
   
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>