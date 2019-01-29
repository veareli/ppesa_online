<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioPromocion.inc.php';
include_once 'app/RepositorioCliente.inc.php';
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
if(isset($_POST['editar_promocion'])){

    $id = $_POST['id_editar'];
   
    
    Conexion :: abrir_conexion();

    $promocion = RepositorioPromocion:: obtenerPromocion(Conexion :: obtener_conexion(), $id);


?>
    <div class="container" style="width:50%; margin:0 auto">
      <div class="py-5">        
        <h2>Editar Promocion</h2>        
      </div>        
          <form class="needs-validation" form method="post" action="app/modificarPromocion.php">
            <div>
            <label >Producto</label>
            <input disabled type="text" class="form-control" name="descripcion" id="nombre" placeholder="" value="<?php echo $promocion -> getProducto();?>" >
            
            <label >Precio con promocion</label>
            <input type="text" class="form-control" name="descuento" id="nombre" placeholder="" value="<?php echo $promocion -> getDescuento();?>" required="">
            <label >Texto de la promocion</label>
            <input type="text" class="form-control" name="texto" id="texto" placeholder="" value="<?php echo $promocion -> getTexto();?>" required="">
                <br>
                <label>Tipo de cliente disponibles</label>
                <br>
                <?php
                RepositorioCliente::obtenerListaTiposClientes(Conexion :: obtener_conexion());
                Conexion :: cerrar_Conexion();
                ?>
                <br>
                <input type="hidden" name ="id" value="<?php echo $promocion -> getId();?>">
                <br>
                <button class="btn btn-primary btn-md btn-block" name="editar_promocion" type="submit">Guardar</button>
            </div>
          </form>
    </div>
    
    


<?php	
}
?>
