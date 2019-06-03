<?php

require_once "backend/models/conexion.php";

class ArticulosModels{

	public function seleccionarArticulosModelInicio($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, titulo, introduccion, ruta, contenido FROM $tabla ORDER BY orden,id DESC LIMIT 10");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}
	public function seleccionarArticulosModelNoticias($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT articulos.id, titulo, introduccion, ruta, contenido, usuario FROM articulos INNER JOIN usuarios on articulos.id_user=usuarios.id ORDER BY orden,id DESC");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

}