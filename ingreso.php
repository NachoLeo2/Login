<?php
// Conexion con la base
//$connect = mysqli_connect("localhost", "root", "", "nusuario"); 
include ("dbconn.php");
// Obtener las credenciales del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Verificar si el name$name existe en la base de datos
$sql = "SELECT * FROM datos WHERE email = '$email'";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $has_pass = $row['password'];

    if (password_verify($password, $has_pass)) {
        // Contraseña correcta, iniciar sesión
    
        session_start();
        $_SESSION["email"] = $email;
        header("Location: accesocorrecto.php");
    } else {
        // Contraseña incorrecta
        echo "Contraseña incorrecta.";
    }
} else {
    // Usuario inexistente
    echo "Usuario inexistente.";
}

mysqli_close($connect);
?>
