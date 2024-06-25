<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            include ("dbconn.php");
            $name = $_POST ['name'];
            $newemail = $_POST ['newemail'];
            $newname = $_POST ['newname'];

            date_default_timezone_set("America/Argentina/Buenos_Aires");
            $fecha = Date("d/m/y/H:i");
            $fechareg = "registrar.php";
            $sSQL = "Update datos set email = '$newemail', name = '$newname', fechareg = '$fechareg' where name = '$name'";
            mysqli_query($connect, $sSQL);
        ?>

        <h1><div align = "center">Registro Actualizado</div></h1>
        <div align = "center"><a href="lectura.php">Visualizar Contenido de la base</a></div>
    </body>
</html>