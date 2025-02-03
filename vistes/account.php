<?php
    if (!isset($user_info)) {
        ?>
        <h2>Error: No se encontraron datos del usuario.</h2>;
        <?php
        exit;
    }
?>

<div class="user-info">
    <div class="user-info-container">
        <form class="user-profile" onsubmit="return false">
            <label hidden>User Id</label>
            <input id="user-id" type="text" hidden value="<?php echo htmlspecialchars($user_info['id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">

            <label>Nom d'usuari</label>
            <input id="name" type="text" value="<?php echo htmlspecialchars($user_info['nom'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" onchange="enableSubmitButton()">

            <label>Correu electrònic</label>
            <input id="mail" type="email" value="<?php echo htmlspecialchars($user_info['mail'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" onchange="enableSubmitButton()">

            <label>Població</label>
            <input id="city" type="text" value="<?php echo htmlspecialchars($user_info['poblacio'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" onchange="enableSubmitButton()">

            <label>Adreça</label>
            <input id="address" type="text" value="<?php echo htmlspecialchars($user_info['direccio'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" onchange="enableSubmitButton()">

            <label>Codi Postal</label>
            <input id="postal_code" type="number" value="<?php echo htmlspecialchars($user_info['cp'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" onchange="enableSubmitButton()">
            
            <button id="submit-button" class="form-button-user" disabled onclick="submitChanges()">Enviar cambios</button>
        </form>
    </div>
</div>
