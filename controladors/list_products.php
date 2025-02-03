<?php
    require_once __DIR__ . '/../models/connectDB.php';
    require_once __DIR__ . '/../models/getProducts.php';

    $category_id = $_GET['category_id'] ?? null;
    $search = $_GET['search'] ?? null;
    
    $connection = connectDB();

    if ($category_id !== null)
    {
        $productos = getProductsByCategory($connection, $category_id);
    }
    elseif ($search !== null)
    {
        $productos = getProductsByName($connection, $search);
    }
    else
    {
        die("No s'han proporcionat paràmetres vàlids (category_id o search).");
    }
    
    include __DIR__ . '/../vistes/list_products.php';