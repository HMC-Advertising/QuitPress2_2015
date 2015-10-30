// @codekit-prepend "plugins/fitvids.js"

(function($) {

	// Plugins
	$('.main').fitVids();

	// Mobile Navigation
    $('#nav-main-open').on('click', function(e){
    	var $this = $(this).toggleClass('is-active');

        $('.header-nav-wrap').toggleClass('is-active');
        e.preventDefault();
    });


    //Built by Amanda
	var bodyHeight = $("body").height();
  	var vwptHeight = $(window).height();
    var winWidth = $(window).width();
    
    if(winWidth > 760){
        if (vwptHeight > bodyHeight) {
    	   $("#stickyFooterContainer").css({
    		  "position" : "absolute",
    		  "bottom" : 0,
    		  "width" : "100%"
    	   });
	   }
	   else{
		  if($("#stickyFooterContainer").height() < 314){
			 $("#stickyFooterContainer").css({
    			"position" : "fixed",
    			"bottom" : 0,
    			"width" : "100%"
    		  });
    		  $("#main-container").css({
    		      	"padding-bottom" : $("#stickyFooterContainer").height()+"px"
    		  });
    	   }
        }
    }

})(jQuery);