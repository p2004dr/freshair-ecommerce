<?php
    session_start();

    $user_logged_in = isset($_SESSION['user']);
?>

<nav>
    <div class="header-container-logo" onclick="location.href='index.php?accio=home'">
        <img src="/images/general/logo.png" alt="FreshAir Logo" width="50px">
        <h1>FreshAir</h1>
    </div>

    <div class="header-container-filter" class="hidden">
        <img src="/images/general/icon-filter.png" alt="Filter Icon" width="50px">
    </div>

    <div class="header-search">
        <form id="search-form" action="#" method="GET">
            <input type="text" placeholder="Buscar productes..." name="search" id="search-input">
            <button type="submit">
                <img src="/images/general/icon-search.png" alt="Buscar" width=10px>
            </button>
        </form>
    </div>

    <div class="header-button" onclick="location.href='index.php?accio=shop-cart'">
        <img src="/images/general/icon-shop-cart.png" alt="Shop Cart Icon" width="39px">
        <span id="cart-count" class="cart-count hidden">0</span>
        <a class="text-button">Cistella</a>

    </div>

    <div class="header-button user-menu">
        <img src="/images/general/icon-user.png" alt="User Icon" width="35px">
        <a id="user-action" class="text-button">
            <?php echo $user_logged_in ? "Compte" : "Inicia sessió"; ?>
        </a>
        <?php if ($user_logged_in): ?>
            <div id="dropdown-menu" class="dropdown hidden">
                <a href="/index.php?accio=account">El meu compte</a>
                <a href="/index.php?accio=orders">Comandes</a>
                <a href="#" id="logout-button" onclick="logout()">Tanca la sessió</a>
            </div>
        <?php endif; ?>
    </div>
</nav>

<div id="login-modal" class="modal hidden">
    <div class="modal-content">
        <span class="close-button" onclick="toggleLoginModal()">&times;</span>
        <h1>Iniciar Sessió</h1>
        <form id="login-form">
            <input type="text" name="email" id="email_login" placeholder="Correu elèctronic">
            <input type="password" name="password" id="password_login" placeholder="Contrasenya">
            <button type="submit" class="form-button">Inicia Sessió</button>
            <p class="error hidden">Error al iniciar sesión.</p>
        </form>
        <p>Encara no tens un compte? - <a class="link" href="/index.php?accio=register">Registra't</a></p>
    </div>
</div>

<script src="./js/nav.js"></script>