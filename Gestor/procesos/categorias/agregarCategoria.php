<?php 
	session_start();
	require_once "../../clases/Categoria.php";

	$datos = array(
		"idUsuario" => $_SESSION['idUsuario'],
		"categoria" => $_POST['categoria']
	);

	$objCategorias = new Categorias();

	echo $objCategorias->agregarCategoria($datos);


 ?>