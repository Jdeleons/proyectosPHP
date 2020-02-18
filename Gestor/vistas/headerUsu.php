
<?php 
		
	if (isset($_SESSION['usuario'])) {
	
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Gestor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap4/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../librerias/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../librerias/datatable/dataTables.bootstrap4.min.css">


    <link rel="stylesheet" type="text/css" href="../librerias/jquery-ui/jquery-ui.theme.css">
    <link rel="stylesheet" type="text/css" href="../librerias/jquery-ui/jquery-ui.css">
    
</head>
<body style="background-color: #e9ecef">

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
		<div class="container">
			<a class="navbar-brand" href="inicio.php">
				<img src="../img/logo.jpg" alt="" width="50px">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="inicio.php"> <span class="fas fa-home"></span> Inicio
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="categorias.php"> <span class="fas fa-folder"></span> Categorías</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="gestor.php"> <span class="fas fa-folder-open"></span> Archivos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="registrarSeccion.php"> <span class="fas fa-folder-open"></span> Registrar Sección</a>
					</li>
				</ul>
			</div>
		</div>

		
	</nav>

<?php 
	}else{
		header("location:../index.php");
	}
 ?>
	<!-- Page Content -->

