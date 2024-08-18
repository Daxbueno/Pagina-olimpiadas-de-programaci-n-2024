// Función para manejar el aumento y la disminución de la cantidad
function attachQuantityChangeEvents() {
  document.querySelectorAll(".increase").forEach((button) => {
    button.addEventListener("click", (event) => {
      const productName = button.getAttribute("data-name");
      cart[productName].quantity++;
      cart[productName].totalPrice =
        cart[productName].price * cart[productName].quantity;
      updateCart();
    });
  });

  document.querySelectorAll(".decrease").forEach((button) => {
    button.addEventListener("click", (event) => {
      const productName = button.getAttribute("data-name");
      if (cart[productName].quantity > 1) {
        cart[productName].quantity -= 1;
        cart[productName].totalPrice =
          cart[productName].price * cart[productName].quantity;
        updateCart();
      } else {
        delete cart[productName];
        updateCart();
      }
    });
  });
}

// Función para abrir el modal del carrito
function openCart() {
  $("#cartModal").modal("show");
}

// Añadir eventos a los botones "Comprar"

// Evento para el carrito en el header
document.querySelector(".fa-shopping-cart").addEventListener("click", openCart);

function enviarProductos() {
  const productosJSON = JSON.stringify(cart);
  document.getElementById("productos").value = productosJSON;
  document.getElementById("formProductos").submit(); // Envía el formulario
}

function updateCart() {
  const cartItems = document.getElementById("cart-items");
  const totalAmount = document.getElementById("total-amount");

  // Limpiar el contenido del modal
  cartItems.innerHTML = "";

  // Calcular el total
  let total = 0;
  for (const [name, details] of Object.entries(cart)) {
    cartItems.innerHTML += `
              <div class="cart-item d-flex justify-content-between mb-2">
                  <span>${name}</span>
                  <div class="d-flex align-items-center">
                      <button class="btn btn-secondary btn-sm decrease" data-name="${name}">-</button>
                      <span class="mx-2">${details.quantity}</span>
                      <button class="btn btn-secondary btn-sm increase" data-name="${name}">+</button>
                      <span class="mx-2">${details.totalPrice.toFixed(
                        2
                      )} $</span>
                  </div>
              </div>
          `;
    total += details.totalPrice;
  }

  totalAmount.innerText = total.toFixed(2) + " $";
  attachQuantityChangeEvents();
}
