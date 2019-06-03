<?php

class Slide{

	public function seleccionarSlideController(){

		$respuesta = SlideModels::seleccionarSlideModel("slide");
		// echo count($respuesta);      
		$i=1;
		 echo ' <section class="banner-area">
    <div class="container-fluid">
         <div class="row">';

		foreach ($respuesta as $row => $item){
			// var_dump($item);
			if($i == 1 || $i==5){
				echo'<div class="col-lg-3 col-md-12 small">';
			}elseif ($i==4) {
				echo '<div class="col-lg-6 col-md-8 owl-carousel active-banner">';
			}
					if ($i <= 3 ) {
						echo'
						<div class="row"> 
							<div class="col-lg-12 col-md-4 col-sm-6">
								<div class="single-post mb-03">
									<div class="thumb">
										<div class="relative">
											<img class="f-img img-fluid mx-auto" src="backend/'.substr($item["ruta"], 6).'" alt="">
											<div class="overlay overlay-bg"></div>
										</div>
									</div>
									<div class="details">
										<a>
											<h4>'.$item["titulo"].'</h4>
										</a>
										<hr>
										<h5>'.$item["descripcion"].'</h5>
									</div>
								</div>
							</div>
						</div>';
					}
					

					
						if($i==4){
							echo '
					<div class="single-post">
						<div class="thumb">
							<div class="relative">
								<img class="f-img img-fluid mx-auto" src="backend/'.substr($item["ruta"], 6).'" alt="">
								<div class="overlay overlay-bg"></div>
							</div>
						</div>
						<div class="details">
							<a>
								<h4>'.$item["titulo"].'</h4>
							</a>
							<hr>
							<h5>
							'.$item["descripcion"].'
							</h5>
						</div>
					</div>';
						}
				if ($i >4) {
					
					echo'
						<div class="row">
							<div class="col-lg-12 col-md-4 col-sm-6">
								<div class="single-post mb-03">
									<div class="thumb">
										<div class="relative">
											<img class="f-img img-fluid mx-auto" src="backend/'.substr($item["ruta"], 6).'" alt="">
											<div class="overlay overlay-bg"></div>
										</div>
									</div>
									<div class="details">
										<a href="#">
											<h4>'.$item["titulo"].'</h4>
										</a>
										<hr>
										<h5>'.$item["descripcion"].'</h5>
									</div>
								</div>
							</div>
						</div>';
				}
				if ($i == 3 || $i == 4 || $i == 7) {
   					 echo '</div>';
}

			
				$i++;
		}
		echo '</div>
	 	</div>
	 </section>';

	}
}