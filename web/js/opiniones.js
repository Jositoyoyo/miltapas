$( window ).load(function(){
  	
	});

$("#more").click(function(){
	$.ajax({
		method: 'GET',
		url: url,
		data: {page: page, local: local}
	})
	.done(function(html){
		page ++;
		if(!html){
			console.log('no more results');
			$("#more").fadeOut();
			$("#opiniones").append('<small>No hay mas opiniones</small>')
		}
		$("#opiniones").append( html );
	})
	.always(function(){
		console.log('Complete');
	})
	.fail(function(){
		console.log('fail');
	});
});
$("#favoritos_add").click(function(){
	console.log("evento favoritos");
	$.ajax({
		method: 'GET',
		url: favoritos_add,
		data: {local: local},
		statusCode:{
			200: function(){
				console.log( "Añadido con exito ..." );
				}
			},
			500: function(message){
				console.log( "Error :" + message );
				}
			})	
	.done(function(response){
		$("#favoritos").replaceWith("<a href='#'>Añadido en favoritos</a>");
	});
	defaultPrevented();
});