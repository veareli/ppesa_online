
<?php
	include_once 'app/Conexion.inc.php';
	include_once 'app/RepositorioPedido.inc.php';
	include_once 'app/Pedido.inc.php';
	include_once 'app/obtenerPedidos.php';
	include_once 'plantillas/documento-declaracion.inc.php';
	include_once 'plantillas/navbar.inc.php';
	include_once 'app/ControlSesion.inc.php';
	include_once 'app/Redireccion.inc.php';

	if(!ControlSesion::sesion_iniciada()){
		Redireccion :: redirigir('index.php');
	  }
	
?>

	<div class="jumbotron" style="margin:30px;10px;30px;10px">
		<h1 class="display-5">Pedidos</h1>
		<p class="lead">Pedidos realizados por los clientes</p>
		
	</div>
		<div style="width:95%;margin:auto;">
		<?php
			Conexion::abrir_conexion();	
			?>
			<table class="table table-hover" style="margin:10px">
			<thead class="table-success">
				<th>ID</th>
				<th>Producto</th>
				<th>Fecha Pedido</th>
				<th>Fecha Programada</th>
				<th>Fecha de entrega</th>
				<th>Descripcion</th>
				<th>Total</th>
				<th>Cantidad</th>
				<th>Precio</th>
				<th>Promocion</th>
				<th>Factor</th>
				<th>Cliente</th>
				<th>Comentarios</th>
				<th></th>
			</thead>
				<?php
					obtenerPedidos::escribirPedidos();
					Conexion::cerrar_conexion();		
				?>
			</table>
			
			
		</div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>

