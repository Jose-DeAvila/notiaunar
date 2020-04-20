<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <?php require_once "ext.php" ?>
    <link rel="stylesheet" href="css/styles-register.css">
    <title>NOTIAUNAR ~ REGISTRARSE</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="left_notiaunar col-md-6">
                <img src="imagenes/login/notiaunar.png" alt="left_notiaunar" width="87%">
            </div>
            <div class="col-md-6">
                <div class="title1">
                    <h1 class="text-center">REGISTRARSE</h1>
                </div>
                <form id="frmRegistro" action="php/registro.php" method="post">
                    <div class="formulario">
                    <div class="nombreCompleto">
                         <label for="nombreCompleto" class="label">Nombre Completo:</label>
                         <input type="text" name="nombre" id="nombre" class="input form-control" required>
                     </div>
                     <div class="programa">
                         <label for="programa" class="label">Programa:</label>
                         <select name="programa" id="programa" class="select form-control" required>
                             <option value="">Selecciona una opción:</option>
                             <option value="inginfor">Ingeniería Informática</option>
                             <option value="contaduria">Contaduría Pública</option>
                             <option value="cocina">Cocina Nacional e Internacional</option>
                             <option value="decoracion">Decoración de interiores</option>
                         </select>
                     </div>
                     <div class="correo">
                         <label for="correo" class="label">Correo electrónico</label>
                         <input type="email" name="email" id="email" class="input form-control" required>    
                     </div>
                     <div class="password">
                         <label for="password" class="label">Contraseña: </label>
                         <input type="password" name="password" id="password"  class="input form-control" required>
                     </div>
                    <div class="botones">
                        <input type="submit" class="registrarse btn btn-primary" id="" value="REGISTRARSE">
                        <a href="index.php" class="back btn btn-primary">VOLVER</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>