$(window).load(function () {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
                        
            var coordenadasX = position.coords.longitude ;
            var coordenadasY = position.coords.latitude ;
            
            console.log(coordenadasY);
            console.log(coordenadasX);
            
        });
    }
    function ajaxLoad() {
        $.ajax({
            method: 'GET',
            url: url,
            data: {coordenadasX:coordenadasX, coordenadasY:coordenadasY}
        })
                .done(function (html) {
                    $("#opiniones").append(html);
                })
                .always(function () {
                    console.log('Complete');
                })
                .fail(function () {
                    console.log('fail');
                });

    }
});