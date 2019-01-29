<?php
	include_once 'app/Conexion.inc.php';
    include_once 'app/RepositorioLinea.inc.php';
    include_once 'app/RepositorioCliente.inc.php';
    include_once 'app/RepositorioProducto.inc.php';
	include_once 'app/Linea.inc.php';
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
        <h2>Agregar Usuario</h2>        
      </div>        
          <form  method="post" action="app/agregarUsuario.php" class="needs-validation" novalidate="">

                <label>Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" required>
                <div class="invalid-feedback">Usuario es necesario.</div>
                <label>Password</label>
                <input type="password" class="form-control" id="pass" name="pass" required>
                <label>Cliente</label>
                <br>

                <?php
                Conexion :: abrir_conexion();
                RepositorioCliente::obtenerListaClientesSinUsuario(Conexion :: obtener_conexion());
                Conexion :: cerrar_Conexion();
                ?>
                <p class="mb-2"></p>
                  <button type="submit" class="btn btn-default" name="guardar_usuario">Guardar</button>
          </form>
    </div>
    <?php
	
	include_once 'plantillas/documento-cierre.inc.php';

  ?>

      
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