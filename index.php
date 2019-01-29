<?php
  
	include_once 'app/RepositorioUsuario.inc.php';
	include_once 'app/Usuario.inc.php';
  include_once 'plantillas/documento-declaracion.inc.php';
  include_once 'app/ControlSesion.inc.php';
  include_once 'app/Redireccion.inc.php';

  if(ControlSesion::sesion_iniciada()){
		Redireccion :: redirigir('after-login.php');
	  }

   


?>
  <body class="text-center">

    <form class="form-signin"  method="post" action="app/iniciarSesion.php">
    <?php
     if(isset($_GET['msj'])){
      $msj = $_GET['msj'];
      ?>
      <div class="x">
      <strong>
      <?php echo $msj?>
      </strong>
      </div>
      <?php
      }
  ?>
      <img class="mb-4" src="./css/logo.png" alt="" width="100" height="100">
      <h1 class="h4 mb-3 font-weight-normal">Por favor iniciar sesion</h1>
      <label class="sr-only">Usuario</label>
      <input type="text" id="inputUsuario" class="form-control" name="usuario" placeholder="Usuario" required="" autofocus="">
      <label  class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required="">
      <select class="custom-select" id="ciudad" name="ciudad">
      <option value="">Seleccione una ciudad:</option>
      <option value="jrz">Juarez</option>
      <option value="ch">Chihuahua</option>
      </select>
  
  <br>
      <button class="btn btn-success btn-block btn-lg" name="login" type="submit">Sign in</button>
    </form>
    <link href="css/error.css" rel="stylesheet">
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <link href="./css/signin.css" rel="stylesheet">

</body></html>