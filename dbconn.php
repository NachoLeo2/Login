<?php
    $server="localhost";
    $userdb="root";
    $passdb="";
    $dbname="registro";
    $connect=mysqli_connect($server,$userdb,$passdb,$dbname);
    if($connect->connect_error){
        die("conection Failed".$connect->connect_error);

    }
?>