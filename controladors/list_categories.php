<?php
    require_once __DIR__ . '/../models/connectDB.php';
    require_once __DIR__ . '/../models/getCategories.php';

    $connection = connectDB();
    $categories = getCategories($connection);
    
    include __DIR__ . '/../vistes/list_categories.php';