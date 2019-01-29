<?PHP
$hostname_localhost = "localhost";
$database_localhost = "u710377723_ppesa";
$user_name_localhost = "u710377723_ppesa";
$password_localhost = "x6dhozme";

$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
	$direccion = $_POST["direccion"];
	$telefono = $_POST["contacto"];
	$whatsapp = $_POST["whatsapp"];
	$documento = $_POST["documento"];

	
	$sql="UPDATE Clientes SET Telefono= ?, Whatsapp=?, Direccion = ? WHERE documento=?";
	$stm=$conexion->prepare($sql);
	$stm->bind_param('ssssi',$telefono,$whatsapp,$Direccion);
		
	if($stm->execute()){
		echo "actualiza";
	}else{
		echo "noActualiza";
	}
	mysqli_close($conexion);
?>
