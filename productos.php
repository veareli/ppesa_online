<!DOCTYPE html>

<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioProducto.inc.php';
include_once 'app/Producto.inc.php';
include_once 'app/obtenerProductos.php';
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
	<h1 class="display-5">Productos</h1>
	<p class="lead">Lista de productos disponibles</p>
	

		<span>
		<form method="post" action="registroProducto.php">
		<button type="submit" class="btn btn-default" name="borrar_entrada">Agregar Producto</button>
		</form>
		<br>
		<form method="post" action="disponibles.php">
		<button type="submit" class="btn btn-default" name="borrar_entrada">Actualizar disponibles</button>
		</form>
		</span>
	
</div>
<div style="alignment:center">
	<?php
	Conexion::abrir_conexion();	
	?>
	<table class="table table-hover" style="width:80%; margin:auto">
		<thead class="table-success">
			<th>ID</th>
			<th>Descripcion</th>
			<th>Linea</th>
			<th>Disponibilidad</th>
			<th>Precio</th>
			<th></th>
			<th></th>
	</thead>
	<?php
		obtenerProductos::escribirProductos();
		Conexion::cerrar_conexion();		
	?>
</table>


</div>
<link href="css/mensajes.css" rel="stylesheet">
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>

