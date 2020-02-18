<?php 
	session_start();
	require_once "../../clases/Gestor.php";
	$objGestor = new Gestor();

	$idArchivo = $_POST['idArchivo'];
	$idUsuario = $_SESSION['idUsuario'];

	$nombreArchivo = $objGestor->obtenNombreArchivo($idArchivo);

		$rutaEliminar = "../../archivos/".$idUsuario."/".$nombreArchivo;
		if (unlink($rutaEliminar)) {
			echo $objGestor->eliminarRegistroArchivo($idArchivo);
		}else{
			echo 0;
		}

	
 ?>