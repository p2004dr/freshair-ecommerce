<?php
    require_once __DIR__ . '/../models/connectDB.php';
    require_once __DIR__ . '/../models/getProducts.php';
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $cookie_cart = $_COOKIE['cart'] ?? '[]';
    $product_ids = json_decode($cookie_cart, true);

    if (!is_array($product_ids) || empty($product_ids))
    {
        $productos = [];
    }
    else
    {
        $productos = [];

        $quantities = array_count_values($product_ids);

        foreach ($quantities as $product_id => $quantity)
        {
            $connection = connectDB();
            $producto = getProduct($connection, $product_id);
            if ($producto)
            {
                $productos[] = [
                    'info' => $producto,
                    'quantitat' => $quantity
                ];
            }
        }
    }

    $user_logged_in = isset($_SESSION['user']);

    include __DIR__ . '/../vistes/show_cistella.php';