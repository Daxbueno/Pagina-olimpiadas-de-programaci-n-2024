// Variables globales para el carrito
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
            price: product.price,
            totalPrice: product.price
        };
    }
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
            <div class="cart-item d-flex justify-content-between mb-2">
                <span>${name}</span>
                <div class="d-flex align-items-center">
                    <button class="btn btn-secondary btn-sm decrease" data-name="${name}">-</button>
                    <span class="mx-2">${details.quantity}</span>
                    <button class="btn btn-secondary btn-sm increase" data-name="${name}">+</button>
                    <span class="mx-2">${details.totalPrice.toFixed(2)} $</span>
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
            addToCart({ name: productName, price: cart[productName].price });
        });
    });

    document.querySelectorAll('.decrease').forEach(button => {
        button.addEventListener('click', (event) => {
            const productName = button.getAttribute('data-name');
            if (cart[productName].quantity > 1) {
                cart[productName].quantity -= 1;
                cart[productName].totalPrice -= cart[productName].price;
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
        addToCart({ name: productName, price: productPrice });
    });
});

// Evento para el carrito en el header
document.querySelector('.fa-shopping-cart').addEventListener('click', openCart);