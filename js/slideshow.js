/**
 * @author Kyle Beyer
 */
// setup variables
var sizeCode = 'z';// see suffixes: http://www.flickr.com/services/api/misc.urls.html
var containerSelector = '#slider';
 
var apiUrlFormat = 'http://api.flickr.com/services/rest/?&method=flickr.photosets.getPhotos&api_key={0}&photoset_id={1}&per_page={2}&format=json&jsoncallback=?';


// 
// String extensions
//

String.format = function () {
    var s = arguments[0];
    for (var i = 0; i < arguments.length - 1; i = i + 1) {
        var reg = new RegExp("\\{" + i + "\\}", "gm");
        s = s.replace(reg, arguments[i + 1]);
    }

    return s;
};

$j = jQuery.noConflict();
$j(function() {
	// make request to flickr api 
	$j.getJSON(String.format(apiUrlFormat, apiKey, photosetID, maxPhotos), function(data) {
	 
	    //loop through the results with the following function
	    $j.each(data.photoset.photo, function(i, item) {
	 
	        //build the url of the photo in order to link to it
	        var photoURL = 'http://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '_' + sizeCode + '.jpg';
	 
	        var photoID = item.id;
	        var photoTitle = item.title;
	 
	        var imgCont = '<img src="' + photoURL + '" alt="' + photoTitle + '"/>';
	 
	        //append the 'imgCont' variable to the document
	        $j(imgCont).appendTo(containerSelector);
	 
	 
	        if ((i + 1) == data.photoset.photo.length) {
	            // setup slider after last image
	            $j(containerSelector).nivoSlider({
	                effect: 'fade',
	                pauseTime: pauseTime * 1000,
	                pauseOnHover: false
	            });
	        }
	    });
	});
});