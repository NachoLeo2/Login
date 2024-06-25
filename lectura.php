<HTML>
<HEAD>
<TITLE>lectura.php</TITLE>
</HEAD>
<BODY>
<h1><div align="center">Lectura de la tabla</div></h1>
<br>
<br>
<?php

include("dbconn.php");

$sql="SELECT * from datos";
$result=mysqli_query($connect,$sql);

?>
<table align="center">
<tr>
<th>nombre</th>
<th>email</th>
<th>fechareg</th>
</tr>
<?php
//Mostramos los registros
while ($row=mysqli_fetch_array($result))
{
echo '<tr><td>'.$row["name"].'</td>';
echo '<td>'.$row["email"].'</td>'; 
echo '<td>'.$row["fechareg"].'</td></tr>';
}
mysqli_free_result($result)
?>
</table>

<div align="center">
<br> </br>
<a href="form.php">Añadir un nuevo registro</a><br>
<a href="actualizar.php">Actualizar un registro existente</a><br>
<a href="borrar.php">Borrar un registro</a><br>
</div>

</BODY>
</HTML>