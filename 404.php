<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>



				<h1><?php _e( 'Not Found', 'twentyten' ); ?></h1>
				<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'twentyten' ); ?></p>
				<?php get_search_form(); ?>

	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>



<?php
/** test api call to smart404
 * 
 */
 
 // set tenant key
 $tenantKey = 'wpsandbox';
 // get missing page url
 $missingPageUrl = 'http://wpsandbox.54apps.info/wherever';
 
 // get current timestamp in milliseconds
  $timeparts = explode(" ",microtime());
  $currenttime = bcadd(($timeparts[0]*1000),bcmul($timeparts[1],1000));

 // build api url
 $apiUrl = 'http://smart404.54apps.com/api/v1/' . $tenantKey . '/submit/pagenotfound/?url=' . $missingPageUrl . '&nocache=' . $currenttime;
 
 // print api url for debugging
 _e('<p>making call to smart404 api at: ' . $apiUrl . '</p>');
 
 $session = curl_init($apiUrl);
 curl_setopt($session, CURLOPT_HEADER, false);
 curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($session, CURLOPT_CONNECTTIMEOUT, 5);
 curl_setopt($session, CURLOPT_HTTPHEADER, array('Accept: application/json'));
 $response = curl_exec($session);
 curl_close($session);
 
 // get http status code
 $status_code = array();
 preg_match('/\d\d\d/', $response, $status_code);
 
  _e('<p>');
 // check status
 switch($status_code[0] ){
   case 200:
     _e($response, 'smart404');
     break;
   case 503:
     _e('smart404 returned 503: service unavailable', 'smart404');
     break;
     break;
   case 403:
     _e('smart404 returned 403: forbidden', 'smart404');
     break;
     break;
   case 503:
     _e('smart404 returned 400: bad request', 'smart404');
     break;
     break;
   default:
     _e('smart404 returned status code:' . $status_code[0] . ' and response: ' . $response, 'smart404');
     break;
 }
_e('</p>');

// convert json respons to object
$rObj = json_decode($response);
_e('<p>response.RedirectUrl is: ' . $rObj->{'RedirectUrl'} . '</p>');
_e('<p>response.ErrorCode is: ' . $rObj->{'ErrorCode'} . '</p>');
_e('<p>json last error is: ' . json_last_error() . '</p>');

?>
  <?php if (smart404_loop()) : ?>
  <p>Or, try one of these posts:</p>
  <?php while (have_posts()) : the_post(); ?>
  <h4><a href="<?php the_permalink() ?>"
    rel="bookmark"
  title="<?php the_title_attribute(); ?>">
  <?php the_title(); ?></a></h4>
    <small><?php the_excerpt(); ?></small>
  <?php endwhile; ?>
  <?php endif; ?>

<?php get_footer(); ?>