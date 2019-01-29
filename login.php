
<?php
	include_once 'app/Conexion.inc.php';
	include_once 'plantillas/documento-declaracion.inc.php';
	
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">

    <title>Inicio de sesion PPESA</title>

    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <link href="./css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="post" action="app/iniciarSesion.php">
      <img class="mb-4" src="./css/logo.png" alt="" width="100" height="100">
      <h1 class="h5 mb-3 font-weight-normal">Por favor iniciar sesion</h1>
      <label for="input" class="sr-only">Usuario</label>
      <input type="text" id="inputUsuario" name="usuario" class="form-control" placeholder="Usuario" required="true" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">
      <select class="custom-select" id="ciudad" name="ciudad">
      <option value="">Seleccione una ciudad:</option>
      <option value="jrz">Juarez</option>
      <option value="ch">Chihuahua</option>
      </select>
  
      <button class="btn btn-success btn-block btn-lg" type="submit" name="login">Iniciar sesion</button>
      <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
    </form>
  

</body></html>