<?php   
include "../php/conexion.php";
session_start();
$session = $_SESSION['newsession'];
$sql = "SELECT * FROM usuarios WHERE nombreCompleto LIKE '$session'";
$resultado = $con->query($sql);
$result = $resultado->fetch_assoc();
if ($_SESSION['newsession']=="" || $_SESSION['newsession']==null || $result['tipo']<1){ ?>
    <head>
        <title>SIN PERMISOS</title>
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../js/alertifyjs/css/themes/bootstrap.css">
        <link rel="stylesheet" href="../js/alertifyjs/css/alertify.css">
        <link rel="stylesheet" href="../css/styles.css">

        <script src="https://kit.fontawesome.com/a2a22ec152.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="..\js\bootstrap.min.js"></script>
        <script src="../js/alertifyjs/alertify.min.js"></script>
    </head>
    <body style="background-image: linear-gradient(rgba(4,32,116,0.9), rgba(4,32,116,0.9)), url(../imagenes/other/prueba.jpg); background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
        <div class="container" style="height: 100%; background-color: white;">
            <div class="logos row">
                <div class="col-md-12">
                    <div class="logo-aunar" style="text-align: center; margin-top: 20px; margin-bottom: 100px;">
                        <img src="../imagenes/other/logo-color.png" alt="Logotipo Aunar" width="25%">
                    </div>
                </div>
            </div>
            <div class="info" style="text-align:center;">
                <h1>NO TIENES PERMISOS PARA ACCEDER AQUÍ</h1>
                <p>Cualquier intento de <b>pirateria</b> y/o intento de <b>hacking</b> será penalizado, y llevado al marco legal. Así que por favor, evita problemas.</p><br><br>
                <p style="text-align:left; margin-left: 40px;">Atentamente, <br> Equipo administrativo ~ Notiaunar</p>
                <a href="../index.php" class="btn btn-primary mb-1">VOLVER</a>
                <img style="display: block; margin: auto;" src="../imagenes/other/nope.gif"  width="300px" height="200px" alt="">
            </div>
        </div>
    </body>
<?php
die();
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Publicación Noticias ~ Notiaunar</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../js/alertifyjs/css/themes/bootstrap.css">
    <link rel="stylesheet" href="../js/alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../js/alertifyjs/alertify.min.js"></script>
    <script src="../js/ckeditor_full/ckeditor.js"></script>
</head>
<body style="background-image: linear-gradient(rgba(4,32,116,0.9), rgba(4,32,116,0.9)), url(../imagenes/other/prueba.jpg); background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
<script>
    var doit = <?= $_GET['realizado'] ?>;
    if (doit==1){
        alertify.success("Datos actualizados correctamente!");
    }else{
        alertify.error("Los datos no se pudieron actualizar!");
    }
</script>
    <div class="container mb-5" style="background-color: white;"><br><br>
        <div class="titulo">
            <h1 class="titulo text-center">CREAR NOTICIA</h1>
        </div><br>
        <form action="../php/subir.php" method="post" onSubmit="return validarFor();" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="titulo" class="col-sm-1 col-form-label col-form-label-lg">TITULO</label>
                <div class="col-md-11">
                    <input type="text" name="titulo" class="form-control form-control-lg" id="titulo" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label col-form-label-lg">DESCRIPCION</label>
                <div class="col-md-10">
                    <input maxlength="300" type="text" name="descripcion" class="form-control form-control-lg" id="description" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="facultad" class="col-sm-2 col-form-label col-form-label-lg" title="En esta zona colocará la facultad a la que va dirigido este artículo">FACULTAD</label>
                <div class="col-md-10">
                    <select name="facultad" id="facultad" class="form-control form-control-lg" required>
                        <option value="">SELECCIONE FACULTAD</option>
                        <option value="General">GENERAL</option>
                        <option value="Informatica">INGENIERIA INFORMATICA</option>
                        <option value="Contaduria">CONTADURIA PUBLICA</option>
                        <option value="Decoracion">DECORACION DE INTERIORES</option>
                        <option value="Cocina">COCINA NACIONAL E INTERNACIONAL</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="img" class="col-sm-3 col-form-label col-form-label-lg">SELECCIONAR IMAGEN</label>
                <div class="col-md-9 d-flex align-items-center">
                    <input type="file" name="imagen" id="imagen" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="editor1" class="col-sm-12 col-form-label col-form-label-lg">CONTENIDO</label>
                <textarea name="contenido" id="editor1" required></textarea>
            </div>
            <br><br>
            <div class="form-group row d-flex justify-content-between" style="width: 50%; margin: auto;">
                <input type="submit" value="SUBIR ARTICULO"  name="btnEnviar" class="btn btn-primary">
                <a href="../inicio.php" class="btn btn-primary">VOLVER</a>
            </div>
        </form>
        <script>
            CKEDITOR.replace( 'editor1',{
                lang: 'es',
                skin: 'moono-lisa',
                alloweedContent: true,
                ignoreEmptyParagraph: false,
                enterMode: CKEDITOR.ENTER_BR
            });
            function validarFor(){
            var contenido = document.getElementsByName("editor1")[0].value;
            if (contenido==""){
                alertify.error("Debes completar todos los campos para publicar la noticia!");
                return false;
                }
            }
        </script>
        <br>
    </div>
    <div class="container" style="background-color: white;"><br><br>
        <h1 class="titulo text-center">CREAR ADMINISTRADOR</h1>
        <div class="configuracion"><br><br>
            <form action="../php/modificar.php" method="post">
                <label for="usuario" class="label col-form-label">Seleccionar usuario</label>
                <select name="usuario" id="usuario" class="form-control form-control-lg">
                    <option value="">Selecciona un usuario</option>
                    <?php
                    $query = "SELECT nombreCompleto,tipo FROM usuarios";
                    $res1 = $con->query($query);
                    while ($rw1 = $res1->fetch_assoc()){ ?>
                        <option value="<?= $rw1['nombreCompleto'] ?>"><?= $rw1['nombreCompleto'] ?></option>
                        <?php
                    }
                    ?>
                </select><br><br>
                <label for="tipo" class="label col-form-label">Tipo de usuario</label>
                <select name="tipo" id="tipo" class="form-control form-control-lg">
                    <option value="0">Tipo 0</option>
                    <option value="1">Tipo 1</option>
                </select><br><br>
                <div class="btn d-flex justify-content-center">
                    <input type="submit" value="Modificar" name="btnModificar" class="btn btn-primary">
                </div>
            </form>
        </div>
        <br><br>
    </div>
</body>
</html>