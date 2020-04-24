<?php 
	include "conexion.php";
	$email = htmlentities(addslashes($_POST['correo']));
	$password = htmlentities(addslashes($_POST['password']));
	$contador = 0;
	$sql = "SELECT * FROM usuarios where email='$email'";
	$res = $con->query($sql);
	while($reg=$res->fetch_assoc()){
		if(password_verify($password,$reg['contrasena'])){
			$contador++;
			session_start();
			$_SESSION["newsession"] = $reg['nombreCompleto'];
		}
	}
	if($contador>0){
		Header("Location: ../inicio.php");	
	}
	else{
		header("Location: ../index.php?n=1");
	}
 ?>