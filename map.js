var geocoder = new google.maps.Geocoder();


$(function(){
    initialize_map();
});



function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
    } else {
      updateMarkerAddress('Cannot determine address at this location.');
    }
  });
}


function updateMarkerPosition(latlng) {
$('#latitude').val(latlng.lat());
$('#longitude').val(latlng.lng());
}



function updateMarkerAddress(str) {
  document.getElementById('#address').value = str;
}



function initialize_map() {
    
    var lat_value=document.getElementById('latitude').value; 
    var long_value=document.getElementById('longitude').value;

    if(lat_value=='0' || lat_value=="" )
    {
         lat_value=14.6741;
    }
    if(long_value=='0' || long_value=='')
    {
         long_value=120.5113;
    }
    var latlng = new google.maps.LatLng(lat_value, long_value);


    var myOptions = {
      zoom: 16,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.HYBRID
    }



    map = new google.maps.Map(document.getElementById("map"), myOptions);

    
    marker = new google.maps.Marker({
            position: latlng,
            title: 'address',
            map: map,
            draggable: false,
            //shadow: shadow,
          });

      geocodePosition(latlng);


  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerPosition(marker.getPosition());
  });

  google.maps.event.addListener(marker, 'dragend', function() {
    geocodePosition(marker.getPosition());
  });
  }