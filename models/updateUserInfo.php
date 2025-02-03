<?php
function updateUserInfo($connection, $id, $name, $mail, $city, $address, $postalCode)
{
    if (empty($id) || empty($name) || empty($mail) || empty($city) || empty($address) || empty($postalCode)) {
        return false;
    }

    $id = intval($id);
    $name = pg_escape_string($connection, $name);
    $mail = pg_escape_string($connection, $mail);
    $city = pg_escape_string($connection, $city);
    $address = pg_escape_string($connection, $address);
    $postalCode = intval($postalCode);

    $sql = "UPDATE usuari 
            SET nom = $2, mail = $3, poblacio = $4, direccio = $5, cp = $6 
            WHERE id = $1";

    $consulta = pg_prepare($connection, "update_user_info", $sql);

    if (!$consulta) {
        die("Error al preparar la consulta en updateUserInfo");
    }

    $consulta_result = pg_execute($connection, "update_user_info", array($id, $name, $mail, $city, $address, $postalCode));

    if (!$consulta_result) {
        die("Error al ejecutar la consulta en updateUserInfo");
    }

    pg_close($connection);

    return true;
}
