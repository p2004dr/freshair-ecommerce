<?php

function getUserData($connection, $id)
{
    $id = pg_escape_string($connection, $id);

    $sql = "SELECT mail, nom, direccio, poblacio, cp 
            FROM usuari 
            WHERE id = $1";

    $consulta = pg_prepare($connection, "get_user_data", $sql);

    if (!$consulta) {
        die("Error al preparar la consulta en getUserData");
    }

    $consulta_result = pg_execute($connection, "get_user_data", array($id));

    if (!$consulta_result || pg_num_rows($consulta_result) === 0) {
        pg_close($connection);
        return false;
    }

    $user_data = pg_fetch_assoc($consulta_result);

    pg_close($connection);

    return $user_data;
}