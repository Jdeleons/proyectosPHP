<?php 
	require_once "../../../clases/Usuario.php";

	//$password = sha1($_POST['txtPassword']);
	$password = $_POST['txtPassword'];
	$fechaNacimiento = explode("-", $_POST['txtFechaN']);
	$fechaNacimiento = $fechaNacimiento[2]."-".$fechaNacimiento[1 ]."-".$fechaNacimiento[0];
	$datos = array(
				"nombre"=>$_POST['txtNombre'],
				"fechaN"=>$fechaNacimiento,
				"correo"=>$_POST['txtCorreo'],
				"usuario"=>$_POST['txtUsuario'],
				"password"=>$password
	);

	$usuario = new Usuario();
	echo $usuario->agregarUsuario($datos);

 ?>