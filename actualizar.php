<?php
	include("tabla.php");
    $Pr2=$_POST["Pre2"];
    $Cb2=$_POST["cb"];

	$conexion=new PDO('mysql:host=localhost;dbname=mydb','root','');
	$conexion->query("UPDATE productos SET Precio='$Pr2' where Descripcion='$Cb2'");

	header("Location:tabla.php");
?>