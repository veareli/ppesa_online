
<?php
	include_once 'app/Conexion.inc.php';
	include_once 'app/RepositorioNombreApp.inc.php';
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
<form method="post" action="app/modificarNombre.php" class="needs-validation" novalidate="">
<div style="width:75%;margin:auto;padding-top:20px">
        <h3 class="display-5">Nombre app movil</h1>
        <br>
        <label>Nombre</label>
        <?php 
        Conexion::abrir_conexion();
        $nombre=RepositorioNombreApp::obtenerNombre(Conexion::obtener_conexion())	?>
        <input type="text" class="form-control" id="nombre" name="nombre" required value="<?php echo $nombre[0]["Nombre"];?>">
        <div class="invalid-feedback">
                  Nombre valido es necesario.
                </div>
        <input type="hidden" name ="id_nombre" value="<?php echo $nombre[0]["id"];?>">                
        <button type="submit" class="btn btn-default" name="guardar_nombre">Guardar</button>					
		</div>

</form>

		
        
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
  
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
	<link href="css/mensajes.css" rel="stylesheet">
</html>

