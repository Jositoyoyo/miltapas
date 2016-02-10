var map;
var markers = [];

$("#local_direccion").blur(function () {
    var address = document.getElementById("local_direccion");
    console.log(address.value);
    geocoder = new google.maps.Geocoder();
    geocoder.geocode({'address': address.value}, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            var latLng = results[1].geometry.location;
            mapDiv(latLng);
            setMarker(latLng);
            geoCoder(latLng);
        } else {
            console.log('Geocode was not successful for the following reason: ' + status);
        }
    });
});

$("#mi_direccion").click(function () {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {          
            var latLng = new google.maps.LatLng(
                    position.coords.latitude, 
                    position.coords.longitude
                            );
            geoCoder(latLng);
            mapDiv(latLng);
            setMarker(latLng);
        });
    }
});
function geoCoder(latLng) {

    geocoder = new google.maps.Geocoder();
    geocoder.geocode({'latLng': latLng}, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
                // pasamos el objeto a un string con el metodo .toString ... Importante
                var coordenadas = latLng.toString();
                var direccion = results[0].formatted_address;
                
                // mediante una pequeña expresion regular convertimos en un array
                coordenadas = coordenadas.split(/[(,)]/g);
                direccion = direccion.split(',');
                console.log(direccion);
                document.getElementById("local_direccion").value = direccion[0]+', '+direccion[1];
                document.getElementById("local_ciudad").value = direccion[3];
                document.getElementById("local_coordenadas_Y").value = coordenadas[1];       
                document.getElementById("local_coordenadas_x").value = coordenadas[2];

            } else {
                console.log('No results found');
            }
        } else {
            console.log('Error: Geocoder failed due to: ' + status);
        }
    });
}
function mapDiv(latLng) {    
    var mapOptions = {
        zoom: 6,
        center: latLng,
        disableDefaultUI: true
    }
    map = new google.maps.Map(document.getElementById("map"), mapOptions);
    google.maps.event.addListener(map, 'click', function (event) {
        setMarker(event.latLng);
        geoCoder(event.latLng);
    });


}
function setMarker(latLng) {
    if (markers.length > 0) {
        console.log(markers + ', ' + markers.length);
        markers[0].setMap(null);
        markers = [];
    }
    
    var marker = new google.maps.Marker({
        position: latLng,
        map: map,
        draggable: false
    });
    map.setCenter(latLng);
    map.setZoom(16);
    markers.push(marker);


}

