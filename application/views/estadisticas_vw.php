<div id="content_estadisticas" class="content_fromMenu">
	<div class="titleContent">
		<img src="/img/statistics.png"></img><label>Estadisticas</label>
	</div>
	<br><br><br>
	<div id="configuracion_estadisticas">
		<div style="float: left;">
		<label>Tipo de Filtro:</label>
		<select id="filterTipo">
			<option>Selecciona Una</option>
			<option>Categoria</option>
			<option>Item</option>
			<option>Habitación</option>						
		</select>
		<label>Filtrar por Fecha:</label>
		<select id="filterTime">
			<option value="100-0">Todo</option>		
			<option value="0-1">Ultimo Mes</option>
			<option value="0-3">Ultimos Tres Meses</option>
			<option value="0-6">Ultimos Seis Meses</option>
			<option value="1-0">Ultimo Año</option>		
		</select>
		</div>
		<div id="DivfiltrarItem">
			<label>Top Items:</label>				
			<select id="filteritem">
				<option value="0">Todos</option>	
				<option value="10">Los 10 Primeros</option>
				<option value="20">Los 20 Primeros</option>
				<option value="50">Los 50 Primeros</option>
				<option value="100">Los 100 Primeros</option>						
			</select>
		</div>
		<button id="generaStadisticas">Generar</button>
	</div>
	<div id="chart_div"></div>	
</div>