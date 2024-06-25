
<html>
    <head>
        <link rel="stylesheet" href="estilo.css">
    </head>
<body>
    <div align = "center" class = "container">
        <div align = "center" class = "input">
        <form  action="registrar.php" method="POST">
            <h1>suscribete</h1>
            <div align = "center" class = "name">
            <input type="text" name="name">
            <label for="name">Nombre</label></div>
            <div align = "center" class = "email"><input type="email" name="email"></div>
            <div align = "center" class = "password"><input type="password" name="password"></div>
            <div align = "center" class = "submit"><input type="submit" value="register"></div>
        </div>
        </form>
            <br>
            <a href="lectura.php"> lista registros </a> <br>
            <a href="actualizar.php"> Actualizar Cuenta </a> <br>
            <a href="borrar.php"> Borrar Cuenta </a> <br>
    </div>
</body>
</html>