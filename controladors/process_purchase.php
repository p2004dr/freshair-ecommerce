<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once __DIR__ . '/../models/connectDB.php';
    require_once __DIR__ . '/../models/process_purchase.php';

    session_start();

    if (!isset($_SESSION['user'])) {
        http_response_code(403);
        echo "Error: L'usuari no ha iniciat sessió.";
        exit;
    }    

    $user_id = $_SESSION['user']['id'];

    $cookie_cart = $_COOKIE['cart'] ?? '[]';
    $product_ids = json_decode($cookie_cart, true);

    if (!is_array($product_ids) || empty($product_ids)) {
        http_response_code(400);
        echo "Error: El carro es buit.";
        exit;
    }

    $connection = connectDB();

    $result = processPurchase($connection, $user_id, $product_ids);

    echo "S'ha realitzat la compra corrextament";