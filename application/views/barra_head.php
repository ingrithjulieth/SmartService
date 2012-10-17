<div id="header">
	<div id="btn_sesion">
		<table>
			<td class="menuButton"><img src="/img/menu.png"></td>
			<td class="menuButton"><a id="link_btn_session">Menú</a> </td>
			<td id="notifications_area">
				<img src="/img/deskbell.png">
				<div id="num_servicios"></div>
			</td>
		</table>
	</div>
</div>
<div id="rayita"></div>

<div id="notificacioness" class="menuFlotante">
	<div id="titulo_notificaciones" class="titulo_menuFlotante">
		<label></label>
		<img src="/img/dark_cross.png">
	</div>
	<div id="scroll_services">
		
	</div>
</div>

<div id="menu_sistema"  class="menuFlotante">
	<div id="tituloMenu" class="titulo_menuFlotante">
		<label>Menú</label>
		<img src="/img/dark_cross.png">
	</div>
	<div id="sm_usuario" class="subMenu">
		<img src="/img/usuarios.png"><label>Usuario: Juan Paternina</label>
	</div>
	<div id="sm_servicios" class="subMenu">
		<img src="/img/notebook.png"><label>Servicios</label>
	</div>
	<div id="sm_tokens" class="subMenu">
		<img src="/img/key.png"><label>Activaciones</label>
	</div>
	<div id="sm_mensajeria" class="subMenu">
		<img src="/img/messages.png"><label>Mensajeria</label>
	</div>
	<div id="sm_estadisticas" class="subMenu">
		<img src="/img/statistics.png"><label>Estadisticas</label>
	</div>
	<div id="sm_configuracion" class="subMenu">
		<img src="/img/gear.png"><label>Preferencias</label>
	</div>
	<div class="subMenu">
		<img src="/img/door.png"><label><a href="logout">Cerrar Sesión</a></label>
	</div>
</div>

<div id="dialog-user">
    <table>
	    	<tr>
	    		<th collspan="2">Cambio de contraseña</th>
	    	</tr>
	    	<tr>
	    		<td>Contraseña Actual</td>
	    		<td><input type= "password" id="contraseñaactual" ></td>
	    	</tr>
	    	<tr>
	    		<td>Contraseña Nueva</td>
	    		<td id="item_dialog"> <input type="password" id="contraseñanueva"></td>
	    	</tr>
	    	<tr>
	    		<td>Repetir Contraseña</td>
	    		<td id="habitacion_dialog"><input type="password" id="contraseñarepetir"></td>
	    	</tr>
    </table>
    <span>   	
    	<input id="closeDialog1" type="button" value="Cancelar" style="float:right">
    	<input id="dialog-updateUser" data-action="toProcess" type="button" value="Actualizar" style="float:right">
    </span>
</div>