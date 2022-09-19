   
		function tresbarritas(){
      document.getElementById('TR_Usuario_1').style.display='block';
    }

    function Cerrar(){
			document.getElementById('TR_IniciarS_1').style.display='none';
			document.getElementById('TR_IniciarR_2').style.display='none';
			document.getElementById('TR_IniciarC_3').style.display='none';
      document.getElementById('TR_Carrito_1').style.display='none';
		}

    function CerrarTres(){
      document.getElementById('TR_Usuario_1').style.display='none';
    }

		function TR_Carrito(){
			document.getElementById('TR_Carrito_1').style.display='block';
		}

		function IniciarSecion(){
			document.getElementById('TR_IniciarR_2').style.display='none';
			document.getElementById('TR_IniciarC_3').style.display='none';
			document.getElementById('TR_IniciarS_1').style.display='block';
		}

		function Registrate(){
			document.getElementById('TR_IniciarC_3').style.display='none';
			document.getElementById('TR_IniciarS_1').style.display='none';
			document.getElementById('TR_IniciarR_2').style.display='block';
		}

		function Conocenos(){
			document.getElementById('TR_IniciarS_1').style.display='none';
			document.getElementById('TR_IniciarR_2').style.display='none';
			document.getElementById('TR_IniciarC_3').style.display='block';
		}

		function Usuario(){
			document.getElementById('TP_4').src='Imagenes/TrebolUsuario2.png';
		}
		function Usuario2(){
			document.getElementById('TP_4').src='Imagenes/TrebolUsuario.png';
		}

		function Tres(){
			document.getElementById('TR_Nav_5').src='Imagenes/TrebolCategoria2.png';
		}
		function Tres2(){
			document.getElementById('TR_Nav_5').src='Imagenes/TrebolCategoria.png';
		}

		function Lupa(){
			document.getElementById('TR_Nav_4').src='Imagenes/TrebolLupa2.png';
		}
		function Lupa2(){
			document.getElementById('TR_Nav_4').src='Imagenes/TrebolLupa.png';
		}

		function Carrito(){
			document.getElementById('TR_Nav_6').src='Imagenes/TrebolCarrito2.png';
		}
		function Carrito2(){
			document.getElementById('TR_Nav_6').src='Imagenes/TrebolCarrito.png';
		}

//________________________________________________________________________________________________________

// lo que hacemos manu  es dar para que addtocartd que es el boton nosmande se;al cuando escuche  un click

const tr_boton_Carrito_1 = document.querySelectorAll('.tr_boton_Car');
tr_boton_Carrito_1.forEach((tr_boton_Carrito_2) => {
  tr_boton_Carrito_2.addEventListener('click', tr_boton_Carrito);
});

const tr_comprar_1 = document.querySelector('.tr_comprar_1');
tr_comprar_1.addEventListener('click', tr_boton_comprar);


// es toda la informacion que jala el programa  para ponerlo en la compra
const tr_contenedor_1 = document.querySelector(
  '.tr_contenedor_1'
);

function tr_boton_Carrito(event) {
  const button = event.target;
  const item = button.closest('.tr_item');

  const tr_itemTitle = item.querySelector('.tr_item-title').textContent;
  const tr_itemPrice = item.querySelector('.tr_item-price').textContent;
  const tr_itemImage = item.querySelector('.tr_item-image').src;

  // te da los valores recojidos de el titulo imagen y presio  de esa forma se agregan las  cosas  con el src 
  tr_addItem_Carrito(tr_itemTitle, tr_itemPrice, tr_itemImage);
}

//funcion en un inicio recibe los valores  
function tr_addItem_Carrito(tr_itemTitle, tr_itemPrice, tr_itemImage) {
  const tr_elementsTitle = tr_contenedor_1.getElementsByClassName(
    'tr_shoppingCartItemTitle'
  );
  for (let i = 0; i < tr_elementsTitle.length; i++) {
    if (tr_elementsTitle[i].innerText === tr_itemTitle) {
      let tr_elementQuantity = tr_elementsTitle[
        i
      ].parentElement.parentElement.parentElement.querySelector(
        '.tr_cantidad_comprar'
      );
      tr_elementQuantity.value++;
      $('.toast').toast('show');
      tr_actualizacion_total();
      return;
    }
  }


// esto lo que es  el div que contiene toda la  info  dentro del carrito jjejeje
  const tr_Carrito_P = document.createElement('div');
  const tr_Carrito_P_1 = `
  <div class="row tr_carrito_item">
        <div class="col-6">
            <div class="shopping-cart-tr_item d-flex align-items-center h-100 border-bottom pb-2 pt-3">
                <img src=${tr_itemImage} class="shopping-cart-image">
                <h6 class="shopping-cart-tr_item-title tr_shoppingCartItemTitle text-truncate ml-3 mb-0">${tr_itemTitle}</h6>
            </div>
        </div>
        <div class="col-2">
            <div class="shopping-cart-price d-flex align-items-center h-100 border-bottom pb-2 pt-3">
                <p class="tr_item-price mb-0 tr_precio_carrito">${tr_itemPrice}</p>
            </div>
        </div>
        <div class="col-4">
            <div
                class="shopping-cart-quantity d-flex justify-content-between align-items-center h-100 border-bottom pb-2 pt-3">
                <input class="shopping-cart-quantity-input tr_cantidad_comprar" type="number"
                    value="1">
                <button class="TR_Cerrar_2 tr_cerrar" type="button">X</button>
            </div>
        </div>
    </div>`;
  tr_Carrito_P.innerHTML = tr_Carrito_P_1;
  tr_contenedor_1.append(tr_Carrito_P);

  tr_Carrito_P
    .querySelector('.tr_cerrar')
    .addEventListener('click', tr_quitar);

  tr_Carrito_P
    .querySelector('.tr_cantidad_comprar')
    .addEventListener('change', tr_cantidad_cambiar);

  tr_actualizacion_total();
}


// esta funcion lo que hace es  ir sumando el total de todo 
function tr_actualizacion_total() {
  let total = 0;
  const tr_total_carrito = document.querySelector('.tr_total_carrito');

  const shoppingCartItems = document.querySelectorAll('.tr_carrito_item');

  shoppingCartItems.forEach((tr_carrito_item) => {
    const shoppingCartItemPriceElement = tr_carrito_item.querySelector(
      '.tr_precio_carrito'
    );
    const tr_precio_carrito = Number(
      shoppingCartItemPriceElement.textContent.replace('$', '')
    );
    const tr_shoppingCartItemQuantityElement = tr_carrito_item.querySelector(
      '.tr_cantidad_comprar'
    );
    const tr_cantidad_comprar = Number(
      tr_shoppingCartItemQuantityElement.value
    );
    total = total + tr_precio_carrito * tr_cantidad_comprar;
  });
  tr_total_carrito.innerHTML = `${total.toFixed(2)}$`;
}


// quita el  div donde esta todo de  un producto osea la X
function tr_quitar(event) {
  const buttonClicked = event.target;
  buttonClicked.closest('.tr_carrito_item').remove();
  tr_actualizacion_total();
}

function tr_cantidad_cambiar(event) {
  const input = event.target;
  input.value <= 0 ? (input.value = 1) : null;
  tr_actualizacion_total();
}


//el boton de compar da la funcion 
function tr_boton_comprar() {
  tr_contenedor_1.innerHTML = '';
  tr_actualizacion_total();
}
