1. obtener los detalles del sistema a desarrollar con el cliente.

2. creacion de estructura de carpetas

3. maquetacion.

3.1 maquetacion de formulario de login
3.2 maquetacion de formulario de usuario
3.2 maquetacion de menu
3.3 agregar favicon
3.4 agregar datatables.net



	$password = sha1($_POST['txtPassword']);
	$datos = array(
				"nombre"=>$_POST['txtNombre'],
				"fechaN"=>$_POST['txtFechaN'],
				"correo"=>$_POST['txtCorreo'],
				"usuario"=>$_POST['txtUsuario'],
				"password"=>$password
	);

	$usuario = new Usuario();
	echo $usuario->agregarUsuario($datos);




					respuesta = respuesta.trim();

				if (respuesta==1) {
					swal("correcto","Agregado con exito","success");
				}else{
					swal("error", "Fallo al agregar", "Error");
				}


