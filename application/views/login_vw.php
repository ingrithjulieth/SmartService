<!DOCTYPE html>
<html lang="es">
<head>
	<title>Login Cafe </title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?php echo base_url();?>css/<?php echo $estilo; ?>.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/barra_head.css" />
	<script src="js/jquerymin.js"> </script>
	<script src="js/config.js"> </script>
</head>
<body>
	<div>
		<form method="post" action="login/logea">
			<input type="text" name="user" placeholder="Usuario" required>
			<input type="password" name="pass" placeholder="Constraseña" required>
			<div style="text-align: center; color: white;">Ha olvidado su contraseña?
			<input type="submit" value="Login"></div>
		</form>
	</div>
	<div id="logo_producto">
		<img src="/img/logo_proj.png">
	</div>
	<div id="about_us">
		<p>Designed and Developed by LatteDevelopers 2012®</p>
	</div>
</body>
</html>