<?php 
    try {
    $conexion=new PDO('mysql:host=localhost;dbname=mydb','root','');


    $resultados1=$conexion->query("select * from productos where idProductos = 1");
    $resultados2=$conexion->query("select * from productos where idProductos = 2");
    $resultados3=$conexion->query("select * from productos where idProductos = 3");
    $resultados4=$conexion->query("select * from productos where idProductos = 4");
    $resultados5=$conexion->query("select * from productos where idProductos = 5");
    $resultados6=$conexion->query("select * from productos where idProductos = 6");

   

    } catch (PDOException $e) {
        echo "error".$e->getMessage();
    }



        session_start();
        if(isset($_SESSION['nombredelusuario']))
        {
            header('location: Trebol_Index.php');
        }

        if(isset($_POST['Iniciar']))
        {
            
            $dbhost="localhost";
            $dbuser="root";
            $dbpass="";
            $dbname="mydb";
            
            $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
            if(!$conn)
            {   
                die("No hay conexión: ".mysqli_connect_error());
            }
            
            $nombre=$_POST['Usuario'];
            $pass=$_POST['Contraseña'];
            
            $query=mysqli_query($conn,"Select * from usuario where  Nom_Usuario = '".$nombre."' and Contraseña = '".$pass."'");
            $nr=mysqli_num_rows($query);
            
            if(!isset($_SESSION['nombredelusuario']))
            {
            if($nr == 1)
            {
                $_SESSION['nombredelusuario']=$nombre;
                header("location: Trebol_Index.php");
            }
            else if ($nr == 0)
            {
                echo "<script>alert('Usuario no Esta registrado');window.location= 'Trebol_Index_Iniciar.php' </script>";
            }
            }
        }

?>

<?php 
    if ($_POST) {
        try {
        $conexion=new PDO('mysql:host=localhost;dbname=mydb','root','');
        $idu;
        $nombre=$_POST["Nombre"];
        $apellidop=$_POST["Apellido_Paterno"];
        $apellidom=$_POST["Apellido_Materno"];
        $usuario=$_POST["Usuario"];
        $contraseña=$_POST["Contraseña"];
        $telefono=$_POST["Telefono"];
        if(isset($_POST['Regh']))
                {
        $instruccion=$conexion->prepare("insert into persona(Nombre,Apell_P,Apell_M,Telefono)values(:nom,:ap,:am,:tel)");
            $instruccion->execute(array(
                ':nom'=>$nombre,
                ':ap'=>$apellidop,
                ':am'=>$apellidom,
                ':tel'=>$telefono,
            ));

            $idusuario=$conexion->query("SELECT * From persona" );
            foreach ($idusuario as $fila)
                {
                    $idu = $fila["idPersona"];
                }

            $instruccion=$conexion->prepare("insert into usuario(Nom_Usuario,Contraseña,Tipo_User,idPersona)values(:nus,:con,'2',:id)");
            $instruccion->execute(array(
                ':nus'=>$usuario,
                ':con'=>$contraseña,
                ':id'=>$idu,
            ));
            
            echo "Insertado";

        }

        } catch (PDOException $e) {
            echo "error".$e->getMessage();
        }
    }
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

    

<!-- Iniciar Secion-->


	<aside id="TR_IniciarS_1">
		<section id="InicioTR">
		    <div id="parte1">
		      <div id="Conocenos"><input title="boton enviar" alt="boton enviar" src="Imagenes/ubicacion.png" type="image" id="Im" onclick="Conocenos();" /></div>
		      <h2 class="parte1h2">Iniciar Secion</h2>
		      <p class="parte1p">Introdusca su nombre de Usuario y contraseña</p>
		      <form method="post">
		        <input type="text" name="Usuario" placeholder="Usuario" class="Tinput"><p></p>
		        <input type="text" name="Contraseña" placeholder="Contraseña" class="Tinput"><p></p>
		        <input type="submit" placeholder="Iniciar Secion" id="IniciarS" name="Iniciar">
		      </form>
		      <p id="Reg">Si no Tienes cuenta <input type="submit" value="Registrate" onclick="Registrate();" class="TR_IS_R"></p>
		      <h2 id="TR1">Bienvenido</h2>
		      <p id="TR2">A la pagina oficial del Trebol</p>
		      <img src="imagenes/TrebolCentro.png" id="Fon">
		    </div>
		    <div id="parte2"> 
		    	<input title="boton enviar" alt="boton enviar" src="Imagenes/TrebolX.png" type="image" id="TR_X_1" onclick="Cerrar();" />
		    </div>
	  	</section>
	</aside>

    

<!--Registrarse-->


	<aside id="TR_IniciarR_2">
		<section id="InicioTR">
		    <div id="parte1">
		      <div id="Conocenos"><input title="boton enviar" alt="boton enviar" src="Imagenes/ubicacion.png" type="image" id="Im" onclick="Conocenos();" /></div>
		      <h2 class="parte1h22">Registrate</h2>
		      <form method="post">
		        <input type="text" name="Nombre" placeholder="Nombre" class="Tinput2"><p></p>
		        <input type="text" name="Apellido_Paterno" placeholder="Apellido Paterno" class="Tinput2"><p></p>
		        <input type="text" name="Apellido_Materno" placeholder="Apellido Materno" class="Tinput2"><p></p>
		        <input type="text" name="Usuario" placeholder="Usuario" class="Tinput2"><p></p>
		        <input type="text" name="Contraseña" placeholder="Contraseña" class="Tinput2"><p></p>
		        <input type="text" name="Telefono" placeholder="Telefono" class="Tinput2"><p></p>
		        <input type="submit" placeholder="Registrarse" id="IniciarS" name="Regh">
		      </form>
		      <p id="Reg">Ya Tienes cuenta <input type="submit" value="Iniciar Secion" onclick="IniciarSecion();" class="TR_IS_R">
		      <h2 id="TR1b">Bienvenido</h2>
		      <p id="TR2b">A la pagina oficial del Trebol</p>
		      <img src="imagenes/TrebolCentro.png" id="Fonb">
		    </div>
		    <div id="parte2"> 
		    	<input title="boton enviar" alt="boton enviar" src="Imagenes/TrebolX.png" type="image" id="TR_X_1" onclick="Cerrar();" />
		    </div>
	  </section>
	</aside>

<!--Conocenos-->
<aside id="TR_IniciarC_3">
	<section id="InicioTR">
	    <div id="parte1">
	      <div id="Conocenos"><img src="imagenes/ubicacion.png" id="Im"></div>
	      <h2 class="parte1h2">Conocenos</h2>
	      <p class="parte1p">Tienda el trebol a tu alcance conosenos Ya! y<br>la calidad de sazón y la suerte tienda el trébol</p>
	      <img src="imagenes/ub.jpg" id="Ub">
	        <p id="RegC"><input type="submit" value="Registrate" onclick="Registrate();" class="TR_IS_R">  <input type="submit" value="Iniciar Secion" onclick="IniciarSecion();" class="TR_IS_R"></p>
	      
	      <h2 id="TR1">Bienvenido</h2>
	      <p id="TR2">A la pagina oficial del Trebol <br><br> Numero: 771747139 <br> Domicilio: Prov. Calle Del Tule 
	      <br> Horario: 9:00 am a 9:00 pm</p>
	      <img src="imagenes/TrebolCentro.png" id="FonC">
	    </div>
	    <div id="parte2"> 
	    	<input title="boton enviar" alt="boton enviar" src="Imagenes/TrebolX.png" type="image" id="TR_X_1" onclick="Cerrar();" />
	    </div>
	</section>
</aside>
<!--Carrito-->
<aside id="TR_Carrito_1">
	<img src="Imagenes/TrebolCarrito.png" id="TR_Car_Im">
	<input title="boton enviar" alt="boton enviar" src="Imagenes/TrebolX.png" type="image" id="TR_X_2" onclick="Cerrar();" />
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

<!--Pagina-->
	<div>
		<nav id="TR_NavP_1">
			<a href="index.php">
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
		<input title="boton enviar" alt="boton enviar" src="Imagenes/TrebolUsuario.png" type="image" id="TP_4" onclick="IniciarSecion();"  onmousemove="Usuario();" onmouseout="Usuario2();" />
	</section>
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

</html>

