function enableSubmitButton() {
    const submitButton = document.getElementById('submit-button');
    submitButton.disabled = false;
    submitButton.style.backgroundColor = '#272B3B';
}

function submitChanges() {
    const name = document.getElementById('name').value;
    const mail = document.getElementById('mail').value;
    const city = document.getElementById('city').value;
    const address = document.getElementById('address').value;
    const postalCode = document.getElementById('postal_code').value;

    fetch('../controladors/change_user_info.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            nom: name,
            mail: mail,
            poblacio: city,
            direccio: address,
            cp: postalCode,
        }),
    })
    .then(async (response) => {
        const result = await response.text(); // Procesar como texto
        if (response.ok) {
            alert(result || 'Dades del usuari actualitzades correctament.');
            window.location.reload();
        } else {
            console.error('Error del servidor:', result);
            alert(result || 'Hem tingut un error alhora de actualitzar les dades.');
        }
    })
    .catch((error) => {
        console.error('Error de xarxa o servidor:', error);
        alert('No es va poder connectar amb el servidor.');
    });
}
