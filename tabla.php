<!DOCTYPE html>
<html lang="en">
<head>
  <title>Example</title>
  <link rel="shortcut icon" href="Imagenes/TrebolIcono.png">
  <meta charset="utf-8">
</head>
<body>

<a href="tabla3.php">EDITAR</a><br><br>
<a href="tabla4.php">ELIMINAR</a><br><br>

<form method="post" id="miForm" action="tabla2.php">
            <input type="text" name="CBarras" placeholder="CodigoBarras" class="row">
            <input type="text" name="Nom" placeholder="Nombre" class="row">
            <input type="text" name="Pre" placeholder="Precio" class="row">
            <input type="submit" name="enviarr" value="Agregar Nueva Direccion" class="row">
</form><br><br>


<table class="table table-striped" align="center">
  	
		<thead>
		<tr>
			<th>CodigoBarras</th>
			<th>Nombre</th>
			<th>Precio</th>
			
		</tr>
		</thead>
<?php 
$des;

$conexion=new PDO('mysql:host=localhost;dbname=mydb','root','');
$link = new PDO('mysql:host=localhost;dbname=mydb', 'root', ''); // el campo vaciío es para la password. 
foreach ($link->query('SELECT * from productos') as $row){ // aca puedes hacer la consulta e iterarla con each. ?> 
<tr>
	<td><?php echo $row['Descripcion']; 
		$des = $row['Descripcion'];
?></td>
    <td><?php echo $row['DescripcionB'] ?></td>
    <td><?php echo $row['Precio'] ?></td>
 </tr>
<?php
	}
?>
</table>


</body>
</html>

<style type="text/css">

html{
	background-color: #FFE8C9;
}

th{
  padding: 40px;
  padding-bottom: 10px;
  padding-top: 10px;
  bottom: 2px;
  background-color: #232f3e;
  color:#fff;
}

td{
	padding: 30px;
	background-color: #DEDEDE;
}
</style>
