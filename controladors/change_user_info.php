<?php
require_once __DIR__ . '/../models/connectDB.php';
require_once __DIR__ . '/../models/updateUserInfo.php';

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['user']['id'])) {
    http_response_code(400);
    echo 'Falta iniciar sessió';
    exit;
}

$id = $_SESSION['user']['id'];

$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    http_response_code(400);
    echo "Falten dades obligatòries: No es van rebre dades";
    exit;
}

$name = htmlspecialchars($data['nom']);
$mail = htmlspecialchars($data['mail']);
$city = htmlspecialchars($data['poblacio']);
$address = htmlspecialchars($data['direccio']);
$postalCode = htmlspecialchars($data['cp']);

if ($name === '' || $mail === '' || $city === '' || $address === '' || $postalCode === '') {
    http_response_code(400);
    echo 'Falten dades obligatòries: Algún camp està buit';
    exit;
}

if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo 'El correu electrònic no és vàlid';
    exit;
}

if (!is_numeric($postalCode)) {
    http_response_code(400);
    echo 'El codi postal ha de ser un número';
    exit;
}

$connection = connectDB();

$result = updateUserInfo($connection, $id, $name, $mail, $city, $address, intval($postalCode));

if ($result) {
    http_response_code(200);
    echo 'Dades del usuari actualitzades correctament';
} else {
    http_response_code(500);
    echo $result['error'];
}
