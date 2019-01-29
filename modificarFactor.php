<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioFactor.inc.php';
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
if(isset($_POST['editar_factor'])){

    $id = $_POST['id_editar'];
   
    
    Conexion :: abrir_conexion();

    $factor = RepositorioFactor:: obtenerFactor(Conexion :: obtener_conexion(), $id);

    Conexion :: cerrar_Conexion();

?>
    <div class="container" style="width:50%; margin:0 auto">
      <div class="py-5">        
        <h2>Editar Factor</h2>        
      </div>        
          <form class="needs-validation" form method="post" action="app/modificarFactor.php">
            <div>
            <label >Fecha</label>
            <input disabled type="text" class="form-control" name="dia" value="<?php echo $factor -> getDia();?>" >
            <label >Factor</label>
            <input type="text" class="form-control" name="valor" value="<?php echo $factor -> getFactor();?>" >

                  <br>      
            <input type="hidden" name ="id" value="<?php echo $factor -> getId();?>">
            <button class="btn btn-primary btn-md btn-block" name="editar_factor" type="submit">Guardar</button>
            </div>
          </form>
    </div>
    
    


<?php	
}
?>
