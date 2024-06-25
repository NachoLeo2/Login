<html>
    <head>
        <tittle>borrar1</tittle>
    </head>
    <body>
<?php
include ("dbconn.php");
$sSQL="delete from datos where name ='{$_POST["name"]}'";
mysqli_query ($connect, $sSQL);
?>
<h1> <div align="center">registros borra2</div></h1>
<div align = "center"><a href="lectura.php">Mirá la base pa</a></div>

</body>
</html>