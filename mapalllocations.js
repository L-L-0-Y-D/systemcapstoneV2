
var map;
// Balanga longlat
var lng = 120.5113;
var lat = 14.6741;
var infoWindow = new google.maps.InfoWindow({ map: map });
const image = "uploads/spoonandfork.png";
// var content = "<b>Business Name</b>: "+ location.name +
//   "<br><b>Business Address</b>: "+ location.address +
//   "<br><b>Cuisine</b>: "+ location.cuisine +
//   "<br><b>Opening</b>: "+ location.opening +
//   "<br><b>Closing</b>: "+ location.closing;
//  var infoTemplate = new InfoTemplate("${FIELD_NAME}", content);

function initMap(mapLong, mapLat) {
  // console.log(mapLong + " " + mapLat);
  map = new google.maps.Map(document.getElementById('map'), {
    center: {
      lat: mapLat,
      lng: mapLong
    },
    zoom: 10
  });

  // Ajax here
  $.ajax({
    type: "POST",
    url: "businessjson.php",
    dataType: 'json',
    success: function (data) {
      $.each(data, function (i, val) {
        createMarkerAjax(val);
      });
    },
  });
}

function createMarkerAjax(location) {
  const latLng = new google.maps.LatLng(location.lat, location.lng);
  var marker = new google.maps.Marker({
    map: map,
    position: latLng,
    title: location.name,
    icon: image,
  })

  google.maps.event.addListener(marker, 'click', function () {
    // infoWindow.setTitle("HTML");
    infoWindow.setContent("<b>Business Name</b>: "+ location.name +
    "<br><b>Business Address</b>: "+ location.address +
    "<br><b>Cuisine</b>: "+ location.cuisinenames +
    "<br><b>Opening</b>: "+ location.opening +
    "<br><b>Closing</b>: "+ location.closing);
    infoWindow.open(map, this);
  });
}

initMap(lng, lat);