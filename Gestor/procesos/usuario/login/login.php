<?php 
	session_start();
	require_once "../../../clases/Usuario.php";

	$usuario = $_POST['txtUsuario'];
	//$pass = sha1($_POST['txtPassword']);
	$pass = $_POST['txtPassword'];
	$usuarioObj = new Usuario();

	echo $usuarioObj->loginU($usuario, $pass);

 ?>