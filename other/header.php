<?php
include "../ext.php";
include "../php/conexion.php";
session_start();
$sesion = $_SESSION['newsession'];
?>
<head>
    <link rel="stylesheet" href="../css/styles-init.css">
</head>
<header>
    <nav class="navbar navbar-expand-md navbar-light bg-transparent sticky-top">
        <a style="width:70%;" href="#" class="mr-md-2 col-md-3 navbar-brand">
            <img src="imagenes/other/logo-color.png" class="img-fluid" alt="Logotipo Aunar">
        </a>
        <button class="menu navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navigation">
            <span  class="navbar-toggler-icon"></span>
        </button>
        <div class="links collapse navbar-collapse col-md-10" id="navbarNav">
            <ul class="navbar-nav pull-*-right">
                <li class="navbar-item">
                    <a href="../inicio.php" class="navbar-link">Inicio <span class="sr-only">(actual)</span></a>
                </li>
                <li class="navbar-item">
                    <a href="../inicio.php?program=Informatica" class="navbar-link">Informática</a>
                </li>
                <li class="navbar-item">
                    <a href="../inicio.php?program=Contaduria" class="navbar-link">Contaduria</a>
                </li>
                <li class="navbar-item">
                    <a href="../inicio.php?program=Decoracion" class="navbar-link">Decoración</a>
                </li>
                <li class="navbar-item">
                    <a href="../inicio.php?program=Cocina" class="navbar-link" tabindex="-1" aria-disable="true">Cocina</a>
                </li>
                <li class="navbar-item">
                    <a href="php/salir.php" class="navbar-link" title="Salir"><i class="fas fa-sign-out-alt"></i></a>
                </li>
                <li class="navbar-item">
                    <?php
                    $newConsult = "SELECT tipo FROM usuarios where nombreCompleto='$sesion'";
                    $result = $con->query($newConsult);
                    $register = $result->fetch_assoc();
                    if($register['tipo']==1){
                        echo '<a href="other/noti_crear.php" class="navbar-link" title="Panel"><i class="fas fa-sign-in-alt"></i></a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </nav>
</header>