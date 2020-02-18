<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
</head>
<body>
  <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="img/carpeta.jpg" id="icon" alt="User Icon" />
      <h3>Gestor de Archivos</h3>
    </div>

    <!-- Login Form -->
    <form method="POST" id="fmrLogin" onsubmit="return loguear()">
      <input type="text" id="txtUsuario" class="fadeIn second" name="txtUsuario" placeholder="username" required="">
      <input type="password" id="txtPassword" class="fadeIn third" name="txtPassword" placeholder="password" required="">
      <input type="submit" class="fadeIn fourth" value="Entrar">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <h6>División de Fuerzas Especiales</h6>
     <!--  <a class="underlineHover" href="registro.php">Registrar</a>
      Remind Passowrd -->
    </div>

  </div>
</div>

<script src="librerias/jquery-3.4.1.min.js" ></script>
<script src="librerias/sweetalert.min.js" ></script>

<script type="text/javascript">

  function loguear(){
    $.ajax({
      type:"POST",
      data: $('#fmrLogin').serialize(),
      url:"procesos/usuario/login/login.php",
      success:function(respuesta){
       // alert(respuesta);
        respuesta = respuesta.trim();
        if (respuesta ==1) {
            window.location = "vistas/inicio.php";
        } else {
            swal("Error","Fallo al loguearse","error");
        }
      }
    });
    return false;
  }
</script>
</body>
</html>