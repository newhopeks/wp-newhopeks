<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>



				<h1><?php _e( 'Not Found', 'starkers' ); ?></h1>
				<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'starkers' ); ?></p>
				<?php get_search_form(); ?>

	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>



<?php
/** test api call to smart404
 * 
 */
 
 /*
 // get missing page url
 $missingPageUrl = "http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI'];
 
  // print api url for debugging
 _e('<p>Checking api for missing page redirect: ' . $missingPageUrl . '</p>');
 
 // call api
   global $acupath_api_url;
   
     // print api url for debugging
 _e('<p>Using api url: ' . $acupath_api_url . '</p>');
 
  // build api url
  $apiUrl = $acupath_api_url . '/submit/pagenotfound/?url=' . $missingPageUrl . '&nocache=' . $currenttime;

  // use wp built in functions to make http GET call to API (note: default timeout is 5s)
  $get_response = wp_remote_get($apiUrl, array( 'headers' => array( 'Accept' => 'application/json' ) ));
  // get body of response
  $response_body = wp_remote_retrieve_body( $get_response );
  // handle empty body on http error (timeout or non-200 status)
  if( $response_body == null || $response_body == '' ){ _e('<p><b>response body was empty</b></p>'); }
  
  _e('response body was: ' . $response_body);
  
   
         // convert json response to object
      $rObj = json_decode($response_body);
_e('<p>response.RedirectUrl is: ' . $rObj->{'RedirectUrl'} . '</p>');
_e('<p>response.ErrorCode is: ' . $rObj->{'ErrorCode'} . '</p>');
_e('<p>json last error is: ' . json_last_error() . '</p>');
*/
?>

<?php get_footer(); ?>