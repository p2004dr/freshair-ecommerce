<?php
    function loginUser($connection, $email, $password)
    {
        if (empty($email) || empty($password))
        {
            return false;
        }

        $email = pg_escape_string($connection, $email);

        $sql = "SELECT id, mail, nom, contrasenya 
                FROM usuari 
                WHERE mail = $1";

        $consulta = pg_prepare($connection, "login_user", $sql);

        if (!$consulta)
        {
            die("Error al preparar la consulta en loginUser");
        }

        $consulta_result = pg_execute($connection, "login_user", array($email));

        if (!$consulta_result || pg_num_rows($consulta_result) === 0) {
            pg_close($connection);
            return false;
        }

        $user = pg_fetch_assoc($consulta_result);

        if (!password_verify($password, $user['contrasenya']))
        {
            pg_close($connection);
            return false;
        }

        pg_close($connection);

        return [
            'id' => $user['id'],
            'email' => $user['mail'],
            'name' => $user['nom']
        ];
    }