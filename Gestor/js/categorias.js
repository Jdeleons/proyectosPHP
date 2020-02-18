function agregarCategoria(){
				var categoria = $('#txtNombreCategoria').val();

			if (categoria == "") {
				swal("Debes de agregar una categoria");
			}else{
				$.ajax({
					type:"POST",
					data: "categoria=" + categoria,
					url:  "../procesos/categorias/agregarCategoria.php",
					success:function(r){
						r = r.trim();

						if (r == 1) {
							$('#tblCategorias').load("categorias/tablaCategoria.php");
							$('#txtNombreCategoria').val("");
							swal("Save", "Agregado con exito", "success");
						}else{
							swal("Error", "Fallo al agregar", "error");
						}
					}
				});
			}
	
}

	function eliminarCategoria(idCategoria){
	idCategoria = parseInt(idCategoria);
	if (idCategoria < 1) {
		swal("No tienes categorias ingresadas");
		return false;
	}else{		
			//-----------------------------------			
			swal({
			  title: "Estas seguro de Eliminar esta categoria?",
			  text: "Una vez eliminado, no podras recuperarla!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
							$.ajax({
								type:"POST",
								data: "idCategoria=" + idCategoria,
								url:  "../procesos/categorias/eliminarCategoria.php",
								success:function(res){
									res = res.trim();
									if (res == 1) {
										$('#tblCategorias').load("categorias/tablaCategoria.php");
										swal("Eliminada con exito", {
											icon: "success",
										});
									}else{
										swal("Error", "Fallo al Eliminar", "error");
									}
								}
							});
			       } 
			});



			//---------------------------------
	}
}

function obtenerDatosCategoria(idCategoria){
	$.ajax({
		type: "POST",
		data: "idCategoria=" + idCategoria,
		url: "../procesos/categorias/obtenerCategoria.php",
		success:function(res){
			res = jQuery.parseJSON(res);
			
			$('#txtIdU').val(res['idCategoria']);
			$('#txtnombreU').val(res['nombre']);	

		}
	});
}

function actualizaCategoria(){
	if ($('#txtnombreU').val()== ""){
		swal("No hay categoria!!");
		return false;
	} else {
		$.ajax({
			type: "POST",
			data: $('#frmActualizaCategoria').serialize(),
			url: "../procesos/categorias/actualizaCategoria.php",
			success:function(res){
				res = res.trim();
				if (res == 1) {
					$('#tblCategorias').load("categorias/tablaCategoria.php");
					$('btnCerraActualizarCategoria').click();
					swal("Actualizado!", "Actualizado correctamente!", "success");
				} else {
					swal("Error!", "Fallo al Actualizado!", "error");
				}
			}
		});
	}
}