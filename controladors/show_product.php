<?php
    require_once __DIR__ . '/../models/connectDB.php';
    require_once __DIR__ . '/../models/getProducts.php';

    $product_id = $_GET['product_id'] ?? null;

    if ($product_id == null) {
        die("No hi ha id categoria");
    }
    
    $connection = connectDB();

    $producto = getProduct($connection, $product_id);

    include __DIR__ . '/../vistes/show_product.php';