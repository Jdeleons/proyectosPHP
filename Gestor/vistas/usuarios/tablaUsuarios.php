<?php 
	session_start();
	require_once "../../clases/Conexion.php";

	$c = new Conectar();
	$conexion = $c->conexion();
	
 ?>

 <div class="table-responsive">
 	<table class="table table-hover table-dark" id="tableSeccionDataTable">
 		<thead>
 			<tr style="text-align: center">
 				<td>Usuario</td>
 				<td>Contraseña</td>
 				<td>Editar</td>
 				<td>Eliminar</td>
 			</tr>
 		</thead>
 		<tbody>
<?php 
	$sql = "SELECT id_usuario,
				   usuario,
				   password
			FROM t_usuarios";

	$result = mysqli_query($conexion, $sql);
	
	while($mostrar = mysqli_fetch_array($result)){
	$idCategoria = $mostrar['id_usuario'];
	 
	//$pass = sha1($mostrar['password']);
	$pass = $mostrar['password'];
 ?>
 				<tr style="text-align: center">
 					<td><?php echo $mostrar['usuario'] ?></td>
 					<td><?php echo $pass; ?></td>
 					<td>
 						<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizarCategoria">
 							<span class="fas fa-edit"></span>
 						</span>
 					</td>
 					<td>
 						<span class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalActualizarCategoria">
 							<span class="fas fa-trash-alt"></span>
 						</span>
 					</td>
 				</tr>
 		
<?php

	}
 ?> 			
 		</tbody>
 	</table>
 </div>

 <script type="text/javascript">
 	$(document).ready(function(){
 		$('#tableSeccionDataTable').DataTable();
 	});
 </script>
