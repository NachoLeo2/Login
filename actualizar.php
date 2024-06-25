<html>
    <body>
        <div align = "center">
            <h1>Actualizar</h1>
<?php

include ("dbconn.php");
echo '<form method = "POST" action = "actualizar1.php" >name<br>';
$sSQL = "Select name from datos Order By name";
$Result = mysqli_query($connect, $sSQL);
echo '<select name = "name">';
while ($row = mysqli_fetch_array($Result))
{echo "<option>".$row["name"];}
?>
</select> <br><br><br>

name <br>
<input type = "text" name = "newname"> <br>
email <br>
<input type = "email" name = "newemail"> <br>
<input type = "submit" name = "Actualizar">

</form>
</div>
</body>
</html>