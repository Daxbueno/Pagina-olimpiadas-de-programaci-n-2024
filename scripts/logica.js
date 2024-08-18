// Variables globales para el carritooooo
let cart = {};

// Función para agregar productos al carrito
function addToCart(product) {
    const productName = product.name;
    if (cart[productName]) {
        cart[productName].quantity += 1;
        cart[productName].totalPrice += product.price;
    } else {
        cart[productName] = {
            quantity: 1,
            name: product.name,
            idProducto: product.idProducto, // Añadiendo idProducto
            price: product.price,
            totalPrice: product.price
        };
    }
    
    // Mostrar en la consola el ID del producto añadido
    console.log(`Producto añadido al carrito: ${productName} (ID: ${product.idProducto})`);
    
    updateCart();
}

// Función para actualizar el carrito en el modal
function updateCart() {
    const cartItems = document.getElementById('cart-items');
    const totalAmount = document.getElementById('total-amount');
    
    // Limpiar el contenido del modal
    cartItems.innerHTML = '';
    
    // Calcular el total
    let total = 0;
    for (const [name, details] of Object.entries(cart)) {
        cartItems.innerHTML += `
            <div class="">
                <span>${name}</span>
                <div class="">
                    <button class="" data-name="${name}">-</button>
                    <span class="">${details.quantity}</span>
                    <button class="" data-name="${name}">+</button>
                    <span class="">${details.totalPrice.toFixed(2)} $</span>
                </div>
            </div>
        `;
        total += details.totalPrice;
    }
    
    totalAmount.innerText = total.toFixed(2) + ' $';
    attachQuantityChangeEvents();
}

// Función para manejar el aumento y la disminución de la cantidad
function attachQuantityChangeEvents() {
    document.querySelectorAll('.increase').forEach(button => {
        button.addEventListener('click', (event) => {
            const productName = button.getAttribute('data-name');
            cart[productName].quantity++;
            cart[productName].totalPrice = cart[productName].price*cart[productName].quantity
            updateCart();
        });
    });

    document.querySelectorAll('.decrease').forEach(button => {
        button.addEventListener('click', (event) => {
            const productName = button.getAttribute('data-name');
            if (cart[productName].quantity > 1) {
                cart[productName].quantity -= 1;
                cart[productName].totalPrice = cart[productName].price*cart[productName].quantity;
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
    $('#cartModal').modal('show');
}

// Añadir eventos a los botones "Comprar"
document.querySelectorAll('.btn-primary').forEach(button => {
    button.addEventListener('click', (event) => {
        event.preventDefault();
        const productName = button.closest('.card').querySelector('.card-title').innerText;
        const productPrice = parseFloat(button.getAttribute('data-price'));
        const productId = button.getAttribute('data-id'); // Asumiendo que el ID está en un atributo data-id
        addToCart({ name: productName, price: productPrice, idProducto: productId });
    });
});

// Evento para el carrito en el header
document.querySelector('.fa-shopping-cart').addEventListener('click', openCart);

function enviarProductos() {
    const productosJSON = JSON.stringify(cart);
    document.getElementById('productos').value = productosJSON;
    document.getElementById('formProductos').submit(); // Envía el formulario
}