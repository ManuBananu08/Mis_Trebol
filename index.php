<?php 
    error_reporting(0);
    try {
    $conexion=new PDO('mysql:host=localhost;dbname=mydb','root','');


    $resultados1=$conexion->query("select * from productos where idProductos = 1");
    $resultados2=$conexion->query("select * from productos where idProductos = 2");
    $resultados3=$conexion->query("select * from productos where idProductos = 3");
    $resultados4=$conexion->query("select * from productos where idProductos = 4");
    $resultados5=$conexion->query("select * from productos where idProductos = 5");
    $resultados6=$conexion->query("select * from productos where idProductos = 6");


   session_start();

    } catch (PDOException $e) {
        echo "error".$e->getMessage();
    }

    if(isset($_SESSION['nombredelusuario']))
            {
                
            }
            else
            {
                header('location: Trebol_Index_Iniciar.php');
            }

            if(isset($_POST['cerrarrr']))
            {
                session_destroy();
                header('location: Trebol_Index_Iniciar.php');
            }

            $usuarioingresado = $_SESSION['nombredelusuario'];

    $idu;
    $idd;

    $idCo;
    $DireccionUs;

    $CalleU;
    $NumeroU;
    $ColoniaU;

    $idusuario=$conexion->query("SELECT * From Usuario where Nom_Usuario ='".$usuarioingresado."'" );
    foreach ($idusuario as $fila)
        {
            $idu = $fila["idUsuario"];
        }

    $Direc=$conexion->query("SELECT * From direccion where  idPersona ='".$idu."'" );
?>

<!-- Trebol Tienda En Linea -->
<!DOCTYPE html>
<html>
<head>
	<!-- Boobstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<!-- Fuentes -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@900&family=Roboto:wght@500&display=swap" rel="stylesheet">

	<!-- Imagen, css -->
	<link rel="shortcut icon" href="Imagenes/TrebolIcono.png">
	<link rel="stylesheet" type="text/css" href="Trebol_CSS.css">
	<title>Trebol Tienda En Linea</title>
</head>
<body>

<!--Carrito-->
<aside id="TR_Carrito_1">
	<img src="Imagenes/TrebolCarrito.png" id="TR_Car_Im">
	<input title="boton enviar" alt="boton enviar" src="Imagenes/TrebolX.png" type="image" id="TR_X_2" onclick="CarritoCer();" />
	<div id="TR_BarC_1"></div>
	 <!-- tabla donde estan los articulos -->
    <section class="shopping-cart">
        <div class="container">
            <h1 id="TR_letras">Tu Carrito</h1>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="shopping-cart-header">
                        <h6>Producto</h6>
                    </div>
                </div>
                <div class="col-2">
                    <div class="shopping-cart-header">
                        <h6 class="text-truncate">Precio</h6>
                    </div>
                </div>
                <div class="col-4">
                    <div class="shopping-cart-header">
                        <h6>Cantidad</h6>
                    </div>
                </div>
            </div>
            <!-- ? contenedoor -->
            <div class="shopping-cart-items tr_contenedor_1">
            </div>


            
            <!-- END TOTAL -->

            <!-- Mensaje de compra realizada -->
            <div class="modal fade" id="comprarModal" tabindex="-1" aria-labelledby="comprarModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="comprarModalLabel">Gracias por su compra</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Pronto recibirá su pedido</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
	<div id="TR_BarC_2"></div>
	<!-- el sumatorio del total -->
            <div class="row">
                <div class="col-12">
                    <div class="shopping-cart-total d-flex align-items-center">
                        <p class="mb-0">Total</p>
                        <p class="ml-4 mb-0 tr_total_carrito">$0</p>
                        <div class="toast ml-auto bg-info" role="alert" aria-live="assertive" aria-atomic="true"
                            data-delay="2000">
                            <div class="toast-header">
                                <!-- mensaje de se agrgo correctamente o algo asi  -->
                                <span>✅</span>

                                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="toast-body text-white">
                                Se aumentó correctamente la cantidad
                            </div>
                        </div>
                        <button class="btn btn-success ml-auto tr_comprar_1" type="button" data-toggle="modal"
                            data-target="#comprarModal">Comprar</button>
                    </div>
                </div>
            </div>

</aside>
<!--Usuario-->

<div id="TR_Usuario_1">
    <div id="TR_Usuario_2">
        <input title="boton enviar" alt="boton enviar" src="Imagenes/TrebolX.png" type="image" id="TR_X" onclick="CerrarTres();" />
        <img src="imagenes/Usuario.png" style="width: 150px; height: 150px; margin-top: 60px; margin-left: 70px;">
        <?php
                echo "<h1 style='margin-left:30%; color: #d0d3d6;'>$usuarioingresado </h1>";
                
        ?>  
        <h1 ></h1>
        <form method="POST">
            <input type="submit" value="Cerrar sesión" name="cerrarrr" style="padding: 5px; border-radius: 5px; border:none; background-color: #d0d3d6 ; color: #232f3e; margin-left: 90px;" />
        </form>
        <div id="dis"></div>
    </div>
    <div id="TR_Usuario_3">

        <h2>Direcciones</h2>
        <?php

            foreach ($Direc as $fila)
        {   
            $CalleU = $fila["Calle"];
            $NumeroU = $fila["Numero"];

            $idd = $fila["idDireccion"];
        }

        $DirecC=$conexion->query("SELECT * From Colonia where  idColonia  ='".$idd."'" );
        foreach ($DirecC as $fila)
        {   
            $ColoniaU = $fila["Colonia"];
            $idCo = $fila["idColonia"];
        }

        echo "<p> $CalleU $NumeroU $ColoniaU</p>" ;



        //_________________________________________________________
            if ($_POST) {
                try {
                $conexion=new PDO('mysql:host=localhost;dbname=mydb','root','');
                $Call=$_POST["Calle1"];
                $Num=$_POST["Numero1"];
                $Col=$_POST["Colonia1"];

                if(isset($_POST['enviarr']))
                        {
       
                    $instruccion=$conexion->prepare("insert into colonia(Colonia)values(:colo)");
                    $instruccion->execute(array(
                        ':colo'=>$Col,
                    ));

                    $Direc8=$conexion->query("SELECT * From Colonia");
                        foreach ($Direc8 as $fila)
                        {   
                            $idCo = $fila["idColonia"];
                        }

                    $instruccion=$conexion->prepare("insert into direccion(Calle,Numero,idColonia,idPersona)values(:Cal,:Nu,:Co,:id)");
                    $instruccion->execute(array(
                        ':Cal'=>$Call,
                        ':Nu'=>$Num,
                        ':Co'=>$idCo,
                        ':id'=>$idu,
                    ));
                    
                    echo "Insertado";

                }

                } catch (PDOException $e) {
                    echo "error".$e->getMessage();
                }
            }
        //_________________________________________________________
        ?>

        <button id="Nueva_Dic" style="padding: 5px; border-radius: 5px; border:none; background-color: #d0d3d6; color: #232f3e; float: right; margin-top: 100px; margin-right: 10px; " onclick="NDirec();">Nueva Direccion</button>
        
    </div>
    <div id="TR_Usuario_4" style="width: 500px; height: 400px; position: absolute; background-color:#fff1a2; margin-left: 900px; margin-top: 200px; border-radius: 10px; box-shadow: 0px 0px 20px 1px black; padding-top: 50px; display: none;">

        <style type="text/css">
           #TR_Usuario_4 input{
                text-align: center;
                padding: 5px; 
                border-radius: 5px; 
                border:none; 
                background-color: #232f3e; 
                color: #fff1a2;
                margin-top: 10px;
                margin-left: 150px;
           }

           #TR_Usuario_3{
                width: 470px;
                height: 270px;
                position: absolute;
                margin-left: 24%;
                margin-top: 2%;
                background-color: #232f3e;
                box-shadow: 0px 0px 20px 1px black;
                border-radius: 2px;
                color: #d0d3d6;
            }

            #TR_Usuario_3 h2{
                margin-left: 150px;
                margin-top: 20px;
            }
            #TR_Usuario_3 p{
                margin-left: 120px;
                margin-top: 20px;
            }
           #TR_Usuario_4 input::placeholder{
                color: #fff1a2;
           }

           #dis{
                width: 50px;
                height: 1400px;
                margin-top: -300px;
                margin-left: 300px;    
                background-color: #d0d3d6;
                box-shadow: 0px 0px 20px 1px black;
                float: left;
            }
        </style>
        <form method="post">
            <input type="text" name="Calle1" placeholder="Calle" class="row">
            <input type="text" name="Numero1" placeholder="Numero" class="row">
            <input type="text" name="Colonia1" placeholder="Colonia" class="row">
            <input type="submit" name="enviarr" value="Agregar Nueva Direccion" class="row">
        </form>
    </div>
</div>
<!--Pagina-->
	<div>
		<nav id="TR_NavP_1">
			<a href="Trebol_Index.php">
                <img src="Imagenes/TrebolCentro.png" id="TR_Centro">
                <img src="Imagenes/TrebolNombre.png" id="TR_Nombre_1">         
            </a>
            <div id="TR_Sec_2" >
                <a href="Clase_1.php"><input type="submit" name="FYV" value="Frutas Y Verduras" class="TR_Sec_1"></a>
                <a href="Clase_2.php"><input type="submit" name="L" value="Lacteos" class="TR_Sec_1"></a>
                <a href="Clase_3.php"><input type="submit" name="E" value="Enlatados" class="TR_Sec_1"></a>
                <a href="Clase_4.php"><input type="submit" name="DYC" value="Dulces Y Chatarra" class="TR_Sec_1"></a>
                <a href="Clase_5.php"><input type="submit" name="P" value="Papeleria" class="TR_Sec_1"></a>
                <a href="Clase_6.php"><input type="submit" name="O" value="Otros" class="TR_Sec_1"></a>
            </div>
		</nav>
		<nav id="TR_NavS_1">
			<input type="image" title="boton enviar" alt="boton enviar" src="Imagenes/TrebolCarrito.png" id="TR_Nav_6"
            onclick="TR_Carrito();" onmousemove="Carrito();" onmouseout="Carrito2();" style="margin-top: 5px;" />
		</nav>
	</div>
	<section>
		<div id="TR_Nav_1">
            <input title="botonTresBarras" src="Imagenes/TrebolCategoria.png" type="image" id="TR_Nav_5" onclick="tresbarritas();" onmousemove="Tres();" onmouseout="Tres2();"/>

			<form id="TR_Nav_2" action="Clase_Producto.php" method="post">
				<input type="text" placeholder="Buscar..." id="TR_Nav_3" name="TR_Bus">
				<input title="boton enviar" alt="boton enviar" src="Imagenes/TrebolLupa.png" type="image" id="TR_Nav_4" onmousemove="Lupa();" onmouseout="Lupa2();" />
			</form>
		</div>
		<img src="Imagenes/YaAbrimos.jpg" id="TR_Img_1">

		<div>
			<div id="TR_Productos_E_1">
				<h2>Productos Estrella</h2>
			</div>
<section class="store">
	<div class="container">
        <div class="items">
        	<div class="row">
    <div id="Tr_Parte_1a">
                    <div class="col-12 col-md-6">
                        <div class="tr_item shadow mb-4">
                            <img class="tr_item-image" src="./Imagenes/img/TR_nutela.png">
                            <h3 class="tr_item-title">
                                <?php 
                                     foreach ($resultados1 as $fila)
                                        {
                                            echo '<td>'.$fila["Descripcion"];
                                    ?>
                            </h3>
                            <div class="tr_item-details">
                                <h4 class="tr_item-price">
                                    <?php 
                                            echo '<td>'.$fila["Precio"];
                                        }
                                    ?> $
                                </h4>
                                <button class="tr_boton_Car">AÑADIR</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="tr_item shadow mb-4">
                            <img class="tr_item-image" src="./Imagenes/img/TR_Pan_Bimbo_Blanco.png">
                            <h3 class="tr_item-title">
                                <?php 
                                     foreach ($resultados2 as $fila)
                                        {
                                            echo '<td>'.$fila["Descripcion"];
                                    ?>
                            </h3>

                            <div class="tr_item-details">
                                <h4 class="tr_item-price">
                                    <?php 
                                            echo '<td>'.$fila["Precio"];
                                        }
                                    ?> $
                                </h4>
                                <button class="tr_boton_Car">AÑADIR</button>
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="tr_item shadow mb-4">
                            <img class="tr_item-image" src="./Imagenes/img/TR_Leche_lala.png">
                            <h3 class="tr_item-title">
                                <?php 
                                     foreach ($resultados3 as $fila)
                                        {
                                            echo '<td>'.$fila["Descripcion"];
                                ?>
                            </h3>

                            <div class="tr_item-details">
                                <h4 class="tr_item-price">
                                    <?php 
                                            echo '<td>'.$fila["Precio"];
                                        }
                                    ?> $
                                </h4>
                                <button class="tr_boton_Car">AÑADIR</button>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    <div id="Tr_Parte_1b">

                    <div class="col-12 col-md-6">
                        <div class="tr_item shadow mb-4">
                            <img class="tr_item-image" src="./Imagenes/img/TR_Chetos_Puffs.png">
                            <h3 class="tr_item-title">
                                <?php 
                                     foreach ($resultados4 as $fila)
                                        {
                                            echo '<td>'.$fila["Descripcion"];
                                ?>
                            </h3>

                            <div class="tr_item-details">
                                <h4 class="tr_item-price">
                                    <?php 
                                            echo '<td>'.$fila["Precio"];
                                        }
                                    ?> $
                                </h4>
                                <button class="tr_boton_Car">AÑADIR</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="tr_item shadow mb-4">
                            <img class="tr_item-image" src="./Imagenes/img/TR_Chetos_Crunchy.png">
                            <h3 class="tr_item-title">
                                <?php 
                                     foreach ($resultados5 as $fila)
                                        {
                                            echo '<td>'.$fila["Descripcion"];
                                ?>
                            </h3>
                            <div class="tr_item-details">
                                <h4 class="tr_item-price">
                                    <?php 
                                            echo '<td>'.$fila["Precio"];
                                        }
                                    ?> $
                                </h4>
                                <button class="tr_boton_Car">AÑADIR</button>
                            </div>
                        </div>
                    </div>
                <div class="row">
	                <div class="col-12 col-md-6">
	                    <div class="tr_item shadow mb-4">
	                        <img class="tr_item-image" src="./Imagenes/img/TR_Coca_Vidrio.png">
	                        <h3 class="tr_item-title">
                                <?php 
                                     foreach ($resultados6 as $fila)
                                        {
                                            echo '<td>'.$fila["Descripcion"];
                                ?>   
                            </h3>
	                        <div class="tr_item-details">
	                            <h4 class="tr_item-price">
                                    <?php 
                                            echo '<td>'.$fila["Precio"];
                                        }
                                    ?> $   
                                </h4>
	                            <button class="tr_boton_Car">AÑADIR</button>
	                        </div>
	                    </div>
	                </div>
	            </div>
    </div>

        </div>
    </div>
</div>
</section>
		</div>
	</section>


</body>
    <script src="Trebol_Js.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        function CarritoCer() {
            document.getElementById('TR_Carrito_1').style.display='none';
        }

        function NDirec(){
            document.getElementById('TR_Usuario_4').style.display='block';
        }
    </script>
    <style type="text/css">
        #TR_Usuario_2{
            background-color: #232f3e;
        }
    </style>
</html>

