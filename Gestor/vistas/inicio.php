<?php  

session_start();
	if (isset($_SESSION['usuario'])) {
		include "header.php";	
?>

	<div class="container">
		<div class="row">
			
			<div class="col-sm-3" style="text-align: center">
				<br><br><br>
				<hr>
				<h2>MISIÓN</h2>
				<p>
					Apoyar a todas las unidades policiales a nivel nacional en el mantenimiento y en su caso, el restablecimiento del orden público y la seguridad ciudadana, cooperando con otras instituciones en la atención de riesgos y desastres, aunado a ello brindar protección a personas cuando el caso amerite; y actuar en coordinación con otras unidades especiales.
				</p>
				<hr>
			</div>
			<div class="col-sm-6">
				<br><br>
				<hr>
				<center>
					<img src="../img/1.jpg" alt="" width="450px" style="text-align: center">
				</center>
			</div>
			<div class="col-sm-3" style="text-align: center">
				<br><br><br>
				<hr>
				<H2>VISIÓN</H2>
				<p>
					Contar con personal altamente especializado, disciplinado y comprometido con la consecución de los objetivos institucionales, relacionados a la seguridad pública. Siendo reconocidos a nivel nacional e internacional como innovadores en la forma de brindar el servicio policial y de interacción con la comunidad.
				</p>
				<hr>
			</div>
			
		</div>
	</div>

<?php 
	
	include "footer.php"; 
	} else {
		header("location:../index.php");
	}	
 	
 ?>


