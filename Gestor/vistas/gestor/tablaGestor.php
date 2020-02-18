<?php 
require_once "../../clases/Conexion.php";
session_start();
$c = new Conectar();
$conexion = $c->conexion();

$idUsuario = $_SESSION['idUsuario'];
$tipoUsu = $_SESSION['tipoUsuario'];
$sql = "SELECT 
			    archivos.id_archivos as idArchivo,
			    usuario.nombre as nombreUsuario,
			    categorias.nombre as nombreCategoria,
			    archivos.nombreArchivo as nombreArchivo,
			    archivos.tipoArchivo as tipoArchivo,
			    archivos.ruta as rutaArchivo,
			    archivos.fecha  as fechaArchivo
			FROM
			    t_archivos AS archivos
			        INNER JOIN
			    t_usuarios AS usuario ON archivos.id_usuario = usuario.id_usuario
			        INNER JOIN
			    t_categorias AS categorias ON archivos.id_categoria = categorias.id_categoria 
			    and archivos.id_usuario = '$idUsuario'";

	$result = mysqli_query($conexion, $sql);

 ?>
<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table tabla-hover table-dark" id="tablaGestorDataTable">
				<thead>
					<tr style="text-align: center">
						<th>Categoria</th>
						<th>Nombre de Archivo</th>
						<th>Tipo de Archivo</th>
						<th>Descargar</th>
						<?php if ($tipoUsu): ?>													
						<th>Eliminar</th>
						<?php endif ?>
					</tr>	
				</thead>
				<tbody>
	<?php 
		while ( $mostrar = mysqli_fetch_array($result)) {	
		$rutaDescarga = "../archivos/".$idUsuario."/".$mostrar['nombreArchivo'];
		$nombreArchivo = $mostrar['nombreArchivo'];	
		$idArchivo = $mostrar['idArchivo'];

	 ?>					
					<tr style="text-align: center">
						<td><?php echo $mostrar['nombreCategoria'] ?></td>
						<td> <?php echo $mostrar['nombreArchivo'] ?></td>
						<td><?php echo $mostrar['tipoArchivo'] ?></td>
						<td>
							<a href=" <?php echo $rutaDescarga; ?>" 
							   download=" <?php echo $nombreArchivo; ?>" 
							   class = "btn btn-success btn-sm">
							   <span class="fas fa-download"></span>
								Descargar
							</a>
						</td>
											
						<td>
							<span class="btn btn-danger btn-sm" 
								  onclick="eliminarArchivo(<?php echo $idArchivo ?>)">
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
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaGestorDataTable').DataTable();
	});
</script>