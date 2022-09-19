<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>adad</title>
</head>
<body>
<?php
$link = new PDO('mysql:host=localhost;dbname=mydb', 'root', ''); // el campo vaciío es para la password. 
?>

<?php

        //_________________________________________________________
           if ($_POST) {
                try {
                $conexion=new PDO('mysql:host=localhost;dbname=mydb','root','');
                $Cb=$_POST["CBarras"];
                $No=$_POST["Nom"];
                $Pr=$_POST["Pre"];

                if(isset($_POST['enviarr']))
                        {
       
                    $Direc8=$conexion->query("SELECT * From productos");
                        foreach ($Direc8 as $fila)
                        {   
                            $idCo = $fila["idProductos"];
                        }

                    $instruccion=$conexion->prepare("insert into productos(	Descripcion,	DescripcionB,Precio,idMarca,idCategorias)values(:Cal,:Nu,:Co,1,1)");
                    $instruccion->execute(array(
                        ':Cal'=>$Cb,
                        ':Nu'=>$No,
                        ':Co'=>$Pr,
                    ));
                    
                    echo "Insertado";

                }

                } catch (PDOException $e) {
                    echo "error".$e->getMessage();
                }
            }
        //_________________________________________________________
            header("Location:tabla.php");
        ?>
</body>
</html>