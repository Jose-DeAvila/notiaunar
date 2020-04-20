<?php 
    error_reporting(0);
	include "conexion.php";   
    $nombre = $_POST['nombre'];
    $programa = $_POST['programa'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $base = new PDO("mysql:host=localhost;dbname=notiaunar", "root","26930470");
	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM usuarios where email=:singin";
	$ejecutar = $base->prepare($sql);
    $ejecutar->execute(array(":singin"=>$email));
    $registro=$ejecutar->fetch(PDO::FETCH_ASSOC);
    $control = 0;
    if ($email==$registro['email']){
        $control--;
    }
    else{
        $insert = "INSERT INTO usuarios (nombreCompleto,programa,email,contrasena) VALUES ('$nombre','$programa','$email','$password')";
        mysqli_query($con, $insert);
        $control++;
    }
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="../js/alertifyjs/css/themes/bootstrap.css">
     <link rel="stylesheet" href="../js/alertifyjs/css/alertify.css">
     <link rel="stylesheet" href="../css/styles.css">
     <link rel="stylesheet" href="../css/styles-register.css">
     <title></title>
 </head>
 <body>
     <div class="container" style="margin: auto;">
        <div class="logos row">
            <div class="col-md-12">
                <div class="logo-aunar" style="text-align: center; margin-top: 20px; margin-bottom: 100px;">
                    <img src="../imagenes/other/logo-color.png" alt="Logotipo Aunar" width="25%">
                </div>
            </div>
        </div>
        <div class="infor" style="margin-bottom: 100px;">
            <?php if ($control>0){
                echo "<h1 style=\"text-align: center;\">Te has registrado correctamente!</h1>";
                echo "<p style=\"text-align: center;\"> Espera 5 segundos, te redireccionaremos a la página de inicio para que puedas inciar sesión!";
                echo "<p style=\"text-align: center;\"> Si no te ha redireccionado, clickea aquí: <a href=\"../index.php\">Iniciar sesión<a></p>";
                echo '<script> setTimeout(function(){window.location="../index.php"}, 5000); </script>';
            }
            else if ($control<0){
                echo "<h1 style=\"text-align: center;\">No te has podido registrar correctamente!</h1>";
                echo "<p style=\"text-align: center;\"> Espera 5 segundos, te redireccionaremos a la página de registro para que puedas intentarlo nuevamente!";
                echo "<p style=\"text-align: center;\"> Si no te ha redireccionado, clickea aquí: <a href=\"../register.php\">Registro<a></p>";
                echo '<script> setTimeout(function(){window.location="../register.php"}, 5000); </script>';
            }
            ?>
            
        </div>
     </div>
 </body>
 </html>