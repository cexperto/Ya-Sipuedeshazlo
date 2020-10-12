var map;
var marker;
var laturl;
var lngurl;
var baseurl = "http://augmenting.me/geo/report/?coordinates=";
var linkurl;
var comma = ", ";
//set map variables
function initialize() {
  var mapOptions = {
	zoom: 18
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
	  mapOptions);

  // Try HTML5 geolocation to get location
  if(navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(function(position) {
	  var pos = new google.maps.LatLng(position.coords.latitude,
									   position.coords.longitude);

	  var marker = new google.maps.Marker({
		map: map,
		position: pos,
		title: 'Esta es tu ubicacion',
		draggable: true,
		icon: {
		  path: google.maps.SymbolPath.BACKWARD_OPEN_ARROW,
		  scale: 10,
		  strokeColor: '#060C03' 
		},
	  });

//gets the pre-drag lat/long coordinates as a pair
	  document.getElementById("latbox").innerHTML=marker.getPosition().lat();	

//gets the pre-drag latlong coordinate
		  document.getElementById("latbox").value=marker.getPosition().lat();	
		  document.getElementById("longbox").value=marker.getPosition().lng();
		  var laturl=marker.getPosition().lat();
		  var lngurl=marker.getPosition().lng();
		  /* var linkurl=baseurl.concat(laturl,comma,lngurl);
          document.getElementById("linkurl").href=linkurl; */
          /*  */
           
          /*  */

//gets the new latlong if the marker is dragged		  
		google.maps.event.addListener(marker, "drag", function(){
			document.getElementById("latbox").value=marker.getPosition().lat();
			document.getElementById("longbox").value=marker.getPosition().lng();
			var laturl=marker.getPosition().lat();
			var lngurl=marker.getPosition().lng();
			/* var linkurl=baseurl.concat(laturl,comma,lngurl);
			document.getElementById("linkurl").href=linkurl; */
		});

	  map.setCenter(pos);
	}, function() {
	  handleNoGeolocation(true);
	});
  } else {
	// Browser doesn't support Geolocation
	handleNoGeolocation(false);
  }

}

//if it all fails
function handleNoGeolocation(errorFlag) {
  if (errorFlag) {
	var content = 'Error: The Geolocation service failed.';
  } else {
	var content = 'Error: Your browser doesn\'t support geolocation.';
  }

  var options = {
	map: map,
	position: new google.maps.LatLng(60, 105),
  };

  var marker = new google.maps.Marker(options);
  map.setCenter(options.position);
}
google.maps.event.addDomListener(window, 'load', initialize);