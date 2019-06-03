<section class="int-news-area section-gap-top" id="contactenos">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="row">
						<div class="col-lg-12">
							<div class="section-title">
								<h2 class="heading">Contacta con nosotros</h2>
							</div>
						</div>
					</div>
			</div>
</div>
	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2943.5434402647365!2d-2.4550978840929853!3d42.458729379180376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd5aab4cbd715117%3A0x40e6d5dc3e32b596!2sJesuitas!5e0!3m2!1ses!2ses!4v1555669780241!5m2!1ses!2ses" width="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	<div class="row">
		<div class="col-lg-6 col-md-6 flex-column  address-wrap">
			<div class="row">  
				<div class="col-lg-4 text-center col-md6"> 
					<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="glyphicon glyphicon-map-marker"></span>
								</div>
								<div class="contact-details">
									<h5>Calle Duqués de Najera</h5>
									<p>
										19, Logroño, La Rioja
									</p>
								</div>
					</div>
				</div>
					<div class="col-lg-4 text-center col-md6"> 
						<div class="single-contact-address d-flex flex-row">
							<div class="icon">
								<span class="glyphicon glyphicon-envelope"></span>
							</div>
							<div class="contact-details">
								<h5><a href="mailto:admin@htmlmania.es">admin@htmlmania.es</a></h5>
							</div>
						</div>
					</div>
					<div class="col-lg-4 text-center col-md6"> 
						<div class="single-contact-address d-flex flex-row">
							<div class="icon">
								<span class="glyphicon glyphicon-phone"></span>
							</div>
							<div class="contact-details">
								<h5>941 22 17 00</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
			

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="formulario" >
		<div class="unete">	
		<h3>
				¿Quieres estar al tanto de todas las novedades?
			</h3>
			<p>Inscribete en nuestra Newsletter dejando un mensaje aqui :)</p>
			</div>
			

				<form method="post" onsubmit="return validarMensaje()" class="form-area">

						<input type="text" class="common-input mb-15 form-control" id="nombre" name="nombre"  placeholder="Nombre" required>

						<input type="email" class="common-input mb-15 form-control" id="email" name="email" placeholder="Email" required>

						<textarea name="mensaje" id="mensaje" cols="30" rows="10" placeholder="Contenido del Mensaje" class="common-input mb-15 form-control" required></textarea>

				
						<input type="submit" class="btn btn-default primary-btn fill" value="Enviar">
			</form>

			<?php

			$mensajes = new MensajesController();
			$mensajes -> registroMensajesController();

			?>
					
		</div>
	</div>
	</div>
	</section>
<div class="copyright-text footer-area section-gap-top">
			<div class="container">
				<div class="row footer-bottom d-flex justify-content-between">
					<p class="col-lg-8 col-sm-6 footer-text m-0 text-white">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Sitio web hecho con <i class="fa fa-heart-o" aria-hidden="true"></i> por Mario Arnedo</a></p>
					<div class="col-lg-4 col-sm-6 footer-social">
							<a href="https://www.facebook.com/mario.arnedo.3" target="_blank">
										<i class="fa fa-facebook"></i>  
									</a>
						<a href="https://twitter.com/marioarnedo1" target="_blank">  
										<i class="fa fa-twitter"></i>  
									</a>
						<a href="https://www.instagram.com/marioarnedo98/" target="_blank">
										<i class="fa fa-instagram"></i>  
									</a>
					</div>
				</div>
			</div>
		</div>	
