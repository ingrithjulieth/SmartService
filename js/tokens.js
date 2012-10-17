$(document).ready(function(){

var meses  = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"]
var diasShort = ["Dom", "Lun", "Mar", "Mier", "Jue", "Vie", "Sab"];

	$( "#fecha_salida" ).datepicker({ dateFormat: "dd/mm/yy",
									duration: "fast",
			     					monthNames: meses,
									dayNamesMin: diasShort,
								    onSelect: function(dateText, inst) {
								    }
							    });

	$.post('getRooms', function(data){
		$.each(data, function(){
			$('#habitaciones').append('<option value="'+this.id+'">'+this.habitacion+'</option>');
		});
		
	}, "json");


	$('#btn_generaTokens').click(function(e){
		e.preventDefault();

		var c_errores = false;
		var c_error_mail = false;
		data = [];

		$('#formulario input[type="text"]').each(function(){
			if($(this).val() == ''){
				c_errores = true;
			}else{
				data.push($(this).val());
			}
		});


		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!filter.test($('#formulario input[type="email"]').val())) {
			c_error_mail = true;
		}else{
			c_error_mail = false;
		}

		if(c_errores == false && $('#habitaciones').val() != 'e' && c_error_mail == false){
			$.post('activaServicio', $('#formulario').serialize(), function(data){ 
				$('#formulario').resetForm();
				alert('El servicio se ha activado correctamente');
			}, 'json');
		}else{
			data = [];
			alert('Se encontró un error mentras se validaban los campos verifique que esten diligenciados correctamente');

		}
	});

});