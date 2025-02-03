<?php
    require_once __DIR__ . '/../models/connectDB.php';
    require_once __DIR__ . '/../models/getOrders.php';
    
    $connection = connectDB();

    session_start();

    if (!isset($_SESSION['user'])) {
        http_response_code(403);
        echo "Error: L'usuari no ha iniciat sessió.";
        exit;
    }    

    $user_id = $_SESSION['user']['id'];

    error_log($user_id);

    $order = getLastOrder($connection, $user_id);

    include __DIR__ . '/../vistes/show_last_order.php';