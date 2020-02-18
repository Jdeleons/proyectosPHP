<?php 
	session_start();
	require_once "../../clases/Categoria.php";

	$idCategoria = $_POST['idCategoria'];
	
	
	$objCategorias = new Categorias();
	echo $objCategorias->eliminarCategoria($idCategoria);
 ?>