
var cm_map;
var cm_mapMarkers = [];
var cm_mapHTMLS = [];

// Create a base icon for all of our markers that specifies the
// shadow, icon dimensions, etc.
var cm_baseIcon = new GIcon();
cm_baseIcon.shadow = "http://www.google.com/mapfiles/shadow50.png";
cm_baseIcon.iconSize = new GSize(20, 34);
cm_baseIcon.shadowSize = new GSize(37, 34);
cm_baseIcon.iconAnchor = new GPoint(9, 34);
cm_baseIcon.infoWindowAnchor = new GPoint(9, 2);
cm_baseIcon.infoShadowAnchor = new GPoint(18, 25);


// Change these parameters to customize map
var param_wsId = "od6";
var param_ssKey = "0Ai8Hpiv1idXndDdsaDhoU0NfUjNodWk0Z09JQkF2Q2c";
var param_useSidebar = false;
var param_titleColumn = "title";
var param_descriptionColumn = "address";
var param_latColumn = "latitude";
var param_lngColumn = "longitude";
var param_rankColumn = "";
var param_iconType = "green";
var param_iconOverType = "orange";

/**
 * Loads map and calls function to load in worksheet data.
 */

    // create the map
    cm_map = new GMap2(document.getElementById("cm_map"));
    cm_map.addControl(new GLargeMapControl());
    cm_map.addControl(new GMapTypeControl());
    cm_map.setCenter(new GLatLng( 44.2035, -72.5623), 8);
   //cm_getJSON();
  
/**
 * Function called when marker on the map is clicked.
 * Opens an info window (bubble) above the marker.
 * @param {Number} markerNum Number of marker in global array
 */
function cm_markerClicked(markerNum) {
  cm_mapMarkers[markerNum].openInfoWindowHtml(cm_mapHTMLS[markerNum]);
}

/**
 * Function that sorts 2 worksheet rows from JSON feed
 * based on their rank column. Only called if column is defined.
 * @param {rowA} Object Represents row in JSON feed
 * @param {rowB} Object Represents row in JSON feed
 * @return {Number} Difference between row values
 */
function cm_sortRows(rowA, rowB) {
  var rowAValue = parseFloat(rowA["gsx$" + param_rankColumn].$t);
  var rowBValue = parseFloat(rowB["gsx$" + param_rankColumn].$t);

  return rowAValue - rowBValue;
}

/** 
 * Called when JSON is loaded. Creates sidebar if param_sideBar is true.
 * Sorts rows if param_rankColumn is valid column. Iterates through worksheet rows, 
 * creating marker and sidebar entries for each row.
 * @param {JSON} json Worksheet feed
 */       
function cm_loadMapJSON(json) {
  var usingRank = false;

  if(param_useSidebar == true) {
    var sidebarTD = document.createElement("td");
    sidebarTD.setAttribute("width","150");
    sidebarTD.setAttribute("valign","top");
    var sidebarDIV = document.createElement("div");
    sidebarDIV.id = "cm_sidebarDIV";
    sidebarDIV.style.overflow = "auto";
    sidebarDIV.style.height = "500px";
    sidebarDIV.style.fontSize = "11px";
    sidebarDIV.style.color = "#000000";
    sidebarTD.appendChild(sidebarDIV);
    document.getElementById("cm_mapTR").appendChild(sidebarTD);
  }

  var bounds = new GLatLngBounds();   

  if(json.feed.entry[0]["gsx$" + param_rankColumn]) {
    usingRank = true;
    json.feed.entry.sort(cm_sortRows);
  }

  for (var i = 0; i < json.feed.entry.length; i++) {
    var entry = json.feed.entry[i];
    if(entry["gsx$" + param_latColumn]) {
      var lat = parseFloat(entry["gsx$" + param_latColumn].$t);
      var lng = parseFloat(entry["gsx$" + param_lngColumn].$t);
      var point = new GLatLng(lat,lng);
      var html = "<div style='font-size:12px'>";
      html += "<strong>" + entry["gsx$"+param_titleColumn].$t 
              + "</strong>";
      var label = entry["gsx$"+param_titleColumn].$t;
      var rank = 0;
      if(usingRank && entry["gsx$" + param_rankColumn]) {
        rank = parseInt(entry["gsx$"+param_rankColumn].$t);
      }
      if(entry["gsx$" + param_descriptionColumn]) {
        //html += "<br/>" + " email <br> <a href="">phone</a> <br>" +entry["gsx$"+param_descriptionColumn].$t;
        html += "<br>" +entry["gsx$phone"].$t;
      }
      html += "</div>";

      // create the marker
      var marker = cm_createMarker(point,label,html,rank);
      cm_map.addOverlay(marker);
      cm_mapMarkers.push(marker);
      cm_mapHTMLS.push(html);
      bounds.extend(point);
    
      if(param_useSidebar == true) {
        var markerA = document.createElement("a");
        markerA.setAttribute("href","javascript:cm_markerClicked('" + i +"')");
        markerA.style.color = "#000000";
        var sidebarText= "";
        if(usingRank) {
          sidebarText += rank + ") ";
        } 
        sidebarText += label;
        markerA.appendChild(document.createTextNode(sidebarText));
        sidebarDIV.appendChild(markerA);
        sidebarDIV.appendChild(document.createElement("br"));
        sidebarDIV.appendChild(document.createElement("br"));
      } 
    }
  }

  cm_map.setZoom(cm_map.getBoundsZoomLevel(bounds));
  cm_map.setCenter(bounds.getCenter());
}

/**
 * Creates marker with ranked Icon or blank icon,
 * depending if rank is defined. Assigns onclick function.
 * @param {GLatLng} point Point to create marker at
 * @param {String} title Tooltip title to display for marker
 * @param {String} html HTML to display in InfoWindow
 * @param {Number} rank Number rank of marker, used in creating icon
 * @return {GMarker} Marker created
 */
function cm_createMarker(point, title, html, rank) {
  var markerOpts = {};
  var nIcon = new GIcon(cm_baseIcon);

  if(rank > 0 && rank < 100) {
    nIcon.imageOut = "http://gmaps-samples.googlecode.com/svn/trunk/" +
        "markers/" + param_iconType + "/marker" + rank + ".png";
    nIcon.imageOver = "http://gmaps-samples.googlecode.com/svn/trunk/" +
        "markers/" + param_iconOverType + "/marker" + rank + ".png";
    nIcon.image = nIcon.imageOut; 
  } else { 
    nIcon.imageOut = "http://gmaps-samples.googlecode.com/svn/trunk/" +
        "markers/" + param_iconType + "/blank.png";
    nIcon.imageOver = "http://gmaps-samples.googlecode.com/svn/trunk/" +
        "markers/" + param_iconOverType + "/blank.png";
    nIcon.image = nIcon.imageOut;
  }

  markerOpts.icon = nIcon;
  markerOpts.title = title;    
  var marker = new GMarker(point, markerOpts);
  
  GEvent.addListener(marker, "click", function() {
    marker.openInfoWindowHtml(html);
  });
  GEvent.addListener(marker, "mouseover", function() {
    marker.setImage(marker.getIcon().imageOver);
  });
  GEvent.addListener(marker, "mouseout", function() {
    marker.setImage(marker.getIcon().imageOut);
  });
  GEvent.addListener(marker, "infowindowopen", function() {
    marker.setImage(marker.getIcon().imageOver);
  });
  GEvent.addListener(marker, "infowindowclose", function() {
    marker.setImage(marker.getIcon().imageOut);
  });
  return marker;
}

/**
 * Creates a script tag in the page that loads in the 
 * JSON feed for the specified key/ID. 
 * Once loaded, it calls cm_loadMapJSON.
 */
 /*
function cm_getJSON() {

  // Retrieve the JSON feed.
  var script12 = document.createElement('script');

  script12.setAttribute('src', 'https://spreadsheets.google.com/feeds/list/0Ai8Hpiv1idXndDdsaDhoU0NfUjNodWk0Z09JQkF2Q2c/od6/public/values?alt=json-in-script');
  script12.setAttribute('id', 'jsonScript');
  script12.setAttribute('type', 'text/javascript');
  document.documentElement.firstChild.appendChild(script12);
}*/

//setTimeout('cm_load()', 500); 