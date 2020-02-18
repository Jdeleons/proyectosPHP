<?php 
	require_once "Conexion.php";
	class Usuario extends Conectar{
		
		public function agregarUsuario($datos){
			$conexion = Conectar::conexion();

			if (self::buscarUsuarioRepetido($datos['usuario'])) {
				return 2;
			}else{

			$tipoUsuario = 0;
			$sql = "INSERT INTO t_usuarios(nombre,
											fechaNacimiento,
											email,
											usuario,
											password,
											tipo) 
									VALUES(?, ?, ?, ?, ?,?)";
			$query = $conexion->prepare($sql);
			$query->bind_param('sssssb', $datos['nombre'],
									   $datos['fechaN'],
									   $datos['correo'],
									   $datos['usuario'],
									   $datos['password'],
									   $tipoUsuario);

			$exito = $query->execute();
			$query->close();
			return $exito;	
			}						   						
		}

		public function buscarUsuarioRepetido($usuario){
			$conexion = Conectar::conexion();

			$sql = "SELECT usuario 
					FROM t_usuarios 
					WHERE usuario = '$usuario'";

			$result = mysqli_query($conexion, $sql);

			$datos = mysqli_fetch_array($result);
			if ($datos['usuario']!="" || $datos['usuario'] == $usuario) {
				return 1;
			} else {
				return 0;
			}
			
		}

		public function loginU($usuario,$pass){
			$conexion = Conectar::conexion();

			$sql = "SELECT count(*) as existeUsuario 
							FROM t_usuarios 
							WHERE usuario = '$usuario' 
							AND password ='$pass'";

			$result = mysqli_query($conexion, $sql);
			$respuesta = mysqli_fetch_array($result)['existeUsuario'];

			if ($respuesta > 0) {
				$_SESSION['usuario'] = $usuario;

				$sqlId = "SELECT id_usuario,
								 tipo
							FROM t_usuarios 
								WHERE usuario = '$usuario' 
								AND password ='$pass'";
			$resultId = mysqli_query($conexion, $sqlId);
			while ( $row= mysqli_fetch_row($resultId)) {
					$idUsu = $row[0];
					$tipoUsu = $row[1];
			 } 								

				$_SESSION['idUsuario'] = $idUsu;
				$_SESSION['tipoUsuario'] = $tipoUsu;

				return 1;
			} else {
				return 0;
			}
			
		}
	}
 ?>