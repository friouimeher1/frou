<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <title>Google Maps Multiple Markers</title>
  <script src="http://maps.google.com/maps/api/js?sensor=false"
          type="text/javascript"></script>
</head>
<body>
  <div id="map" style="width: 1200px; height: 700px;"></div>

  <script type="text/javascript">
var geocoder;
var map;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var locations = [
  ['Sousse', 35.821593728813745, 10.602439557116668, 2],
  ['Sousse park', 35.822011299148365, 10.609263096850555, 4],

  ['Sousse ENISO', 35.81999302218199, 10.593041096728484, 3]
];

function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
//-------------------------------------------------------------------------------------
var x = document.getElementById("map");


    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
      var lat,lng;

        function showPosition(position) {
            lat=position.coords.latitude ;
            lng= position.coords.longitude;
//------------------------------------------------------------------------------------

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: new google.maps.LatLng(lat, lng),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  directionsDisplay.setMap(map);
  var infowindow = new google.maps.InfoWindow();

  var marker, i;
  var request = {
    travelMode: google.maps.TravelMode.DRIVING
  };
  for (i = 0; i < locations.length; i++) {
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(locations[i][1], locations[i][2]),
    });

    google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {
        infowindow.setContent(locations[i][0]);
        infowindow.open(map, marker);
      }
    })(marker, i));
//--------------------------------------------------------------------------------------------------------
var marker1 = new google.maps.Marker({
  position: new google.maps.LatLng(lat, lng),
  icon:'marker1.png',
  map: map

});
marker1.addListener('click', function() {
  infowindow.setContent("Hello ,This is your Current Position");
  infowindow.open(map, marker1);
});
//--------------------------------------------------------------------------------------------------------
    if (i == 0) request.origin = marker1.getPosition();
    //else if(i==0)request.origin = marker.getPosition();
    else if (i == locations.length - 1) request.destination = marker.getPosition();
    else {
      if (!request.waypoints) request.waypoints = [];
      request.waypoints.push({
        location: marker.getPosition(),
        stopover: true
      });
    }

  }

  directionsService.route(request, function(result, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(result);
    }
  });
}
}
google.maps.event.addDomListener(window, "load", initialize);
</script>
</body>
</html>
