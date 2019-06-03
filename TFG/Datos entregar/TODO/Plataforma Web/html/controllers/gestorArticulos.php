<?php

class Articulos{

	public function seleccionarArticulosController(){

		$respuesta = ArticulosModels::seleccionarArticulosModelInicio("articulos");

		foreach ($respuesta as $row => $item){
			if($row ==0){
				echo'<div class="row"> <div class="col-lg-7 col-md-7">
							<div class="single-post single-int mb-40">
								<div class="thumb">
									<div class="relative">
									<a href="#articulo'.$item["id"].'" data-toggle="modal" class="masinfo">	
									<img class="f-img w-100 img-fluid mx-auto" src="backend/'.$item["ruta"].'" alt="">
									</a>
									</div>
								</div>
								<div class="">
									<a href="#articulo'.$item["id"].'" data-toggle="modal" class="masinfo">
										<h4>'.$item["titulo"].'</h4>
									</a>
									<p>
										'.$item["introduccion"].'
									</p>
							</div>
							</div>';
			}
			elseif ($row ==1 || $row==2) {
				if($row==1){
					echo'<div class="col-lg-5 col-md-12"> 
					<div class="row">';
				}	
								echo'<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="single-post single-int mb-40">
										<div class="thumb">
											<div class="relative">
											<a href="#articulo'.$item["id"].'" data-toggle="modal" class="masinfo">	
											<img class="f-img w-100 img-fluid mx-auto" src="backend/'.$item["ruta"].'" alt="">
											</a>
											</div>
										</div>
										<div class="">
											<a href="#articulo'.$item["id"].'" data-toggle="modal" class="masinfo">
												<h4 class="mt-15">'.$item["titulo"].'</h4>
											</a>
										</div>
									</div>
								</div>';
			}
				elseif($row>=3){
				if($row==3){
					echo '<div class="row">';
				}
				echo '<div class="col-lg-3 col-md-5 col-sm-6">
					<div class="single-post single-int mb-40">
						<div class="thumb">
							<div class="relative">
							<a href="#articulo'.$item["id"].'" data-toggle="modal" class="masinfo">	
							<img class="f-img img-fluid mx-auto" src="backend/'.$item["ruta"] . '" alt="">
							</a>
							</div>
						</div>
						<div class="">
							<a href="#articulo' . $item["id"] . '" data-toggle="modal" class="masinfo">
								<h4>' . $item["titulo"] . '</h4>
							</a>
						</div>
					</div>
				</div>';

			}
			if($row==2|| $row==9){
				echo '</div>'; //div row
				echo '</div>';
				echo '</div>';
			}
			if($row==0){
				echo '</div>'; //div row

			}
			
			echo'<div id="articulo'.$item["id"].'" class="modal fade">
      
					<div class="modal-dialog modal-content">

						<div class="modal-header" style="border:1px solid #eee">
			            
			   				<button type="button" class="close" data-dismiss="modal">&times;</button>
			  		 		<h3 class="modal-title">'.$item["titulo"].'</h3>
			            
						</div>

						<div class="modal-body" style="border:1px solid #eee">
			            
			    			<img src="backend/'.$item["ruta"].'" width="100%" style="margin-bottom:20px">
			    			<p class="parrafoContenido text-justify">'.$item["contenido"].'</p>
			            
						</div>

							<div class="modal-footer" style="border:1px solid #eee">
			            
			    				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			            
							</div>

					</div>
					</div>';
		}
		echo '</div>';

		echo '<div class="text-center">
			<a href="noticias"><button class="btn btn-default primary-btn fill">Ver Todas las noticias</button></a>
		
		</div>';


	}


	public function seleccionarArticulosControllerNoticias(){

		$respuesta = ArticulosModels::seleccionarArticulosModelNoticias("articulos");
echo '<div class="category-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
				<section class="">
						<div class="row">';
						$i=0;
		foreach ($respuesta as $row => $item){
			if($i==3){
				echo '<div class="col-lg-4 col-md-5 col-sm-6 noticias-articulo">
								<div class="single-post single-int mb-40">
									<div class="thumb">
										<div class="relative">
										<a href="#articulo' . $item["id"] . '" data-toggle="modal">
											<img class="f-img img-fluid mx-auto" src="backend/' . $item["ruta"] . '" alt="">
										</a>
										</div>
									</div>
									<div class="">
										<div class="bottom mt-10">
											<div>
												<a class="primary-btn">' . $item["usuario"] . '</a>
											</div>
										</div>
										<a href="#articulo' . $item["id"] . '" data-toggle="modal">
											<h4>' . $item["titulo"] . '</h4>
										</a>
									</div>
								</div>
							</div>

				<div id="articulo' . $item["id"] . '" class="modal fade">

					<div class="modal-dialog modal-content">

						<div class="modal-header" style="border:1px solid #eee">

			   				<button type="button" class="close" data-dismiss="modal">&times;</button>
			  		 		<h3 class="modal-title">' . $item["titulo"] . '</h3>

						</div>

						<div class="modal-body" style="border:1px solid #eee">

			    			<img src="backend/' . $item["ruta"] . '" width="100%" style="margin-bottom:20px">
			    			<p class="parrafoContenido text-justify">' . $item["contenido"] . '</p>

						</div>

							<div class="modal-footer" style="border:1px solid #eee">

			    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

							</div>

					</div>

				</div>';
				$i=0;
			}else{
				echo '<div class="col-lg-4 col-md-5 col-sm-6">
								<div class="single-post single-int mb-40">
									<div class="thumb">
										<div class="relative">
										<a href="#articulo' . $item["id"] . '" data-toggle="modal">
											<img class="f-img img-fluid mx-auto" src="backend/' . $item["ruta"] . '" alt="">
										</a>
										</div>
									</div>
									<div class="">
										<div class="bottom mt-10">
											<div>
												<a class="primary-btn">' . $item["usuario"] . '</a>
											</div>
										</div>
										<a href="#articulo' . $item["id"] . '" data-toggle="modal">
											<h4>' . $item["titulo"] . '</h4>
										</a>
									</div>
								</div>
							</div>

				<div id="articulo' . $item["id"] . '" class="modal fade">

					<div class="modal-dialog modal-content">

						<div class="modal-header" style="border:1px solid #eee">

			   				<button type="button" class="close" data-dismiss="modal">&times;</button>
			  		 		<h3 class="modal-title">' . $item["titulo"] . '</h3>

						</div>

						<div class="modal-body" style="border:1px solid #eee">

			    			<img src="backend/' . $item["ruta"] . '" width="100%" style="margin-bottom:20px">
			    			<p class="parrafoContenido text-justify">' . $item["contenido"] . '</p>

						</div>

							<div class="modal-footer" style="border:1px solid #eee">

			    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

							</div>

					</div>

				</div>';
$i++;
			}
			

		}
		echo '</div></section></div></div></div></div>';


	}


}