<?php 
	session_start();
	if (isset($_SESSION['usuario'])) {
		include "header.php";
	
	
 ?>

	<div class="container">
		<h1 class="text-center">Registro de Sección</h1>
		<hr>
		<div class="row">
			<div class="col-sm-4">
				<form id="fmrRegistro" method="POST" onsubmit="return agregarUsuarioNuevo()" autocomplete="off">
				<label>Nombre de Sección</label>
				<input type="text" name="txtNombre" id="txtNombre" class="form-control" required="">

				<label>Fecha de Registro</label>
				<input type="text" name="txtFechaN" id="txtFechaN" class="form-control" required="" readonly="">

				<label>Email o Correo</label>
				<input type="email" name="txtCorreo" id="txtCorreo" class="form-control" required="">

				<label>Nombre de usuario</label>
				<input type="text" name="txtUsuario" id="txtUsuario" class="form-control" required="">

				<label>Password o Contraseña</label>
				<input type="password" name="txtPassword" id="txtPassword" class="form-control">					 
				<br>
				<div class="row">
					<div class="col-sm-6 text-left">
						<button class="btn btn-primary">Registrar</button>
					</div>
					<div class="col-sm-6">
						<a class="btn btn-success" href="../procesos/usuario/salir.php">Login</a>
					</div>
				</div>													
				</form>
			</div>
			<div class="col-sm-8">
				<div id="tblUsuarios">
					
				</div>
						
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>

<?php include "footer.php"; ?>
<script type="text/javascript">
	
	$('#tblUsuarios').load("usuarios/tablaUsuarios.php");

	$(function(){
		var fecha = new Date();
		var yyyy = fecha.getFullYear();

		$('#txtFechaN').datepicker({
			changeMont: true,
			changeYear: true,
			yearRange: '1900:' + yyyy,
			dateFormat: "dd-mm-yy"
		});
	});

	function agregarUsuarioNuevo(){ 
		$.ajax({
			method: "POST",
			data: $('#fmrRegistro').serialize(),
			url: "../procesos/usuario/registro/agregarUsuario.php",
			success:function(respuesta){
				respuesta = respuesta.trim();

				if (respuesta==1) {
					$('#fmrRegistro')[0].reset();
					swal("correcto","Agregado con exito","success");
				}else if(respuesta==2){
					swal("Este usuario ya existe","intente con otro nombre de usuario");
				}else{
					swal("Error", "Fallo al agregar", "error");
				}
			}
		});
		return false;
	}
</script>

<?php 
	
	}else{

	}
 ?>