window.onload = function () {
  actualizarCarrito();
};

if (!localStorage.getItem("pedidos-carrito")) {
  localStorage.setItem("pedidos-carrito", JSON.stringify([]));
}
let cart = {};
function updateLocalStorage(producto) {
  pedidos.push(producto);
}

function addToCart(product) {
  const pedidos = JSON.parse(localStorage.getItem("pedidos-carrito"));

  let [newProduct] = pedidos.filter(
    (pedido) => pedido.idProducto == product.idProducto
  );

  if (!newProduct) {
    newProduct = {
      idProducto: product.idProducto,
      name: product.name,
      totalPrice: product.price,
      quantity: 1,
      price: product.price,
    };
    pedidos.push(product);
  } else {
    newProduct.quantity += 1;
    newProduct.totalPrice += product.price;
  }

  const newPedidos = pedidos.map((val) =>
    val.idProducto === product.idProducto ? newProduct : val
  );

  localStorage.setItem("pedidos-carrito", JSON.stringify(newPedidos));
  actualizarCarrito();
}

function actualizarCarrito() {
  const pedidos = JSON.parse(localStorage.getItem("pedidos-carrito"));
  const cantidad = obtenerTotalQuantitys(pedidos);

  document.getElementById("numero-carrito").innerHTML = cantidad;
}

function obtenerTotalQuantitys(pedidos) {
  let total = 0;
  pedidos.forEach((pedido) => {
    total += pedido.quantity;
  });
  return total;
}

document.querySelectorAll(".card-product .boton").forEach((button) => {
  button.addEventListener("click", (event) => {
    event.preventDefault();
    const productName = button.getAttribute("data-name");
    const productPrice = parseFloat(button.getAttribute("data-price"));
    const productId = button.getAttribute("data-id"); // Asumiendo que el ID está en un atributo data-id
    addToCart({
      name: productName,
      price: productPrice,
      idProducto: productId,
    });
  });
});
