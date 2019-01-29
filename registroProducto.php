<?php
	include_once 'app/Conexion.inc.php';
    include_once 'app/RepositorioLinea.inc.php';
    include_once 'app/RepositorioProducto.inc.php';
	include_once 'plantillas/documento-declaracion.inc.php';
  include_once 'plantillas/navbar.inc.php';
  include_once 'app/ControlSesion.inc.php';
  include_once 'app/Redireccion.inc.php';

  if(!ControlSesion::sesion_iniciada()){
		Redireccion :: redirigir('index.php');
	  }
  
  ?>
<script>

    </script>  
    <div class="container" style="width:50%; margin:0 auto">
      <div class="py-5">        
        <h2>Agregar Producto</h2>        
      </div>        
          <form  method="post" action="app/agregarProducto.php" class="needs-validation" novalidate="">

                <label >Descripcion</label>
                <input type="text" class="form-control" id="nombre" name ="descripcion" required>
                <div class="invalid-feedback">Descripcion valida es necesario.</div>
                <label>Linea/Categoria</label>
                <br>
                <?php
                Conexion :: abrir_conexion();
                RepositorioLinea::obtenerListaLineas(Conexion :: obtener_conexion());
                Conexion :: cerrar_Conexion();
                ?>
                <label >Disponibilidad</label>
                <input type="text" class="form-control" id="nombre" name="disp" required>
                <div class="invalid-feedback">Disponibilidad es necesario.</div>
                <label for="firstName">Precio</label>
                <input type="text" class="form-control" id="nombre" name="precio" placeholder="" value="" required>
                
                <p class="mb-2"></p>
                  <button type="submit" class="btn btn-default" name="guardar_producto">Guardar</button>
          </form>
    </div>
 

      
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