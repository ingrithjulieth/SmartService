$(document).ready(function(){
	
	//Carga Panel.
	$.post('getHotelData', function(data){
		$.each(data, function(){
			$('input[name="nit"]').val(this.nit);
			$('input[name="nit_verificacion"]').val(this.nit_verificacion);
			$('input[name="nombre_hotel"]').val(this.nombre_hotel);
			$('input[name="razon_social"]').val(this.razon_social);
			$('input[name="telefono_hotel"]').val(this.telefono_hotel);
			$('input[name="direccion_hotel"]').val(this.direccion_hotel);
			$('input[name="contacto"]').val(this.contacto);
			$('input[name="no_habitaciones"]').val(this.no_habitaciones);
		});
	}, 'json');


	$('.edit_item').live('click', function(){
		var id = $(this).attr('data-id');

		var codigo = $('#row'+id+' > .codigo').html();
		var nombre = $('#row'+id+' > .nombre').html(); 
		var categ  = $('#row'+id+' > .categoria').attr('data-id');
		var valor  = $('#row'+id+' > .valor').html();

		console.log(categ);

		$('input[name="codigo_contable"]').val(codigo);
		$('input[name="item"]').val(nombre);
		//$('select[name="id_categoria"]').attr('id_categoria')
		$('input[name="valor"]').val(valor);
		$('#form_configItem').css('display', 'block');
		$('#form_configItem').css('visibility', 'visible');
		$('#div_table').css('display', 'none');
		$('#limpiaFormItem').css('visibility', 'hidden');
		$('#form_configItem').css('display', 'block');
		$('#slt_categorias option[value='+categ+']').attr('selected', true);
		$('#formItem').attr('data-action','edit_item');
		$('#formItem').attr('data-action','actualizar_item');
		$('#formItem').attr('data-idItem',id);
		$('#formItem').css('visibility', 'visible');
		$('#formItem').val("Actualizar");

	});


	$('#edit_item').click(function(){
		$('#div_table').css('display', 'block');
		$('#form_configItem').css('display', 'none');
	});

	$('#add_item').click(function(){
		$('#form_configItem').resetForm();
		$('#form_configItem').css('display', 'block');
		$('#form_configItem').css('visibility', 'visible');
		$('#limpiaFormItem').css('visibility', 'visible');
		$('#div_table').css('display', 'none');
		$('#formItem').attr('data-action','add_item');
	});

	$.post('getCategory', function(data){
		$.each(data, function(){
			$('#slt_categorias').append('<option value="'+this.id_tipo+'">'+this.nom_tipo_servicio+'</option>');
		});
	}, 'json');

	$('#i_config_hotel').click(function(){
		$('#Config_hotel').css('display','block');
		$('#Config_usuario').css('display','none');
		$('#Config_item').css('display','none');
	});
	
	$('#i_config_user').click(function(){
		$('#Config_hotel').css('display','none');
		$('#Config_usuario').css('display','block');
		$('#Config_item').css('display','none');

		$('.row').remove();

			$.post('getListUsers',function(data){

				$.each(data, function(){
					$('#table_edit_user').append('<tr id="row'+this.id_user+'" class="row"></tr>');
					$('#row'+this.id_user).append('<td class="">'+this.cedula+'</td>');
					$('#row'+this.id_user).append('<td class="">'+this.nombre+'</td>');
					$('#row'+this.id_user).append('<td class="">'+this.apellido+'</td>');
					$('#row'+this.id_user).append('<td class="vor" >'+this.correo_electronico+'</td>');
					$('#row'+this.id_user).append('<td class="edit_user" data-id="'+this.id_user+'"><img src="/img/edit.png"></td>');
					$('#row'+this.id_user).append('<td class="delete_user" data-id="'+this.id_user+'"><img src="/img/delete.png"></td>');

				});
			}, 'json');

	});
	
	$('#i_config_items').click(function(){
		$('#Config_hotel').css('display','none');
		$('#Config_usuario').css('display','none');
		$('#Config_item').css('display','block');
		$('#Config_activ').css('display','none');
		$('#div_table').css('display', 'none');

		//El siguiente codigo va dentro de el boton de Editar item.
		//Empieza aqui!
			$('.row').remove();

			$.post('getItenandCategory',function(data){

				$.each(data, function(){
					$('#table_edit_item').append('<tr id="row'+this.id_item+'" class="row"></tr>');
					$('#row'+this.id_item).append('<td class="codigo">'+this.codigo_contable+'</td>');
					$('#row'+this.id_item).append('<td class="nombre">'+this.item+'</td>');
					$('#row'+this.id_item).append('<td class="categoria" data-id="'+this.id_categoria+'">'+this.nom_tipo_servicio+'</td>');
					$('#row'+this.id_item).append('<td class="valor" >'+this.valor+'</td>');
					$('#row'+this.id_item).append('<td class="edit_item" data-id="'+this.id_item+'"><img src="/img/edit.png"></td>');
					$('#row'+this.id_item).append('<td class="delete_item" data-id="'+this.id_item+'"><img src="/img/delete.png"></td>');

				});
			}, 'json');
		//Termina Aqui.
	});


	$('.delete_item').live('click', function(){
		var id = $(this).attr('data-id');
		//$('#row'+id).fadeOut('fast');
		$('<div></div>').appendTo('body')
                    .html('<div><h6>Estas Seguro que deseas eliminar este Item/Servicio?</h6></div>')
                    .dialog({
                        modal: true, title: 'Eliminar Item/Servicio', zIndex: 10000, autoOpen: true,
                        width: '300', resizable: false, heigth: '200',
                        buttons: {
                            Si: function () {
                            	$.post('eliminaItem', {'id_item':id}, function(){
									$('#row'+id).fadeOut('fast');  
                            	});


                                $(this).dialog("close");
                            },
                            No: function () {
                                $(this).dialog("close");
                            }
                        },
                        close: function (event, ui) {
                            $(this).remove();
                        }
                    });
	});

	$('#i_config_activ').click(function(){
		$('#Config_hotel').css('display','none');
		$('#Config_usuario').css('display','none');
		$('#Config_item').css('display','none');
		$('#Config_activ').css('display','block');
	});


	$('#btn_lmp_form_hotel').click(function(){
		$('#hotel_form').resetForm();
	});

	$('#btn_upd_form_hotel').click(function(e){
		e.preventDefault();
		var queryString = $('#hotel_form').formSerialize(); 
 		$.post('updateHotelData', queryString, function(data){
 			alert('Datos del Hotel Actualizados Correctamente.');
 		}, 'json'); 
	});

	$('#add_user').click(function(){
		$('#form_configUser').css('display', 'block');
		$('#list_privilegios').css('display', 'block');
		$('#list_privilegios').css('visibility', 'visible');
		$('#ejecutaForm_usuario').val('Crear Usuario');
		$('#limpiaForm').css('visibility','visible');
		$('.table_user_class').css('display','none');
	});

	$('#edit_user').click(function(){
		$('#form_configUser').css('display', 'none');
		$('#limpiaForm').css('visibility','hidden');
		$('#div_table_user').css('display', 'block')
	});

	$('.delete_user').live('click', function(){
		var id = $(this).attr('data-id');

			$('<div></div>').appendTo('body')
                    .html('<div><h6>Estas seguro que deseas eliminar este usuario?</h6></div>')
                    .dialog({
                        modal: true, title: 'Eliminar Usuario', zIndex: 10000, autoOpen: true,
                        width: '300', resizable: false, heigth: '200',
                        buttons: {
                            Si: function () {
                            	$.post('eliminaUser', {'id_user':id}, function(){
									$('#row'+id).fadeOut('fast');  
                            	});


                                $(this).dialog("close");
                            },
                            No: function () {
                                $(this).dialog("close");
                            }
                        },
                        close: function (event, ui) {
                            $(this).remove();
                        }
            });
		
	});


	$('#ejecutaForm_usuario').click(function(e){
		e.preventDefault();
		var c_errores = false;

		$('#form_configUser input').each(function(){
			if($(this).val() == ''){
				c_errores = true;
			}
		});

		//Validar todo el formulario . Correo Correcto Contraseñas tamaño minimo. Cedula Solo Numerico. TO DO.
		//El codigo para validar el correo ya esta hecho en el modulo de activaciones.!
		if($('#password').val() == $('#password_confirm').val() && c_errores == false){
			
			var queryString = $('#form_configUser').formSerialize();

	 		$.post('nuevoUsuario', queryString, function(data){
	 			alert('Nuevo Usuario Ingresado Correctamente');
	 			$('#form_configUser').clearForm();
				$('#list_privilegios').clearForm();
	 		}, 'json'); 
		}else{
			alert('Todos los campos deben ser diligenciados y las contraseñas deben coincidir');
		}
	});

	$('#limpiaForm').click(function(){
		$('#form_configUser').clearForm();
		$('#list_privilegios').clearForm();
	});

	var fileUploadImgName ='0';

	new AjaxUpload('upload', {
		  action: 'guardaFotoItem',
		  name: 'userfile',
		  autoSubmit: true,
		  responseType: 'json',
		  onComplete: function(file, response) {
		  	console.log(response);
		  	$.each(response, function(){
		  		fileUploadImgName = this.file_name;
		  	});
		  	
		  }
		});

	$('#formItem').click(function(e){
		e.preventDefault();
		var c_errores = false;

		$('#form_configItem input[type="text"]').each(function(){
			if($(this).val() == ''){
				c_errores = true;
			}
		});

		if($('#slt_categorias').val() == '0'){
			c_errores = true;
		}

		if(c_errores == true){
			alert('Debe Diligencias todos los campos antes de Guardar');

		}else{

			if ($('#formItem').attr('data-action') == 'add_item') {
				var queryString = $('#form_configItem').formSerialize();
				queryString = queryString + fileUploadImgName;
				console.log(queryString);
				$.post('setItem', queryString, function(data){
		 			alert('Nuevo Item Ingresado Correctamente');
		 			$('#form_configItem').resetForm();
		 		}, 'json');				
		 	
		 	}else{
		 		var id = '&id_item='+$('#formItem').attr('data-iditem');
				var queryString = $('#form_configItem').formSerialize();
				if (fileUploadImgName == '0') {
					queryString = queryString.replace('&foto_item=','') + id;
				}else{
					queryString = queryString + fileUploadImgName + id;					
				};
				console.log(queryString);
				$.post('updateItemServicios', queryString, function(data){
		 			alert('Datos Actualizados Correctamente');
		 			$('#form_configItem').resetForm();
		 		}, 'json');	

			}
		
		}
			
	});	
	$('#limpiaFormItem').click(function(){
		$('#form_configItem').resetForm();
	});

});