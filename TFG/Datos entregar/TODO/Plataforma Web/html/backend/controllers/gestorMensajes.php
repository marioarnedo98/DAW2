<?php
require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";

class MensajesController{

	#MOSTRAR MENSAJES EN LA VISTA
	#------------------------------------------------------------
	public function mostrarMensajesController(){

		$respuesta = MensajesModel::mostrarMensajesModel("mensajes");

		foreach ($respuesta as $row => $item){

			echo '<div class="well well-sm" id="'.$item["id"].'">
		
					<a href="index.php?action=mensajes&idBorrar='.$item["id"].'"><span class="fa fa-times pull-right"></span></a>
					<p>'.$item["fecha"].'</p>
					<h3>De: '.$item["nombre"].'</h3>
					<h5>Email: '.$item["email"].'</h5>
				  	<input type="text" class="form-control" value="'.$item["mensaje"].'" readonly>
				  	<br>
				  	<button class="btn btn-info btn-sm leerMensaje">Leer</button>

				  </div>';

		}

	}

	#BORRAR MENSAJES
	#------------------------------------------------------------

	public function borrarMensajesController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];

			$respuesta = MensajesModel::borrarMensajesModel($datosController, "mensajes");

			if($respuesta == "ok"){

					echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El mesaje se ha borrado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "mensajes";
							  } 
					});


				</script>';

			}

		}

	}

	#RESPONDER MENSAJES
	#------------------------------------------------------------
	public function responderMensajesController(){

		if(isset($_POST['enviarEmail'])){

			$email = $_POST['enviarEmail'];
			$nombre = $_POST['enviarNombre'];
			$titulo = $_POST['enviarTitulo'];
			$mensaje =$_POST['enviarMensaje'];
			//preparamos correo
			$mail = new PHPMailer\PHPMailer\PHPMailer();
			$mail->IsSMTP(); // activamos SMTP

			$mail->SMTPDebug = 1; // debugging: 1 = error y mensajes, 2 = mensajes solo
			$mail->SMTPAuth = true; // activamos la autentificacion
			$mail->SMTPSecure = 'ssl'; // SSL para mensajes seguros
			$mail->Host = "smtp.ionos.co.uk"; //servidor de correos
			$mail->Port = 465; // o 587
			$mail->IsHTML(true);
// Activo condificacción utf-8
$mail->CharSet = 'UTF-8';

			//Login correo
			$mail->Username = "admin@htmlmania.es";
			$mail->Password = "Colegio01";
			$mail->setFrom('admin@htmlmania.es', 'Admin HTML-Mania');
			$mail->addReplyTo('admin@htmlmania.es', 'Admin HTML-Mania');
			//elaboramos mensaje
			$mail->Subject = 'Respuesta a su mensaje: '.$titulo;

			$mail->Body = '<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>'.$titulo_articulo.'</title>
    <meta name="description" content="'.$titulo_articulo.'">
    <style type="text/css">
        @import url(http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800);

        .ExternalClass,
        .ExternalClass div,
        .ExternalClass font,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass td,
        img {
            line-height: 100%
        }

        .appleLinks a,
        img {
            text-decoration: none
        }

        #outlook a {
            padding: 0
        }

        .ExternalClass,
        .ReadMsgBody {
            width: 100%
        }

        a,
        blockquote,
        body,
        li,
        p,
        table,
        td {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%
        }

        table,
        td {
            mso-table-lspace: 0;
            mso-table-rspace: 0
        }

        img {
            -ms-interpolation-mode: bicubic;
            border: 0;
            height: auto;
            outline: 0
        }

        table {
            border-collapse: collapse !important
        }

        .social-cell a img {
            transition: all .3s ease-in-out;
        }

        .social-cell a:hover img {
            filter: opacity(75%);
            transform: scale(1.2);
        }

        #bodyCell,
        #bodyTable,
        body {
            height: 100% !important;
            margin: 0;
            padding: 0;
            width: 100% !important
        }

        .copy-table {
            width: 75% !important
        }

        .story-4 {
            width: 85% !important
        }

        .appleLinks a {
            color: #c2c2c2 !important
        }

        span.preheader {
            display: none !important
        }

        .learn-more-btn {
            transition: all .3s ease-in-out;
        }

        .learn-more-btn:hover {
            background: #0793c7 !important;
        }

        .h-60 {
            height: 60px;
        }

        .h-30 {
            height: 30px;
        }

        .h-50 {
            height: 50px;
        }
    </style>
    <style id="hs-inline-css" type="text/css">
        .master-table {
            width: 100%;
            max-width: 600px;
        }

        .responsive-table {
            width: 96.67%;
            max-width: 580px;
        }
    </style>
    <style type="text/css">
        @media only screen and (max-width:599px) {
            .h-60 {
                height: 30px;
            }

            .h-30 {
                display: none;
            }

            .h-50 {
                height: 30px;
            }

            .responsive-table {
                width: 95% !important
            }

            .master-table {
                width: 100% !important
            }

            .responsive-header-cell,
            .responsive-header-cell-big {
                display: block;
                text-align: left;
                width: 240px;
                margin-left: 15px
            }

            .responsive-header-cell-big {
                font-size: 22px !important
            }

            .copy-table,
            .story-4 {
                width: 85% !important
            }

            .story-4.content-width {
                width: 95% !important
            }

            .full-card-image,
            .hero-image {
                width: 100% !important
            }

            h2 {
                font-size: 36px !important;
            }

            h3 {
                font-size: 24px !important;
            }

            .res-none {
                display: none;
            }
        }

        @media only screen and (max-width:480px) {
            .social-cell {

                padding: 0px 8px !important;
            }

            body {
                width: 100% !important
            }

            a,
            blockquote,
            body,
            li,
            p,
            table,
            td {
                -webkit-text-size-adjust: none !important
            }

            body {
                min-width: 100% !important
            }

            .social-spacer {
                height: 10px !important
            }

            .responsive-td {
                width: 100%;
                display: table;
                text-align: center !important;
                margin-bottom: 25px;
            }

            .responsive-table.center-content {
                padding: 20px !important;
            }
        }
    </style>
    <meta name="x-apple-disable-message-reformatting">
</head>

<body style="background-color:#252525;" cz-shortcut-listen="true">
    <center>
        <table align="center" bgcolor="#252525" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
            <tbody>
                <tr height="8" style="font-size: 0; line-height: 0;">
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="center" valign="top">
                        <table class="master-table" style="width:100%; max-width:900px" width="100%">
                            <tbody>
                                <tr>
                                    <td class="h-60">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellpadding="0" cellspacing="0" class="responsive-table"
                                            style="width:96.67%; max-width:580px" valign="top" width="96.67%">
                                            <tbody>
                                                <tr>
                                                    <td class="h-30">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr class="res-none" height="20">
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top">
                                        <table bgcolor="" border="0" cellpadding="0" cellspacing="0"
                                            class="responsive-table center-content"
                                            style="max-width:600px; overflow:hidden !important; border-radius:6px;border-collapse:initial !important;padding: 35px;"
                                            valign="top">
                                            <tbody>
                                                <tr>
                                                    <td align="center"><img
                                                            alt="Bringing Back SP Page Builder Backend Module Editor"
                                                            class="top-image"
                                                            src="http://htmlmania.es/backend/views/images/iconotransparente.png"
                                                            style="border:0;max-width:100% !important;" width="100">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="h-50">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center">
                                                                        <h2
                                                                            style="margin: 0 !important; font-family:&#39;Open Sans&#39;, Helvetica, Arial, sans-serif !important;font-size:50px; line-height:38px; font-weight:600 !important;color:#fff !important;">
                                                                          Hola! '.$nombre.' <br> HTML-Mania</h2>
                                                                    </td>
                                                                </tr>
                                                                <tr height="20">
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center">
                                                                        <h3
                                                                            style="margin: 0 !important; font-family:&#39;Open Sans&#39;, Helvetica, Arial, sans-serif !important;font-size:28px !important;line-height:38px !important;font-weight:300 !important;color:#fff !important;">
                                                                            ¡Te ha respondido! </h3>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr height="40">
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td><img alt="Foto Intro Articulo" class="hero-image"
                                                            src="http://htmlmania.es/views/images/respuesta.gif"
                                                            style="border:0;max-width:100% !important;" width="580">
                                                    </td>
                                                </tr>
                                                <tr height="20">
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <table border="0" cellpadding="0" cellspacing="0"
                                                            class="story-4 content-width">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center">
                                                                        <p
                                                                            style="margin: 0 !important; font-family:&#39;Open Sans&#39;, Helvetica, Arial, sans-serif !important;font-size:18px !important;line-height:30px !important;font-weight:300 !important;color:#fff !important;">
                                                                            '.$mensaje.'</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr height="36">
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                </tr>
                                                <tr class="last-tr-height" height="55">
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellpadding="0" cellspacing="0" class="responsive-table"
                                            style="width:96.67%; max-width:580px" width="96.67%">
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: center;">
                                                        <div class="social-cell"
                                                            style="width: auto; padding: 0 12px; display: inline-block;;">
                                                            <table border="0" cellpadding="0" cellspacing="0"
                                                                height="30" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td align="center" valign="middle"><a
                                                                                data-hs-link-id="0"
                                                                                href="https://twitter.com/marioarnedo1"
                                                                                rel="noreferrer"
                                                                                style="line-height:50px; display:block; text-decoration: none !important; width: 100%;-webkit-text-size-adjust:none;mso-hide:all;"
                                                                                target="_blank"><img
                                                                                    alt="Follow on Twitter" height="13"
                                                                                    sizes="(max-width: 15px) 100vw, 15px"
                                                                                    src="http://htmlmania.es/views/images/iconos/twitter.png"
                                                                                    style="border: 0;display:inline-block; vertical-align: middle;"
                                                                                    width="15"></a></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="social-cell"
                                                            style="width: auto; padding: 0 12px; display: inline-block;;">
                                                            <table border="0" cellpadding="0" cellspacing="0"
                                                                height="30" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td align="center" valign="middle"><a
                                                                                data-hs-link-id="0"
                                                                                href="https://www.facebook.com/mario.arnedo.3"
                                                                                rel="noreferrer"
                                                                                style="line-height:50px; display:block; text-decoration: none !important; width: 100%;-webkit-text-size-adjust:none;mso-hide:all;"
                                                                                target="_blank"><img
                                                                                    alt="Follow on facebook" height="13"
                                                                                    sizes="(max-width: 15px) 100vw, 15px"
                                                                                    src="http://htmlmania.es/views/images/iconos/facebook.png"
                                                                                    style="border: 0;display:inline-block; vertical-align: middle;"
                                                                                    width="15"></a></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="social-cell"
                                                            style="width: auto; padding: 0 12px; display: inline-block;;">
                                                            <table border="0" cellpadding="0" cellspacing="0"
                                                                height="30" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td align="center" valign="middle"><a
                                                                                data-hs-link-id="0"
                                                                                href="https://es.linkedin.com/in/mario-arnedo-gonzalez-872418140"
                                                                                rel="noreferrer"
                                                                                style="line-height:50px; display:block; text-decoration: none !important; width: 100%;-webkit-text-size-adjust:none;mso-hide:all;"
                                                                                target="_blank"><img
                                                                                    alt="Follow on youtube" height="13"
                                                                                    sizes="(max-width: 15px) 100vw, 15px"
                                                                                    src="http://htmlmania.es/views/images/iconos/linkedin.png"
                                                                                    style="border: 0;display:inline-block; vertical-align: middle;"
                                                                                    width="15"></a></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="social-cell"
                                                            style="width: auto; padding: 0 12px; display: inline-block;;">
                                                            <table border="0" cellpadding="0" cellspacing="0"
                                                                height="30" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td align="center" valign="middle">
                                                                            <!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://www.instagram.com/marioarnedo98/" rel="noreferrer" style="height:50px;v-text-anchor:middle;width:179px;text-transform:uppercase;" arcsize="5%" stroke="f" fillcolor="#46A9E3"><w:anchorlock/><center style="color:#ffffff;font-family:Helvetica, Arial,sans-serif;font-size:12px;text-transform:uppercase;">Follow on pinterest</center></v:roundrect><![endif]--><a
                                                                                data-hs-link-id="0"
                                                                                href="https://www.instagram.com/marioarnedo98/"
                                                                                rel="noreferrer"
                                                                                style="line-height:50px; display:block; text-decoration: none !important; width: 100%;-webkit-text-size-adjust:none;mso-hide:all;"
                                                                                target="_blank"><img
                                                                                    alt="Follow on Instagram"
                                                                                    height="13"
                                                                                    sizes="(max-width: 15px) 100vw, 15px"
                                                                                    src="http://htmlmania.es/views/images/iconos/instagram.png"
                                                                                    style="border: 0;display:inline-block; vertical-align: middle;"
                                                                                    width="15"></a></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellpadding="0" cellspacing="0" class="responsive-table"
                                            style="width:96.67%; max-width:580px" valign="top" width="96.67%">
                                            <tbody>
                                                <tr height="55">
                                                    <td>&nbsp;</td>
                                                </tr>

                                                <tr>
                                                    <td align="center"><a
                                                            style="color: rgb(162,162,162,.8);font-family:&#39;Open Sans&#39;, sans-serif !important; font-weight: 400;letter-spacing: .3px;font-size: 12px;">©
                                                            2019 HTML-Mania. Todos los derechos reservados.</a></td>
                                                </tr>
                                                <tr height="20"
                                                    style="padding: 0; margin: 0; font-size: 0; line-height: 0;">
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr height="38">
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="display:none; white-space:nowrap; font:15px courier; line-height:0;">&nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp;</div>
                    </td>
                </tr>
                <!--[if mso]></table></td><td style="padding:0px;margin:0px;"> </td></tr></table></tr></td><![endif]-->
            </tbody>
        </table>
    </center>


</body>

</html>';

			$mail->addAddress($email, $nombre);

			//Attach an image file
			//send the message, check for errors
			if (!$mail->send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
				echo '<script>

						swal({
							  title: "¡OK!",
							  text: "¡El mensaje ha sido enviado correctamente!",
							  type: "success",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
						},

						function(isConfirm){
								 if (isConfirm) {
								    window.location = "mensajes";
								  }
						});


				</script>';
			}
		}

	}

	#ENVIAR MENSAJES MASIVOS
	#------------------------------------------------------------
	public function mensajesMasivosController(){

		if(isset($_POST["tituloMasivo"])){

			$respuesta = MensajesModel::seleccionarEmailSuscriptores("suscriptores");

			//preparamos correo
			$mail = new PHPMailer\PHPMailer\PHPMailer();
			$mail->IsSMTP(); // activamos SMTP

			$mail->SMTPDebug = 1; // debugging: 1 = error y mensajes, 2 = mensajes solo
			$mail->SMTPAuth = true; // activamos la autentificacion
			$mail->SMTPSecure = 'ssl'; // SSL para mensajes seguros
			$mail->Host = "smtp.ionos.co.uk"; //servidor de correos
			$mail->Port = 465; // o 587
			$mail->IsHTML(true);
			$mail->CharSet = 'UTF-8';

			//Login correo
			$mail->Username = "admin@htmlmania.es";
			$mail->Password = "Colegio01";
			$mail->setFrom('admin@htmlmania.es', 'Admin HTML-Mania');
			$mail->addReplyTo('admin@htmlmania.es', 'Admin HTML-Mania');
			//elaboramos mensaje
			$titulo = $_POST['tituloMasivo'];
			$mensaje = $_POST['mensajeMasivo'];


			foreach ($respuesta as $row => $item) {
				$nombre= $item["nombre"];
				$email = $item["email"];

				$mail->Subject = 'Mensaje Global: ' . $titulo;
				$mail->Body ='<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>'.$titulo_articulo.'</title>
    <meta name="description" content="'.$titulo_articulo.'">
    <style type="text/css">
        @import url(http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800);

        .ExternalClass,
        .ExternalClass div,
        .ExternalClass font,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass td,
        img {
            line-height: 100%
        }

        .appleLinks a,
        img {
            text-decoration: none
        }

        #outlook a {
            padding: 0
        }

        .ExternalClass,
        .ReadMsgBody {
            width: 100%
        }

        a,
        blockquote,
        body,
        li,
        p,
        table,
        td {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%
        }

        table,
        td {
            mso-table-lspace: 0;
            mso-table-rspace: 0
        }

        img {
            -ms-interpolation-mode: bicubic;
            border: 0;
            height: auto;
            outline: 0
        }

        table {
            border-collapse: collapse !important
        }

        .social-cell a img {
            transition: all .3s ease-in-out;
        }

        .social-cell a:hover img {
            filter: opacity(75%);
            transform: scale(1.2);
        }

        #bodyCell,
        #bodyTable,
        body {
            height: 100% !important;
            margin: 0;
            padding: 0;
            width: 100% !important
        }

        .copy-table {
            width: 75% !important
        }

        .story-4 {
            width: 85% !important
        }

        .appleLinks a {
            color: #c2c2c2 !important
        }

        span.preheader {
            display: none !important
        }

        .learn-more-btn {
            transition: all .3s ease-in-out;
        }

        .learn-more-btn:hover {
            background: #0793c7 !important;
        }

        .h-60 {
            height: 60px;
        }

        .h-30 {
            height: 30px;
        }

        .h-50 {
            height: 50px;
        }
    </style>
    <style id="hs-inline-css" type="text/css">
        .master-table {
            width: 100%;
            max-width: 600px;
        }

        .responsive-table {
            width: 96.67%;
            max-width: 580px;
        }
    </style>
    <style type="text/css">
        @media only screen and (max-width:599px) {
            .h-60 {
                height: 30px;
            }

            .h-30 {
                display: none;
            }

            .h-50 {
                height: 30px;
            }

            .responsive-table {
                width: 95% !important
            }

            .master-table {
                width: 100% !important
            }

            .responsive-header-cell,
            .responsive-header-cell-big {
                display: block;
                text-align: left;
                width: 240px;
                margin-left: 15px
            }

            .responsive-header-cell-big {
                font-size: 22px !important
            }

            .copy-table,
            .story-4 {
                width: 85% !important
            }

            .story-4.content-width {
                width: 95% !important
            }

            .full-card-image,
            .hero-image {
                width: 100% !important
            }

            h2 {
                font-size: 36px !important;
            }

            h3 {
                font-size: 24px !important;
            }

            .res-none {
                display: none;
            }
        }

        @media only screen and (max-width:480px) {
            .social-cell {

                padding: 0px 8px !important;
            }

            body {
                width: 100% !important
            }

            a,
            blockquote,
            body,
            li,
            p,
            table,
            td {
                -webkit-text-size-adjust: none !important
            }

            body {
                min-width: 100% !important
            }

            .social-spacer {
                height: 10px !important
            }

            .responsive-td {
                width: 100%;
                display: table;
                text-align: center !important;
                margin-bottom: 25px;
            }

            .responsive-table.center-content {
                padding: 20px !important;
            }
        }
    </style>
    <meta name="x-apple-disable-message-reformatting">
</head>

<body style="background-color:#252525;" cz-shortcut-listen="true">
    <center>
        <table align="center" bgcolor="#252525" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
            <tbody>
                <tr height="8" style="font-size: 0; line-height: 0;">
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="center" valign="top">
                        <table class="master-table" style="width:100%; max-width:900px" width="100%">
                            <tbody>
                                <tr>
                                    <td class="h-60">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellpadding="0" cellspacing="0" class="responsive-table"
                                            style="width:96.67%; max-width:580px" valign="top" width="96.67%">
                                            <tbody>
                                                <tr>
                                                    <td class="h-30">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr class="res-none" height="20">
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top">
                                        <table bgcolor="" border="0" cellpadding="0" cellspacing="0"
                                            class="responsive-table center-content"
                                            style="max-width:600px; overflow:hidden !important; border-radius:6px;border-collapse:initial !important;padding: 35px;"
                                            valign="top">
                                            <tbody>
                                                <tr>
                                                    <td align="center"><img
                                                            alt="Bringing Back SP Page Builder Backend Module Editor"
                                                            class="top-image"
                                                            src="http://htmlmania.es/backend/views/images/iconotransparente.png"
                                                            style="border:0;max-width:100% !important;" width="100">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="h-50">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center">
                                                                        <h2
                                                                            style="margin: 0 !important; font-family:&#39;Open Sans&#39;, Helvetica, Arial, sans-serif !important;font-size:50px; line-height:38px; font-weight:600 !important;color:#fff !important;">
                                                                          Hola! '.$nombre.'  <br>HTML-Mania</h2>
                                                                    </td>
                                                                </tr>
                                                                <tr height="20">
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center">
                                                                        <h3
                                                                            style="margin: 0 !important; font-family:&#39;Open Sans&#39;, Helvetica, Arial, sans-serif !important;font-size:28px !important;line-height:38px !important;font-weight:300 !important;color:#fff !important;">
                                                                            ¡Ha mandado un mensaje global! </h3>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr height="40">
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td><img alt="Foto Intro Articulo" class="hero-image"
                                                            src="http://htmlmania.es/views/images/respuesta.gif"
                                                            style="border:0;max-width:100% !important;" width="580">
                                                    </td>
                                                </tr>
                                                <tr height="20">
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <table border="0" cellpadding="0" cellspacing="0"
                                                            class="story-4 content-width">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center">
                                                                        <p
                                                                            style="margin: 0 !important; font-family:&#39;Open Sans&#39;, Helvetica, Arial, sans-serif !important;font-size:18px !important;line-height:30px !important;font-weight:300 !important;color:#fff !important;">
                                                                            '.$mensaje.'</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr height="36">
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                </tr>
                                                <tr class="last-tr-height" height="55">
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellpadding="0" cellspacing="0" class="responsive-table"
                                            style="width:96.67%; max-width:580px" width="96.67%">
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: center;">
                                                        <div class="social-cell"
                                                            style="width: auto; padding: 0 12px; display: inline-block;;">
                                                            <table border="0" cellpadding="0" cellspacing="0"
                                                                height="30" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td align="center" valign="middle"><a
                                                                                data-hs-link-id="0"
                                                                                href="https://twitter.com/marioarnedo1"
                                                                                rel="noreferrer"
                                                                                style="line-height:50px; display:block; text-decoration: none !important; width: 100%;-webkit-text-size-adjust:none;mso-hide:all;"
                                                                                target="_blank"><img
                                                                                    alt="Follow on Twitter" height="13"
                                                                                    sizes="(max-width: 15px) 100vw, 15px"
                                                                                    src="http://htmlmania.es/views/images/iconos/twitter.png"
                                                                                    style="border: 0;display:inline-block; vertical-align: middle;"
                                                                                    width="15"></a></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="social-cell"
                                                            style="width: auto; padding: 0 12px; display: inline-block;;">
                                                            <table border="0" cellpadding="0" cellspacing="0"
                                                                height="30" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td align="center" valign="middle"><a
                                                                                data-hs-link-id="0"
                                                                                href="https://www.facebook.com/mario.arnedo.3"
                                                                                rel="noreferrer"
                                                                                style="line-height:50px; display:block; text-decoration: none !important; width: 100%;-webkit-text-size-adjust:none;mso-hide:all;"
                                                                                target="_blank"><img
                                                                                    alt="Follow on facebook" height="13"
                                                                                    sizes="(max-width: 15px) 100vw, 15px"
                                                                                    src="http://htmlmania.es/views/images/iconos/facebook.png"
                                                                                    style="border: 0;display:inline-block; vertical-align: middle;"
                                                                                    width="15"></a></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="social-cell"
                                                            style="width: auto; padding: 0 12px; display: inline-block;;">
                                                            <table border="0" cellpadding="0" cellspacing="0"
                                                                height="30" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td align="center" valign="middle"><a
                                                                                data-hs-link-id="0"
                                                                                href="https://es.linkedin.com/in/mario-arnedo-gonzalez-872418140"
                                                                                rel="noreferrer"
                                                                                style="line-height:50px; display:block; text-decoration: none !important; width: 100%;-webkit-text-size-adjust:none;mso-hide:all;"
                                                                                target="_blank"><img
                                                                                    alt="Follow on youtube" height="13"
                                                                                    sizes="(max-width: 15px) 100vw, 15px"
                                                                                    src="http://htmlmania.es/views/images/iconos/linkedin.png"
                                                                                    style="border: 0;display:inline-block; vertical-align: middle;"
                                                                                    width="15"></a></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="social-cell"
                                                            style="width: auto; padding: 0 12px; display: inline-block;;">
                                                            <table border="0" cellpadding="0" cellspacing="0"
                                                                height="30" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td align="center" valign="middle">
                                                                            <!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://www.instagram.com/marioarnedo98/" rel="noreferrer" style="height:50px;v-text-anchor:middle;width:179px;text-transform:uppercase;" arcsize="5%" stroke="f" fillcolor="#46A9E3"><w:anchorlock/><center style="color:#ffffff;font-family:Helvetica, Arial,sans-serif;font-size:12px;text-transform:uppercase;">Follow on pinterest</center></v:roundrect><![endif]--><a
                                                                                data-hs-link-id="0"
                                                                                href="https://www.instagram.com/marioarnedo98/"
                                                                                rel="noreferrer"
                                                                                style="line-height:50px; display:block; text-decoration: none !important; width: 100%;-webkit-text-size-adjust:none;mso-hide:all;"
                                                                                target="_blank"><img
                                                                                    alt="Follow on Instagram"
                                                                                    height="13"
                                                                                    sizes="(max-width: 15px) 100vw, 15px"
                                                                                    src="http://htmlmania.es/views/images/iconos/instagram.png"
                                                                                    style="border: 0;display:inline-block; vertical-align: middle;"
                                                                                    width="15"></a></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellpadding="0" cellspacing="0" class="responsive-table"
                                            style="width:96.67%; max-width:580px" valign="top" width="96.67%">
                                            <tbody>
                                                <tr height="55">
                                                    <td>&nbsp;</td>
                                                </tr>

                                                <tr>
                                                    <td align="center"><a
                                                            style="color: rgb(162,162,162,.8);font-family:&#39;Open Sans&#39;, sans-serif !important; font-weight: 400;letter-spacing: .3px;font-size: 12px;">©
                                                            2019 HTML-Mania. Todos los derechos reservados.</a></td>
                                                </tr>
                                                <tr height="20"
                                                    style="padding: 0; margin: 0; font-size: 0; line-height: 0;">
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr height="38">
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="display:none; white-space:nowrap; font:15px courier; line-height:0;">&nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp;</div>
                    </td>
                </tr>
                <!--[if mso]></table></td><td style="padding:0px;margin:0px;"> </td></tr></table></tr></td><![endif]-->
            </tbody>
        </table>
    </center>


</body>

</html>';

			   $mail->addBCC($email, $nombre);
			}
				
			//Attach an image file
			//send the message, check for errors
			if (!$mail->send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
				echo '<script>

						swal({
							  title: "¡OK!",
							  text: "¡El mensaje ha sido enviado correctamente!",
							  type: "success",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
						},

						function(isConfirm){
								 if (isConfirm) {
								    window.location = "mensajes";
								  }
						});


				</script>';
			}
		}

	}

	#MENSAJES SIN REVISAR
	#------------------------------------------------------------
	public function mensajesSinRevisarController(){

		$respuesta = MensajesModel::mensajesSinRevisarModel("mensajes");

		$sumaRevision = 0;

		foreach ($respuesta as $row => $item) {

			if($item["revision"] == 0){

				++$sumaRevision;

				echo '<span>'.$sumaRevision.'</span>';
			
			}

		}

	}

	#MENSAJES REVISADOS
	#------------------------------------------------------------
	public function mensajesRevisadosController($datos){

		$datosController = $datos;

		$respuesta = MensajesModel::mensajesRevisadosModel($datosController, "mensajes");

		echo $respuesta;

	}


}