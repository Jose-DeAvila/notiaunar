<?php 
include "ext.php";
include "php/conexion.php";
session_start();
$session = $_SESSION['newsession'];
$id = $_GET['id'];
$query = "SELECT * FROM noticias where id='$id'";
$resultado = $con->query($query);
$reg = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles-noti_comple.css">
    <script src="js/ckeditor_basic/ckeditor.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <title><?= $reg['titulo'];?> - Notiaunar</title>
</head>
<body>
<script>
    var doit = <?= $_GET['doit'] ?>;
    if (doit==1){
        alertify.success("Comentario subido exitosamente!");
    }else{
        alertify.error("Comentario no subido!");
    }
</script>
    <?php include "other/header.php"; ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="noticia col-md-8">
                    <h1 class="titulo-noticia"><?= $reg['titulo'];?></h1>
                    <div class="img-noti">
                        <img src="data:image/jpg;base64,<?php echo base64_encode($reg['img']); ?>" alt="">
                    </div>
                    <div class="description">
                        <h5 class="subtitulo">Descripción: </h5>
                        <p class="descripcion"><?= $reg['descripc_breve'];?></p>
                    </div>
                    <div class="contenido">
                        <h5 class="titulo-cont">Contenido: </h5>
                        <p class="contenido"><?= $reg['text_complet'];?></p>
                    </div>
                    <div class="coment">
                        <h3 class="coment__title">COMENTARIOS</h3>
                        <div class="insert">
                            <h5 class="usuario"><?= $session ?></h5>
                            <form action="php/agg_coment.php?id=<?= $id ?>" method="post">
                                <textarea name="contenido" id="editor1" required></textarea>
                                <input type="submit" value="Comentar" class="btn btn-primary mt-1 mb-5" name="btnEnviar">
                            </form>
                            <script>
                                CKEDITOR.replace('editor1',{
                                    lang: 'es',
                                    skin: 'moono-lisa',
                                    allowedContent: true,
                                    ignoreEmptyParagraph: false,
                                    enterMode: CKEDITOR.ENTER_BR
                                });
                            </script>
                        </div>
                        <?php
                        include "php/conexion.php";
                        $query = "SELECT * FROM comentarios where id_publicacion='$id'";
                        $result = $con->query($query);
                        if (!$result){
                            echo "<h5>No hay comentarios para mostrar</h5>";
                        }
                        while ($rw = $result->fetch_assoc()){ ?>
                            <div class="coment">
                                <h5 class="usuario"><?= $rw['usuario'] ?></h5>
                                <div class="contenido">
                                    <p class="content"><?= $rw['contenido'] ?></p>
                                </div>
                                <div class="info-coment">
                                    <p class="fecha"><?= $rw['fecha']?></p>
                                </div>
                            </div><br><br>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="mt-5 col-md-4">
                    <h5 class="mb-3">Entradas relacionadas</h5>
                    <?php 
                        $peti = "SELECT * FROM noticias where id!='$id' limit 3";
                        $res = $con->query($peti);
                        while($row = $res->fetch_assoc()){ ?>
                            <div class="relacionadas">
                                <div class="noti-rel">
                                    <div class="img">
                                        <img src="data:image/jpg;base64,<?= base64_encode($row[img])?>" alt="">
                                    </div>
                                    <div class="text-rel">
                                        <span class="titulo"><?= $row['titulo']?></span>
                                        <span class="descrip"><?= $row['descripc_breve']?></span>
                                    </div>
                                </div>
                                <a href="noti_complet.php?id=<?= $row['id'] ?>" role="button" class="btnmas btn btn-primary btn-sm">Leer más</a>
                            </div>
                        <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <?php include "other/footer.php"; ?>
</body>
</html>