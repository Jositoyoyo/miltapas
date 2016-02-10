var coordenadasX = "-3.65641729999993";
var coordenadasY = "40.4226965";
var categoria = 1 ;
function main() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {

            coordenadasX = position.coords.longitude;
            coordenadasY = position.coords.latitude;

            console.log(coordenadasY);
            console.log(coordenadasX);

        });
    } else {
        alert("no geolocacion");
    }
}
function ajaxLoad() {
    console.log(url, coordenadasX, coordenadasY);
    $("#loader").css({
                    'display': 'block'
                });
    $.ajax({
        method: 'GET',
        url: url,
        data: {
            coordenadasX: coordenadasX,
            coordenadasY: coordenadasY, 
            categoria: categoria
        },
        statusCode: {
            200: function () {
                console.log("Exito ...");
            }
        },
            500: function (message) {
                console.log("Error :" + message);
        }
    })
            .done(function (html) {
                $("#loader").css({
                    'display': 'none'
                });
                $("#content").replaceWith(html);
            })
            .always(function () {
                console.log('Complete');
            })
            .fail(function () {
                console.log('fail');
            });

}
$(window).load(function () {
    ajaxLoad();
    $("#categoria").change(function(){
        var categoria = document.querySelector("#categoria").value;
        ajaxLoad();
    });
});
