//Built by Amanda
(function($){


 




}(jQuery))
function hideMe(width){
    if(width < 769 ){
      $(".chooseFromIcon").hide();
      $("#chooseFromText").removeClass("chooseFromText");
      

    }
    else{
      $(".chooseFromIcon").show();
      $("#chooseFromText").addClass("chooseFromText");
    
    }

     
}
