	$(document).ready(function(){
		$('#tblCategorias').load("categorias/tablaCategoria.php");
		
		$('#tablaGestorArchivos').load("gestor/tablaGestor.php");
		$('#categoriasLoad').load("categorias/selectCategoria.php");
		$('#seccionLoad').load("categorias/selectSeccion.php");

		$('#btnGuardarArchivos').click(function(){
			agregarArchivosGestor();
		});
	});