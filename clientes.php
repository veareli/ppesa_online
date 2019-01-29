<?php
	include_once 'app/Conexion.inc.php';
	include_once 'app/RepositorioCliente.inc.php';
	include_once 'app/Cliente.inc.php';
	include_once 'app/obtenerClientes.php';
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
		<h1 class="display-5">Clientes</h1>
		<p class="lead">Lista de clientes</p>	
		<form method="post" action="registroCliente.php">
		<button type="submit" class="btn btn-default" name="agregar_cliente">Agregar Cliente</button>
		</form>	
	</div>
		<div style="margin:20px;100px;20px;100px">
		<?php
			Conexion::abrir_conexion();	
			?>
			<table class="table table-hover" style="margin:10px">
			<thead class="table-success">
				<th>ID</th>
				<th>Nombre</th>
				<th>Direccion de entrega</th>
				<th>Telefono</th>
				<th>Whatsapp</th>
				<th>Tipo de cliente</th>
				<th></th>
				<th></th>
			</thead>
				<?php
					obtenerClientes::escribirClientes();
					Conexion::cerrar_conexion();		
				?>
			</table>
			
			
		</div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
	<link href="css/mensajes.css" rel="stylesheet">
</html>

