<?php
    function registerUser($connection, $email, $name, $address, $city, $zipCode, $password)
    {
        if (empty($email) || empty($name) || empty($address) || empty($city) || empty($zipCode) || empty($password))
        {
            return false;
        }

        $email = pg_escape_string($connection, $email);
        $name = pg_escape_string($connection, $name);
        $address = pg_escape_string($connection, $address);
        $city = pg_escape_string($connection, $city);
        $zipCode = intval($zipCode);
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO usuari (mail, nom, direccio, poblacio, cp, contrasenya) 
                VALUES ($1, $2, $3, $4, $5, $6)";

        $consulta = pg_prepare($connection, "insert_new_user", $sql);

        if (!$consulta)
        {
            die("Error al preparar la consulta en registerUser");
        }

        $consulta_result = pg_execute($connection, "insert_new_user", array($email, $name, $address, $city, $zipCode, $hashedPassword));

        if (!$consulta_result)
        {
            die("Error al ejecutar la consulta en registerUser");
        }

        pg_close($connection);

        return true;
    }

    function emailExists($email)
    {
        $connection = connectDB();

        if (!$connection) {
            die("Error de conexión en emailExists");
        }

        $email = pg_escape_string($connection, $email);

        $sql_check = "SELECT 1 FROM usuari WHERE mail = $1";
        $result_check = pg_prepare($connection, "check_email_exists", $sql_check);

        if (!$result_check) {
            die("Error al preparar la consulta de comprovació d'email");
        }

        $check_result = pg_execute($connection, "check_email_exists", array($email));

        $email_exists = pg_num_rows($check_result) > 0;

        pg_close($connection);

        return $email_exists;
    }