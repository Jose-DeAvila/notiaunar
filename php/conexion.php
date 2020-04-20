<?php 
    error_reporting(0);
    $host="localhost";
    $user="root";
    $pw="26930470";
    $db="notiaunar";
    $con = new mysqli($host,$user,$pw,$db);
    if(!$con){
        echo "No se conectó a la base de datos!";
    }
?>