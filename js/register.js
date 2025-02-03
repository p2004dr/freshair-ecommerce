const form = document.getElementById('register-form');

form.addEventListener('submit', async function (event) {
    event.preventDefault();

    const formData = new FormData(form);

    try {
        const response = await fetch('../controladors/register.php', {
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
            document.querySelector('.error-reg').textContent = result;
            document.querySelector('.error-reg').classList.remove('hidden');
        }
    } catch (error) {
        console.error('Error en la solicitud:', error);
        document.querySelector('.error-reg').textContent = 'Error al conectar con el servidor.';
        document.querySelector('.error-reg').classList.remove('hidden');
    }
});
