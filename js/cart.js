function afegirACesta(productId) {
    const cart = JSON.parse(getCookie('cart') || '[]');
    cart.push(productId);
    document.cookie = `cart=${JSON.stringify(cart)}; path=/;`;
    
    actualitzarNumerosCistella();
}

function retirarDeCesta(productId) {
    const cart = JSON.parse(getCookie('cart') || '[]');
    const index = cart.indexOf(productId);

    if (index !== -1) {
        cart.splice(index, 1);
    }

    document.cookie = `cart=${JSON.stringify(cart)}; path=/;`;
    
    actualitzarNumerosCistella();
}

function retirarTotalmentDeCesta(productId) {
    const cart = JSON.parse(getCookie('cart') || '[]');

    const updatedCart = cart.filter(itemId => itemId !== productId);

    document.cookie = `cart=${JSON.stringify(updatedCart)}; path=/;`;

    const cartItems = document.querySelectorAll(`.cart-product-item[data-id="${productId}"]`);
    cartItems.forEach(item => item.remove());

    if (updatedCart.length === 0) {
        const cartContainer = document.querySelector('.cart-product-list');
        if (cartContainer) {
            cartContainer.innerHTML = "<p id=no-items-message>No hi ha productes a la cistella.</p>";
        }
    }
}


function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

function sumarProducteCesta(productId, price, quantityElement, priceElement) {
    afegirACesta(productId);

    const currentQuantity = parseInt(quantityElement.textContent, 10);
    const newQuantity = currentQuantity + 1;
    quantityElement.textContent = newQuantity;

    const newPrice = newQuantity * price;
    priceElement.textContent = newPrice.toFixed(2).replace('.', ',') + ' €';
}

function restarProducteCesta(productId, price, quantityElement, priceElement)
{
    const currentQuantity = parseInt(quantityElement.textContent, 10);

    retirarDeCesta(productId);

    if (currentQuantity > 1)
        {
        const newQuantity = currentQuantity - 1;
        quantityElement.textContent = newQuantity;

        const newPrice = newQuantity * price;
        priceElement.textContent = newPrice.toFixed(2).replace('.', ',') + ' €';
    } 
    else
    {
        const cartItem = quantityElement.closest('.cart-product-item');
        if (cartItem) {
            cartItem.remove();
        }
    }
    
    const cart = JSON.parse(getCookie('cart') || '[]');
    if (cart.length == 0) {
        const cartContainer = document.querySelector('.cart-product-list');
        if (cartContainer) {
            cartContainer.innerHTML = "<p id=no-items-message>No hi ha productes a la cistella.</p>";
        }
    }
}
function eliminarProducteCesta(productId) {
    retirarTotalmentDeCesta(productId);

    const cartItem = document.querySelector(`.cart-product-item[data-id="${productId}"]`);
    if (cartItem) {
        cartItem.remove(); 
    }

    const cart = JSON.parse(getCookie('cart') || '[]');
    if (cart.length === 0) {
        const cartContainer = document.querySelector('.cart-product-list');
        if (cartContainer) {
            cartContainer.innerHTML = "<p id=no-items-message>No hi ha productes a la cistella.</p>";
        }
    }
    actualitzarNumerosCistella();
}

function buidarCesta() {
    document.cookie = "cart=[]; path=/;";

    const cartContainer = document.querySelector('.cart-product-list');
    if (cartContainer) {
        cartContainer.innerHTML = "<p id=no-items-message>No hi ha productes a la cistella.</p>";
    }
    actualitzarNumerosCistella();
}

async function realitzarCompra()
{
    const response = await fetch('../controladors/process_purchase.php', { method: 'POST' });

    if (response.ok)
    {
        const data = await response.text();
        window.location.href = '/index.php?accio=confirm';
        buidarCesta();
    }
}
