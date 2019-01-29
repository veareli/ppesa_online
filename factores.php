
<?php
	include_once 'app/Conexion.inc.php';
	include_once 'app/RepositorioFactor.inc.php';
	include_once 'app/Factor.inc.php';
	include_once 'app/obtenerFactores.php';
	include_once 'plantillas/documento-declaracion.inc.php';
	include_once 'plantillas/navbar.inc.php';
	include_once 'app/ControlSesion.inc.php';
	include_once 'app/Redireccion.inc.php';

	if(!ControlSesion::sesion_iniciada()){
		Redireccion :: redirigir('index.php');
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
		<h1 class="display-5">Factores</h1>	
		<p class="lead">Factores utilizados en la aplicacion</p>
		<form method="post" action="registroFactor.php">
		<button type="submit" class="btn btn-default" name="agregar_factor">Agregar Factor</button>
		</form>		
	</div>
		<div style="margin:auto;width:70%">
		<?php
			Conexion::abrir_conexion();	
			?>
			<table class="table table-hover" style="margin:10px">
			<thead class="table-success">
				<th>Dia</th>
				<th>Valor</th>
				<th></th>
				<th></th>
				
			</thead>
				<?php
					obtenerFactores::escribirFactors();
					Conexion::cerrar_conexion();		
				?>
			</table>
			
			
		</div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
	<link href="css/mensajes.css" rel="stylesheet">
</html>

