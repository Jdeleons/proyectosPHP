<?php 
	require_once "../../clases/Categoria.php";

	$idCat = $_POST['idCategoria'];
	
	$Categorias = new Categorias();
	echo json_encode($Categorias->obtenerCategoria($idCat));
 ?>