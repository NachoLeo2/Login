<?php 
//Conexion con la base
$connect = mysqli_connect("localhost","root","","registro");
$email = $_GET['e'];
$token = $_GET['t'];

$c = "SELECT new_pass FROM recover WHERE email='$email' AND token='$token' LIMIT 1 ";
$f = mysqli_query( $connect, $c );
$a = mysqli_fetch_assoc($f);
if( ! $a ){
	echo $_SESSION['error'] = 'Solicitud no encontrada';
	//header("Location: ../);
	die( );
}

//OBTENEMOS LA CLAVE Y ACTUALIZAMOS AL USUARIO
$clave = $a['new_pass'];
//$clave_=sha1($clave);
$clave_ = password_hash($clave,PASSWORD_DEFAULT, array("cost"=>10));
$c2 = "UPDATE datos SET password='$clave_' WHERE email='$email' LIMIT 1";
mysqli_query($connect, $c2);

//ELIMINAR ESTA SOLICITUD DE RECUPERO

$c3 = "DELETE FROM recover WHERE email='$email' LIMIT 1";
mysqli_query($connect, $c3);


echo $_SESSION['rta'] = 'Contraseña actualizada satisfactoriamente, ya se puede loguear';
//header("Location: ../9.5/index.php");


?>