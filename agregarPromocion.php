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
	
?>
    <div class="container" style="width:50%; margin:0 auto">
      <div class="py-5">        
        <h2>Agregar Cliente</h2>        
      </div>        
          <form class="needs-validation" novalidate="">
            <div>
                <label for="firstName">Producto</label>
                <br>
                <select id="listaProductos"></select>
                <br>               
                <label for="firstName">Descuento</label>
                <input type="text" class="form-control" id="direccion" placeholder="" value="" required="">                
                <p class="mb-4"></p>
                <button class="btn btn-primary btn-md btn-block" type="submit">Guardar</button>
            </div>
          </form>
    </div>
 

      
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./Checkout example for Bootstrap_files/jquery-3.3.1.slim.min.js.descarga" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="./Checkout example for Bootstrap_files/popper.min.js.descarga"></script>
    <script src="./Checkout example for Bootstrap_files/bootstrap.min.js.descarga"></script>
    <script src="./Checkout example for Bootstrap_files/holder.min.js.descarga"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
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