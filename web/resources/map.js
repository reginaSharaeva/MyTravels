function initMap() {
  var center = {lat: 36.31512514748051, lng: -5.2734375};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 2, 
    center: center
  });
   
  var p = { paths: '0', fillColor: '#ff791f', strokeColor: '#fff21f', strokeWeight: 1, fillOpacity: 1};
  initBorders(map, p);

  var geocoder = new google.maps.Geocoder;

  google.maps.event.addListener(map, "click", function(event) {
    geocodeLatLng(geocoder, map, event.latLng);
  });
}

function geocodeLatLng(geocoder, map, point) {
  var latlng = {lat: parseFloat(point.lat()), lng: parseFloat(point.lng())};
  geocoder.geocode({'location': latlng}, function(results, status) {
    if (status === 'OK') {
      if (results[0]) {
        for (var ac = 0; ac < results[0].address_components.length; ac++) {
          var component = results[0].address_components[ac];

          if (component.types[0] == 'country') {
            var country = component.long_name;                     
            startAjax("http://mytravels.com/resources/mapInit.php", country);
          }
        }
      }
    } 
  });
}