<?php 
error_reporting(0);
session_start();
if ($_SESSION['newsession'] != null){
    header("Location: inicio.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "ext.php" ?>
    <title>NOTIAUNAR ~ INICIAR SESION</title>
</head>
<body>
    <div class="container">
        <div class="princip row">
            <div class="left_notiaunar col-md-6">
                <img src="imagenes/login/notiaunar.png" alt="left_notiaunar" width="87%">
            </div>
            <div class="login col-md-6">
                <div class="title">
                    <h1 class="text-center">INICIAR SESION</h1>
                </div>
                <div class="formulario">
                    <form action="php/login.php" method="post">
                        <div class="correo">
                            <label for="correo" class="label">Correo electrónico: </label>
                            <input type="email" name="correo" id="correo" class="input form-control" required>
                        </div>
                        <div class="password">
                            <label for="password" class="label">Contraseña: </label>
                            <input type="password" name="password" id="password" class="input form-control" required>
                            <a href="#">¿Olvidaste tu contraseña?</a>
                        </div>
                        <div class="botones">
                            <input type="submit" class="btn btn-primary" id="entrarSistema" value="INICIAR SESION">
                            <a href="register.php" class="signup btn btn-primary">REGISTRARSE</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var control = "<?= addslashes($control) ?>";
        console.log(control);
        if (control>0){
            alertify.success("Registrado correctamente!");
        }
        else{ 
            alertify.alert("MENSAJE DE BIENVENIDA", "BIENVENIDO A NOTIAUNAR, TU SISTEMA DE NOTICIAS!");
        }
    </script>
</body>
</html>