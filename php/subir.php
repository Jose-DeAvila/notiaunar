<?php 
    session_start();
    $imagen = null;
    $realizado=true;
    include "conexion.php";
    if (isset($_POST['btnEnviar'])){
        $autor = $_SESSION['newsession'];
        $fecha = getdate();
        $title = $_POST['titulo'];
        $facultad = $_POST['facultad'];
        $descripcion = $_POST['descripcion'];
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));    
        $contenido = addslashes($_POST['contenido']);
        if($contenido=="" || $contenido==null){
            $realizado=true+1;
            header("Location: ../inicio.php?realizado=$realizado");
            die();
        }
    
        $query = "INSERT INTO noticias (autor,fecha,titulo,facultad,descripc_breve,img,text_complet) VALUE ('$autor', NOW(), '$title', '$facultad','$descripcion', '$imagen', '$contenido')";
        $resultado = $con->query($query);
        if ($resultado){
            header("Location: ../inicio.php?realizado=$realizado");
        }else{
            $realizado = false;
            header("Location: ../inicio.php?realizado=$realizado");
        }
    }
?>