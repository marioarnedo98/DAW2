<?php

class Galeria{

	public function seleccionarGaleriaController(){

		$respuesta = GaleriaModels::seleccionarGaleriaModel("galeria");
		echo '<div class="row gallery-item">';
		foreach ($respuesta as $row => $item){
			echo'<div class="col-md-3 col-sm-6 imagen">
						<a href="backend/'.substr($item["ruta"], 6).'" rel="grupo">
							<img src="backend/'.substr($item["ruta"], 6).'">
						</a>
					</div>';
		}
		echo '</div>'; //cierrre div global


	}

}