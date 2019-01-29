
<?php

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

if(!ControlSesion::sesion_iniciada()){
	Redireccion :: redirigir(RUTA_LOGIN);
  }

  if(isset($_GET['msj'])){
	$msj = $_GET['msj'];
	?><div class="success">
	<strong>
	<?php echo $msj?>
	</strong>
	</div>
	<?php
}
?>

<div class="jumbotron" style="margin:30px;10px;30px;10px">
	<h1 class="display-5">Bienvenido!</h1>
	<p class="lead"></p>
	
</div>
<?php
echo ControlSesion::obtener_ciudad();
?>
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>

