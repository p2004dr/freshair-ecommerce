async function loadProducts(categoryId)
{
    try 
    {
        const response = await fetch(`../controladors/list_products.php?category_id=${categoryId}`, {
            method: 'GET'
        });

        const html = await response.text();

        const response_header = await fetch(`../controladors/show_welcome_category.php?category_id=${categoryId}`, {
            method: 'GET'
        });

        const html_welcome = await response_header.text();

        const categorySection = document.getElementById('category-section');
        categorySection.classList.add('hidden');

        const productsSection = document.getElementById('products-section');
        productsSection.classList.remove('hidden');
        productsSection.innerHTML = html;

        const welcome_header = document.querySelector('.welcome-header');
        welcome_header.innerHTML = html_welcome;
    } 
    catch (error)
    {
        console.error('Error al carregar productes:', error);
    }
}

async function loadProduct(productId)
{
    const response = await fetch(`../controladors/show_product.php?product_id=${productId}`,
        {
        method: 'GET'
    })

    const html = await response.text();

    try 
    {
        const categorySection = document.getElementById('category-section');
        categorySection.classList.add('hidden');

        const productsSection = document.getElementById('products-section');
        productsSection.classList.add('hidden');

        const welcome_header = document.querySelector('header');
        welcome_header.classList.add('hidden');

        const productSection = document.getElementById('product-section');
        productSection.classList.remove('hidden');
        productSection.innerHTML = html;

    } 
    catch (error)
    {
        console.error('Error al carregar el producte:', error);
    }
}

document.getElementById("search-form").addEventListener("submit", function(event) {
    event.preventDefault();
    searchProducts();
});