<?php
include("dbconn.php");
$password = $_POST['password'];
$name=$_POST['name'];
$email=$_POST['email'];
$has_pass=password_hash($password,PASSWORD_DEFAULT,array("cost"=>10));
date_default_timezone_set("America/Argentina/Buenos_Aires");
$fecha = Date("d/m/y/H:i");
$consulta="insert into datos(name,email,password,fechareg) values('$name','$email','$has_pass','$fecha')";
$resultado=mysqli_query($connect,$consulta);
if($resultado){
    echo"te inscribiste amigo";
}
else{
    echo "le pifiaste";
}

?>