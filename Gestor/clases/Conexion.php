<?php 
	class Conectar{
		public function conexion(){
			$servidor="localhost";
			$usuario="root";
			$password="*Deleonsocgio10";
			$bd="gestor";

			$conexion = mysqli_connect( $servidor,
										$usuario,
										$password,
										$bd);
			$conexion->set_charset('utf8mb4');											
			return $conexion;

		}
	}
 ?>