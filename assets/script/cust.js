//Built by Amanda

(function($){
	var bodyHeight = $("body").height();
  	var vwptHeight = $(window).height();
    var winWidth = $(window).width();
    //console.log(winWidth);
    //console.log(bodyHeight);
    //console.log(vwptHeight);

    if((winWidth > 760) ){
        if ((vwptHeight > bodyHeight)) {
    	   $("#stickyFooterContainer").css({
    		  "position" : "absolute",
    		  "bottom" : 0,
    		  "width" : "100%"
    	   });
	   }
	   else{
		  if(($("#stickyFooterContainer").height() < 314) || (!$("#post-not-found").length) ){
        if($("main").hasClass("searchPage")){
          $("#stickyFooterContainer").css({
             "position" : "fixed",
             "bottom" : 0,
             "width" : "100%"
            });
            $(".main").css({
                "padding-bottom" : $("#stickyFooterContainer").height()+"px"
            });
         }
        }
        else{
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

  
      var child = $(".stories-quote").children("p");
      var audio = $(".stories-quote").children("audio");

      if($(".stories-quote").children().has("audio")){
              audio.siblings("a.button").hide();
      }
      if(child.text().length < 50){
              child.siblings("a.button").hide();  
      }

      hideMe($(window).width());

      $(window).bind("resize", function(){
        hideMe($(window).width());
      })

      $('iframe').each(function(){
          var url = $(this).attr("src");
          var char = "?";
          if(url.indexOf("?") != -1){
                  var char = "&";
           }
         
          $(this).attr("src",url+char+"wmode=transparent");
    });

 }(jQuery))


function hideMe(width){
    if(/Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ){
     
      $("#slider").height(parseInt($(".page_item").width())+100);

    }
   
}
