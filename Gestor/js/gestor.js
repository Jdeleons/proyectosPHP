function agregarArchivosGestor(){
			//objeto de javascrip que nos ayuda enviar archivos
			$formData = new FormData(document.getElementById('fmrArchivos'));
			$.ajax({
				url:"../procesos/gestor/guardarArchivos.php",
				type: "POST",
				//para evitar meter los controles uno por uno 
				//para que reconezca el formulario como un html aunque traiga archivos
				datatype: "html",
				data: $formData,
				cache: false,
				contentType: false,
				processData: false,
				success:function(res){
					//para realizar pruebas en la consola
					console.log(res);

					res = res.trim();
					if (res == 1) {
						$("#fmrArchivos")[0].reset();
						$('#tablaGestorArchivos').load("gestor/tablaGestor.php");
						swal("Save","Agregado con Exito","success");

					} else {
						swal("Error","Fallo al agregar!!!","error");

					}
				}
			});

		}

function eliminarArchivo(idArchivo){
			swal({
				title: "Estas seguro de Eliminar este Archivo?",
				text: "Eliminado, No se podra recuperar el archivo!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						type: "POST",
						data: "idArchivo=" + idArchivo,
						url:"../procesos/gestor/eliminarArchivo.php",
						success:function(res){
						res = res.trim();	
						if (res == 1) {
						$('#tablaGestorArchivos').load("gestor/tablaGestor.php");	
						swal("Eliminado con exito", {
						icon: "success",
					});	
						} else {
						swal("Error al eliminar!", {
						icon: "error",
					});								
						}	
						
						}
					});
				} 
			});
		}