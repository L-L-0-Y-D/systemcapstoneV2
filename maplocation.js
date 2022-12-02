var geocoder = new google.maps.Geocoder();


$(function(){
    initialize_map();
});


function initialize_map() {
    
    var lat_value=document.getElementById('latitude').value; 
    var long_value=document.getElementById('longitude').value;
    var business_name=document.getElementById('business_name').value;
    var business_address=document.getElementById('business_address').value;
    var cuisinename=document.getElementById('cuisinename').value;
    var opening=document.getElementById('opening').value;
    var closing=document.getElementById('closing').value;
    var infoWindow = new google.maps.InfoWindow({ map: map });

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

          google.maps.event.addListener(marker, 'click', function () {
            // infoWindow.setTitle("HTML");
            infoWindow.setContent("<b>Business Name</b>: "+ business_name +
            "<br><b>Business Address</b>: "+ business_address +
            "<br><b>Cuisine</b>: "+ cuisinename +
            "<br><b>Opening</b>: "+ opening +
            "<br><b>Closing</b>: "+ closing);
            infoWindow.open(map, this);
          });

  }