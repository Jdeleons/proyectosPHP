<?php 
	session_start();
	require_once "../../clases/Conexion.php";
	$idUsuario = $_SESSION['idUsuario'];
	$tipoUsu = $_SESSION['tipoUsuario'];

	$conexion = new Conectar();
	$conexion = $conexion->conexion();


 ?>

<div class="table-responsive">
	<table class="table tabla-hover table-dark" id="tablaCategoriaDataTable"> 
		<thead>
			<tr style="text-align: center">
			<td>Nombre</td>
			<td>Fecha</td>
			<td>Editar</td>
			<?php if ($tipoUsu): ?>		
			<td>Eliminar</td>
			<?php endif ?>	
			</tr>
		</thead>
		<tbody>
<?php 
	$sql = "SELECT id_categoria,
				   nombre,
				   fechaInsert
			FROM t_categorias
			WHERE id_usuario = '$idUsuario'";
	$result = mysqli_query($conexion, $sql);
	
	while($mostrar = mysqli_fetch_array($result)){
	$idCategoria = $mostrar['id_categoria'];					
 ?>			

			<tr style="text-align: center">
				<td><?php echo $mostrar['nombre']; ?></td>
				<td><?php echo $mostrar['fechaInsert']; ?></td>
				<td>
					<span class="btn btn-warning btn-sm" 
					onclick="obtenerDatosCategoria('<?php echo $idCategoria ?>')" data-toggle="modal" data-target="#modalActualizarCategoria">
						<span class="fas fa-edit"></span>
					</span>
				</td>
				
									
				<td>
					<span class="btn btn-danger btn-sm" 
					onclick="eliminarCategoria('<?php echo $idCategoria ?>')">
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
		$('#tablaCategoriaDataTable').DataTable();
	});
</script>