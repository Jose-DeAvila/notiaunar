<?php 

	session_start();

	unset($_SESSION['newsession']);

	header("location:../index.php");

 ?>