<?php

	include("tabla.php");
    $Cb2=$_POST["cb1"];

	$conexion=new PDO('mysql:host=localhost;dbname=mydb','root','');
	$conexion->query("DELETE from productos where Descripcion='$Cb2'");

	header("Location:tabla.php");
?>