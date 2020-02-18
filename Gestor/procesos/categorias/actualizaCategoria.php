<?php 
	require_once "../../clases/Categoria.php";

	$id = $_POST['txtIdU'];
	$nombre = $_POST['txtnombreU'];

	$datos = array(
		'idCategoria' => $id, 
		'nombreCategoria' => $nombre);

	$objCategorias =  new Categorias();
	echo $objCategorias->actualizarCategoria($datos);
 ?>