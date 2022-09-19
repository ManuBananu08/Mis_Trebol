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
	<title>Trebol Lacteos</title>
</head>
<body>
	
<!--Carrito-->
<aside id="TR_Carrito_1">
	<img src="Imagenes/TrebolCarrito.png" id="TR_Car_Im">
	<input title="boton enviar" alt="boton enviar" src="Imagenes/TrebolX.png" type="image" id="TR_X_2" onclick="CerrarC();" />
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
<!--____________________________________________________________________________________________-->

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
			onclick="TR_Carrito();" onmousemove="Carrito();" onmouseout="Carrito2();" style="margin-top: 5px;"/>
	</nav> 

	<?php 
	    try {
	    $conexion=new PDO('mysql:host=localhost;dbname=mydb','root','');


	    $resultados1=$conexion->query("select * from productos where idCategorias = 2");
	
	    foreach ($resultados1 as $fila)
        {
        	echo '<section class="store">
            <div class="container">
                <div class="items class="row" style="margin-top:30px; margin-left:10px;">
                    <div>
                        <div class="tr_item shadow mb-3">
                            <img class="tr_item-image" src='.$fila["Imagen"];
                            echo '"><h3 class="tr_item-title">'.$fila["Descripcion"];
                            echo '</h3><div class="tr_item-details">
                                <h4 class="tr_item-price">'.$fila["Precio"];
                             echo ' $</h4><button class="tr_boton_Car">AÑADIR</button>
                            </div>
                    </div>';
       	
        }
                  
	    } catch (PDOException $e) {
	        echo "error".$e->getMessage();
	    }
	?>
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
    	function CerrarC(){
      		document.getElementById('TR_Carrito_1').style.display='none';
   		}
    </script>
</html>