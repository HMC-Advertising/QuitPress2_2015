//Built by Amanda
(function(){
    var image = '<a title="802Quits Google Maps Mobile" href="http://802quits.org/wordpress/802quits-google-maps-mobile/"><i class="fa fa-plus-square"></i></a>';

    if(/Android/i.test(navigator.userAgent) || /iPhone/i.test(navigator.userAgent)){
          
        $("#map-canvas").addClass("mobile");
        $("#map-canvas").html(image);   
    }
    else{
          $("#map-canvas").removeClass("mobile");
      $.ajax({ 
        url: "https://spreadsheets.google.com/feeds/list/0Ai8Hpiv1idXndDdsaDhoU0NfUjNodWk0Z09JQkF2Q2c/od6/public/values?alt=json",
        datatype: "jsonp",
        
        error: function (request, status, error) {
         
          //console.log("not working");
        },

        success: function( data ) {
   			var mapOptions = {
                    center: new google.maps.LatLng(44.2035, -72.5623), 
                    zoom: 7, 
                    mapTypeId: google.maps.MapTypeId.ROADMAP

            };
        
            map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);
                 
            var data = data.feed.entry;
            var datainfo = new google.maps.InfoWindow();

                    
            $.each(data, function(i, item){
                      var content = data[i];
                     
                      var lat = content.gsx$latitude.$t
                      var long = content.gsx$longitude.$t;
                      
                      var dataBubble = "<div id='marker"+i+"' style='width:300px;height:150px' class='dataBubble'>";
                        dataBubble += "<strong>"+ content.gsx$title.$t +"</strong>";
                        dataBubble += '<br>' + content.gsx$phone.$t;
                        dataBubble += "</div>";
                    
                      
                    var marker = new google.maps.Marker({
                        icon: "http://maps.google.com/mapfiles/ms/icons/green-dot.png",
                        position: new google.maps.LatLng(lat, long),
                        map: map,
                        title: content.gsx$title.$t
                    });

                      
                        
                    google.maps.event.addListener(marker, 'click', function() {
                        datainfo.close();
                        var dataBubble = "<div id='marker"+i+"' style='width:300px;height:150px' class='dataBubble'>";
                            dataBubble += "<strong>"+ content.gsx$title.$t +"</strong>";
                            dataBubble += '<br>' + content.gsx$phone.$t;
                            dataBubble += "</div>";

                            datainfo.setPosition(marker.position)
                            datainfo.setContent(dataBubble);
                            datainfo.open(map,marker);
                             
                    }); // /google.maps
            }); // "/each" 
        } // /success
  	  }) // /ajax
    }

}())