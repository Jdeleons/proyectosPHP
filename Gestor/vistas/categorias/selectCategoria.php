<?php 
	session_start();
	require_once "../../clases/Conexion.php";

	$idUsuario = $_SESSION['idUsuario'];


	$c = new Conectar();
	$conexion = $c->conexion();

	$sql = "SELECT id_categoria,
				   nombre 
			FROM t_categorias 
			WHERE id_usuario = '$idUsuario'";
	$result = mysqli_query($conexion, $sql);
			
 ?>

 <select name="categoriasArchivos" id="categoriasArchivos" class="form-control">
 	<?php 
 		while ( $mostar = mysqli_fetch_array($result)) { 
 		$idCategoria = $mostar['id_categoria'];
 		$mostrarNombre = $mostar['nombre'];		
 	 ?>
 	 	<option value="<?php echo $idCategoria; ?>"><?php echo $mostrarNombre; ?></option>

 	 <?php 
 	 	}
 	  ?>
 </select>