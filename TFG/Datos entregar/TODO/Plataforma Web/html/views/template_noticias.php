<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HTML-Mania</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="views/images/icono.jpg">

	<link rel="stylesheet" href="views/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/css/font-awesome.min.css">
	<link rel="stylesheet" href="views/css/style.min.css">
	<link rel="stylesheet" href="views/css/bootstrap-noticias.css">
	<link rel="stylesheet" href="views/css/style.css">
	<link rel="stylesheet" href="views/css/noticias.css">
	<link rel="stylesheet" href="views/css/plantilla.css">
	<link rel="stylesheet" href="views/css/fonts.min.css">
	<link rel="stylesheet" href="views/css/cssFancybox/jquery.fancybox.css">
    <link rel="stylesheet" href="views/css/sweetalert.css">
    <!-- <link rel="stylesheet" href="views/css/alertas.css"> -->

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
	<div class="container-fluid cabezote">
<!--=====================================
		CABEZOTE
		======================================-->
		
		<?php include "modules/cabezoteNoticias.php"; ?>
		
		<!--====  Fin de CABEZOTE  ====-->
	</div>
	<div class="container">
		<!--=====================================
									ARTÍCULOS
		======================================-->
		<?php include "modules/noticias.php";?>
		<!--====  Fin de ARTÍCULOS  ====-->
	</div>




<script src="views/js/script.js"></script>

</body>
</html>


