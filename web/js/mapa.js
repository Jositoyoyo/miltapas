/**
 * Dibujar mapa
 * Leer nuestra posicion por defecto
 * leer Locales via Ajax
 * Filtro de cudades y categorias
 * Window - detalles, como llegar
 */
var ver_posicion;

function mi_posicion() {	
		 if (navigator.geolocation) {
             navigator.geolocation.getCurrentPosition(function (position) {
                 var latLng = new google.maps.LatLng(
                		 position.coords.latitude,
                         position.coords.longitude
                         );
                 mapDiv(latLng);
             });
		 }
}
function mapDiv(latLng){
	  
	var latlng = new google.maps.LatLng(latLng);
    	var mapOptions = {
        	zoom: 6,
        	center: latLng,
        	disableDefaultUI: true
    	}
    	map = new google.maps.Map(document.getElementById("map"), mapOptions);       	
    	        
        
}
mi_posicion();