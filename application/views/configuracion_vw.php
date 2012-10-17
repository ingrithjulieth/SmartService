<div id="content_configuracion" class="content_fromMenu">
	<div class="titleContent">
		<img src="/img/gear.png"><label>Preferencias</label>
	</div>
	<div id="lateral_bar" class="panel_lateral">
		<div id="i_config_hotel" class="menu_item"><img src="/img/build.png">Hotel</div>
		<div id="i_config_user" class="menu_item"><img src="/img/group_user.png">Usuarios</div>
		<div id="i_config_items" class="menu_item"><img src="/img/items.png">Items y Servicios</div>
		<!--<div id="i_config_activ" class="menu_item"><img src="/img/activaciones.png">Activaciones</div>-->
	</div>

	<div id="Config_hotel" class="show_opciones">		
			<form id="hotel_form">	
				<div class="input_div"><label> Nit: </label> 
					<input name="nit" type="text">
					<input name="nit_verificacion" type="text" style="margin-left: 5px; width: 20px;">
				</div>
				<div class="input_div"><label> Nombre Hotel: </label> <input name="nombre_hotel" type="text"></div>
				<div class="input_div"><label> Razon Social </label> <input name="razon_social" type="text"></div>
				<div class="input_div"><label> Telefono Hotel: </label> <input name="telefono_hotel" type="tel" /></div>
				<div class="input_div"><label> Dirección Hotel: </label> <input name="direccion_hotel" type="text" /></div>
				<div class="input_div"><label> Contacto: </label> <input name="contacto" type="text"></div>
				<div class="input_div"><label> No. Habitaciones: </label> <input name="no_habitaciones" type="text"></div>
				<div class="button_form">
					<input id="btn_upd_form_hotel" type="submit" value="Actualizar Datos" class="btn_detail_class">
				</div>
			</form>
	</div>
	<div id="Config_usuario" class="show_opciones">
		<div id="admin_usuario" class="panel_lateral">
			<div id="add_user" class="menu_item"><img src="/img/add_user.png">Agregar Usuario</div>
			<div id="edit_user" class="menu_item"><img src="/img/edit_user.png">Editar Usuario</div>
		</div>
		<form id="form_configUser">
			<div id="form_first">
				<div class="input_div"><label> No. Cedula: </label> <input type="text" name="cedula"/></div>
				<div class="input_div"><label> Nombre: </label> <input type="text" name="nombre"/></div>
				<div class="input_div"><label> Apellido: </label> <input type="text" name="apellido"/></div>
				<div class="input_div"><label> Nombre de Usuario: </label> <input type="text" name="usuario_d_sistema"/></div>
				<div id="password" class="input_div"><label> Contraseña: </label> <input type="password" name="pass_d_sistema"/></div>
				<div id="password_confirm" class="input_div"><label> Confirmar Contraseña: </label> <input type="password" /></div>
				<div class="input_div"><label> Correo Electronico: </label> <input type="text" name="correo_electronico"/></div>
				<div class="input_div"><label> Celular: </label> <input type="text" name="celular"/></div>
			</div>
		<div id="list_privilegios">
			<label>Permisos de acceso</label>
			<div><input type="checkbox" name="servicios" value="1"><img src="/img/notebook.png"><label>Servicios</label></div>
			<div><input type="checkbox" name="estadisticas" value="1"><img src="/img/statistics.png"><label>Estadisticas</label></div>
			<div><input type="checkbox" name="preferencias" value="1"><img src="/img/gear.png"><label>Preferencias</label></div>
			<div><input type="checkbox" name="activaciones" value="1"><img src="/img/key.png"><label>Activaciones</label></div>
		</div>
		<div class="button_form" style="float: left">
				<input id="ejecutaForm_usuario" type="submit" class="btn_detail_class">
				<input id="limpiaForm" type="button" value="Limpiar Formulario" class="btn_detail_class">
		</div>
		
		</form>

		<div id="div_table_user" class="table_user_class">
			<table id="table_edit_user">
				<tr id="header_table_edit_user">
					<td class="h_codigo">Cedula</td>
					<td class="h_nombre">Nombre</td>
					<td class="h_categoria">Apellidos</td>
					<td class="h_valor">Email</td>
					<td class="h_edit">Editar</td>	
					<td class="h_delete">Eliminar</td>
				</tr>
			</table>
		</div>
		
	</div>

	<div id="Config_item" class="show_opciones">
		
		<div id="admin_usuario" class="panel_lateral">
			<div id="add_item" class="menu_item"><img src="/img/add_item.png">Agregar Item</div>
			<div id="edit_item" class="menu_item"><img src="/img/edit_item.png">Editar Item</div>
		</div>
		<form id="form_configItem">
			<div class="input_div"><label> Codigo: </label> <input type="text" name="codigo_contable"/></div>
			<div class="input_div"><label> Nombre item: </label> <input type="text" name="item"/></div>
			<div class="input_div"><label> Categorias: </label><select id="slt_categorias" name="id_categoria">
											<option value="0" default>Seleccione una categoria</option>
									   </select>
			</div>
			<div class="input_div"><label> Valor: $</label> <input type="text" name="valor"/></div>
			<div class="input_div"><label> Foto:</label>
				<label id="uploadBtn">Examinar
					<input id="upload" type="file" name="foto_item" value="clickme">
				</label>
			</div>
			<div class="button_form" style="float: left">
				<input id="formItem" type="submit" class="btn_detail_class" value="Guardar Item">
				<input id="limpiaFormItem" type="button" value="Limpiar Formulario" class="btn_detail_class">
			</div>
		</form>
	
		<div id="div_table" class="div_table">
			<table id="table_edit_item">
				<tr id="header_table_edit">
					<td class="h_codigo">Codigo</td>
					<td class="h_nombre">Nombre</td>
					<td class="h_categoria">Categoria</td>
					<td class="h_valor">Valor</td>
					<td class="h_edit">Editar</td>	
					<td class="h_delete">Eliminar</td>
				</tr>
			</table>
		</div>
	</div>
</div>
			