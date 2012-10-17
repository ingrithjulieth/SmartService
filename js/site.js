$(document).ready(function(){

	var fechaLoad = new Date();
	updatePage(fechaLoad.getDate()+'/'+parseInt(fechaLoad.getMonth()+1)+'/'+fechaLoad.getFullYear());		


	var meses  = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"]
	var diasShort = ["Dom", "Lun", "Mar", "Mier", "Jue", "Vie", "Sab"];
	$( "#calendario" ).datepicker({ dateFormat: "dd/m/yy",
									duration: "fast",
			     					monthNames: meses,
									dayNamesMin: diasShort,
								    onSelect: function(dateText, inst) {
			     					   updatePage(dateText);
								    }
							    });

	
	function updatePage(fecha){

		 var nuevafecha = fecha.split('/');
										if(nuevafecha[1]<10){
											nuevafecha[1]  = '0' + nuevafecha[1];
										}
										
										if(nuevafecha[2]<10){
											nuevafecha[2] = '0' + nuevafecha[1];
										}
		var fechaOrganizada =  	nuevafecha[2]+'-'+nuevafecha[1]+'-'+nuevafecha[0];	
	 	getRecibidos(fechaOrganizada);
	 	getenDesarrollo(fechaOrganizada);
	 	getFinalizados(fechaOrganizada);

	}



	$('#i_recibidos').click(function(){
		$('#pestanha_recibidos').css('display', 'block');
		$('#pestanha_ndesarrollo').css('display', 'none');
		$('#pestanha_finalizados').css('display', 'none');
	});

	$('#i_desarrollo').click(function(){
		$('#pestanha_recibidos').css('display', 'none');
		$('#pestanha_ndesarrollo').css('display', 'block');
		$('#pestanha_finalizados').css('display', 'none');
	});

	$('#i_finalizados').click(function(){
		$('#pestanha_recibidos').css('display', 'none');
		$('#pestanha_ndesarrollo').css('display', 'none');
		$('#pestanha_finalizados').css('display', 'block');
	});

	function getRecibidos(fechaInit){

		$('#pestanha_recibidos table').children().remove();
		$.post('loadSolicitudesRecibidas', {'fecha': fechaInit}, function(data){

			$.each(data, function(){
				$('#pestanha_recibidos table')
					.prepend('<tr class="row_recibidos" id="rq'+
						this.id_detalle+'" data-cantidad="'+
						this.cantidad+'" data-finicio="'+
						this.fechahora_inicio+'" data-fdesarrollo="'+
						this.fechahora_proceso+'" data-ffinalizado="'+
						this.fechahora_final+'" data-observ="'+
						this.observaciones+'" data-item="'+
						this.item+'" data-habitacion="'+
						this.habitacion+'" data-idItem="'+
						this.id_detalle+'" data-estado="'+
						this.estado_servicio+'"></tr>');
				$('#rq'+this.id_detalle).append('<td class="no_solicitud">No de Solicitud:'+this.id_servicio+'</td>');
				$('#rq'+this.id_detalle).append('<td class="habitacion"> Habitación: '+this.habitacion+'</td>');
				$('#rq'+this.id_detalle).append('<td class="item">Item: '+this.item+'</td>');
				$('#rq'+this.id_detalle).append('<td class="hora_solicitud">Hora de Solicitud:'+'  '+form_hora(this.fechahora_inicio)+'</td>');
			});
		}, 'json');
	}
	
	function getenDesarrollo(fechaInit){

		$('#pestanha_ndesarrollo table').children().remove();
		$.post('loadSolicitudesDesarrollo', {'fecha': fechaInit}, function(data){

			$.each(data, function(){
				$('#pestanha_ndesarrollo table')
					.prepend('<tr class="row_recibidos" id="rq'+
						this.id_detalle+'" data-cantidad="'+
						this.cantidad+'" data-finicio="'+
						this.fechahora_inicio+'" data-fdesarrollo="'+
						this.fechahora_proceso+'" data-ffinalizado="'+
						this.fechahora_final+'" data-observ="'+
						this.observaciones+'" data-item="'+
						this.item+'" data-habitacion="'+
						this.habitacion+'" data-idItem="'+
						this.id_detalle+'" data-estado="'+
						this.estado_servicio+'"></tr>');
				$('#rq'+this.id_detalle).append('<td class="no_solicitud">No de Solicitud:'+this.id_servicio+'</td>');
				$('#rq'+this.id_detalle).append('<td class="habitacion"> Habitación: '+this.habitacion+'</td>');
				$('#rq'+this.id_detalle).append('<td class="item">Item: '+this.item+'</td>');
				$('#rq'+this.id_detalle).append('<td class="hora_solicitud">Hora de Solicitud:'+'  '+form_hora(this.fechahora_inicio)+'</td>');
			});
		}, 'json');

	}

	function getFinalizados(fechaInit){

		$('#pestanha_finalizados table').children().remove();
		$.post('loadSolicitudesFinalizadas', {'fecha': fechaInit}, function(data){

			$.each(data, function(){
				$('#pestanha_finalizados table')
					.prepend('<tr class="row_recibidos" id="rq'+
						this.id_detalle+'" data-cantidad="'+
						this.cantidad+'" data-finicio="'+
						this.fechahora_inicio+'" data-fdesarrollo="'+
						this.fechahora_proceso+'" data-ffinalizado="'+
						this.fechahora_final+'" data-observ="'+
						this.observaciones+'" data-item="'+
						this.item+'" data-habitacion="'+
						this.habitacion+'" data-idItem="'+
						this.id_detalle+'" data-estado="'+
						this.estado_servicio+'"></tr>');
				$('#rq'+this.id_detalle).append('<td class="no_solicitud">No de Solicitud:'+this.id_servicio+'</td>');
				$('#rq'+this.id_detalle).append('<td class="habitacion"> Habitación: '+this.habitacion+'</td>');
				$('#rq'+this.id_detalle).append('<td class="item">Item: '+this.item+'</td>');
				$('#rq'+this.id_detalle).append('<td class="hora_solicitud">Hora de Solicitud:'+'  '+form_hora(this.fechahora_inicio)+'</td>');
			});
		}, 'json');

	}
	

	$('.menu_item').click(function(){
		$('.menu_item').removeClass('menu_itemClicked');
		$(this).addClass('menu_itemClicked');
	});

		$('#closeDialog').click(function(){
		$('#dialog-modal').dialog('close');
	});

	$('#dialog-action').click(function(){
		var id = $(this).attr('data-idItem');
		if($('#dialog-action').attr('data-action') == 'toProcess'){
			

			$.post("recibidoToProcess", { 'id_servicio': id}, function(data){
				$('#dialog-action').attr('data-action', 'toFinish');
				$('#dialog-action').val('Finalizar');
				$('#rq'+id).appendTo('#pestanha_ndesarrollo table');
				$('#fechaproceso_dialog').html(form_fechaStr(data));
				$('#horaproceso_dialog').html(form_hora(data));
				$('#rq'+id).attr('data-fdesarrollo', data);
				$('#rq'+id).attr('data-estado', '2');
			}, "json");
		}else{
			if($('#dialog-action').attr('data-action') == 'toFinish'){
				$.post("processToFinish", { 'id_servicio': id}, function(data){
					$('#dialog-action').attr('data-action', 'Finished');
					$('#rq'+id).appendTo('#pestanha_finalizados table');
				 	$('#fechafinalizado_dialog').html(form_fechaStr(data));
					$('#horafinalizado_dialog').html(form_hora(data));
					$('#rq'+id).attr('data-ffinalizado', data);
					$('#rq'+id).attr('data-estado', '3');
				}, "json");

				$('#dialog-action').css('visibility', 'hidden');
			}
		}
		
	});

	

	$('.row_recibidos').live('click', function(){
		$('#dialog-modal').dialog('open');
		$('#dialog-action').css('visibility', 'visible');
		
		var id = $(this).attr('id');
		var estado = $('#'+id).attr('data-estado');

		$('#item_dialog').html($('#'+id).attr('data-item'));
		$('#habitacion_dialog').html($('#'+id).attr('data-habitacion'));
		$('#obs_dialog').val($('#'+id).attr('data-observ'));
		$('#dialog-action').attr('data-idItem', $('#'+id).attr('data-idItem'));

		if($('#'+id).attr('data-finicio') != 'null'){
			$('#fecharecibido_dialog').html(form_fechaStr($('#'+id).attr('data-finicio')));
			$('#horarecibido_dialog').html(form_hora($('#'+id).attr('data-finicio')));
		}
		
		if($('#'+id).attr('data-fdesarrollo') != 'null'){		
			$('#fechaproceso_dialog').html(form_fechaStr($('#'+id).attr('data-fdesarrollo')));
			$('#horaproceso_dialog').html(form_hora($('#'+id).attr('data-fdesarrollo')));
			//console.log((form_fechaStr($('#'+id).attr('data-fdesarrollo'))));
		}

		if($('#'+id).attr('data-ffinalizado') != 'null'){
			$('#fechafinalizado_dialog').html(form_fechaStr($('#'+id).attr('data-ffinalizado')));
			$('#horafinalizado_dialog').html(form_hora($('#'+id).attr('data-ffinalizado')));
		}

		if(estado == '1'){
			$('#dialog-action').attr('data-action', 'toProcess');
			$('#dialog-action').val('En Desarrollo');
			$('#fechaproceso_dialog').html('');
			$('#horaproceso_dialog').html('');
			$('#fechafinalizado_dialog').html('');
			$('#horafinalizado_dialog').html('');
		}else if(estado == '2'){
			$('#dialog-action').attr('data-action', 'toFinish');
			$('#dialog-action').val('Finalizar');
			$('#fechafinalizado_dialog').html('');
			$('#horafinalizado_dialog').html('');
		}else if(estado == '3'){
			$('#dialog-action').attr('data-action', 'Finished');
			$('#dialog-action').css('visibility', 'hidden');
			// No se debe mostrar el Boton .. Hidden
		}

	});


});





//FUNCIONES GENERALES

$(function() {
    $( "#dialog-modal" ).dialog({
        height: 480,
        title: 'Detalles del Servicio',
        width: 520,
        modal: true,
        autoOpen: false
    });
});

function form_fechaStr(str){
	var newData = str.split(' ');
	return newData[0];
}

function form_fechaInit(fechaLoad){
	
	if(fechaLoad.getDate() <10 ){
		dia =  '0'+fechaLoad.getDate();
	}else{
		dia =  fechaLoad.getDate();
	}

	if(fechaLoad.getMonth() <10 ){
		mes =  '0'+parseInt(fechaLoad.getMonth()+1);
	}else{
		mes =  parseInt(fechaLoad.getMonth()+1);
	}

	return fechaLoad.getFullYear()+'-'+mes+'-'+dia;

}

function form_hora(hora){
		
		var t = hora.split(/[- :]/);
		var d = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);
		var minutes, hora , meridiano;
		
		if(d.getMinutes()<10)
			minutes = '0'+d.getMinutes();
		else
			minutes = d.getMinutes();
		
		if(d.getHours()>12){
			hora = d.getHours() - 12;
			meridiano = 'PM';
		}else{
			hora = d.getHours();
			meridiano = 'AM';
		}
		
		if(hora<10)
			hora = '0'+hora;
		
		return hora_final = hora+':'+minutes+' '+meridiano;	
}
	
