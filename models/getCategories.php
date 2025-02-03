<?php
    function getCategories($connection)
    {        
        $sql_categories = "SELECT id, nom, img, direccio FROM Categoria";
        $consulta_categories = pg_query($connection, $sql_categories);

        if (!$consulta_categories) {
            die("Error en la consulta de categorías");
        }

        $result_categories = pg_fetch_all($consulta_categories);
        pg_close($connection);

        return $result_categories;
    }

   