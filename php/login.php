<?php 
	//include "conexion.php";
	$email = htmlentities(addslashes($_POST['correo']));
	$password = htmlentities(addslashes($_POST['password']));
	$contador = 0;
	$base = new PDO("mysql:host=localhost;dbname=notiaunar", "root","26930470");
	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM usuarios where email=:singin";
	$ejecutar = $base->prepare($sql);
	$ejecutar->execute(array(":singin"=>$email));
	while($registro=$ejecutar->fetch(PDO::FETCH_ASSOC)){
		if(password_verify($password,$registro['contrasena'])){
			$contador++;
			session_start();
			$_SESSION["newsession"] = $registro['nombreCompleto'];
		}
	}

	if($contador>0){
		Header("Location: ../inicio.php");	
	}
	else{
		header("Location: ../index.php?n=1");
	}
	$ejecutar->closeCursor();
 ?>