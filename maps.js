var marker = null;
// Balanga longlat
var lng = 120.54321231608183;
var lat = 14.647694482753147;

function initMap() {

    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: { lat, lng },
        clickableIcons: false,
    });


    // Configure the click listener.
    map.addListener("click", (mapsMouseEvent) => {
        if (marker) {
            marker.setPosition(mapsMouseEvent.latLng);
        } else {
            marker = new google.maps.Marker({
                position: mapsMouseEvent.latLng,
                map: map
            });
            map.panTo(mapsMouseEvent.latLng);
        }

        const coordinates = mapsMouseEvent.latLng;
        $('#latitude').val(coordinates.lat());
        $('#longitude').val(coordinates.lng());

        map.panTo(mapsMouseEvent.latLng);
    });
}

function placeMarkerAndPanTo(latLng, map) {
    new google.maps.Marker({
        position: latLng,
        map: map,
    });
    map.panTo(latLng);
}

$(function () {
    initMap();
});