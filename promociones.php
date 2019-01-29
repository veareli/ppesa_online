
<?php
	include_once 'app/Conexion.inc.php';
	include_once 'app/RepositorioPromocion.inc.php';
	include_once 'app/Promocion.inc.php';
	include_once 'app/obtenerPromociones.php';
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
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">

	<div class="jumbotron" style="margin:30px;10px;30px;10px">
		<h1 class="display-5">Promociones</h1>	
		<p class="lead">Lista de promociones disponibles</p>	
		<form method="post" action="registroPromocion.php">
		<button type="submit" class="btn btn-default" name="borrar_entrada">Agregar Promocion</button>
		</form>	
	</div>
	
		<div style="margin:auto; width:80%;">
		<?php
			Conexion::abrir_conexion();	
			?>
			
			
			<table id="promoTable" class="table table-hover" style="margin:10px">
			<thead class="table-success">
				<th>ID</th>
				<th>Producto</th>
				<th>Texto</th>
				<th>Descuento</th>
				<th>Tipo de cliente</th>
				<th></th>
				<th></th>
			</thead>
				<?php
					obtenerPromociones::escribirPromociones();
					Conexion::cerrar_conexion();		
				?>
			</table>
			
			
		</div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
	<link href="css/mensajes.css" rel="stylesheet">

</html>

