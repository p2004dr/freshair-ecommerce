<?php
    require_once __DIR__ . '/../models/connectDB.php';
    require_once __DIR__ . '/../models/loginUser.php';

    session_start();

    if (!isset($_POST['email'], $_POST['password']))
    {
        http_response_code(400);
        echo 'Falten dades obligatòries';
        exit;
    }

    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    
    $connection = connectDB();

    $user = loginUser($connection, $email, $password);

    if ($user)
    {
        $_SESSION['user'] = $user;

        http_response_code(200);
        echo 'Inici de sessió complet';
    }
    else
    {
        http_response_code(401);
        echo 'Correu electrònic o contrasenya incorrectes';
    }