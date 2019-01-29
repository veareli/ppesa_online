<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioProducto.inc.php';
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
if(isset($_POST['editar_producto'])){

    $id = $_POST['id_editar'];
   
    
    Conexion :: abrir_conexion();

    $producto = RepositorioProducto:: obtenerProducto(Conexion :: obtener_conexion(), $id);


?>
    <div class="container" style="width:50%; margin:0 auto">
      <div class="py-5">        
        <h2>Editar Producto</h2>        
      </div>        
          <form class="needs-validation" form method="post" action="app/modificarProducto.php">
            <div>
            <label for="firstName">Descripcion</label>
            <input type="text" class="form-control" name="descripcion" id="nombre" placeholder="" value="<?php echo $producto -> getDescripcion();?>" required="">
            
            <label for="firstName">Linea</label>
                <br>
                <?php
                RepositorioLinea::obtenerListaLineas(Conexion :: obtener_conexion());
                Conexion :: cerrar_Conexion();
                ?>
                
            <label for="firstName">Disponibilidad</label>
            <input type="text" class="form-control" name="disp" placeholder="" value="<?php echo $producto -> getDisponibilidad();?>" required="">
            <label for="firstName">Precio</label>
            <input type="text" class="form-control" name="precio" placeholder="" value="<?php echo $producto -> getPrecio();?>" required="">
    
    <br>
                <input type="hidden" name ="id" value="<?php echo $producto -> getId();?>">
                <button class="btn btn-primary btn-md btn-block" name="editar_producto" type="submit">Guardar</button>
            </div>
          </form>
    </div>
    
    


<?php	
}
?>
<script>

    var objSelect = document.getElementById("linea");
    //Set selected
    var tc = <?php echo $producto -> getLinea();?>;
    setSelectedValue(objSelect, tc);

    function setSelectedValue(selectObj, valueToSet) {
        debugger
        for (var i = 0; i < selectObj.options.length; i++) {
            if (selectObj.options[i].value== valueToSet) {
                selectObj.options[i].selected = true;
                return;
            }
        }
    }
    
</script>