@extends('layouts.app')

@section('content')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPk_OYKeT5aN1cuglTcy3B1bdywKfe8JA"></script>
<script>
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
		title: 'We are watching you.',
		draggable: true,
		icon: {
		  path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
		  scale: 10,
		  strokeColor: '#FF0000' 
		},
	  });

//gets the pre-drag lat/long coordinates as a pair
	  document.getElementById("latbox").innerHTML=marker.getPosition().lat();	

//gets the pre-drag latlong coordinate
		  document.getElementById("latbox").innerHTML=marker.getPosition().lat();	
		  document.getElementById("longbox").innerHTML=marker.getPosition().lng();
		  var laturl=marker.getPosition().lat();
		  var lngurl=marker.getPosition().lng();
		  var linkurl=baseurl.concat(laturl,comma,lngurl);
		  document.getElementById("linkurl").href=linkurl;

//gets the new latlong if the marker is dragged		  
		google.maps.event.addListener(marker, "drag", function(){
			document.getElementById("latbox").innerHTML=marker.getPosition().lat();
			document.getElementById("longbox").innerHTML=marker.getPosition().lng();
			var laturl=marker.getPosition().lat();
			var lngurl=marker.getPosition().lng();
			var linkurl=baseurl.concat(laturl,comma,lngurl);
			document.getElementById("linkurl").href=linkurl;
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
</script>
<div class="container py-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <form>
                <div class="form-group row">
                    <div class="col-sm-6"><!-- primera columna -->
                        <label for="address_address">Address</label>
                        <input type="text" id="address-input" name="address_address" class="form-control map-input" placeholder="Direccion">
                        <div id="map-canvas"></div>
                            <div class="main">
                                <a  id="linkurl" class="btn" href="#"></a>
                            </div>
                        <div id="latbox"></div>
                        <div id="longbox"></div> 
                    </div><!-- fin de segunda columna -->
                    <div class="col-sm-6"><!-- segunda columna -->
                        <form 
                            action="" 
                            method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="titulo">Titulo *</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Image *</label>
                                <input type="file" name="file">
                            </div>
                            <div class="form-group">
                                <label for="content">Contenido *</label>
                                <textarea name="body" id="content" rows="6" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="content">Contenido embebido</label>
                                <textarea name="iframe" id="content" class="form-control"></textarea>
                            </div>
                            <div class=""form-control>
                                @csrf
                            <input type="submit" value="Enviar" class="btn btn-sm btn-primary">
                            </div>
                    </form>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection
