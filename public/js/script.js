function initMap() {
    // Create a map object and specify the DOM element for display.
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 35.853775,
            lng: 10.6059157
        },
        zoom: 15,
    });

    var marker = new google.maps.Marker({
        position: {
            lat: 35.853775,
            lng: 10.6059157

        },
        map: map,
        icon: '/image/marker.png',
        //icon: 'https://cdn0.iconfinder.com/data/icons/internet-and-web-flat-icons-free/512/Marker-128.png',
        draggable: true
    });
    var SearchBox = new google.maps.places.SearchBox(document.getElementById('search'));

    SearchBox.addListener('places_changed', function () {

        var places = SearchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;
        for (i = 0; place = places[i]; i++) {
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location);
        }
        map.fitBounds(bounds);
        map.setZoom(15);
    });
    marker.addListener('position_changed', function () {

        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();

        $('#lat').val(lat);
        $('#lng').val(lng);
    });
}


