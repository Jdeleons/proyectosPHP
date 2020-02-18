<?php 
	session_start();
	require_once "../../clases/Conexion.php";

	$idUsuario = $_SESSION['idUsuario'];


	$c = new Conectar();
	$conexion = $c->conexion();

	$sql = "SELECT id_usuario,
				   nombre 
			FROM t_usuarios";
	$result = mysqli_query($conexion, $sql);
			
 ?>
	
<form method="POST" id="fmrSeccion" name="fmrSeccion" action="tablaSecciones.php">
	
 <select name="seccionArchivos" id="seccionArchivos" class="form-control">

 	<option disabled selected="">Seleccione una Sección</option>
 	<?php
 		while ( $mostar = mysqli_fetch_array($result)) { 
 		$idCategoria = $mostar['id_usuario'];
 		$mostrarNombre = $mostar['nombre'];		
 	 ?>
 	 	<option value="<?php echo $idCategoria; ?>"><?php echo $mostrarNombre; ?></option>

 	 <?php 
 	 	}
 	  ?>
 </select>
 	<br>
	<button type="button" class="btn btn-primary" id="btnCargarSeccion">Cargar Seccion</button>
 
</form>
 
 <script type="text/javascript">
 	$(document).ready(function(){
 		$('#btnCargarSeccion').click(function(){
			var idSeccion =	$('#fmrSeccion').serialize();
			
			$.ajax({
				type:"POST",
				data: idSeccion,				
				url:"categorias/tablaSecciones.php",
				success:function(r){
					console.log(r);
 				swal("ok.", "Seccion","success");
 				$('#tblSeccion').load("categorias/tablaSecciones.php");
				}
			});
		});
 	});
 </script>