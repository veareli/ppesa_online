<?php
	include_once 'app/Conexion.inc.php';
    include_once 'app/RepositorioCliente.inc.php';
    include_once 'app/RepositorioPromocion.inc.php';
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
        <h2>Agregar Promocion</h2>        
      </div>        
          <form  method="post" action="app/agregarPromocion.php" class="needs-validation" novalidate="">

                <label>Precio del producto con descuento</label>
                <input type="text" class="form-control" id="nombre" name="descuento" required>
                <label>Texto de promocion</label>
                <input type="text" class="form-control" id="texto" name="texto" required>
                <div class="invalid-feedback">Descuento valido es necesario.</div>
                <label>Producto</label>
                <br>
                <?php
                Conexion :: abrir_conexion();
                RepositorioProducto::obtenerListaProductos(Conexion :: obtener_conexion());
                ?>
                <label>Tipo de cliente disponibles</label>
                <br>
                <?php
                RepositorioCliente::obtenerListaTiposClientes(Conexion :: obtener_conexion());
                Conexion :: cerrar_Conexion();
                ?>
                <br>
                  <button type="submit" class="btn btn-default" name="guardar_promo">Guardar</button>
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