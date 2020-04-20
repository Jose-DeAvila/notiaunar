<?php
    include "conexion.php";
    $realizado = true;
    if(isset($_POST['btnModificar'])){
        $usuario = $_POST['usuario'];
        $tipo_act = $_POST['tipo'];

        // Peticion
        $query = "UPDATE usuarios SET tipo='$tipo_act' where nombreCompleto='$usuario'";
        $res = $con->query($query);
        if($res){
            header("Location: ../other/noti_crear.php?realizado=$realizado");
        }
        else{
            $realizado+=1;
            header("Location: ../other/noti_crear.php?realizado=$realizado");
        }
    }
?>