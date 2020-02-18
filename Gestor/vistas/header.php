
<?php 
	require_once "../clases/Conexion.php";
	
	if (isset($_SESSION['usuario'])) {
	
	$idUsuario = $_SESSION['idUsuario'];
	$tipoUsuario = $_SESSION['tipoUsuario'];
	$c = new Conectar();
	$conexion = $c->conexion();

	$sql = "SELECT id_usuario, 
				   nombre, 
				   usuario,
				   email 
			  FROM t_usuarios
			  WHERE id_usuario = '$idUsuario'";	

	$res = mysqli_query($conexion, $sql);
	
	while ($row = mysqli_fetch_array($res)) {
		$nom = $row['nombre'];
		$usu = $row['usuario'];	
		$email= $row['email'];	  
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
					<?php if ($tipoUsuario): ?>
											
					<li class="nav-item">
						<a class="nav-link" href="registrarSeccion.php"> <span class="fas fa-folder-open"></span> Registrar Sección</a>
					</li>
					<?php endif ?>
				</ul>
			</div>
		</div>

		<div class="dropdown">
                <button style="border: none" class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $nom; ?>
                </button>
                <div class="dropdown-menu text-center">

                    <a class="dropdown-item" href="#">
                        <img src="../img/user.png" alt="60" width="60"/>
                    </a>
                    <a class="dropdown-item" href="#"><?php echo $usu; ?></a>
                    <a class="dropdown-item" href="#"><?php echo $email; ?></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../procesos/usuario/salir.php">Salir</a>
                </div>
            </div>
		<?php 
		}
		 ?>            
	</nav>

<?php 
	}else{
		header("location:../index.php");
	}
 ?>
	<!-- Page Content -->

