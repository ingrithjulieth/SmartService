$(document).ready(function(){
	
	mensaje = {};


	$.post('getGuest', function(data){
		$.each(data, function(){
			$('#huesped').append('<option value="'+this.id_usuario_sguest+'">'+this.nombre_huesped+' - Habitación: ' +this.habitacion+'</option>');
		});
		
	}, "json");	


	$('#enviaMensaje').click(function(e){
		e.preventDefault();	
		mensaje.id = $('#huesped').attr('value');
		mensaje.msj = $('#text_area_msj').val();
		console.log(mensaje);

		$.post('saveMessage', {'id_to': mensaje.id, 'message': mensaje.msj}, function(data){
			alert('Mensaje Enviado Correctamente.');
		});

	});

});
