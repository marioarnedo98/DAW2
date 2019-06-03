<?php

require_once "models/gestorSlide.php";
require_once "models/gestorArticulos.php";
require_once "models/gestorGaleria.php";
require_once "models/gestorMensajes.php";

require_once "controllers/template.php";
require_once "controllers/gestorSlide.php";
require_once "controllers/enlaces.php";
require_once "controllers/gestorArticulos.php";
require_once "controllers/gestorGaleria.php";
require_once "controllers/gestorMensajes.php";
if(isset($_GET["action"]) && $_GET["action"]== "noticias"){
    $template = new TemplateController();
    $template->template_noticias();

}
else{
$template = new TemplateController();
$template -> template();
}