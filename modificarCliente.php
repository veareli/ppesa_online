<?php
include_once 'app/Conexion.inc.php';
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
if(isset($_POST['editar_cliente'])){

    $id = $_POST['id_editar'];
   
    
    Conexion :: abrir_conexion();

    $cliente = RepositorioCliente:: obtenerCliente(Conexion :: obtener_conexion(), $id);

   // Conexion :: cerrar_Conexion();

?>
    <div class="container" style="width:50%; margin:0 auto">
      <div class="py-5">        
        <h2>Editar Cliente</h2>        
      </div>        
          <form class="needs-validation" form method="post" action="app/modificarCliente.php">
            <div>
            <label for="firstName">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" value="<?php echo $cliente -> getNombre();?>" required="">
            <label for="firstName">Direccion de entrega</label>
            <input type="text" class="form-control" name="direccion" placeholder="" value="<?php echo $cliente -> getDireccion();?>" required="">
            <label>Tipo de cliente </label>
                <br>
                <?php
                RepositorioCliente::obtenerListaTiposClientes(Conexion :: obtener_conexion());
                Conexion :: cerrar_Conexion();
                ?>
                <br>
            <label for="firstName">Telefono</label>
            <input type="text" class="form-control" name="telefono" placeholder="" value="<?php echo $cliente -> getTelefono();?>" required="">
            <label for="firstName">Whatsapp</label>
            <input type="text" class="form-control" name="whatsapp" placeholder="" value="<?php echo $cliente -> getWhatsapp();?>" required="">
    
    <br>
                <input type="hidden" name ="id" value="<?php echo $cliente -> getId();?>">
                <button class="btn btn-primary btn-md btn-block" name="editar_cliente" type="submit">Guardar</button>
            </div>
          </form>
    </div>
    



<?php	
}
?>
<script>

    var objSelect = document.getElementById("tipo");
    //Set selected
    var tc = <?php echo $cliente -> getTipoCliente();?>;
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