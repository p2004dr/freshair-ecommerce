const loginForm = document.getElementById('login-form');

loginForm.addEventListener('submit', async function (event)
{
    event.preventDefault();

    const formData = new FormData(loginForm);

    try {
        const response = await fetch(`../controladors/login.php`, {
            method: 'POST',
            body: formData
        });

        const result = await response.text();

        if (response.ok)
        {
            window.location.href = '/index.php';
        }
        else
        {
            document.querySelector('.error').textContent = result;
            document.querySelector('.error').classList.remove('hidden');
        }
    }
    catch (error)
    {
        console.error('Error en la solicitud:', error);
        document.querySelector('.error').textContent = 'Error al conectar con el servidor.';
        document.querySelector('.error').classList.remove('hidden');
    }
});

async function searchProducts()
{
    try 
    {
        const searchValue = document.getElementById('search-input').value.trim();

        const response = await fetch(`../controladors/list_products.php?search=${searchValue}`, {
            method: 'GET'
        });
        const html = await response.text();

        const response_header = await fetch(`../controladors/show_welcome_category.php?search=${searchValue}`, {
            method: 'GET'
        });
        const html_welcome = await response_header.text();

        const categorySection = document.getElementById('category-section');
        categorySection.classList.add('hidden');
        
        const productSection = document.getElementById('product-section');
        productSection.classList.add('hidden');

        const header = document.querySelector('header');
        header.classList.remove('hidden');

        const welcome_header = document.querySelector('.welcome-header');
        welcome_header.innerHTML = html_welcome;
        
        const productsSection = document.getElementById('products-section');
        productsSection.classList.remove('hidden');
        productsSection.innerHTML = html;
    } 
    catch (error)
    {
        console.error('Error al carregar productes:', error);
    }
}

function toggleLoginModal()
{
    $('#login-modal').toggleClass('hidden');
}

$(document).ready(function () {
    const $userMenuButton = $('.header-button.user-menu');
    const $dropdownMenu = $('#dropdown-menu');
    const $userAction = $('#user-action');

    const userLoggedIn = $userAction.text().trim() === 'Compte';

    if (userLoggedIn)
    {
        $userMenuButton.on('click', function (event){
            event.stopPropagation();
            $dropdownMenu.toggleClass('hidden');
        });

        $(document).on('click', function (event) {
            if (!$userMenuButton.is(event.target) && !$userMenuButton.has(event.target).length) {
                $dropdownMenu.addClass('hidden');
            }
        });
    }
    else
    {
        $userMenuButton.on('click', function () {
            toggleLoginModal();
        });
    }

    actualitzarNumerosCistella();
});


async function logout()
{
    try
    {
        const response = await fetch('../controladors/logout.php', {
            method: 'GET',
        });

        const result = await response.text();

        if (response.ok)
            {
            window.location.href = '/index.php';
        }
        else
        {
            document.querySelector('.error').textContent = result;
            document.querySelector('.error').classList.remove('hidden');
        }
    }
    catch (error)
    {
        console.error('Error al cerrar sesión:', error);
        document.querySelector('.error').textContent = 'Error al conectar con el servidor.';
        document.querySelector('.error').classList.remove('hidden');
    }
}

function actualitzarNumerosCistella() {
    const cart = JSON.parse(getCookie('cart') || '[]');
    const cartCount = cart.length;

    const cartCountElement = document.getElementById('cart-count');

    if (cartCount > 0) {
        cartCountElement.textContent = cartCount;
        cartCountElement.style.display = 'inline-block';
        cartCountElement.classList.remove('hidden');
    } else {
        cartCountElement.style.display = 'none';
        cartCountElement.classList.add('hidden');
    }
}
