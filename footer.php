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
		<footer id="footer">
		<?php
			/* A sidebar in the footer? Yep. You can can customize
			 * your footer with four columns of widgets.
			 */
			get_sidebar( 'footer' );
		?>
	
        <div class="span-4">
            <h4>About</h4>
            <ul class="footer_menu">
                <li><a href="#">Our <strong>Story</strong></a></li>
                <li><a href="#">What we <strong>Believe</strong></a></li>
                <li><a href="#">Central <strong>Gathering</strong> (when, where)</a></li>
                <li><a href="#">Pastoral <strong>Team</strong></a></li>
            </ul>
        </div>
        <div class="span-4">
            <h4>Ministries</h4>
            <ul class="footer_menu">
                <li><a href="#">KidsLIFE (ages 0-5)</a></li>
                <li><a href="#">Fusion (ages...)</a></li>
                <li><a href="#">International</a></li>
                <li><a href="#">Volunteer</a></li>
            </ul>
        </div>
        <div class="span-4">
            <h4>LIFE Groups</h4>
            <ul class="footer_menu">
                <li><a href="#">What they are</a></li>
                <li><a href="#">Where they meet</a></li>
                <li><a href="#">Why they exist</a></li>
                <li><a href="#">JOIN</a></li>
            </ul>
        </div>
        <div class="span-2">
            <h4>Contribute</h4>
            <ul class="footer_menu">
                <li><a href="#">Ideas</a></li>
                <li><a href="#">Time</a></li>
                <li><a href="#">Money</a></li>
                <li><a href="#">Stories</a></li>
            </ul>
        </div>
        <div class="span-4 align_right">
            <h4>CONTACT US</h4>
            <h4>EVENTS</h4>
            <h4>RESOURCES</h4>
        </div>
        <div class="span-6 last align_right">
            <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/map.png" style="border: solid 3px #ccc;" />
        </div>

			<a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</footer>
	</div><?php /* .container */ ?>

	<!-- Javascript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
  <script>!window.jQuery && document.write(unescape('%3Cscript src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/libs/jquery-1.4.4.js"%3E%3C/script%3E'))</script>
  
  <!-- scripts concatenated and minified via ant build script-->
  <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/plugins.js"></script>
  <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/script.js"></script>
  <!-- end concatenated and minified scripts-->
  
  <!--[if lt IE 7 ]>
    <script src="js/libs/dd_belatedpng.js"></script>
    <script>DD_belatedPNG.fix('img, .png_bg'); // Fix any <img> or .png_bg bg-images. Also, please read goo.gl/mZiyb </script>
  <![endif]-->

	<!-- mathiasbynens.be/notes/async-analytics-snippet Change UA-XXXXX-X to be your site's ID -->
  <script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>