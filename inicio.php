<?php include "ext.php" ?>
<?php 
error_reporting(0);
include "php/conexion.php";
session_start();
$sesion = $_SESSION['newsession'];
if($sesion == null || $sesion == ''){ ?>
    <head>
        <title>SIN PERMISOS</title>
    </head>
    <body style="background-image: linear-gradient(rgba(4,32,116,0.9), rgba(4,32,116,0.9)), url(imagenes/other/prueba.jpg); background-repeat: no-repeat; background-size: cover;">
        <div class="container" style="height: 100%; background-color: white;">
            <div class="logos row">
                <div class="col-md-12">
                    <div class="logo-aunar" style="text-align: center; margin-top: 20px; margin-bottom: 100px;">
                        <img src="imagenes/other/logo-color.png" alt="Logotipo Aunar" width="25%">
                    </div>
                </div>
            </div>
            <div class="info" style="text-align:center;">
                <h1>NO TIENES PERMISOS PARA ACCEDER AQUÍ</h1>
                <p>Cualquier intento de <b>pirateria</b> y/o intento de <b>hacking</b> será penalizado, y llevado al marco legal. Así que por favor, evita problemas.</p><br><br>
                <p style="text-align:left; margin-left: 40px;">Atentamente, <br> Equipo administrativo ~ Notiaunar</p>
                <a href="php/salir.php" class="btn btn-primary mb-1">VOLVER</a>
                <img style="display: block; margin: auto;" src="imagenes/other/nope.gif"  width="300px" height="200px" alt="">
            </div>
        </div>
    </body>
<?php    die();
}

$sql = "SELECT * FROM usuarios";
$resultado = $con->query($sql);
$registro = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Inicio ~ Notiaunar</title>
    <link rel="stylesheet" href="css/styles-init.css">
</head>
<body>
<script>
    var realizado = <?= $_GET['realizado'] ?>;
    if (realizado==1){
        alertify.success("Noticia subida correctamente!");
    }else{
        alertify.error("La noticia no se subió correctamente!");
    }
</script>
    <?php include "other/header.php"; ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="right col-md-8">
                    <h2 class="encabezado">NOTICIAS ACTUALES</h2>
                    <?php 
                        include "php.conexion.php";
                        $carrera = $_GET['program'];
                        if($carrera=="Informatica" || $carrera=="Contaduria" || $carrera=="Decoracion" || $carrera=="Cocina" ){
                            $query = "SELECT * FROM noticias where facultad='$carrera'";
                            $resultado = $con->query($query);
                        }else{
                            $query = "SELECT * FROM noticias";
                            $resultado = $con->query($query);
                        }
                        while($row = $resultado->fetch_assoc()){
                    ?>
                        <div class="noticia">
                            <div class="row">
                                <div class="imagen-noticia col-md-3">
                                    <img src="data:image/jpg;base64,<?php echo base64_encode($row[img]);?>" alt="">
                                </div>
                                <div class="text-noticia col-md-9">
                                    <h3><?php echo $row['titulo'];?></h3>
                                    <p class="about badge badge-dark"><?php echo $row['fecha'],"  -  ", $row['autor'];?></p><br>
                                    <p class="text-break descrip_breve"><?php echo $row['descripc_breve']?></p>
                                    <a href="noti_complet.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Leer más</a><br>
                                    <p class="facultad badge badge-secondary"><?php echo $row['facultad']?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="left col-md-4 d-none d-sm-block">
                    <h2 class="encabezado">OTROS</h2>
                </div>
            </div>
        </div>
    </main>
    <?php include "other/footer.php"; ?>
</body>
</html>

