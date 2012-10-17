$(function(){
	
	var prueba = [];
	
	/*
	(function poll(){
    $.ajax({ url: "nuevosServiciosPolling", success: function(data){ 
      	 if(data.n_notificaciones == '0'){
	    	$('#num_servicios').css('display', 'none');  	
      	}else{
      		$('#num_servicios').css('display', 'block');  
	      	$('#num_servicios').html(data.n_notificaciones); 
	
	 	$.each(data.id, function(){
	      		if($.inArray(this.id_servicio, prueba) == -1){
		      		prueba.push(this.id_servicio);
		      		
		      		var audioElement = document.createElement('audio');
		      		audioElement.setAttribute('src', '/snd/deskbell.mp3');
		      		audioElement.play();
		      		
		      		$.desknoty({
	                	icon:  "/img/notiIcon.png",
	                	title: "Nuevos Servicios",
	                	body:  "Nuevo Servicio RQ"+ this.id_servicio,
	                	sticky: true
	                });
		      	
	      		}		
	      	});
	      	
	  } 
      	      	
    }, dataType: "json", complete: poll, timeout: 30000 });
    })(); */
	
	

	$('#sm_usuario').click(function(){
		$('#dialog-user').dialog('open');
	});

	$('#closeDialog1').click(function(){
		$('#dialog-user').dialog('close');
	});

	$('#dialog-updateUser').click(function(){
		var passOld = $('#contraseñaactual').val();
		var passNew = $('#contraseñanueva').val();

		if ($('#contraseñanueva').val() == $('#contraseñarepetir').val()){
			$.post('updatePassword',{'passOld':passOld,'passNew':passNew},function(data){
				alert(data);
			},'json');
		}
		else{
			alert('Los Password no coinciden');
		}


		
	});

	$('#notifications_area').click(function(){
		$('#notificacioness').css('display', 'block');
		$('#menu_sistema').css('display', 'none');
			
		$.post('actualizaNotificaciones', function(data){
			$('#num_servicios').fadeOut(150);
			if(data.servicio_notificacion.length>0){
				$('#titulo_notificaciones > label').html('Existen '+data.servicio_notificacion.length+' sevicios nuevos'); 		
				$.each(data.servicio_notificacion, function(){
					var fecha  = this.fechahora_solicitud;
					$('#scroll_services').prepend('<div class="servicios_nuevos"><b>Habitación:</b> '+this.habitacion+' <b>No. Solicitud: </b> '+this.id_servicio+'<b> Fecha de Programación: '+this.fechahora_solicitud+'</b></div>');
				});		
			}else{
				$('#titulo_notificaciones > label').html('No hay Servicios nuevos');		
			}
		}, "json");
	});
	
	$('#titulo_notificaciones img').click(function(){
		$('#notificacioness').css('display', 'none');
		$('.servicios_nuevos').removeClass('servicios_nuevos').addClass('servicios');	
	});
	
	
	$('.menuButton').click(function(){
		$('#menu_sistema').css('display', 'block');
		$('#notificacioness').css('display', 'none');
	});
	
	$('#tituloMenu img').click(function(){
		$('#menu_sistema').css('display', 'none');
	});
	
	//Submenus.
	$('#sm_estadisticas').click(function(){
		$('#content_estadisticas').css('display', 'block');
		$('#content_servicios').css('display', 'none');
		$('#content_tokens').css('display', 'none');
		$('#content_configuracion').css('display', 'none');
		$('#content_mensajes').css('display', 'none');
		$('#menu_sistema').fadeOut(150);
	});
	
	$('#sm_servicios').click(function(){
		$('#content_estadisticas').css('display', 'none');
		$('#content_servicios').css('display', 'block');
		$('#content_tokens').css('display', 'none');
		$('#content_configuracion').css('display', 'none');
		$('#content_mensajes').css('display', 'none');
		$('#menu_sistema').fadeOut(150);
	});
	
	$('#sm_tokens').click(function(){
		$('#content_estadisticas').css('display', 'none');
		$('#content_servicios').css('display', 'none');
		$('#content_tokens').css('display', 'block');
		$('#content_configuracion').css('display', 'none');
		$('#content_mensajes').css('display', 'none');
		$('#menu_sistema').fadeOut(150);
	});

	$('#sm_configuracion').click(function(){
		$('#content_estadisticas').css('display', 'none');
		$('#content_servicios').css('display', 'none');
		$('#content_tokens').css('display', 'none');
		$('#content_configuracion').css('display', 'block');
		$('#content_mensajes').css('display', 'none');
		$('#menu_sistema').fadeOut(150);
	});

	$('#sm_mensajeria').click(function(){
		$('#content_estadisticas').css('display', 'none');
		$('#content_servicios').css('display', 'none');
		$('#content_tokens').css('display', 'none');
		$('#content_configuracion').css('display', 'none');
		$('#content_mensajes').css('display', 'block');
		$('#menu_sistema').fadeOut(150);
	});
	
});




//CUADRO DIALOGO USUARIO
$(function() {
    $( "#dialog-user" ).dialog({
        height: 230,
        title: 'Usuario',
        width: 420,
        modal: true,
        autoOpen: false
    });
});
