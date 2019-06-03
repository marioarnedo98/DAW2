<!--=====================================
FORMULARIO DE INGRESO         
======================================-->
<div id="backIngreso">

	<form method="post" id="formIngreso" onsubmit="return validarIngreso()">

		<!-- <h1 id="tituloFormIngreso">INGRESO AL PANEL DE CONTROL</h1> -->
		<img src="views/images/logotipo.png" class="img-responsive login-image" alt="Image">

		<input class="form-control formIngreso" type="text" placeholder="Ingrese su Usuario" name="usuarioIngreso" id="usuarioIngreso">
		<input class="form-control formIngreso" type="password" placeholder="Ingrese su Contraseña" name="passwordIngreso" id="passwordIngreso">

		<?php

			$ingreso = new Ingreso();
			$ingreso -> ingresoController();
			
		?>

		<input class="form-control formIngreso btn btn-primary" type="submit" value="Enviar">

	</form>
	<div class="footerlogin">
		<div class="visitarweb">
		<a href="/" target="_blank">Visita la web <span class="glyphicon glyphicon-new-window"></span></a>
		</div>
		<div class="copi">
		<p>© 2019 HTML-Mania</p>
		</div>
	</div>
</div>



<!--====  Fin de FORMULARIO DE INGRESO  ====-->