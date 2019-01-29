<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioLinea.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

if(!ControlSesion::sesion_iniciada()){
  Redireccion :: redirigir('index.php');
  }
?>
<?php	
if(isset($_POST['editar_linea'])){

    $id = $_POST['id_editar'];
   
    
    Conexion :: abrir_conexion();

    $linea = RepositorioLinea:: obtenerLinea(Conexion :: obtener_conexion(), $id);

    Conexion :: cerrar_Conexion();

?>
    <div class="container" style="width:50%; margin:0 auto">
      <div class="py-5">        
        <h2>Editar Linea/Categoria</h2>        
      </div>        
          <form class="needs-validation" form method="post" action="app/modificarLinea.php">
            <div>
            <label for="firstName">Linea</label>
            <input type="text" class="form-control" name="descripcion" value="<?php echo $linea -> getDescripcion();?>" >

                  <br>      
            <input type="hidden" name ="id" value="<?php echo $linea -> getId();?>">
            <button class="btn btn-primary btn-md btn-block" name="editar_linea" type="submit">Guardar</button>
            </div>
          </form>
    </div>
    
    


<?php	
}
?>
