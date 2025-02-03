<?php
    function connectDB()
    {
        $connection = pg_connect("host=127.0.0.1 dbname=tdiw-f6 user=tdiw-f6 password=aleixpau");
        
        if (!$connection)
        {
            die("Error al conectarse a la base de dades");
        }
        return $connection;
    }