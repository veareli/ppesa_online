<?php
	include_once 'app/Conexion.inc.php';
    include_once 'app/RepositorioCliente.inc.php';
    include_once 'app/RepositorioReporte.inc.php';
    include_once 'app/RepositorioProducto.inc.php';
	include_once 'app/Linea.inc.php';
	include_once 'plantillas/documento-declaracion.inc.php';
  include_once 'plantillas/navbar.inc.php';
  include_once 'app/ControlSesion.inc.php';
  include_once 'app/Redireccion.inc.php';

  if(isset($_POST['ver_reporte'])){

    $reporte = $_POST['reportes'];
    $cliente = $_POST['cliente'];
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFinal = $_POST['fechaFinal'];
  }
  if(!ControlSesion::sesion_iniciada()){
		Redireccion :: redirigir('index.php');
      }
      
      if(!is_null($fechaInicio)){
        $date = new DateTime($fechaInicio);
        $fechaInicio = $date->format('d/m/Y');
      }
      if(!is_null($fechaFinal)){
        $date = new DateTime($fechaFinal);
        $fechaFinal= $date->format('d/m/Y');
      }
      Conexion :: abrir_conexion();

      switch ($reporte){
          
          case 1:
          $clienteNombre = RepositorioCliente::obtenerCliente(Conexion :: obtener_conexion(),$cliente);
          ?>
         <form method="post" action=""  class="needs-validation" novalidate="">
          <h3>Pedidos por cliente: <?php echo $clienteNombre ->getNombre();?></h3>
          <br>
          <table id="promoTable" class="table table-striped table-sm" style="width:80%;margin:auto">
			<thead class="table table-striped table-sm">
				<th>ID</th>
				<th>Producto</th>
				<th>Total</th>
				<th>Fecha pedido</th>
				<th>Fecha programada</th>
                <th>Fecha de entrega</th>
                <th>Estatus</th>
                <th>Precio</th>
                <th>Cantidad</th>
			</thead>
        <?php

            $resultado = RepositorioReporte:: crearReportePedidosPorCliente(Conexion :: obtener_conexion(),$cliente,$fechaInicio,$fechaFinal);
            foreach ($resultado as $row)
          {
              ?>
              <tr>
                <td>
                <?php echo $row['id_Pedido']; ?>
                </td>
                <td>
                <?php echo $row["Descripcion"]; ?>
                </td>
                <td>
                <?php echo $row["CostoFinal"]; ?>
                </td>
                <td>
                <?php echo  $row["FechaPedido"]; ?>
                </td>
                <td>
                <?php echo  $row["FechaProgramada"]; ?>
                </td>
                <td>
                <?php echo  $row["FechaRealEntrega"];?>
                </td>
                <td>
                <?php echo  $row["_idEstatus"]; ?>
                </td>
                <td>
                <?php echo  $row["Precio"]; ?>
                </td>
                <td>
                <?php echo  $row["Cantidad"]; ?>
                </td>
              </tr>
           
          <?php
          }
          break;
          case 2:
          ?>
          <h3>Pedidos del dia <?php echo $fechaInicio; ?></h3>
          <br>
          <table id="promoTable" class="table table-striped table-sm" style="width:80%;margin:auto">
			<thead class="table table-striped table-sm">
				<th>ID</th>
				<th>Producto</th>
				<th>Total</th>
				<th>Fecha pedido</th>
				<th>Fecha programada</th>
                <th>Fecha de entrega</th>
                <th>Estatus</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Cliente</th>
                <th>Direccion de entrega</th>
			</thead>
        <?php

            $resultado = RepositorioReporte:: crearReportePedidosPorDia(Conexion :: obtener_conexion(),$fechaInicio);
            foreach ($resultado as $row)
          {
              ?>
              <tr>
                <td>
                <?php echo $row['id_Pedido']; ?>
                </td>
                <td>
                <?php echo $row["Descripcion"]; ?>
                </td>
                <td>
                <?php echo $row["CostoFinal"]; ?>
                </td>
                <td>
                <?php echo  $row["FechaPedido"]; ?>
                </td>
                <td>
                <?php echo  $row["FechaProgramada"]; ?>
                </td>
                <td>
                <?php echo  $row["FechaRealEntrega"];?>
                </td>
                <td>
                <?php echo  $row["_idEstatus"]; ?>
                </td>
                <td>
                <?php echo  $row["Precio"]; ?>
                </td>
                <td>
                <?php echo  $row["Cantidad"]; ?>
                </td>
                <td>
                <?php echo  $row["Nombre"]; ?>
                </td>
                <td>
                <?php echo  $row["DireccionEntrega"]; ?>
                </td>
              </tr>
           
          <?php
          }
          break;
          case 3:
          $resultado = RepositorioReporte:: crearReporteProductosVendidos(Conexion :: obtener_conexion(),$fechaInicio,$fechaFinal);
          ?>
          <h3>Productos vendidos del <?php echo $fechaInicio;?>  al  <?php echo $fechaFinal;?></h3>
          <br>
          <table id="promoTable" class="table table-striped table-sm" style="width:80%;margin:auto">
			<thead class="table table-striped table-sm">
				<th>ID</th>
				<th>Producto</th>
                <th>Cantidad</th>
				<th>Total</th>
			</thead>
        <?php

            
            foreach ($resultado as $row)
          {
              ?>
              <tr>
                <td>
                <?php echo $row['_idProducto']; ?>
                </td>
                <td>
                <?php echo $row["Descripcion"]; ?>
                </td>
                <td>
                <?php echo $row["cantidad"]; ?>
                </td>
                <td>
                <?php echo  $row["total"]; ?>
                </td>
              </tr>
           
          <?php
          }
          break;
      }
      Conexion::cerrar_Conexion();
  ?>          
          </table>
          <br>
          
    </div>
    <div style="width:20%;margin: auto">
    <button  type="button" class="btn btn-default" id="btnPrint" name="ver_reporte">Imprimir</button>
    </div>
    <br>
		
    </form>
    
    <?php
	
	include_once 'plantillas/documento-cierre.inc.php';

  ?>
  <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>   
      <script>
	  $(function () {
        $( "#btnPrint" ).click(function() {
        window.print();
            });

      });
</script>
      
      <script src="./Checkout example for Bootstrap_files/jquery-3.3.1.slim.min.js.descarga" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="./Checkout example for Bootstrap_files/popper.min.js.descarga"></script>
    <script src="./Checkout example for Bootstrap_files/bootstrap.min.js.descarga"></script>
    <script src="./Checkout example for Bootstrap_files/holder.min.js.descarga"></script>
    <script>
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          var forms = document.getElementsByClassName('needs-validation');

          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  

</body></html>