<?php
    require_once __DIR__ . '/../models/connectDB.php';
    require_once __DIR__ . '/../models/getCategoryById.php';

    $category_id = $_GET['category_id'] ?? null;
    $search = $_GET['search'] ?? null;
    
    if ($category_id)
    {
        $connection = connectDB();

        $category = getCategoryById($connection, $category_id); 

        if ($category)
        {
            include __DIR__ . '/../vistes/show_welcome_category.php';
        }
        else
        {
            die("Categoría no encontrada.");
        }
    } 
    else
    {
        include __DIR__ . '/../vistes/show_welcome_search.php';
    }