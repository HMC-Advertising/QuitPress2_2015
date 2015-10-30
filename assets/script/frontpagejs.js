//Built by Amanda
(function(){


 




}())
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
