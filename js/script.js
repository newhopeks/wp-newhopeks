
/* Fixing Mobile Safari orientation switch zooming bug, from: http://adactio.com/journal/4470/ */
if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)) {
  var viewportmeta = document.querySelector('meta[name="viewport"]');
  if (viewportmeta) {
    viewportmeta.content = 'width=device-width, minimum-scale=1.0, maximum-scale=1.0';
    document.body.addEventListener('gesturestart', function() {
      viewportmeta.content = 'width=device-width, minimum-scale=0.25, maximum-scale=1.6';
    }, false);
  }
}


$j = jQuery.noConflict();
// jQuery
$j(function (){
    
	/* Messing around with getting the #hero CTAs to match the height of the image
		 Could use some work on the "divide by 3" part to make the bottom alignment pixel-perfect
	*/
	var setHeroCTAHeights = function() {
  	var heroImgHeight = $j('#hero > .image > img').height();
  			heroCTAHeight = heroImgHeight / 3;

  	$j('#hero > ol > li > a').css('minHeight',heroCTAHeight + 'px');
  };
  
  $j(window).load(setHeroCTAHeights);
  
  $j(window).resize(setHeroCTAHeights);
  
});

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



















