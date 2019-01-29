<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
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
if(isset($_POST['editar_usuario'])){

    $id = $_POST['id_editar'];
   
    
    Conexion :: abrir_conexion();

    $usuario = RepositorioUsuario:: obtenerUsuarioId(Conexion :: obtener_conexion(), $id);

    Conexion:: cerrar_Conexion();
    



?>
    <div class="container" style="width:50%; margin:0 auto">
      <div class="py-5">        
        <h2>Editar Usuario</h2>        
      </div>        
            <form  method="post" action="app/modificarUsuario.php" class="needs-validation" novalidate="">

        <label>Usuario</label>
        <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario -> getUsuario();?>" required>
        <div class="invalid-feedback">Usuario es necesario.</div>
        <label>Password</label>
        <input type="password" class="form-control" id="password" name="password" value="<?php echo $usuario -> getPassword();?>" required>
        <label>Cliente</label>
        <input type="text" class="form-control" id="cliente" name="cliente" value="<?php echo $usuario -> getCliente();?>" required>

        <p class="mb-2"></p>
        <input type="hidden" name ="id_editar" value="<?php echo $usuario -> getId();?>">
        <button type="submit" class="btn btn-default" name="editar_usuario">Guardar</button>
        </form>
    </div>
    

    


<?php	
}
?>
