var mapLocationAutocomplete;

function metformMapAutoComplete() {

var select = document.querySelectorAll('.mf-input-map-location');

select.forEach(function(v, i){
    mapLocationAutocomplete = new google.maps.places.Autocomplete(
    select[i], {types: ['geocode']});
});


}

function mfgeolocate() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
        var geolocation = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
        };
        var circle = new google.maps.Circle(
            {center: geolocation, radius: position.coords.accuracy});
        mapLocationAutocomplete.setBounds(circle.getBounds());
        });
    }
}