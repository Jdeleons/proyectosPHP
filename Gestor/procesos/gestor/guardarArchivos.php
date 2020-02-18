<?php 
//para realizar pruebas con archivos y post
	//print_r($_FILES);
//print_r($_POST);

	session_start();
	require_once "../../clases/Gestor.php";

	$objGestor = new Gestor();
	$idUsuario = $_SESSION['idUsuario'];
	$idCategoria = $_POST['categoriasArchivos'];

	if ($_FILES['archivos']['size'] > 0) {

	$carpetaUsuario = "../../archivos/".$idUsuario;
	if (!file_exists($carpetaUsuario)) {
			mkdir($carpetaUsuario, 0777, true);
		}	

	$totalArchivos = count($_FILES['archivos']['name']);

	for ($i=0; $i < $totalArchivos; $i++) { 
		//para realizar puebas si se estan enviando los archivos
		//array_push($datos, $_FILES['archivos']['name'][$i]);
		
		//obtenemos los campos que lleva la tabla tarchivos de la bd
		$nombreArchivo = $_FILES['archivos']['name'][$i];
		$explode = explode('.', $nombreArchivo);
		$tipoArchivo = array_pop($explode);
		
		//creamos la ruta de almacenamiento
		$rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i];	
		$rutaFinal = $carpetaUsuario. "/" .$nombreArchivo;
		
		// arreglo para subir archivos a la bd
		$datos = array(
						'idUsuario' => $idUsuario,
						'idCategoria' => $idCategoria,
						'nombreArchivo' => $nombreArchivo,
						'tipoArchivo' => $tipoArchivo,
						'ruta' => $rutaFinal 
						);

		//subimpos los archivos
		if (move_uploaded_file($rutaAlmacenamiento, $rutaFinal)) {
			$respuesta = $objGestor->agregarRegistroArchivo($datos); 
		}		
		
	}

		echo $respuesta;
	//print_r($datos);
	}else{
		echo 0;
	}
 ?>