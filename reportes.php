
<?php
	include_once 'app/Conexion.inc.php';
    include_once 'app/RepositorioCliente.inc.php';
    include_once 'app/RepositorioReporte.inc.php';
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
        ?>
        <div class="x">
        <strong>
        <?php echo $msj?>
        </strong>
        </div>
        <?php
    }
	
?>
<form method="post" action="verReporte.php"  class="needs-validation" novalidate="">
	<div class="jumbotron" style="margin:30px;10px;30px;10px">
		<h1 class="display-5">Reportes</h1>	
		<p class="lead">Generador de reportes</p>	
        <br>
        
    <br>	
	</div>
    <div style="width:50%;margin:auto">
    <label for="firstName">Seleccionar reporte</label>
                <br>
    <select class="custom-select" name="reportes" id="dropDownReportes" required>
        <option value="">Seleccione:</option>
        <option value="1">Pedidos por cliente</option>;
        <option value="2">Pedidos por dia</option>;
        <option value="3">Productos vendidos</option>;                    
    </select>
    <div class="invalid-feedback">Seleccionar un reporte.</div>
    <label id="lblCliente">Cliente</label>
    <br>
    <?php
                Conexion :: abrir_conexion();
                RepositorioCliente::obtenerListaClientes(Conexion :: obtener_conexion());
                Conexion :: cerrar_Conexion();
    ?>
    
    <label id="lblInicio">Desde</label>
    <br>
    <input class="form-control" type="date" id="fechaInicio" name="fechaInicio">
	
	<label id="lblFinal">Hasta</label>
    <br>
    <input class="form-control" type="date" id="fechaFinal" name="fechaFinal" >
    
    
    <br>
		<button type="submit" class="btn btn-default" name="ver_reporte">Generar reporte</button>
	
    
    </div>
    </form>	

    
		
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link href="css/error.css" rel="stylesheet">
		
    </body>

 
 
</html>
<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>   
      <script>
	  $(function () {
		  
		  var seleccionado = 0;
          ocultarTodo();

	  $('#dropDownReportes').change(function(){
		  debugger
			seleccionado = $('#dropDownReportes').val();

					switch (seleccionado) { 
						case "1": 
                        ocultarTodo();
                        $('#lblCliente').show();
                            $('#dropDownClientes').show();
                            $('#lblInicio').show();
							$('#lblFinal').show();
							$('#fechaInicio').show();
							$('#fechaFinal').show();

							break;
						case "2": 
                        ocultarTodo();
                        $('#lblInicio').show();
							$('#fechaInicio').show();
							
							break;
						case "3": 
                        ocultarTodo();
                        $('#lblInicio').show();
							$('#lblFinal').show();
							$('#fechaInicio').show();
							$('#fechaFinal').show();
							break;								
						
					}
			
			
        });

        function ocultarTodo(){
            $('#lblCliente').hide();
          $('#lblInicio').hide();
          $('#lblFinal').hide();
		  $('#fechaInicio').hide();
		  $('#fechaFinal').hide();
          $('#dropDownClientes').hide();

        }
		
		



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
  


