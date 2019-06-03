<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:ingreso");

	exit();

}

include "views/modules/botonera.php";
include "views/modules/cabezote.php";

?>

<!--=====================================
INICIO       
======================================-->

<div id="inicio" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
 
	<div class="jumbotron">
	    <h1>Bienvenid@, <?php echo $_SESSION["usuario"];?></h1> 
	    <p>Este es el panel de control.</p>
	</div>

		<hr>
	
	<ul>

		<div id="botonera">

		<li class="botonesInicio">
		
			<a href="articulos">
			<div id="articulos">
			<span class="fa fa-file-text-o"></span>
			<p>Artículos</p>
			</div>
			</a>

		</li>

		<li class="botonesInicio">
		
			<a href="galeria">
			<div id="imagenes">
			<span class="fa fa-image"></span>
			<p>Imágenes</p>
			</div>
			</a>

		</li>

		<?php 

	  	if($_SESSION["rol"] == 0){

			echo '<li class="botonesInicio">
			
				<a href="suscriptores">
				<div id="suscriptores">
				<span class="fa fa-users"></span>
				<p>Suscriptores</p>
				</div>
				</a>

			</li>
			<li class="botonesInicio">
		
			<a href="slide">
			<div id="slide">
			<span class="fa fa-toggle-right"></span>
			<p>Slide</p>
			</div>
			</a>

		</li>';

		}
		?>

	</ul>
</div>
</div>


<!--====  Fin de INICIO  ====-->