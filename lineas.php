
<?php
	include_once 'app/Conexion.inc.php';
	include_once 'app/RepositorioLinea.inc.php';
	include_once 'app/Linea.inc.php';
	include_once 'app/obtenerLineas.php';
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
		<h1 class="display-5">Lineas</h1>
		<p class="lead">Lista de lineas/categorias disponibles</p>	
		
		<form method="post" action="registroLinea.php">
		<button type="submit" class="btn btn-default" name="borrar_entrada">Agregar Linea/Categoria</button>
		</form>	
	</div>
		<div style="width:75%;margin:auto">
		<?php
			Conexion::abrir_conexion();	
			?>
			<table class="table table-hover" style="margin:10px">
			<thead class="table-success">
				<th>ID</th>				
				<th>Descripcion</th>
				<th></th>
				<th></th>				
			</thead>
				<?php
					obtenerLineas::escribirLineas();
					Conexion::cerrar_conexion();		
				?>
			</table>
			
			
		</div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
	<link href="css/mensajes.css" rel="stylesheet">
</html>

