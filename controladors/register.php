<?php
    require_once __DIR__ . '/../models/connectDB.php';
    require_once __DIR__ . '/../models/registerUser.php';

    session_start();

    $user = htmlspecialchars($_POST['user']);
    $email = htmlspecialchars($_POST['email']);
    $adress = htmlspecialchars($_POST['adress']);
    $population = htmlspecialchars($_POST['population']);
    $password = htmlspecialchars($_POST['password']);
    $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
    $zipCode = htmlspecialchars($_POST['zipCode']);
    
    if ($user == '' || $email == '' || $adress == '' || $population == '' || $zipCode == '' || $password == '' || $confirmPassword == '')
    {
        http_response_code(400);
        echo 'Falten dades obligatòries';
        exit;
    }
    
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    if (!$email)
    {
        http_response_code(400);
        echo 'El correu electrònic no és vàlid';
        exit;
    }
    if (strlen($adress) > 30) {
        http_response_code(400);
        echo 'L\'adreça no pot superar els 30 caràcters';
        exit;
    }
    
    if (strlen($population) > 30) {
        http_response_code(400);
        echo 'La població no pot superar els 30 caràcters';
        exit;
    }

    if (!is_numeric($zipCode) || strlen($zipCode) !== 5) {
        http_response_code(400);
        echo 'El codi postal ha de ser un número de 5 dígits';
        exit;
    }

    $zipCode = intval($_POST['zipCode']);
    
    if (emailExists($email))
    {
        http_response_code(400);
        echo 'Ja existeix un compte amb aquest correu';
        exit;
    }

    
    if ($confirmPassword != $password)
    {
        http_response_code(400);
        echo 'Les contrasenyes han de ser iguals';
        exit;
    }
    
    $connection = connectDB();

    $result = registerUser($connection, $email, $user, $adress, $population, $zipCode, $password);
    
    if ($result)
    {
        $_SESSION['user'] = [
            'name' => $user,
            'email' => $email
        ];
    
        http_response_code(200);
        echo 'Registre complet';
    }
    else
    {
        http_response_code(500);
        echo 'Error al registrar-se a la base de dades';
    }