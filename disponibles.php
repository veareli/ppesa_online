<!DOCTYPE html>

<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioProducto.inc.php';
include_once 'app/Producto.inc.php';
include_once 'app/obtenerProductos.php';
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

if(!ControlSesion::sesion_iniciada()){
	Redireccion :: redirigir('index.php');
  }

    Conexion::abrir_conexion();	
    $resultado = RepositorioProducto::obtenerTodos2(Conexion::obtener_conexion());
    
    echo '<div style="margin-top:25px"></div>';
    echo '<h3>Actualizar cantidades disponibles</h3>';
    echo "<table class='table table-hover' style='width:80%; margin:auto'>";
    echo "<thead class='table-success'><th>Id</th><th>Producto</th><th>Disponibles</th></thead>";
foreach($resultado as $row)
{
    $id=$row["id_Producto"];
    $producto=$row["Descripcion"];
    $disp=$row["Disponibilidad"];

 
    echo "<form action='app/actualizarDisponibles.php' method='post'>";
 
    echo "<tr><td>$id <input type='hidden' name='id[]' value='$id'></td><td>$producto <input type='hidden' name='producto[]' value='$producto'></td><td><input type='text' name='disp[]' value='$disp'/></td></tr>";
 
 
}
echo '</table><br>';
echo '<div style="margin:auto;width:10%">';
echo "<input class='btn btn-default' type='submit' value='Actualizar'/><br>";
echo '</div>';

echo "<br></form>";

?>


   


</div>