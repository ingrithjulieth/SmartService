<div id="content_servicios" class="content_fromMenu">
	<div class="titleContent">
		<img src="/img/notebook.png"></img><label>Servicios</label>
	</div>
	<div id="refresh">
		<img src="/img/refresh.png"></img>			
	</div>
	<div id="fecha_actual">
		<input id="calendario" type="text" value="Cambiar fecha"/>
	</div>
	<div id="content"> 
		<div id="lateral_bar" class="panel_lateral">
			<div id="i_recibidos" class="menu_item"><img src="/img/note.png">Recibidos</div>
			<div id="i_desarrollo" class="menu_item"><img src="/img/waiter.png">En Desarrollo</div>
			<div id="i_finalizados" class="menu_item"><img src="/img/thumbup.png">Finalizados</div>			
		</div>
		<div id="content_right">
			<!--<input type="text" placeholder="buscar...">-->	
			<div id="pestanha_recibidos" class="pestanha">
				<table>
					
				</table>	
			</div>	
			<div id="pestanha_ndesarrollo" class="pestanha">
				<table>
				</table>	
			</div>	
			<div id="pestanha_finalizados" class="pestanha">
				<table>
				</table>	
			</div>	
		</div>
	</div>	
</div>


<div id="dialog-modal">
    <table>
    	<tr>
    		<th collspan="2">Datos Generales</th>
    	</tr>
	    	<tr>
	    		<td>Nombre Huesped</td>
	    		<td>Pepo Perez</td>
	    	</tr>
	    	<tr>
	    		<td>Item</td>
	    		<td id="item_dialog">Carne de Res Al Ajillo</td>
	    	</tr>
	    	<tr>
	    		<td>Habitación</td>
	    		<td id="habitacion_dialog">101</td>
	    	</tr> 
	    	<tr>
	    		<td>Observaciones</td>
	    		<td id="obs_txt"> <textarea disabled="true" id="obs_dialog"></textarea></td>
	    	</tr>
    	<tr>
    		<th collspan="2">Recibidos</th>
    	</tr>
	    	<tr>
	    		<td>Fecha Recibido</td>
	    		<td id="fecharecibido_dialog"></td>
	    	</tr>
	    	<tr>
	    		<td>Hora</td>
	    		<td id="horarecibido_dialog"></td>
	    	</tr>
    	<tr>
    		<th collspan="2">En Desarrollo</th>
    	</tr>
	    	<tr>
	    		<td>Fecha Desarrollo</td>
	    		<td id="fechaproceso_dialog"></td>
	    	</tr>
	    	<tr>
	    		<td>Hora Desarrollo</td>
	    		<td id="horaproceso_dialog"></td>
	    	</tr>
    	<tr>
    		<th collspan="2">Finalizado</th>
    	</tr>
	    	<tr>
	    		<td>Fecha Finalizado</td>
	    		<td id="fechafinalizado_dialog"></td>
	    	</tr>
	    	<tr>
	    		<td>Hora Finalizado</td>
	    		<td id="horafinalizado_dialog"></td>
	    	</tr>
    </table>
    <span>   	
    	<input id="closeDialog" type="button" value="Cancelar" style="float:right">
    	<input id="dialog-action" data-action="toProcess" type="button" value="En Desarrollo" style="float:right">
    </span>
</div>