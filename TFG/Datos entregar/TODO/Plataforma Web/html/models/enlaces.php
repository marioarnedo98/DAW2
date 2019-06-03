<?php

class EnlacesModels{

	public function enlacesModel($enlaces){
		if($enlaces == "noticias"){

			$module = "views/modules/".$enlaces.".php";
		}	

		else{
			$module = "views/modules/ingreso.php";		
		}

		return $module;

	}


}