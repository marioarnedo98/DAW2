<?php

require_once "backend/models/conexion.php";

class GaleriaModels{

	public function seleccionarGaleriaModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT ruta FROM $tabla ORDER BY orden ASC LIMIT 9");
	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}
}