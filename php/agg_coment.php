<?php
    include "conexion.php";
    $id = $_GET['id'];
    session_start();
    $usuario = $_SESSION['newsession'];
    $realizado=true;
    if(isset($_POST['btnEnviar'])){
        $contenido = addslashes($_POST['contenido']);
        if($contenido=="" || $contenido==null){
            $realizado=true+1;
            header("Location: ../noti_complet.php?id=$id&doit=$realizado");
        }
        // petición
        $query = "INSERT INTO comentarios (usuario, fecha, contenido, id_publicacion) VALUES ('$usuario',NOW(),'$contenido','$id')";
        $res = $con->query($query);
        if($res){
            header("Location: ../noti_complet.php?id=$id&doit=$realizado");
        }
        else{
            $realizado=true+1;
            header("Location: ../noti_complet.php?id='$id'&doit=$realizado");
        }
    }
?>