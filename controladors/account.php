<?php
require_once __DIR__ . '/../models/connectDB.php';
require_once __DIR__ . '/../models/account.php';

session_start();

if (!isset($_SESSION['user']) && !isset($_SESSION['user']['id']))
{
    http_response_code(400);
    echo 'Falta iniciar sessió';
    exit;
}

$connection = connectDB();
$user_info = getUserData($connection, $_SESSION['user']['id']);

include __DIR__ . '/../vistes/account.php';
