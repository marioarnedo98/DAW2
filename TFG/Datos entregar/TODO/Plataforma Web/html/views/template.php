<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HTML-Mania</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="views/images/icono.jpg">

	<link rel="stylesheet" href="views/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/css/font-awesome.min.css">
	<link rel="stylesheet" href="views/css/style.css">
	<link rel="stylesheet" href="views/css/fonts.min.css">
	<link rel="stylesheet" href="views/css/cssFancybox/jquery.fancybox.css">
	<link rel="stylesheet" href="views/css/sweetalert.css">
	<link rel="stylesheet" href="views/css/plantilla.css">

	<script src="views/js/jquery-2.2.0.min.js"></script>
	<script src="views/js/bootstrap.min.js"></script>
	<script src="views/js/jquery.fancybox.js"></script>
	<script src="views/js/animatescroll.js"></script>
	<script src="views/js/jquery.scrollUp.js"></script>
	<script src="views/js/sweetalert.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125787734-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125787734-3');
</script>

</head>

<body>

	<div class="container-fluid">
		
		<!--=====================================
		SLIDE
		======================================-->
		
		<?php include "modules/slide.php"; ?>

		<!--====  Fin de SLIDE  ====-->

		<!--=====================================
		CABEZOTE
		======================================-->
		
		<?php include "modules/cabezote.php"; ?>
		
		<!--====  Fin de CABEZOTE  ====-->


		<!--=====================================
		ARTÍCULOS
		======================================-->

		<?php include "modules/articulos.php";?>

		<!--====  Fin de ARTÍCULOS  ====-->
		
		<!--=====================================
		GALERIA
		======================================-->

		<?php include "modules/galeria.php"; ?>

		<!--====  Fin de GALERIA  ====-->

		<!--=====================================
			CONTÁCTENOS         
		======================================-->

		<?php include "modules/contactenos.php"; ?>
		
		<!--====  Fin de CONTÁCTENOS ====-->

		<!--=====================================
			ARTÍCULO MODAL         
		======================================-->

		<?php include "modules/articuloModal.php"; ?>	

    	<!--====  Fin de ARTICULO MODAL ====-->
		
	</div>




<script src="views/js/script.js"></script>

</body>
</html>


