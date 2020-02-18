<?php
	require_once "Conexion.php"; 
	class Gestor extends Conectar{
		public function agregarRegistroArchivo($datos){
			$conexion = Conectar::conexion();
			$sql = "INSERT INTO t_archivos(id_usuario,
											id_categoria,
											nombreArchivo,
											tipoArchivo,
											ruta) 
							VALUES (?, ?, ?, ?, ?)";

			$query = $conexion->prepare($sql);

			$query->bind_param("iisss", $datos['idUsuario'],
										$datos['idCategoria'],
										$datos['nombreArchivo'],
										$datos['tipoArchivo'],
										$datos['ruta']);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;				
		}

		public function obtenNombreArchivo($idArchivo){
			$conexion = Conectar::conexion();
			$sql = "SELECT nombreArchivo FROM t_archivos
							 WHERE id_archivos = '$idArchivo'";
			$res = mysqli_query($conexion, $sql);
			
			return mysqli_fetch_array($res)['nombreArchivo'];				 
		}

		public function eliminarRegistroArchivo($idArchivo){
			$conexion = Conectar::conexion();
			$sql = "DELETE FROM t_archivos 
							WHERE id_archivos = ?";

			$query = $conexion->prepare($sql);
			$query->bind_param("i", $idArchivo);
			$res = $query->execute();
			$query->close();
			return $res;
		}
	}
 ?>