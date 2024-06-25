 <html>
    <body>
        <div align = "center">
        <h1>borrar un registro </h1>
        <br>
<?php

include ("dbconn.php");
echo '<form action="borrar1.php" method="POST"> name <br>';
$sSQL="select name from datos order by name";
$result= mysqli_query ($connect, $sSQL);
echo '<select name= "name" >';
while ($row = mysqli_fetch_array($result))
{
    echo '<option>' .$row["name"];
}
mysqli_free_result ($result);
echo '</select>';
?>
 
<br><br>
<h2><div align = "center"> Vas a borrar todo pa</div></h2>
<input type = "submit" value="borrar">
</div>
</body>
</html>
